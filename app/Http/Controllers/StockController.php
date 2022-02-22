<?php

namespace App\Http\Controllers;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{

    public function StockList(){

        $products = Product::all();
        $suppliers = Supplier::all();
        $stocks = Stock::all();
        return view('Stock.StockList')->with('stocks',$stocks)
                                      ->with('products',$products)
                                      ->with('suppliers',$suppliers);

    }

    public function StockSearch(Request $req){


        $from = $req->date_from;
        $to =$req->date_to;

if($req->product_id){

    $stocks= Stock::Where('product_id','LIKE', '%' . $req->product_id. '%')->get();


}
elseif($req->product_id && $req->supplier_id){
    $stocks= Stock::Where('product_id','LIKE', '%' . $req->product_id. '%')
                               ->Where('supplier_id','LIKE', '%' . $req->supplier_id. '%')->get();
}
elseif($req->supplier_id && $req->date_from && $req->date_to ){

    $stocks= Stock::Where('supplier_id','LIKE', '%' . $req->supplier_id. '%')
    ->whereBetween('product_add_date', [$from, $to])->get();

}
else{

    $stocks= Stock::Where('product_id','LIKE', '%' . $req->product_id. '%')
    ->Where('supplier_id','LIKE', '%' . $req->supplier_id. '%')
    ->whereBetween('product_add_date', [$from, $to])->get();
}
               $products = Product::all();
               $suppliers = Supplier::all();
         return view('Stock.StockList')->with('stocks',$stocks)
         ->with('products',$products)
         ->with('suppliers',$suppliers);

    }


}
