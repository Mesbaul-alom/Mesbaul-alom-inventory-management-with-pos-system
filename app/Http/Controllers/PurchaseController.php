<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use PDF;

class PurchaseController extends Controller
{
    public function AddPurchase()
    {

      $suppliers= Supplier::latest()->get();
      $products= Product::all();
        return view('Purchase.AddPurchase',compact('products','suppliers'));
    }



    public function StorePurchase(Request $request)
    {


         $validateData = $request->validate([
             'purchase_date' => 'required',
             'product_quantity' => 'required|numeric',
             'purchase_price' => 'required|numeric',
             'purchase_unit' => 'required',
             'purchase_note' => 'required',
             'supplier_id' => 'required',
             'product_id' => 'required',
         ]);
        $purchase= new Purchase;
        $purchase->product_id=$request->product_id;
        $purchase->supplier_id=$request->supplier_id;
        $purchase->purchase_date=$request->purchase_date;
        $purchase->product_quantity=$request->product_quantity;
        $purchase->purchase_price=$request->purchase_price;
        $purchase->purchase_unit=$request->purchase_unit;
        $purchase->purchase_note=$request->purchase_note;
        $purchase->save();



        $stock= new Stock;
        $stock->purchases_id=$purchase->id;

        $stock->product_id=$request->product_id;
        $stock->supplier_id=$request->supplier_id;
        $stock->product_add_date=$request->purchase_date;
        $stock->product_stock_count=$request->product_quantity;
        $stock->save();


        $notification = array(
          'message' => 'Purchase Success',
          'alert-type' => 'success',
        );

        return redirect()->route('show.purchase')->with($notification);


      }


    public function showPurchase(){


      $purchases = Purchase::with(['product'])->get();



      return view('Purchase.PurchaseList', compact('purchases'));
  }






  public function EditPurchase($id)
  {

      $purchase = Purchase::find($id);
      $products = Product::latest()->get();
      $suppliers = Supplier::latest()->get();

      return view('Purchase.PurchaseEdit',compact('products','purchase','suppliers'));
  }

  public function UpdatePurchase(Request $request,$id)
  {

    $validateData = $request->validate([
        'purchase_date' => 'required',
        'product_quantity' => 'required|numeric',
        'purchase_price' => 'required|numeric',
        'purchase_unit' => 'required',
        'purchase_note' => 'required',
        'supplier_id' => 'required',
        'product_id' => 'required',



  ]);
  $product_id=Purchase::where('id', $id)->get()->first();
    $product_id=$product_id->product_id;

            $purchase=Purchase::find($id);
            $purchase->product_id=$request->product_id;
            $purchase->supplier_id=$request->supplier_id;
            $purchase->purchase_date=$request->purchase_date;
            $purchase->product_quantity=$request->product_quantity;
            $purchase->purchase_price=$request->purchase_price;
            $purchase->purchase_unit=$request->purchase_unit;
            $purchase->purchase_note=$request->purchase_note;
            $purchase->save();

            Stock::where('product_id', $product_id)
            ->update([
                'product_id'=>$request->product_id,
                'supplier_id' =>$request->supplier_id,
                'product_add_date'=>$request->purchase_date,
                'product_stock_count'=>$request->product_quantity,
          ]);

            $notification = array(
              'message' => 'Purcahse edited',
              'alert-type' => 'success',
            );

            return redirect()->route('show.purchase')->with($notification);

          }
  public function DeletePurchase($id)
  {

      Purchase::destroy($id);
      $notification = array(
        'message' => 'Purchase deleted Sucessyfuly',
        'alert-type' => 'success',
      );

      return redirect()->back()->with($notification);

    }




  public function Barcode($id,$print_quantity)
  {

    $Purchase_item=Purchase::with(['product'])->where('product_id',$id)->first();


$pdf = PDF::loadView('Pdf.barcode', compact('print_quantity','id','Purchase_item'))->setPaper(array(25,0,450,500));
return $pdf->stream();




}

}
