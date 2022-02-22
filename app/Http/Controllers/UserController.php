<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\ManagerRequest;
use App\Models\Category;
use App\Models\Manager;
use App\Models\Admin;
use App\Models\User;
use App\Models\Supplier;
use App\Models\ProductReturn;
use App\Models\Customer;
use App\Models\SalesPos;
use App\Models\Product;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Notifications\StockNotification;

class UserController extends Controller
{

public $user;
public function __construct()
{
    $this->middleware(function($request,$next){

$this->user=Auth::user();
return $next($request);
    });
}
///changable


public function loginview(){

    return view('auth.login');

        }
        public function loginverify(Request $req){
            $validator = Validator::make($req->all(), [


                'email' => 'required|email|exists:users,email',
                'password' => 'required|exists:users',

              ],
                [


                 'email.required' => 'Cant Emty The field',
                 'password.required' => 'Cant Emty field',

              ]);

                $creds = $req->only('email','password');
            // dd( Auth::guard('superadmin')->attempt( $creds));

                if( Auth::attempt( $creds) ){
                    $admin  = Auth::user();
                    $admin  = User::find($admin->id);

                        return redirect()->route('dashboard');

                }

                else{





                return back()->withErrors($validator) ->withInput();;

                }

        }



    public function NotificationAlart(){

        $admins=User::all();
        $products=Product::all();

        foreach ($products as $product) {
            $allProduct=$product->count;


            if($product->stock_alart!=1 && $allProduct<5){


                foreach ($admins as $admin) {
                 $admin->notify(new StockNotification($product));
                }

                Product::Where('id',$product->id)->Update(['stock_alart'=>1]);
           }

        }


    }

    public function Dashboard(){

        $admin=Admin::all();
        $adminCount=$admin->count();
        $manager=Manager::all();
        $manageCount=$manager->count();
        $products=Product::all();
        $productCount=$products->count();
        $supplier=Supplier::all();
        $supplierCount=$supplier->count();
        $productReturn=ProductReturn::all();
        $productReturnCount=$productReturn->count();
        $customer=Customer::all();
        $customerCount=$customer->count();


        $salesPos=SalesPos::all();
        $salesPosCount=SalesPos::whereDate('sales_date', date('Y-m-d'))->get()->count();
        $todaysalesprice=SalesPos::whereDate('sales_date', date('Y-m-d'))->get()->sum('price');
      $monthprice=  SalesPos::whereMonth('sales_date', date('m'))->get()->sum('price');
      $yearprice=  SalesPos::whereYear('sales_date', date('Y'))->get()->sum('price');

       $this->NotificationAlart();

        // return view ('admin.chart',compact('salesPos','manageCount','productCount','supplierCount',
        //                           'productReturnCount','customerCount','salesPosCount','todaysalesprice','monthprice','yearprice'));
        return view ('admin.index',compact('adminCount','manageCount','productCount','supplierCount',
                                  'productReturnCount','customerCount','salesPosCount','todaysalesprice','monthprice','yearprice','salesPos'));
    }

    public function logout(){
         Auth::logout();
        //Auth::user()->logout();
        return redirect()->route('user.login');

    }


    // add admin view page////////////////////////////////////////////
    public function AddAdmin()
    {
        if(is_null($this->user) || !$this->user->can('admin.create')){
            abort('403','You dont have acces!!!!');
        }

        return view('admin.AddAdmin');
    }


