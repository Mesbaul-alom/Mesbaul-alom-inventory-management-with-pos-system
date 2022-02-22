
@include('./body.header')

<!-- Begin page -->
<div id="wrapper">
<!-- Topbar Start -->
@include('./body.navbar')
<!-- end Topbar -->
    <!-- ========== Left Sidebar Start ========== -->
    @include('./body.sidebar')
    <!-- Left Sidebar End -->
</div>
<!-- END wrapper -->
@yield('admin')
@include('./body.footer')
<!-- /Right-bar -->
<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
<!-- {{ asset('backend/')}} -->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Vendor js -->
<script src=" {{ asset('/assets/js/vendor.min.js')}}"></script>
<!-- Plugins js-->
<script src="{{ asset('/assets/libs/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{ asset('/assets/libs/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{ asset('/assets/libs/selectize/js/standalone/selectize.min.js')}}"></script>
<!-- Dashboar 1 init js-->
<script src="{{ asset('/assets/js/pages/dashboard-1.init.js')}}"></script>
   <!-- third party js -->
   <script src="{{ asset('/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
   <script src="{{ asset('/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
   <script src="{{ asset('/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
   <script src="{{ asset('/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
   <script src="{{ asset('/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
   <script src="{{ asset('/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>
   <script src="{{ asset('/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
   <script src="{{ asset('/assets/libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
   <script src="{{ asset('/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
   <script src="{{ asset('/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
   <script src="{{ asset('/assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
   <script src="{{ asset('/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
   <script src="{{ asset('/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
   <script src="{{ asset('/assets/js/chart.js')}}"></script>
   <script type="text/javascript" src="{{asset('assets/js/echarts.min.js')}}"></script>

   <script src="{{ asset('/assets/js/axios.min.js')}}"></script>
   <!-- third party js ends -->
   <!-- Datatables init -->
   <script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
   <script src="https://code.iconify.design/2/2.0.4/iconify.min.js"></script>
<!-- App js-->
<script src="{{ asset('/assets/js/app.min.js')}}"></script>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
{{-- bar chart js --}}
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
{{-- for payment --}}
{{-- <script src="https://code.jquery.com/jquery-1.8.3.min.js"
integrity="sha256-YcbK69I5IXQftf/mYD8WY0/KmEDCv1asggHpJk1trM8=" crossorigin="anonymous"></script> --}}
<script id="myScript"
        src="https://scripts.sandbox.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout-sandbox.js"></script>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- noster notify js function  start -->


