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
                <h3><i class="fa fa-user"></i> Member Information <!--<small>Listing design</small>--></h3>
              </div>

              <!--<div class="title_right">
                <button style="float: right;" type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</button>
              </div>-->
            </div>

            <div class="clearfix"></div>

            <br>

            <!--<div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Transaction Summary <small>Monthly progress</small></h2>
                    <div class="filter">
                      <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                      <div class="demo-container" style="height:280px">
                        <div id="placeholder33x" class="demo-placeholder"></div>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                  <div class="x_title">
                    <h2>Top Amounts/Donations</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p>12/08/2016</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>12/07/2016</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p>12/06/2016</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>12/05/2016</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

                  </div>
                </div>
              </div>
            </div>-->

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
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" value="{{ $member->firstname }}" disabled="true"> 
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label> SURNAME: </label>
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" value="{{ $member->lastname }}" disabled="true">
                      </div>

                      <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                        <label> EMAIL: </label>
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" value="{{ $member->email }}" disabled="true">
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label> PHONE NUMBER: </label>
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" value="{{ $member->telephone }}" disabled="true">
                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                         <label> GENDER: </label>
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" value="{{ $member->gender }}" disabled="true">
                      </div>
                      

                      <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>ADDRESS: </label>
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" value="{{ $member->address }}" disabled="true">
                      </div>

                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label> Bank Name: </label>
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" value="{{ $member->bank_name }}" disabled="true">
                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                         <label> Account Number: </label>
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" value="{{ $member->account_number }}" disabled="true">
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
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-user"></i> Next Of Kin Information <!--<small>different form elements</small>--></h2>
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
                      <form class="form-horizontal form-label-left input_mask">

                      <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                        <label> NAME: </label>
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" value="{{ $member->next_of_kin_name }}" disabled="true"> 
                      </div>

                      <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                        <label> EMAIL: </label>
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" value="{{ $member->next_of_kin_email }}" disabled="true">
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label> PHONE NUMBER: </label>
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" value="{{ $member->next_of_kin_number }}" disabled="true">
                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                      </div>

                   
                      <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>ADDRESS: </label>
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" value="{{ $member->next_of_kin_address }}" disabled="true">
                      </div>
                      
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
            </div>

            <div class="row">

              <!-- Financial Information -->

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-users"></i> Financial Information <small>User Records</small></h2>
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

                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>CURRENT ACCOUNT BALANCE: </label>
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" value="&#x20A6; {{ number_format($contributions->sum('contribution_amount'), 2, '.', ', ') }}" disabled="true">
                      </div>  
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <!--<label></label>-->
                        <br>
                        <a href="{{url("/member/payment/$member->user_id")}}" class="btn btn-primary btn-md"><i class="fa fa-folder"></i> Add New Contribution </a>
                      </div>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Monthly Contribution Schedule<small></small></h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <!--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a></li>
                            <li><a href="#">Settings 2</a></li>
                          </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>-->
                      </ul>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                       <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>Date</th>
                                <th>Amount</th>
                              </tr>
                            </thead>
                            <tbody>
                            @if (count($contributions) != 0)
                              @foreach ($contributions as $contribution)
                              <tr>
                                <th scope="row">{{ date("F jS, Y", strtotime($contribution->created_at)) }}</th>
                                <td>&#x20A6; {{ number_format($contribution->contribution_amount, 2, '.', ', ') }}</td>
                              </tr>
                              @endforeach
                            @endif
                            </tbody>
                          </table>
                  </div>
                </div>
              </div>

                  <div class="col-md-6 col-sm-6 col-xs-12">
                   <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>CURRENT LOAN: </label>
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" value="&#x20A6; {{ number_format($member->loans->sum('loan_amount'), 2, '.', ', ') }}" disabled="true">
                      </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <!--<label></label>-->
                        <br>
                        @if ($member->user_id == Auth::user()->user_id)
                          <a href="{{url("/user/loan")}}" class="btn btn-danger btn-md"><i class="fa fa-folder"></i> Apply for a loan</a>
                        @endif
                      </div>
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Boardered table <small>Bordered table subtitle</small></h2>
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
                                        <th>Amount</th>
                                        <th>Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @if (count($member->loans) != 0)
                                      @foreach ($member->loans as $value)
                                      <tr>
                                        <th scope="row">{{ date("F jS, Y", strtotime($value->created_at)) }}</th>
                                        <td>&#x20A6; {{ number_format($value->loan_amount, 2, '.', ', ') }}</td>
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