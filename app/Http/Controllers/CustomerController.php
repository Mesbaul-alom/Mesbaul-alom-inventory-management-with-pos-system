<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;


class CustomerController extends Controller
{
    //
    public function CustomerList(){

    $customers  = Customer::all();

    return view('Customer.CustomerList',compact('customers'));




    }

public function CustomerStore(Request $request){



                $validateData = $request->validate([
                    'customer_name' => 'required',
                    'email' => 'required|email',
                    'phone' => 'required|min:6|max:11',

                    'address' => 'required',
                ],[


                    'customer_name.required' => 'Input The name  in Correctly',
                    'phone.required' => 'Input The phone  in Correctly',

                    'address.required' => 'Input The address  in Correctly',

                ]);

                $customer= new Customer;
                $customer->customer_name=$request->customer_name;
                $customer->email=$request->email;
                $customer->phone=$request->phone;
                $newImageName=time().'-'.$request->customer_name.'.'.$request->image->extension();
                $image=$request->image->move(public_path('admin_img'),$newImageName);
                $customer->image=$newImageName;
                $customer->address=$request->address;
                $customer->save();

                $notification = array(
                'message' => 'Customer created',
                'alert-type' => 'success',
                );

                return redirect()->route('customer.list')->with($notification);
    }

    public function fetchcustomer()
    {
        $customers = Customer::all();
        return response()->json([
            'customers'=>$customers,
        ]);
    }

        public function edit( $id)
        {
            $customer=Customer::find($id);

            if($customer)
            {
                return response()->json([
                    'status'=>200,
                    'customer'=> $customer,
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Customer Found.'
                ]);
            }

        }

        public function update(Request $request, $id)
        {

            $validateData = $request->validate([
                'customer_name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'address' => 'required',
            ]);


                $customer = Customer::find($id);
                if($customer)
                {
                  $customer->customer_name=$request->input('customer_name');
                  $customer->email=$request->input('email');
                  $customer->phone=$request->input('phone');
                  if($request->hasFile('image') && $request->image->isValid()){
                    if(file_exists(public_path('admin_img/'.$customer->image))){
                        unlink(public_path('admin_img/'.$customer->image));
                    }
                    $newImageName=time().'-'.$request->customer_name.'.'.$request->image->extension();
                    $image=$request->image->move(public_path('admin_img'),$newImageName);
                    $customer->image=$newImageName;
                }
                  $customer->address=$request->input('address');


                    $customer->update();
                    return response()->json([
                        'status'=>200,
                        'message'=>'customer Updated Successfully.'
                    ]);
                }
                else
                {
                    return response()->json([
                        'status'=>404,
                        'message'=>'No custmer Found.'
                    ]);
                }

            }


            public function destroyCustomer($id){

                $customer = Customer::find($id);

                $customer->delete();
                return response()->json([
                  'message' => 'Data deleted successfully!'
                ]);
            }


             public function Search(){
                $search = $_GET['query'];
               $querysearch = Customer::where('customer_name','LIKE','%'. $search.'%')->with('customer')->get();
               return view('Customer.search' , compact('querysearch '));
            }

}





