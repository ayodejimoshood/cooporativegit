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
                <h3>Member Management <small> Edit member details</small></h3>
              </div>

              <!--<div class="title_right">
                <button style="float: right;" type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</button>
              </div>-->
            </div>

            <div class="clearfix"></div>

            <br>

            <div class="row">
     
              <!-- users -->

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit ({{ $member->firstname }} {{ $member->lastname }}) details<!--<small>different form elements</small>--></h2>
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
                      <form class="form-horizontal" role="form" method="POST" action="{{ url('/member/edit') }}">
                        {{ csrf_field() }}
                          <input type="hidden" id="first-name" name="member_id" value="{{ $member->user_id }}" >

                      <div class="form-group {{ $errors->has('firstname') ? ' has-error' : '' }} has-feedback">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12 " for="first-name">Firstname <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="firstname" value="{{ $member->firstname }}" required="required" class="form-control col-md-7 col-xs-12">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                         @if ($errors->has('firstname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('firstname') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div class="form-group {{ $errors->has('lastname') ? ' has-error' : '' }} has-feedback">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12 " for="first-name">Lastname <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="lastname" value="{{ $member->lastname }}" required="required" class="form-control col-md-7 col-xs-12">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                         @if ($errors->has('lastname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lastname') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }} has-feedback">
                        <label for="heard" class="control-label col-md-3 col-sm-3 col-xs-12">Gender <span class="required">*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <select id="heard" name="gender" class="form-control" required>
                            <option value="">Select Gender</option>
                              <option value="Male" 
                                @if ($member->gender  == "Male") 
                                  <?php echo 'selected="True"'; ?>
                                @endif >Male</option>
                              <option  value="Female"
                               @if ($member->gender  == "Female") 
                                  <?php echo 'selected="True"'; ?>
                                @endif
                              >Female</option>
                          </select>
                        </div>
                      </div> 

                      <div class="form-group {{ $errors->has('telephone_number') ? ' has-error' : '' }} has-feedback">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Telephone Number <span class="required">*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <input type="text" name="telephone_number" value="{{ $member->telephone }}" class="form-control" id="inputSuccess5">
                          <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                        </div>
                         @if ($errors->has('telephone_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telephone_number') }}</strong>
                            </span>
                        @endif
                      </div>

                       <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="last-name" name="email" value="{{ $member->email }}" required="required" class="form-control col-md-7 col-xs-12" disabled="true">
                          <span class="fa fa-mail form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div> 

                      <!--<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="last-name" name="password" required="required" class="form-control col-md-7 col-xs-12">
                          <span class="fa fa-mail form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>-->

                       <div class="form-group {{ $errors->has('user_type') ? ' has-error' : '' }} has-feedback">
                        <label for="heard" class="control-label col-md-3 col-sm-3 col-xs-12">User Privilege <span class="required">*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <select id="heard" class="form-control" name="user_type" required>
                            <option value="">Select Privilege</option>
                              <option value="1"
                               @if ($member->privilege_id  == "1") 
                                  <?php echo 'selected="True"'; ?>
                                @endif
                              >Member</option>
                              <option value="2"
                                @if ($member->privilege_id  == "2") 
                                  <?php echo 'selected="True"'; ?>
                                @endif
                              >Loan Officer</option>
                              <option value="3"
                                @if ($member->privilege_id  == "3") 
                                  <?php echo 'selected="True"'; ?>
                                @endif
                              >Account</option>
                              <option value="4"
                                @if ($member->privilege_id  == "4") 
                                  <?php echo 'selected="True"'; ?>
                                @endif
                              >Managing Director</option>
                          </select>
                        </div>
                      </div> 
                      
                      <div class="form-group {{ $errors->has('employment_category') ? ' has-error' : '' }} has-feedback">
                        <label for="heard" class="control-label col-md-3 col-sm-3 col-xs-12">Employment Category <span class="required">*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <select id="heard" class="form-control" name="employment_category" required>
                            <option value="">Select Employment Category</option>
                              <option value="Contract"
                                @if ($member->employment_category  == "Contract") 
                                  <?php echo 'selected="True"'; ?>
                                @endif
                              >Contract</option>
                              <option value="Permanent"
                                @if ($member->employment_category  == "Permanent") 
                                  <?php echo 'selected="True"'; ?>
                                @endif
                              >Permanent</option>
                           </select>
                        </div>
                      </div> 
                      
                      <div class="form-group {{ $errors->has('grade_level') ? ' has-error' : '' }} has-feedback">
                        <label for="heard" class="control-label col-md-3 col-sm-3 col-xs-12">Grade Level <span class="required">*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <select id="heard" class="form-control" name="grade_level" required>
                            <option value="">Select Grade Level</option>
                              <option value="1"
                                @if ($member->grade_level_id  == "1") 
                                  <?php echo 'selected="True"'; ?>
                                @endif
                              >Officer</option>
                              <option value="2"
                                  @if ($member->grade_level_id  == "2") 
                                  <?php echo 'selected="True"'; ?>
                                @endif
                              >Manager</option>
                              <option value="3"
                                  @if ($member->grade_level_id  == "3") 
                                    <?php echo 'selected="True"'; ?>
                                  @endif
                              >Senior Manager</option>
                              <option value="4"
                                    @if ($member->grade_level_id  == "4") 
                                      <?php echo 'selected="True"'; ?>
                                    @endif
                              >General Manager</option>
                              <option value="5"
                                  @if ($member->grade_level_id  == "5") 
                                    <?php echo 'selected="True"'; ?>
                                  @endif
                              >Director</option>
                           </select>
                        </div>
                      </div> 

                      <hr>

                      <div class="form-group {{ $errors->has('bank_name') ? ' has-error' : '' }} has-feedback">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Bank Name <span class="required">*</span>
                        </label>
                        <!--<div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="bank_name" required="required" value="{{ $member->bank_name }}" class="form-control col-md-7 col-xs-12">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>-->
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <select id="heard" class="form-control" name="bank_name" required>
                            <option value="">Select Bank Name</option>
                              <option value="Access Bank"
                                @if ($member->bank_name  == "Access Bank") 
                                  <?php echo 'selected="True"'; ?>
                                @endif>Access Bank
                              </option>
                              <option value="Aso Savings and Loans"
                                @if ($member->bank_name  == "Aso Savings and Loans") 
                                  <?php echo 'selected="True"'; ?>
                                @endif>Aso Savings and Loans
                              </option>
                              <option value="Citi Bank"
                                @if ($member->bank_name  == "Citi Bank") 
                                  <?php echo 'selected="True"'; ?>
                                @endif>Citi Bank
                              </option>
                              <option value="Diamond Bank"
                                @if ($member->bank_name  == "Diamond Bank") 
                                  <?php echo 'selected="True"'; ?>
                                @endif>Diamond Bank
                              </option>
                              <option value="Ecobank"
                                @if ($member->bank_name  == "Ecobank") 
                                  <?php echo 'selected="True"'; ?>
                                @endif>Ecobank
                              </option>
                              <option value="Enterprise Bank"
                                @if ($member->bank_name  == "Enterprise Bank") 
                                  <?php echo 'selected="True"'; ?>
                                @endif>Enterprise Bank
                              </option>
                              <option value="FCMB"
                                @if ($member->bank_name  == "FCMB") 
                                  <?php echo 'selected="True"'; ?>
                                @endif>FCMB
                              </option>
                              <option value="Fidelity Bank"
                                @if ($member->bank_name  == "Fidelity Bank") 
                                  <?php echo 'selected="True"'; ?>
                                @endif>Fidelity Bank
                              </option>
                              <option value="First Bank"
                                @if ($member->bank_name  == "First Bank") 
                                  <?php echo 'selected="True"'; ?>
                                @endif>First Bank
                              </option>
                              <option value="GT Bank"
                                @if ($member->bank_name  == "GT Bank") 
                                  <?php echo 'selected="True"'; ?>
                                @endif>GT Bank
                              </option>
                              <option value="Heritage Bank"
                                @if ($member->bank_name  == "Heritage Bank") 
                                  <?php echo 'selected="True"'; ?>
                                @endif>Heritage Bank
                              </option>
                              <option value="Keystone Bank"
                                @if ($member->bank_name  == "Keystone Bank") 
                                  <?php echo 'selected="True"'; ?>
                                @endif>Keystone Bank
                              </option>
                              <option value="Mainstreet Bank"
                                @if ($member->bank_name  == "Mainstreet Bank") 
                                  <?php echo 'selected="True"'; ?>
                                @endif>Mainstreet Bank
                              </option>
                              <option value="Skye Bank"
                                @if ($member->bank_name  == "Skye Bank") 
                                  <?php echo 'selected="True"'; ?>
                                @endif>Skye Bank
                              </option>
                              <option value="Stanbic IBTC Bank"
                                @if ($member->bank_name  == "Stanbic IBTC Bank") 
                                  <?php echo 'selected="True"'; ?>
                                @endif>Stanbic IBTC Bank
                              </option>
                              <option value="Standard Chatered"
                                @if ($member->bank_name  == "Standard Chatered") 
                                  <?php echo 'selected="True"'; ?>
                                @endif>Standard Chatered
                              </option>
                              <option value="UBA"
                                @if ($member->bank_name  == "UBA") 
                                  <?php echo 'selected="True"'; ?>
                                @endif>UBA
                              </option>
                              <option value="Union Bank"
                                @if ($member->bank_name  == "Union Bank") 
                                  <?php echo 'selected="True"'; ?>
                                @endif>Union Bank
                              </option>
                              <option value="Unity Bank"
                                @if ($member->bank_name  == "Unity Bank") 
                                  <?php echo 'selected="True"'; ?>
                                @endif>Unity Bank
                              </option>
                              <option value="Wema Bank"
                                @if ($member->bank_name  == "Wema Bank") 
                                  <?php echo 'selected="True"'; ?>
                                @endif>Wema Bank
                              </option>
                              <option value="Zenith Bank"
                                @if ($member->bank_name  == "Zenith Bank") 
                                  <?php echo 'selected="True"'; ?>
                                @endif>Zenith Bank
                              </option>
                           </select>
                        </div>
                        @if ($errors->has('bank_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('bank_name') }}</strong>
                            </span>
                        @endif
                      </div> 
                    
                      <div class="form-group {{ $errors->has('next_of_kin_name') ? ' has-error' : '' }} has-feedback">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Account Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="account_number" required="required" value="{{ $member->account_number }}" class="form-control col-md-7 col-xs-12">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        @if ($errors->has('account_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('account_number') }}</strong>
                            </span>
                        @endif
                      </div> 

                      <hr>

                      <div class="form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea class="form-control col-md-7 col-xs-12" name="address">{{ $member->address }}</textarea>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>


                      <div class="form-group {{ $errors->has('next_of_kin_name') ? ' has-error' : '' }} has-feedback">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Next of KIN Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="next_of_kin_name" value="{{ $member->next_of_kin_name }}" required="required" class="form-control col-md-7 col-xs-12">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        @if ($errors->has('next_of_kin_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('next_of_kin_name') }}</strong>
                            </span>
                        @endif
                      </div> 

                      <div class="form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Next of KIN Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" value="{{ $member->next_of_kin_email }}" name="next_of_kin_email" required="required" class="form-control col-md-7 col-xs-12">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        @if ($errors->has('next_of_kin_email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('next_of_kin_email') }}</strong>
                            </span>
                        @endif
                      </div> 

                       <div class="form-group {{ $errors->has('next_of_kin_number') ? ' has-error' : '' }} has-feedback">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Next of KIN Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" value="{{ $member->next_of_kin_number }}" name="next_of_kin_number" required="required" class="form-control col-md-7 col-xs-12">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        @if ($errors->has('next_of_kin_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('next_of_kin_number') }}</strong>
                            </span>
                        @endif
                      </div>  

                      <div class="form-group {{ $errors->has('next_of_kin_address') ? ' has-error' : '' }} has-feedback">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Next of KIN Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control col-md-7 col-xs-12" name="next_of_kin_address">{{ $member->next_of_kin_address }}</textarea>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        @if ($errors->has('next_of_kin_address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('next_of_kin_address') }}</strong>
                            </span>
                        @endif
                      </div> 

                     


                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <!-- <button type="submit" class="btn btn-primary">Cancel</button> -->
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
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