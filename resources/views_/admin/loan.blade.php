@extends('admin.layouts.default')

@section('content')
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{url('/')}}" class="site_title"><img src="{{ url('/images/logo-w.png') }}" width="210px" height="55px" ><!--<span> Staco Insurance</span>--></a>
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
                <h3><i class="fa fa-money"></i> Loan Application Form <!--<small>Listing design</small>--></h3>
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
                    <h2><i class="fa fa-money"></i> Loan Application <!--<small>different form elements</small>--></h2>
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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"  action="{{ url('/user/loan') }}">
                    {{ csrf_field() }}

                     <input type="hidden" id="last-name" name="member_id" required="required" value="{{ $member->user_id }}">


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount-to-be-paid">Member Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="cooporative_name" required="required" value="{{ $member->firstname }} {{ $member->lastname }}" class="form-control col-md-7 col-xs-12" disabled="true">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                    
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount-to-be-paid">Loan Amount <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="loan_amount" required="required" class="form-control col-md-7 col-xs-12">
                          <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Repayment Duration<span class="required">* <i class="fa fa-map"></i></label>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <select name="payment_duration" class="select2_single form-control" tabindex="-1">
                            <option value="">Choose..</option>
                            <option value="1">1 Month</option>
                            <option value="2">2 Months</option>
                            <option value="3">3 Months</option>
                            <option value="4">4 Months</option>
                            <option value="5">5 Months</option>
                            <option value="6">6 Months</option>
                            <option value="12">1 Year</option>
                            <option value="24">2 Years</option>
                            <option value="36">3 Years</option>
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