    // admin store/////////////////////////////////////////////////

public function StoreAdmin(AdminRequest   $request)
{



$admin = User::where('email', $request->email)
->first();
if($admin){
$request->session()->flash('msg', 'Email is already exist');
return view('admin.AddAdmin');
}
else{
    if(is_null($this->user) || !$this->user->can('admin.create') ){
        abort('403','You dont have acces!!!!');
    }
                 if ($request->password == $request->repassword) {
                    $admin= new Admin;
                    $admin->username=$request->username;
                    $admin->fullname=$request->fullname;
                    $admin->email=$request->email;
                    $admin->password=$request->password;

                    $newImageName=time().'-'.$request->username.'.'.$request->image->extension();
                    $image=$request->image->move(public_path('admin_img'),$newImageName);
                    $admin->image=$newImageName;

                    $admin->save();

                    $notification = array(
                        'message' => 'Admin Added Sucessyfuly',
                        'alert-type' => 'success',
                    );

                    $user_id=User::insertGetId([

                    'name'=>$request->username,
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password),
                    'role'=> 2,

              ]);

         $user = User::find($user_id);

         $user->assignRole('admin');
                 }
                 else {
                    $request->session()->flash('msgg', 'Password is not matched');
                    return view('admin.AddAdmin');
                 }


        }

                return redirect('/admin/list')->with($notification);

}


    // admin list View page
    public function AdminList()
    {
        if(is_null($this->user) || !$this->user->can('admin.view')){
            abort('403','You dont have acces!!!!');
        }

         $admins = Admin::all();
        return view('admin.AdminList')->with('admins',$admins);

    }



    // edit admin view page

    public function EditAdmin($id)
    {
        if(is_null($this->user) || !$this->user->can('admin.update')){
            abort('403','You dont have acces!!!!');
        }
        $admin = Admin::find($id);
       return view('admin.EditAdmin')->with('admin',$admin);
    }

// update admin
public function UpdateAdmin(Request $request,$id)
{
    $request->validate([

        'username'=> 'required|alpha',
        'fullname'=>'required|regex:/[a-zA-Z ]*/',
        'email'=> 'required',

      ]);


    if(is_null($this->user) || !$this->user->can('admin.update')){
        abort('403','You dont have acces!!!!');
    }
    $email=Admin::where('id', $id)->get()->first();
    $email=$email->email;

    $admin=Admin::find($id);
    $admin->username=$request->username;
    $admin->fullname=$request->fullname;
    $admin->email=$request->email;


          if($request->hasFile('image') && $request->image->isValid()){
            if(file_exists(public_path('admin_img/'.$admin->image))){
                unlink(public_path('admin_img/'.$admin->image));
            }
            $newImageName=time().'-'.$request->username.'.'.$request->image->extension();
            $image=$request->image->move(public_path('admin_img'),$newImageName);
            $admin->image=$newImageName;
        }
            $admin->save();


            User::where('email', $email)
            ->update([
                'name'=>$request->username,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),

          ]);

            $notification = array(
                'message' => 'Admin Updated Sucessyfuly',
                'alert-type' => 'success',
            );

            return redirect('/admin/list')->with($notification);
}
// delete admin
public function DeleteAdmin($id)
{
    if(is_null($this->user) || !$this->user->can('admin.delete') ){
        abort('403','You dont have acces!!!!');
    }

    $admin=Admin::where('id', $id)->get()->first();
   $adminDelete=$admin->email;
   $adminDelete=User::where('email', $adminDelete)->delete();
    Admin::destroy($id);
    return redirect('admin/list');

}
//  Manager start///

 // manager View
 public function ManagerView(){
    if(is_null($this->user) || !$this->user->can('user.view') ){
        abort('403','You dont have acces!!!!');
    }

        $managers = Manager::latest()->get();
        return view('manager.AddManager',compact('managers'));
} // end mathod

public function Managershow(){

    if(is_null($this->user) || !$this->user->can('user.view') ){
        abort('403','You dont have acces!!!!');
    }
    $Managershow = Manager::latest()->get();
    return view('manager.Manager_show',compact('Managershow'));
}



