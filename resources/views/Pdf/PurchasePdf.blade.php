<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Download pdf -- product details</title>

</head>
<style>



.page-break {
    page-break-after: always;
}
.styled-table {
    border-collapse: collapse;
    width: 100%;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #463246;
    width: 100%;
    color: #ffffff;
    text-align: left;
    
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid  #463246;
}
.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}
.button{
  background-color:#63b5a8ed; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
</style>
<body>


    <h3 style="text-align:center;"></h3>
    

    <table class="styled-table">
    <thead >
        
        <tr >
            <td> purchase_date </td>
            <td> product_name </td>
            <td> supplier_name </td>
            <td> purchase_price </td>
            <td> purchase_unit </td>
            <td> purchase_note </td>
            <td> product_quantity </td>
        </tr>
    
    </thead>
    <tbody>
        
    
    @foreach ($purchases as $purchase) 
        <tr>
           
            <td>{{$purchase->purchase_date}}</td>
            <td>{{$purchase->product->name}}</td>
            <td>{{$purchase->supplier->email}}</td>
            <td>{{$purchase->purchase_price}}</td>
            <td>{{$purchase->purchase_unit}}</td>
            
            <td>{{$purchase->purchase_note}}</td>
            <td>{{$purchase->product_quantity}}</td>
            
        </tr>
    @endforeach
    </tbody>
  
    </table>
    <div style="text-align:center;">
    <a class="button"  href="{{route('download.pdf')}}">Doddwnload</a>
    <a class="button" href="/">Back</a>
    </div>
</body>
</html>




