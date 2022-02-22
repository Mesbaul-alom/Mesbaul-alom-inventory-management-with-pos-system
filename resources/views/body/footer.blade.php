<center>
  <footer class="footer text-center ">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                @php
                                    $demo=App\Models\Company::all();

                                @endphp
                                @foreach ($demo as $data)


                                <script>document.write(new Date().getFullYear())</script> &copy;Stock Management System by <a target="_blank" href="https://excelitai.com/">{{$data->company_name}}</a>
                                @endforeach
                            </div>
                            <div class="col-md-3">
                                <div class="text-md-end footer-links d-none d-sm-block">

                                    {{-- <a href="tel:{{$data->company_phone}}">Contact Us: {{$data->company_phone}}</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </center>
