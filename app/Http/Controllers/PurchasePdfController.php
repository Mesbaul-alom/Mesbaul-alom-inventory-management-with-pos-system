<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PosRequest;
use App\Models\Purchase;
use App\Models\Customer;
use App\Models\SalesPos;
use App\Models\Product;
use App\Models\Stock;
use Gloudemans\Shoppingcart\Facades\Cart;
use PDF;
use Carbon\Carbon;


class PurchasePdfController extends Controller
{
    //
    public function getPurchase(){

        $purchases = Purchase::all();
        return view('Pdf.PurchasePdf',compact('purchases'));
    }

    public function downloadPDF(PosRequest $req){

//dd($req->all());
        $customer_id=$req->customer_id;
        //payment
        $payment=$req->payment;

        $purchases = Purchase::all();
        $carts = Cart::content();
        //dd($carts);
        $customer=Customer::where('id','=',$customer_id)->first();
        $customer_name=$customer->customer_name;
        $day = Carbon::today();
        $today= $day->toDateString();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        $cartTax= Cart::tax();
        $cartSubTotal=Cart::subtotalFloat();
        $user=Auth::user()->name;



    //create sales pos starts
    foreach($carts as $cart){

        $pos=new SalesPos;

        $pos->stock= $cartQty;
        $pos->item_name= $cart->name;
        $product_id=$cart->id;
        $product=Product::where('id','=',$product_id)->first();
        //dd($product);
        $p_id=$product->id;

        $product_code=$product->product_code;

        $pos->sales_code=$product_code;
        $pos->sales_code=$product_code;
        $pos->created_by=$user;
        $pos->customer_name=$customer_name;
        $pos->price=$cart->price;
        $pos->quantity=$cart->qty;
        $pos->sales_date=$today;
        $pos->discount=0;
        $pos->tex=$cart->tax;
        $pos->save();


        $stock_decresed=Stock::where('product_id',  $p_id)->first();
// dd( $stock_decresed);
       $value= $stock_decresed->product_stock_count-$cart->qty;

       $stock_decresed->product_stock_count= $value;
       $stock_decresed->save();

    }
        Cart::destroy();
        $pdf=PDF::loadView('Pdf.DownloadPurchase',compact('purchases','carts','cartQty','cartTotal','cartSubTotal','cartTax','today','user','payment'))->setPaper(array(0,0,204,600));
        return $pdf->stream('purchases.pdf') ;
    }

    public function destroy_pos($id){
        $pos=SalesPos::find($id);
        $pos->delete();
        return redirect()->back();

    }

}
