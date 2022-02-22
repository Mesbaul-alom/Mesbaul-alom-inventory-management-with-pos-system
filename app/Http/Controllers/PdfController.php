<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use PDF;

class PdfController extends Controller
{
    // create pdf view page
    public function CreatePdf()
    {

    if(is_null($this->user) || !$this->user->can('admin.createPdf') ){
        abort('403','You dont have acces!!!!');
    }
       $product=Product::all();
       return view('Pdf',compact('product'));

    }


    public function download()
    {
        if(is_null($this->user) || !$this->user->can('admin.createPdf') ){
            abort('403','You dont have acces!!!!');
        }
       $product=Product::all();

       $pdf = PDF::loadView('Pdf.DownloadPurchase', $product);

       return $pdf->download();

    return back();
    }



}
