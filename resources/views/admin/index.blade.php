@section('css')
<link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
@endsection
 @extends('./layout_master')

 {{-- section id is yeild name  --}}

 @section('admin')

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript" src="{{asset('assets/js/echarts.min.js')}}"></script>

  <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">

                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                                    <i class="fe-user font-22 avatar-title text-primary"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$adminCount}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Total Admin</p>
                                                    {{-- <audio id="audioBox" src="{{asset('asstets/noti/audio1.wav')}}">
                                                        erdrfyhrtf
                                                    </audio> --}}
                                                </div>
                                            </div>
                                            {{-- <div class="col-6">
                                                <audio id="audioBox" controls="controls" src="{{asset('music.mp3')}}"> </audio>





                                            </div> --}}
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                                    <i class="fe-user font-22 avatar-title text-success"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$manageCount}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Total Manager</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                                    <i class="fe-shopping-cart font-22 avatar-title text-info"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$productCount}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Total product</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                                    <i class="fe-user font-22 avatar-title text-warning"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$customerCount}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Total Customer</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->




                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                                    <i class="fe-user font-22 avatar-title text-primary"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$supplierCount}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Total Supplier</p>
                                                    {{-- <audio id="audioBox" src="{{asset('asstets/noti/audio1.wav')}}">
                                                        erdrfyhrtf
                                                    </audio> --}}
                                                </div>
                                            </div>

                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                                    <i class="fe-user font-22 avatar-title text-success"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$productReturnCount}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate"> Total Return Product</p></p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                                    <i class="fe-shopping-cart font-22 avatar-title text-info"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$salesPosCount}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Today Sale Product</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                                    <i class="iconify font-22 avatar-title text-success"  data-icon="dashicons:money-alt" ></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$todaysalesprice}}</span>tk</h3>
                                                    <p class="text-muted mb-1 text-truncate">Today sale amount</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->




                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-2">

                                            </div>

                                            <div class="col-3">
                                                <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                                    <i class="iconify font-22 avatar-title text-success"  data-icon="dashicons:money-alt" ></i>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="text-end">
                                                    <p class="text-muted mb-1 text-truncate" style="font-size: larger">Monthly Sale amount</p>
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$monthprice}}</span>tk</h3>

                                                    {{-- <audio id="audioBox" src="{{asset('asstets/noti/audio1.wav')}}">
                                                        erdrfyhrtf
                                                    </audio> --}}
                                                </div>
                                            </div>
                                            <div class="col-3">

                                            </div>

                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            {{-- <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-soft-success border-success border">

                                                    <i class="iconify font-22 avatar-title text-success"  data-icon="dashicons:money-alt" ></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$yearprice}}</span>tk</h3>
                                                    <p class="text-muted mb-1 text-truncate">Yearly total sale Amount</p></p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col--> --}}


                            <div class="col-md-6 col-xl-6">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-2">

                                                </div>


                                            <div class="col-3">
                                                <div class="avatar-lg rounded-circle bg-soft-success border-success border">

                                                    <i class="iconify font-22 avatar-title text-success"  data-icon="dashicons:money-alt" ></i>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="text-end">
                                                    <p class="text-muted mb-1 text-truncate" style="font-size: larger">Yearly total sale Amount</p></p>
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$yearprice}}</span>tk</h3>

                                                </div>
                                            </div>
                                            <div class="col-3">
                                            </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div>

                        </div>
                        <!-- end row-->

                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="chart   has-fixed-height "  id="bar-chart"></div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-6">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="chart has-fixed-height" id="pie_basic"></div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->


                        </div>

                    </div>

                </div>
                <!-- end row -->
                {{-- start --}}


            </div>
        </div>



                <!-- Footer Start -->
                <script type="text/javascript">
                    var pie_basic_element = document.getElementById('pie_basic');
                    if (pie_basic_element) {
                        var pie_basic = echarts.init(pie_basic_element);
                        pie_basic.setOption({
                            color: [
                                '#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80',
                                '#8d98b3','#e5cf0d','#97b552','#95706d','#dc69aa',
                                '#07a2a4','#9a7fd1','#588dd5','#f5994e','#c05050',
                                '#59678c','#c9ab00','#7eb00a','#6f5553','#c14089'

                            ],

                            textStyle: {
                                fontFamily: 'Roboto, Arial, Verdana, sans-serif',
                                fontSize: 13
                            },

                            title: {
                                text: 'Product sale price chart',
                                left: 'center',
                                textStyle: {
                                    fontSize: 17,
                                    fontWeight: 500
                                },
                                subtextStyle: {
                                    fontSize: 12
                                }
                            },

                            tooltip: {
                                trigger: 'item',
                                backgroundColor: 'rgba(0,0,0,0.75)',
                                padding: [10, 15],
                                textStyle: {
                                    fontSize: 13,
                                    fontFamily: 'Roboto, sans-serif'
                                },
                                formatter: "{a} <br/>{b}: {c} ({d}%)"
                            },

                            legend: {
                                orient: 'horizontal',
                                bottom: '0%',
                                left: 'center',
                                data: ['Daily Sale', 'Monthly Sale','Yearly Sale'],
                                itemHeight: 8,
                                itemWidth: 8
                            },

                            series: [{
                                name: 'Product ',
                                type: 'pie',
                                radius: '70%',
                                center: ['50%', '50%'],
                                itemStyle: {
                                    normal: {
                                        borderWidth: 1,
                                        borderColor: '#fff'
                                    }
                                },
                                data: [
                                    {value: {{$todaysalesprice}}, name: 'Daily Sale'},
                                    {value: {{$monthprice}}, name: 'Monthly Sale'},
                                    {value: {{$yearprice}} , name: 'Yearly Sale'}

                                ]
                            }]
                        });
                    }
                    </script>

                <script type="text/javascript">
                    google.charts.load('current', {'packages':['bar']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                  var data = google.visualization.arrayToDataTable([
                  ['Product Name', 'Sales Price', 'Sales  Quantity'],

                  @php
                    foreach($salesPos as $product) {
                    echo "['".$product->item_name."', ".$product->price.", ".$product->quantity."],";

                    }
                  @endphp
                  ]);

                  var options = {
                    chart: {
                  title: 'Product Graph ',
                  subtitle: 'Price, and Quantity: @php echo $salesPos[0]->created_at @endphp',
                    },
                    bars: 'vertical'
                  };
                  var chart = new google.charts.Bar(document.getElementById('bar-chart'));
                  chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                  </script>




@endsection

