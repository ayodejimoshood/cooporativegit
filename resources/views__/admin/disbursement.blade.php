@extends('admin.layouts.default')

@section('content')
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{url('/')}}" class="site_title"><img src="{{ url('/images/logo-w.jpg') }}" width="210px" height="55px" ><!--<span> Staco Insurance</span>--></a>
            </div>
              
            <div class="clearfix"></div>

         
            <br />
           <!-- sidebar menu -->
            @include('admin.includes.side')
           <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            
            @include('admin.includes.footerbuttons')
            <!-- /menu footer buttons -->
          </div>
        </div>
     <!-- top navigation -->
        @include('admin.includes.topnav')
    <!-- /top navigation -->

     <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-money"></i> Loan Disbursement Form <!--<small>Listing design</small>--></h3>
              </div>

              <!--<div class="title_right">
                <button style="float: right;" type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</button>
              </div>-->
            </div>

            <div class="clearfix"></div>

            <br>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-money"></i> Loan Disbursement Form <!--<small>different form elements</small>--></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                     @if (Session::has('flash_error'))
                            <div class="alert alert-danger">
                              {{ Session::get('flash_error') }}
                            </div>
                      @endif
                      @if (Session::has('message'))
                           <div class="alert alert-success">
                              {{ Session::get('message') }}
                            </div>
                          <p style="text-align: center; color: green; font-size:14px;">{{ Session::get('message')  }}</p>
                      @endif          
                  </div>
                  <div class="x_content">

                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"  action="{{ url('/loan/disbursement') }}">
                    {{ csrf_field() }}

                     <input type="hidden" id="last-name" name="approval_id" required="required" value="{{ $loan->approval_id }}">


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount-to-be-paid">Applicant Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="cooporative_name" required="required" value="{{ $loan->loan->user->firstname }} {{ $loan->loan->user->lastname }}" class="form-control col-md-7 col-xs-12" disabled="true">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount-to-be-paid">Loan Amount<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="cooporative_name" required="required" value="&#x20A6; {{ number_format($loan->loan->loan_amount, 2, '.', ', ') }}" class="form-control col-md-7 col-xs-12" disabled="true">
                          <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div> 

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount-to-be-paid">Rate<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="cooporative_name" required="required" value="{{ $loan->loan->interest }}" class="form-control col-md-7 col-xs-12" disabled="true">
                          <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount-to-be-paid">Total Payment<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="cooporative_name" required="required" value="&#x20A6; {{ number_format($loan->loan->total_payment, 2, '.', ', ') }}" class="form-control col-md-7 col-xs-12" disabled="true">
                          <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <hr>
                      <h2>Amortization Schedule</h2>

                      @for ($c=1; $c<$loan->loan->duration+1; $c++)
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount-to-be-paid">Month {{ $c }} <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="payment_amount" required="required" value="&#x20A6; {{ number_format($loan->loan->monthly_payment, 2, '.', ', ') }}" class="form-control col-md-7 col-xs-12" disabled="true">
                          <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      @endfor


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount-to-be-paid">Disbursement Date <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <select name="day" class="form-control" tabindex="-1">
                            <option value="">Day</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                          </select>
                        </div>

                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <select name="month" class="select2_single form-control" tabindex="-1">
                            <option value="">Month</option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                          </select>
                        </div>
                        
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <select name="year" class="select2_single form-control" tabindex="-1">
                            <option value="">Year</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                          </select>
                        </div>
                      </div> 
                  
                  <div class="ln_solid"></div>

                  <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
                    </form>
            </div>

          </div>
        </div>
        <!-- /page content -->
    
     <!-- footer content -->
      @include('admin.includes.footer')
      <!-- /footer content -->
    </div>

<!-- jQuery -->
    <script src="{{ url('/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ url('/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ url('/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ url('/vendors/nprogress/nprogress.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ url('/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ url('/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ url('/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ url('/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ url('/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ url('/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ url('/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ url('/vendors/datatables.net-scroller/js/datatables.scroller.min.js') }}"></script>
    <script src="{{ url('/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ url('/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{url('/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="{{ url('/build/js/custom.min.js') }}"></script>

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        var table = $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->

@endsection