public function ManagerStore(ManagerRequest $request){


    $manager = User::where('email', $request->email)
    ->first();
    if($manager){
    $request->session()->flash('msg', 'Email is already exist');
    return view('manager.AddManager');
    }
    else{

    if(is_null($this->user) || !$this->user->can('user.create') ){
        abort('403','You dont have acces!!!!');
    }
// // validation
//     $request->validate([

//          'username'=> 'required|alpha',
//                 'fullname'=>'required|alpha',
//                 'email'=> 'required|unique:admins',
//                 'image'=> 'required',
//                 'password'=> 'required|min:6|max:8',
//                 'repassword'=> 'required|min:6|max:8',
//       ],
//         [
//          'username.required' => 'Input The username  in Sucessyfuly',
//          'fullname.required' => 'Input The fullname  in Sucessyfuly',
//          'email.required' => 'Input The email in Sucessyfuly',
//          'password.required' => 'Input The password in Sucessyfuly',

//         'image' => 'please input manager img',
//         'username' => 'please input manager name',


//       ]);

      if ($request->password == $request->repassword) {

      // img upload and save
      $image = $request->file('image');
      $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
      Image::make($image)->resize(870,370)->save('upload/image/'.$name_gen);
      $save_url = 'upload/image/'.$name_gen;

   // Manager Insert
      Manager::insert([
       'username' => $request->username,
       'fullname' => $request->fullname,
       'email' => $request->email,
       'password' => $request->password,
       'image' => $save_url,
   ],


   [

         'username.required' => 'Input The username  in Sucessyfuly',
         'fullname.required' => 'Input The fullname  in Sucessyfuly',
         'email.required' => 'Input The email in Sucessyfuly',
         'password.required' => 'Input The password in Sucessyfuly',

      ]);
      $user_id=User::insertGetId([

        'name'=>$request->username,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
        'role'=> 3,

  ]);
  $user = User::find($user_id);

  $user->assignRole('Manager');




      $notification = array(
        'message' =>  'Manager Add Sucessyfuly',
        'alert-type' => 'success'
    );
}
else {
    $request->session()->flash('msgg', 'Password is not matched');
    return view('Manager.AddManager');
 }
    }
    return redirect('/show')->with($notification);



} // end method

    // Manager  edit
    public function ManagerEdit($id){
    $manager = Manager::findOrFail($id);
    return view('Manager.Manager_edit',compact('manager'));
    }




    // manager update
    public function ManagerUpdate(Request $request){

        if(is_null($this->user) || !$this->user->can('user.update') ){
            abort('403','You dont have acces!!!!');
        }
        $request->validate([
            'username'=> 'required|alpha',
            'fullname'=>'required|regex:/[a-zA-Z ]*/',
             'email'=> 'required',
            //  'image' => 'required|mimes:jpg,png',
        ]);



        $manager_id = $request->id;
        $save_url  = $request->old_img;

        if($request->hasFile('image') && $request->image->isValid()){
            $supportExtensions = ['jpg','jpeg','png'];
            $imageExt = $request->image->getClientOriginalExtension();
            $extensionSupport = false;
            foreach($supportExtensions as $value){
                if($value === $imageExt){
                    $extensionSupport = true;
                }
            }

            if($extensionSupport){
                $image = $request->file('image');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(870,370)->save('upload/image/'.$name_gen);
                $save_url = 'upload/image/'.$name_gen;
            }
            else{
                $request->session()->flash('msg', 'Please insert jpg or png formate');
                return redirect()->back();
            }


        }
        Manager::findOrFail($manager_id)->update([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'image' => $save_url,
        ]);

        $email=Manager::where('id', $manager_id)->get()->first();
        $email=$email->email;

        User::where('email', $email)
        ->update([
            'name'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),

        ]);
        $notification = array(
            'message' => 'Manager Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('show.manager')->with($notification);
    } // end method

   // Delete Slider
    public function destroy($id){




        if(is_null($this->user) || !$this->user->can('user.update') ){
            abort('403','You dont have acces!!!!');
        }

    $manager=Manager::where('id', $id)->get()->first();
     $managerDelete=$manager->email;
     $managerDelete=User::where('email', $managerDelete)->delete();
        $manager = Manager::findOrFail($id)->delete();

          $notification = array(
            'message' => 'Manager Delete Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    } // end method



//  Manager end///

public function Notification(){
    return view ('notification.Notification');
}


        }









