<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\SalesPos;
use App\Models\Stock;
use PDF;
use Gloudemans\Shoppingcart\Facades\Cart;
class PosController extends Controller
{
    public function SalesShow(Request $request){
        $sales = SalesPos::all();
        $customers = Customer::all();
        $categorys = Category::all();

        $products=Product::all();
        $purcahse=Purchase::all();


        $customers=Customer::all();
        // $this->search();
        return view('Sales.salesshow', compact('categorys','sales','products', 'customers'));
        $products = Product::where('category_id' )->get();
        return view('Sales.salesshow', compact('categorys','sales','products','customers'));
    }
    public function SalesList(){
        $sales = SalesPos::all();
        // $products = Product::all();
        return view('Sales.salesList', compact('sales'));
    }
    public function getPorduct($id)
    {


        if($id=='all')
        {

            $purcahse=Purchase::all();
            $all_products=collect([]);
            foreach($purcahse as $p){
                $product_id= $p->product_id;
                $product=Product::where('id',$product_id)->first();
                // array_push($all_products,$products);
                $all_products->push($product);
            }
            // return json_encode($all_products);
            return response()->json(compact('all_products'));


        }else
        {
            $purcahse=Purchase::all();
            $all_products=collect([]);
            foreach($purcahse as $p){
                $product_id= $p->product_id;
                $product=Product::where('id',$product_id)->first();
                if( $product->category_id==$id){
                    $all_products->push($product);
                }



                // array_push($all_products,$products);

            }
            // return json_encode($all_products);
            return response()->json(compact('all_products'));






        }

    }


            public function getstock($id){

                $stock_info=Stock::where('product_id',$id)->first();
              $current_stock=(int)$stock_info->product_stock_count;

                // return $current_stock;
                 return response()->json(['stock'=>$current_stock]);
            }


            public function storeProductPos(Request $request,$id){

                $product=Product::where('id',$id)->first();
                $stock=Stock::where('product_id',$id)->first();
                $stock_count=$stock->product_stock_count;
                $this->AddMiniCart();
                $cartQty = Cart::count();

                if ($stock_count>$cartQty){

                        Cart::add(['id' => $request->id,
                        'name' => $request->name,
                        'qty' => 1,
                        'price' =>$request->price,
                        'stock' =>$request->stock,
                        'weight' => 550]);



                return response()->json(['success' => 'Successfully Added on Your Cart']);

                 }




            }

    public function CustomerSto(Request $request){

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

      return redirect()->back()->with($notification);
}


public function search(){
    $search_text=$_GET['query'];
    $products=Product::where('name','LIKE','%'.$search_text.'%')->get();
    $sales = SalesPos::all();
    $customers=Customer::all();
    $categorys = Category::all();
    return view('Sales.salesshow')->with('categorys',$categorys)
    ->with('products',$products)
    ->with('sales',$sales)
    ->with('customers',$customers);
}

public function getPos(){
    $pos=SalesPos::all();
    return response()->json([
        'pos'=>$pos,
    ]);

}
public function AddMiniCart() {

    $carts = Cart::content();
    $cartQty = Cart::count();
    $cartTotal = Cart::total();
    $cartSubTotal=Cart::subtotalFloat();

    return response()->json(array(
        'carts' => $carts,
        'cartQty' => $cartQty,
        'cartSubTotal' => $cartSubTotal,
        'cartTotal' => $cartTotal,

    ));
} // end method

	/// remove mini cart
	public function RemoveMiniCart($rowId) {

		Cart::remove($rowId);
		return redirect()->back();

	} // end mehtod

public function AddToCart(Request $request, $id) {

    $stock_info=Stock::where('product_id',$id)->first();
    dd($stock_info->product_stock_count);


        Cart::add([
            'stock_count'=>$stock_info->product_stock_count,
            'id' => $request->id,
        'name' => $request->name,
        'qty' => $request->quantity,
         'price' =>$request->price,
         'weight' => 550]);


		return response()->json(['success' => 'Successfully Added on Your Cart']);

    }




 // Cart Increment
 public function cartIncrement($rowId){

    $row = Cart::get($rowId);
    $count= $row->qty;
    $id= $row->id;



    $stock=Stock::where('product_id', $id)->first();


    $stock_count=$stock->product_stock_count;
    $count= $row->qty;
    if ($count<$stock_count){
        Cart::update($rowId,$count+1);
        return response()->json('increment');


    }





} // end mehtod

 // Cart decrement
 public function CartDecrement($rowId){
    $row = Cart::get($rowId);
    Cart::update($rowId, $row->qty-1);

    return response()->json('decrement');

} // end mehtod


public function  SalesReport(){
    $pos=SalesPos::all();
    $tpdf="";
    return view('Sales.salesreport')->with('pos',$pos)
                                    ->with('tpdf',$tpdf);
}
public function  Report(Request $req){
    $pos=SalesPos::all();
    if($req->daily){
        $pos=SalesPos::whereDate('sales_date', date('Y-m-d'))->get();
        $dpdf="";
        return view('Sales.salesreport')->with('pos',$pos)
                               ->with('dpdf',$dpdf);
    }
    elseif($req->month){
        $pos=  SalesPos::whereMonth('sales_date', date('m'))->get();
        $mpdf="";
        return view('Sales.salesreport')->with('pos',$pos)
                               ->with('mpdf',$mpdf);
    }
    elseif($req->year){
        $pos=  SalesPos::whereYear('sales_date', date('Y'))->get();
        $ypdf="";
        return view('Sales.salesreport')->with('pos',$pos)
                               ->with('ypdf',$ypdf);
    }
    elseif($req->total){
        $pos=SalesPos::all();
        $tpdf="";
        return view('Sales.salesreport')->with('pos',$pos)
                               ->with('tpdf',$tpdf);
    }
}


public function  SalesPdf(){
    $pos=SalesPos::all();
    $pdf=PDF::loadView('report.totalsale',compact('pos'));
    return $pdf->download();
}

public function  DayPdf(){
    $pos=SalesPos::whereDate('sales_date', date('Y-m-d'))->get();
    $pdf=PDF::loadView('report.totalsale',compact('pos'));
    return $pdf->download();
}
public function  MonthPdf(){
    $pos=SalesPos::whereMonth('sales_date', date('m'))->get();
    $pdf=PDF::loadView('report.totalsale',compact('pos'));
    return $pdf->download();
}
public function  YearPdf(){
    $pos=SalesPos::whereYear('sales_date', date('Y'))->get();
    $pdf=PDF::loadView('report.totalsale',compact('pos'));
    return $pdf->download();
}

}
