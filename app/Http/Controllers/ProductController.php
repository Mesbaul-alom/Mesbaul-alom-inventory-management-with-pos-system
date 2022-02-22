<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Stock;
use App\Models\ProductReturn;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Support\Facades\Auth;
use App\Notifications\StockNotification;
class ProductController extends Controller
{
//construc for curruent user from the auth
public $user;
public function __construct()
{
    $this->middleware(function($request,$next){
$this->user=Auth::user();
return $next($request);
    });
}
  // add Product view page
  public function AddProduct()
  {
    $categories = Category::latest()->get();
      return view('product.AddProduct',compact('categories'));
  }
   // add return  Product view page
   public function showReturnProduct()
   {
       $purchases = Purchase::with(['product'])->with(['supplier'])->get()->unique('product_id');
       return view('product.AddreturnProduct',compact('purchases'));
   }
// store product
  public function StoreProduct(Request $request)
  {
       $validateData = $request->validate([
           'name' => 'required',
           'price' => 'required',
           'product_code' => 'required',
           'squ_code' => 'required',
           'count' => 'required',
           'image' => 'required|mimes:jpg,png',
       ],[
        'name.required' => 'Input The name  in Correctly',
        'price.required' => 'Input The price  in Correctly',
        'count.required' => 'Input The count  in Correctly',
        'squ_code.required' => 'Input The squ_code  in Correctly',
        'image.required' => 'Input The supplier Img',
       ]);
      $product= new Product;
      $product->name=$request->name;
      $product->category_id=$request->category_id;
      $product->price=$request->price;
      $product->product_code=$request->product_code;
      $product->squ_code=$request-> squ_code;
      $product->count=$request->count;
      $newImageName=time().'-'.$request->name.'.'.$request->image->extension();
      $image=$request->image->move(public_path('products'),$newImageName);
      $product->product_image=$newImageName;
      if($request->count<5){
        $product->stock_alart=0;
      }
      $product->product_satus= 1;
      $product->save();
      $notification = array(
        'message' => 'Product Add Sucessyfuly',
        'alert-type' => 'success',
      );
      return redirect()->route('show.product')->with($notification);
    }
  public function showProduct(){
    $products = Product::all();
    return view('product.ProductList', compact('products'));
}
  public function showretuenProduct(){
    return view('product.ReturnProductList');
} //end method
  public function showretuenProductlist(){
    $returnproduct_list= ProductReturn::with(['product'])->with(['supplier'])->get();
//dd($returnproduct_list);
    return view('Product.ReturnProductList',compact('returnproduct_list'));
}

// store return product
public function StoreReturnProduct(Request $request)
{
 //dd($request->all());
     $validateData = $request->validate([
         'product_name' => 'required',
         'quantity' => 'required'
     ]);
     $stock_number=Stock::where('product_id',$request->product_name)->first();
    $returnproduct= new ProductReturn;
    $returnproduct->product_id=$request->product_name;
    $returnproduct->supplier_id=$request->suppliar;
    $getpurchaseid=Purchase::where('product_id',$request->product_name)->where('supplier_id',$request->suppliar)->pluck('id');
    //dd( $getpurchaseid);
    $returnproduct->purchase_id=$getpurchaseid[0];
        if($request->quantity > $stock_number->product_stock_count  ){
            return redirect()->back()->with('quantity','Not enough quantity available for return !! Product Remaining :'.$stock_number->product_stock_count);
        }elseif($request->quantity<0){
            return redirect()->back()->with('quantity','NOT A VALID INPUT !! PRODUCT Remaining : '.$stock_number->product_stock_count);
        }
        else{
            $returnproduct->return_quantiy=$request->quantity;
        }
    $returnproduct->save();
    $notification = array(
      'message' => 'Request is sent to SuperAdmin',
      'alert-type' => 'success',
    );
    return redirect()->route('show.return.productList')->with($notification);
  }
public function showReturnProductlist(){
    return view('Product.ReturnProductList');
}
public function EditProduct($id)
{
    if(is_null($this->user) || !$this->user->can('product.update') ){
        abort('403','You dont have acces!!!!');
    }
    $product = Product::find($id);
    $categories = Category::latest()->get();
    return view('Product.ProductEdit',compact('product','categories'));
}
public function EditReturnProduct($id)
{
    $purchases  = Purchase::with(['Product','supplier'])->get()->unique('product_id');
    $return_product=ProductReturn::with(['product'])->with(['supplier'])->where('product_id',$id)->first();
    //dd($purchases);
   // dd($return_product);
    return view('Product.EditReturnProduct',compact('purchases','return_product'));
}
public function UpdateProduct(Request $request,$id)
{
    if(is_null($this->user) || !$this->user->can('product.update')){
        abort('403','You dont have acces!!!!');
    }
      $validateData = $request->validate([
    'name' => 'required',
    'price' => 'required',
    'product_code' => 'required',
    'squ_code' => 'required',
    'count' => 'required',
]);
    //   $image = $request->file('image');
    //   $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    //   Image::make($image)->resize(917,1000)->save('products/'.$name_gen);
    //   $save_url = 'products/'.$name_gen;
          $product=Product::find($id);
          $product->name=$request->name;
          $product->category_id=$request->category_id;
          $product->price=$request->price;
          $product->product_code=$request->product_code;
          $product->squ_code=$request-> squ_code;
          $product->count=$request->count;
          if($request->hasFile('image') && $request->image->isValid()){
            if(file_exists(public_path('products/'.$product->product_image))){
                unlink(public_path('products/'.$product->product_image));
            }
            $newImageName=time().'-'.$request->name.'.'.$request->image->extension();
            $image=$request->image->move(public_path('products'),$newImageName);
            $product->product_image=$newImageName;
        }
          if($request->count<5){
            $product->stock_alart=0;
          }
          $product->product_satus= 1;
          $product->save();
          $notification = array(
            'message' => 'Product Edited Sucessyfuly',
            'alert-type' => 'success',
          );
          return redirect()->route('show.product')->with($notification);
        }
public function UpdateReturnProduct(Request $request,$id)
{
    //dd($request->all());
       $validateData = $request->validate([
         'product_name' => 'required',
         'quantity' => 'required'
     ]);
$stock_number=Stock::where('product_id',$request->product_name)->first();
          $product=ProductReturn::find($id);
         // dd($product);
          $product->product_id=$request->product_name;
          $product->supplier_id=$request->suppliar;
        if($request->quantity > $stock_number->product_stock_count){
            return redirect()->back()->with('quantity','Not enough quantity available for return !! Product Remaining :'.$stock_number->product_stock_count);
        }elseif($request->quantity<0 ){
         dd($request->quantity);
            return redirect()->back()->with('quantity',"Not A VALID INPUT  Product Remaining : -".$stock_number->product_stock_count);
        }
else{
    $product->return_quantiy=$request->quantity;
}
          $product->save();
          $notification = array(
            'message' => ' return Product Edited Sucessyfuly',
            'alert-type' => 'success',
          );
          return redirect()->route('show.return.productList')->with($notification);
        }
public function DeleteProduct($id)
{
    if(is_null($this->user) || !$this->user->can('product.delete') ){
        abort('403','You dont have acces!!!!'); //abort error for role dont have product delete permission
    }
    Product::destroy($id);
    $notification = array(
      'message' => 'Product deleted Sucessyfuly',
      'alert-type' => 'success',
    );
    return redirect()->back()->with($notification);
  }
public function DeletereturnProduct($id)
{
    ProductReturn::destroy($id);
    $notification = array(
      'message' => 'return product deleted Sucessyfuly',
      'alert-type' => 'success',
    );
    return redirect()->back()->with($notification);
  }
//aprove return product
public function ApprovereturnProduct($id){
        $return_product =ProductReturn::where('id',$id)->first();
        $product_stock=Stock::where('purchases_id',$return_product->purchase_id)->first();
        //dd( $product_stock->product_stock_count);
        $p_stock=Purchase::where('id',$return_product->purchase_id)->first();
        if($return_product->approve_status!=1){
            $product_stock=((int)$product_stock->product_stock_count-(int)$return_product->return_quantiy);
            $p_stock=((int)$p_stock->product_quantity-(int)$return_product->return_quantiy);
            $returnCollection = array("r_id"=>$id, "product_stock"=> $product_stock,"purchase_id"=>$return_product->purchase_id,"purchase_stock"=>$p_stock);
            return  response()->json(compact('returnCollection'));
        }
}
public function Approveconfirm(Request $request){
//    dd($request->all());
    if(is_null($this->user) || !$this->user->can('admin.create')){
        abort('403','You dont have acces!!!!');
    }
    $r_id =$request->input('r_id');
    $p_id = $request->input('purchase_id');
    $stockQuantity = $request->input('product_stock');
    $stock = Stock::where('purchases_id',$p_id)->first();
    $stock->update(['product_stock_count' => $stockQuantity]);
    // ->update(['product_stock_count' => $stock])
    ProductReturn::where('id',$r_id)->update(['approve_status' => 1]);
    Purchase::where('id',$p_id)->update(['product_quantity' => $stockQuantity]);
}
  //for testing audio
  public function ProductView(){
    $products=Product::all()->count();
    return response()->json(
        [
            'products'=>$products,
        ]
    );
}
//jquary get funtion
public function GetSupliar($product_id){
    $supplier_names=Purchase::with(['Supplier'])->where('product_id',$product_id)->get()->pluck('Supplier.name', 'Supplier.id');
return response()->json(compact('supplier_names'));
}
}
