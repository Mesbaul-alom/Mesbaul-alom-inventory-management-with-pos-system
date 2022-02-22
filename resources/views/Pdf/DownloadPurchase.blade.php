<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    #invoice-POS{
h1{
  font-size: 1.5em;
  color: #222;
}
h2{font-size: .9em;}
h3{
  font-size: 1.2em;
  font-weight: 300;
  line-height: 2em;
}
p{
  font-size: .7em;
  color: #666;
  line-height: 1.2em;
}
#top, #mid,#bot{ /* Targets all id with 'col-' */
  border-bottom: 1px solid #EEE;
}
#top{min-height: 100px;}
#mid{min-height: 80px;}
#bot{min-height: 50px;}
#top .logo{
  //float: left;
	height: 60px;
	width: 60px;
	background: url{{public_path('assets/images/excelit.png')}} no-repeat;
	background-size: 60px 60px;
}
.clientlogo{
  float: left;
	height: 60px;
	width: 60px;
	background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
	background-size: 60px 60px;
  border-radius: 50px;
}
.info{
  display: block;
  //float:left;
  margin-left: 0;
}
.title{
  float: right;
}
.title p{text-align: right;}
table{
  width: 100%;
  border-collapse: collapse;
}
td{
  //padding: 5px 0 5px 15px;
  //border: 1px solid #EEE
}
.tabletitle{
  //padding: 5px;
  font-size: .5em;
  background: #EEE;
}
.service{border-bottom: 1px solid #EEE;}
.item{width: 24mm;}
.itemtext{font-size: .5em;}
#legalcopy{
  margin-top: 5mm;
}
}
</style>
<body>
    @php
    $demo=App\Models\Company::all();
@endphp
@foreach ($demo as $data)
    <div id="invoice-POS">
        <center id="top">
          <div class=""> <img src="{{public_path('admin_img/'.$data->company_logo)}}" height="50px" width="200px" alt="eXCELIT LOGO
            "></div>
          <div class="info">
            <h2>{{$data->company_name}}</h2>
          </div><!--End Info-->
        </center><!--End InvoiceTop-->
        <div id="mid">
          <div class="info">
            <h2>Contact Info</h2>
            <p>{{$data->company_address}}
            </p>
            <p>{{$data->company_phone}}
            </p>
          </div>
          @endforeach
          <div>
            <p>sales_date: {{$today}}</p>
            <p>created_by : {{$user}}</p>
            <p>Payment_type: {{$payment}}</p>
        </div>
        </div><!--End Invoice Mid-->

        <div id="bot">

                        <div id="table">
                            <table>
                                <tr class="tabletitle">
                                    <td class="item"><h2>product Name</h2></td>
                                    <td class="Rate"><h2>Price</h2></td>
                                    <td class="Hours"><h2>Qty</h2></td>
                                    <td class="Hours"><h2>Vat</h2></td>

                                    <td class="Rate"><h2>Sub Total</h2></td>
                                </tr>


                                @foreach ($carts as $cart)
                                <tr class="service">
                                    <td class="tableitem"><p class="itemtext">{{$cart->name}}</p></td>
                                    <td class="tableitem"><p class="itemtext">{{$cart->price}}</p></td>
                                    <td class="tableitem"><p class="itemtext">{{$cart->qty}}</p></td>
                                    <td class="tableitem"><p class="itemtext">{{$cart->tax}}</p></td>
                                    <td class="tableitem"><p class="itemtext">{{$cart->subtotal}}</p></td>
                                </tr>


                                @endforeach


                                <tr class="tabletitle">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="Rate"><h2>Total</h2></td>
                                    <td class="payment"><h2>{{$cartTotal}}</h2></td>
                                </tr>

                            </table>
                        </div><!--End Table-->

                        <div id="legalcopy">
                            <p class="legal"><strong>Thank you for your business!</strong>  Payment is expected within 31 days; please process this invoice within that time. There will be a 5% interest charge per month on late invoices.
                            </p>
                        </div>

                    </div><!--End InvoiceBot-->
      </div><!--End Invoice-->
</body>
</html>
