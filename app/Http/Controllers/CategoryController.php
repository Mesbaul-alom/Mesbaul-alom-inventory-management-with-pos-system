<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

//contruct for current user
    public $user;
    public function __construct()
    {
        $this->middleware(function($request,$next){

    $this->user=Auth::user();
    return $next($request);
        });
    }

   // add Category view page
   public function AddCategory()
   {
    if(is_null($this->user)|| !$this->user->can('product.delete')){
        abort('403','You dont have acces!!!!');
    }

       return view('Category.AddCategory');
   }

   // Category list View page


        public function StoreCategory(Request $request)
        {
            if(is_null($this->user)|| !$this->user->can('product.delete')){
                abort('403','You dont have acces!!!!');
            }
            $validateData = $request->validate([
                'category_name' =>'required|regex:/[a-zA-Z ]*/',


            ]);
            $cat= new Category;
            $cat->category_name=$request->category_name;



            $cat->save();
            $notification = array(
                'message' => 'Category Add Sucessyfuly',
                'alert-type' => 'info',
              );

              return redirect()->route('category.list')->with($notification);



        }


   public function CategoryList()
   {
    if(is_null($this->user)|| !$this->user->can('product.delete')){
        abort('403','You dont have acces!!!!');
    }
    $categories  = Category::all();
       return view('Category.CategoryList',compact('categories'));
   }

   public function EditCategory($id)
{
    if(is_null($this->user)|| !$this->user->can('product.delete')){
        abort('403','You dont have acces!!!!');
    }
    $category = Category::find($id);
    return view('Category.CategoryEdit',compact('category'));
}

public function UpdateCategory(Request $request,$id)
{
    if(is_null($this->user)|| !$this->user->can('product.delete')){
        abort('403','You dont have acces!!!!');
    }
    $validateData = $request->validate([
    'category_name' =>'required|regex:/[a-zA-Z ]*/',

]);
    $category=Category::find($id);
    $category->category_name=$request->category_name;
    $category->save();
    $notification = array(
        'message' => 'Category Updated Sucessyfuly',
        'alert-type' => 'success',
      );


      return redirect('category/list')->with($notification);

}
public function DeleteCategory($id)
{
    if(is_null($this->user)|| !$this->user->can('product.delete')){
        abort('403','You dont have acces!!!!');
    }
    Category::destroy($id);
    return redirect('category/list');

}

}


