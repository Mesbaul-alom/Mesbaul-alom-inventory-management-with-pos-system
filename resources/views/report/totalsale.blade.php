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

        <div id="top" style="width: 100% ; text-align:center">

          <div class=""> <img src="{{public_path('admin_img/'.$data->company_logo)}}" height="50px" width="200px" alt="eXCELIT LOGO
            "></div>
          <div class="info">
            <h2>{{$data->company_name}}</h2>
          </div><!--End Info-->
        </div><!--End InvoiceTop-->

        <div id="mid">
          <div class="info">
            <h2>Contact Info</h2>
            <p>{{$data->company_address}}
            </p>
            <p>{{$data->company_phone}}
            </p>
          </div>
          @endforeach
        </div><!--End Invoice Mid-->

        <div id="bot">

                        <div id="table">
                            <table>
                                <tr class="tabletitle">
                                    <td class="item"><h2>Serial</h2></td>
                                    <td class="Hours"><h2>sales_date</h2></td>
                                    <td class="Rate"><h2>created_by</h2></td>
                                    <td class="item"><h2>customer_name</h2></td>
                                    <td class="Hours"><h2>product_name</h2></td>
                                    <td class="Rate"><h2>sales_code</h2></td>
                                    <td class="item"><h2>product_quantity</h2></td>
                                    <td class="Hours"><h2>product_total_price</h2></td>
                                    <td class="Rate"><h2>Pay Price</h2></td>
                                    <td class="Rate"><h2>Due Price</h2></td>
                                </tr>
                                @php
                                $serial=0;

                           @endphp
                            @foreach($pos as $data)

                            @php
                            $serial++;

                       @endphp
                                <tr class="service">
                                    <td class="tableitem"><p class="itemtext">{{$serial}}</p></td>
                                    <td class="tableitem"><p class="itemtext">{{ $data->sales_date}}</p></td>
                                    <td class="tableitem"><p class="itemtext">{{ $data->created_by}}</p></td>
                                    <td class="tableitem"><p class="itemtext">{{ $data->customer_name}}</p></td>
                                    <td class="tableitem"><p class="itemtext">{{ $data->item_name}}</p></td>
                                    <td class="tableitem"><p class="itemtext">{{ $data->sales_code}}</p></td>
                                    <td class="tableitem"><p class="itemtext">{{ $data->quantity}}</p></td>
                                    <td class="tableitem"><p class="itemtext">{{ $data->price}}</p></td>
                                    <td class="tableitem"><p class="itemtext">{{ $data->paid_payment}}</p></td>
                                    <td class="tableitem"><p class="itemtext">{{ $data->due}}</p></td>
                                </tr>

                                @endforeach

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
