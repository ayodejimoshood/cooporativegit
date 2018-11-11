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
                <h3><i class="fa fa-user"></i> Member Information <!--<small>Listing design</small>--></h3>
              </div>
              <form class="form-horizontal form-label-left input_mask">

                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" style="float: right;">
                    <label> Total Contributions: </label>
                    <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                    <input type="text" class="form-control has-feedback-left" id="inputSuccess2" value="&#x20A6; {{ number_format($loan->loan->user->contributions->sum('contribution_amount'), 2, '.', ',') }}" disabled="true"> 
                  </div>


              </form>
              @if ($loan->approval_state == 0)
                <div class="title_right">
                   <a href="{{ url("/loan/approve/$loan->loan_id/$loan->stage_id") }}" class="btn btn-success btn-md"><i class="fa fa-folder"></i> Approve </a> |
                   <a href="" class="btn btn-danger btn-md"><i class="fa fa-folder"></i> Deny </a>
                </div>
              @endif

              
            </div>

            <div class="clearfix"></div>

            <br>

      

            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-user"></i> Personal Information <!--<small>different form elements</small>--></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left input_mask">

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label> FIRSTNAME: </label>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" value="{{ $loan->loan->user->firstname }}" disabled="true"> 
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label> SURNAME: </label>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" value="{{ $loan->loan->user->lastname }}" disabled="true">
                      </div>

                      <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                        <label> EMAIL: </label>
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" value="{{ $loan->loan->user->email }}" disabled="true">
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label> PHONE NUMBER: </label>
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" value="{{ $loan->loan->user->telephone }}" disabled="true">
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                         <label> GENDER: </label>
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" value="{{ $loan->loan->user->gender }}" disabled="true">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      

                      <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>ADDRESS: </label>
                        <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" value="{{ $loan->loan->user->address }}" disabled="true">
                      </div>

                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label> Member Since: </label>
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" value="{{ date('F jS, Y', strtotime($loan->loan->user->created_at)) }}" disabled="true">
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                       
                      </div>

                      <hr>
                     
                      
                      <div class="ln_solid"></div>
                      
                      <!--<div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>-->

                    </form>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-12 col-xs-12">

              <!--<form class="form-horizontal form-label-left input_mask">

                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <label> Total Contributions: </label>
                    <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                    <input type="text" class="form-control has-feedback-left" id="inputSuccess2" value="&#x20A6; {{ number_format($loan->loan->user->contributions->sum('contribution_amount'), 2, '.', ', ') }}" disabled="true"> 
                  </div>


              </form>-->

              <!--<hr>-->

                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-money"></i> Loan Details <!--<small>different form elements</small>--></h2>
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
                        

                       <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="row">Application Date</th>
                              <td>{{ date("F jS, Y", strtotime($loan->loan->created_at)) }}</td>
                            </tr>
                            <tr>
                              <th scope="row">Loan Amount</th>
                              <td>&#x20A6; {{ number_format($loan->loan->loan_amount, 2, '.', ',') }}</td>
                            </tr>
                            <tr>
                              <th scope="row">Interest</th>
                              <td>{{ $loan->loan->interest }}</td>
                            </tr>
                            <tr>
                              <th scope="row">Total Payment</th>
                              <td>&#x20A6; {{ number_format($loan->loan->total_payment, 2, '.', ',') }}</td>
                            </tr>
                            <tr>
                              <th scope="row">Monthly Payment</th>
                              <td>&#x20A6; {{ number_format($loan->loan->monthly_payment, 2, '.', ',') }}</td>
                            </tr>
                            <tr>
                              <th scope="row">Duration (Months)</th>
                              <td>{{ $loan->loan->duration }}</td>
                            </tr>
                          </thead>
                        </table>
                  </div>
                </div>

                <!--<hr>-->

                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-history"></i> Loan Application History <!--<small>different form elements</small>--></h2>
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
                        

                       <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Date</th>
                              <th>Amount</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                          @if (count($loan->loan->user->loans) != 0)
                            @foreach ($loan->loan->user->loans as $value)
                            <tr>
                              <td scope="row">{{ date("F jS, Y", strtotime($value->created_at)) }}</td>
                              <td>&#x20A6; {{ number_format($value->loan_amount, 2, '.', ',') }}</td>
                              <td>{{ $value->stage->stage_name }}</td>
                            </tr>
                            @endforeach
                          @endif
                          </tbody>
                        </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">

              <!-- Financial Information -->

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-comments"></i> Comments <small>Approval/Denial Comments</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Comments<small></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="#">Settings 1</a></li>
                              <li><a href="#">Settings 2</a></li>
                            </ul>
                          </li>
                          <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>

                        <div class="clearfix"></div>
                      </div>

                      <div class="x_content">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Date</th>
                              <th>Contributor</th>
                              <th>Approval Stage</th>
                              <th>Comment</th>
                            </tr>
                          </thead>

                          <tbody>
                              @if (count($loan->loan->comments) != 0)
                                @foreach ($loan->loan->comments as $comment)
                                <tr>
                                  <td>{{ date("F jS, Y", strtotime($comment->created_at)) }}</th>
                                  <td>{{ $comment->user->firstname }} {{ $comment->user->lastname }}</td>
                                  <td>{{ $comment->stage->stage_name }}</td>
                                  <td scope="row">{{ $comment->comment }}</td>
                                </tr>
                                @endforeach
                              @endif
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2><i class="fa fa-comment"></i> Place a comment <!--<small>different form elements</small>--></h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>

                        <div class="clearfix"></div>
                      
                      </div>
                      <div class="x_content1">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/loan/comment') }}">
                          {{ csrf_field() }}
                          <input type="hidden" name="loan_id" value="{{ $loan->loan->loan_id }}" > 
                          <input type="hidden" name="stage_id" value="{{ $loan->loan->payment_status }}"> 
                          <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <label> Comment: </label>
                            <textarea name="comment" class="form-control has-feedback-left"></textarea>
                          </div>

                          <div class="ln_solid"></div>
                        
                          <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                              <button type="submit" class="btn btn-success">Submit Comment</button>
                            </div>
                          </div>

                        </form>
                      </div>
                    </div>

                  </div>
                
                </div>

              <!-- users -->
              </div>
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