{{-- ///////toastar start//////// --}}
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info')}}"
    switch (type) {
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
            break;
        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
            break;
        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
            break;
        case 'error':
        toastr.error(" {{ Session::get('message') }} ");
              break;
              default:
            break;
    }
    @endif
    </script>
  {{-- ///////toastar starts//////// --}}
  <script>
    $(function(){
      $(document).on('click','#delete',function(e){
          e.preventDefault();
          var link = $(this).attr("href");
                    Swal.fire({
                    width: 400,
                    padding: '3em',
                    customClass: 'swal-height',
                    title: 'Are you sure?',
                    icon: 'error',
                      showCancelButton: false,
                      confirmButtonColor: '#3085D6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                      }
                    })
      });
    });
  </script>


{{-- ///////toastar end//////// --}}



<script>
    $( document ).ready(function() {

        fetchpos();
        function fetchpos() {
            console.log("sss");
                $.ajax({
                    type: "GET",
                    url: "/product/mini/cart",
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        $('.pos').html("");
                        $.each(response.carts, function (key, item) {
                            $('span[id="cartTotal"]').text(response.cartTotal);
                            $('#cartQty').text(response.cartQty);
                            $rowId=item.qty;
                            $('#cartSubTotal').text(response.cartSubTotal);
                            $('.pos').append('<tr>\
                            \
                                <td>' + item.name + '</td>\
                                <td>' + item.qty + '</td>\
                                <td>\
                                <center id="'+item.rowId+'">\
                            <button type="submit" class="btn btn-danger btn-sm" id="'+item.rowId+'" onclick="cartDecrement(this.id)" >-</button> \
                             <input class="getQ" type="text" value="' + item.qty + '" min="1" max="100" disabled="" style="width:25px;" >  \
                             <button type="submit" class="btn btn-success btn-sm count" id="'+item.rowId+'"  value="' + item.qty + '"   onclick="cartIncrement(this.id)" >+</button>   \
                             </center>\
                            </td>\
                                <td>' + item.price + '</td>\
                                <td>' + item.tax + '</td>\
                                <td>' + item.subtotal + '</td>\
                                <td><button type="submit"><a href="/minicart/product-remove/'+item.rowId+'"><i class="fa fa-trash"></i></a></button></td>\
                               \
                             \
                            \</tr>');
                        });
                    }
                });
            }
    $('#categorySelect').on('change',function()
      {
        var selectedVal = $("#categorySelect option:selected").val();
        console.log(selectedVal);
        $murl  = `{{url('/getProduct/')}}/${selectedVal}`;
        console.log($murl);
        $.ajax({
              method:'GET',
              url: $murl,
              dataType: 'json',
              success: function ({all_products}) {
                //   console.log(data);
                  $( "#showProduct" ).empty();
                  $( all_products ).each(function( index,product ) {
                  console.log(product);
                    var value=$(".mybtn").attr("value");
                        // console.log(value);
                        $string=`<div class="col-4">
                        <button id="${product?.id}"  type="submit" style="width:239px; padding-left:2px;padding-right:5px; border:none; height:200px;" class="mybtn" value="${product.id}">
                           <div class="data col-sm-3">
                            <div class="card bg-info"  style="width:235px; height:190px; ">
                              <div class="card-body">
                            <div class="row pb-3">
                              <div class="col-3 bg-warning"  style="width:100px; height:20px; overflow: hidden;"><p value="${product.count}" id="quantity" class="quantity card-text">
                              <span style="overflow: hidden;">Qty:</span> ${product.count}</p></div>
                                </div>
                                <h5  value="${product.name}" id="name" class="name card-title">${product.name}</h5>
                                <center>
                                    <img  class=" img-responsive item_image " style="border: 1px solid gray; height:53px; width:80px;  "
                                    src="./products/${product.product_image}" alt="Item picture">

                                <h4 value="${product.price}" id="price" class="price">${product.price}</h4>
                              </center>
                            </div>
                          </div>
                             </div>
                        </button></div>`;
                      $( "#showProduct" ).append( $string);
                });
                fetchProduct();
              },
              error: function (data) {

              }
          });

          var myRow=0;
          $('.mybtn').each(function(){
            myRow=myRow+1;
            $(this).attr("id","mybtn"+myRow);
          });

          function fetchProduct() {
            $('.mybtn').on('click',function(){


                var stud_id = $(this).val();

                var id=$(this).attr("id");
                console.log(id);
                    console.log(('#'+id+' '+'.name'));
                    $name=$('#'+id+' '+'.name').text();
                    $x=$('#'+id+' '+'#name').text();
                    console.log($x);
                    $id=id;
                    console.log($name);
                    $price=$('#'+id+' '+'.price').text();
                    console.log($price);
                    $quantity=$('#'+id+' '+'.quantity').text();
                    console.log($quantity);
                    $stock=1;
                 data = {
                'id':  $id,
                'name':  $name,
                'price':  $price,
                'stock': $stock,
                'quantity': $quantity,
            }
            var stud_id = $(this).val();
            console.log(data);
            $.ajaxSetup({
                  headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });

                $posturl= "{{url('/products-pos')}}"+'/'+$id;
                 console.log($posturl);
             $.ajax({
                type: "POST",
                 url:$posturl,
                 data: data,
                dataType: "json",
                success: function (response) {
                    fetchpos();
             }

         });
                });
          }

    });

});
</script>


<script>
function fetchpos() {
            console.log("sss");
                $.ajax({
                    type: "GET",
                    url: "/product/mini/cart",
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        $('.pos').html("");
                        $.each(response.carts, function (key, item) {
                            $('span[id="cartTotal"]').text(response.cartTotal);


                            $('#cartQty').text(response.cartQty);
                            $rowId=item.qty;
                            $('#cartSubTotal').text(response.cartSubTotal);
                            $('.pos').append('<tr>\
                            \
                                <td>' + item.name + '</td>\
                                <td>' + item.qty + '</td>\
                                <td>\
                                <center id="'+item.rowId+'">\
                            <button type="submit" class="btn btn-danger btn-sm" id="'+item.rowId+'"   onclick="cartDecrement(this.id)" >-</button> \
                             <input type="text" value="' + item.qty + '" min="1" max="100" disabled="" style="width:25px;" >  \
                            <button type="submit" class="btn btn-success btn-sm count" id="'+item.rowId+'"  value="' + item.qty + '"   onclick="cartIncrement(this.id)" >+</button>   \
                             </center>\
                            </td>\
                                <td>' + item.price + '</td>\
                                <td>' + item.tax + '</td>\
                                <td>' + item.subtotal + '</td>\
                                <td><button type="submit"><a href="/minicart/product-remove/'+item.rowId+'"><i class="fa fa-trash"></i></a></button></td>\
                               \
                             \
                            \</tr>');
                        });
                    }
                });
            }
    function cartIncrement(rowId){
        var count=$('#'+rowId+' '+'.count').val();
        console.log(('#'+rowId+' '+'.count'));

        // data = {

        //         'q':$val,
        //     }







        $.ajax({
            type:'GET',
            url: "/cart-increment/"+rowId,

            // data: data,
            dataType:'json',
            success:function(data){
                fetchpos();
                console.log("/cart-increment/"+rowId);

            }
        });

    }
    function cartDecrement(rowId){
        $.ajax({
            type:'GET',
            url: "/cart-decrement/"+rowId,
            dataType:'json',
            success:function(data){
                fetchpos();

            }
        });
    }
</script>








</body>


</html>
