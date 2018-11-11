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
                <h3><i class="fa fa-credit-card"></i> My Contributions <!--<small>Listing design</small>--></h3>
              </div>

              <div class="title_right">
                <!-- <a href="{{ url('/member/create') }}" style="float: right;" type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Create Member Account</a> -->
              </div>
            </div>

            <div class="clearfix"></div>

            <br>

            <div class="row">

              <!-- users -->

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-credit-card"></i> My Contributions <small>View Payments</small></h2>
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
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">

                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Transaction Id</th>
                          <th>Transaction Amount</th>
                          <th>Transaction Date</th>
                          <th>Deposit Slip</th>
                        </tr>
                      </thead>


                      <tbody>
                      @foreach ($contributions as $contribution)
                        <tr>
                          <td>{{ $contribution->contribution_id }}</td>
                          <td>&#x20A6; {{ number_format($contribution->contribution_amount, 2, '.', ', ') }} </td>
                          <td>{{ $contribution->created_at }}</td>
                          <td><img src="{{ $contribution->evidence }}"</td>
                        
                        </tr>
                      @endforeach 

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- users -->
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