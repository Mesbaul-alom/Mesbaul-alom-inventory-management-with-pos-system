<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>Download pdf -- barcode details</title>

</head>

<style>
    table{
        border-spacing: 30px;
    }
    .barcode{


        text-align: center;
        font-family:arial, sans-serif;
        font-weight:400;



    }

    .barcode p{
        font-size:10px;
        margin:5px 0;
    }

    .barcode p.name{
        margin:-2px 0;
    }
    .barcode p.sku{
        margin-top:4px;
    }
</style>

<body>



<div>

<table>

    @php
      $custom_quantity =  ceil((int) $print_quantity/4);
      $remaining_quantity   = $print_quantity;
      $product_code=1001;
    @endphp

    @for($i = 0;$i < $custom_quantity; $i++)


      @if($remaining_quantity < 4)
        <tr style="margin:40px 0;">
                @while ( $remaining_quantity > 0)

                        <td>
                            <div class="barcode">
                                <p class="name">Name: {{$Purchase_item->product->name}}</p>
                                <p class="price">Price: {{$Purchase_item->product->price}} BDT </p>
                                <img src="data:image/png;base64,' . {{DNS1D::getBarcodePNG(strval($Purchase_item->product->id), 'C128',2,40,array(1,1,1))}} . '" alt="barcode"   />
                                <p class="sku">P: {{$product_code++}}</p>
                            </div>

                            {{-- <img src="data:image/png;base64,' . {{DNS1D::getBarcodePNG($id, 'C128',2,40,array(1,1,1))}} . '" alt="barcode"   /> --}}

                        </td>
                      @php
                        $remaining_quantity--;
                      @endphp
                @endwhile
            </tr>

        @else

        <tr >
                <td >

                    <div class="barcode">
                        <p class="name">Name: {{$Purchase_item->product->name}}</p>
                        <p class="price">Price: {{$Purchase_item->product->price}} BDT </p>
                        <img src="data:image/png;base64,' . {{DNS1D::getBarcodePNG(strval($Purchase_item->product->id), 'C128',2,40,array(1,1,1))}} . '" alt="barcode"   />
                        <p class="name">P: {{$product_code++}}</p>
                    </div>
                </td>
                <td>

                    <div class="barcode">
                        <p class="name">Name: {{$Purchase_item->product->name}}</p>
                        <p class="price">Price: {{$Purchase_item->product->price}} BDT </p>
                        <img src="data:image/png;base64,' . {{DNS1D::getBarcodePNG(strval($Purchase_item->product->id), 'C128',2,40,array(1,1,1))}} . '" alt="barcode"   />
                        <p class="name">P: {{$product_code++}}</p>
                    </div>

                </td>
                <td>

                    <div class="barcode">
                        <p class="name">Name: {{$Purchase_item->product->name}}</p>
                        <p class="price">Price: {{$Purchase_item->product->price}} BDT </p>
                        <img src="data:image/png;base64,' . {{DNS1D::getBarcodePNG(strval($Purchase_item->product->id), 'C128',2,40,array(1,1,1))}} . '" alt="barcode"   />
                        <p class="name">P: {{$product_code++}}</p>
                    </div>

                </td>
                <td>

                    <div class="barcode">
                        <p class="name">Name: {{$Purchase_item->product->name}}</p>
                        <p class="price">Price: {{$Purchase_item->product->price}} BDT </p>
                        <img src="data:image/png;base64,' . {{DNS1D::getBarcodePNG(strval($Purchase_item->product->id), 'C128',2,40,array(1,1,1))}} . '" alt="barcode"   />
                        <p class="name">P: {{$product_code++}}</p>
                    </div>

                </td>
        </tr>

      @endif





       @php
          $remaining_quantity  -= 4;
       @endphp

    @endfor



</table>







</div>

</body>
</html>




