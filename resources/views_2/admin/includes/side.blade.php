 
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <!--<h3>MENU</h3>-->
                <ul class="nav side-menu">
                  <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                </ul>
              </div>
              
              <div class="menu_section">
                <h3>MODULES</h3>
                <ul class="nav side-menu">
                  <!--<li><a><i class="fa fa-sitemap"></i> Manage Cooperatives<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/cooperatives') }}"><i class="fa fa-building"></i> View Cooperatives </a>
                      </li>
                      <li><a href="{{ url('/cooperative/create') }}"><i class="fa fa-sitemap"></i> Add New Cooperative </a></li>
                    </ul>
                  </li>-->

                  @if (Auth::check())
                    @if (Auth::user()->privilege_id > 1)
                      <li>
                        <a><i class="fa fa-steam-square"></i> Member Management <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="{{ url('/members') }}"><i class="fa fa-users"></i> View all members </a>
                          </li>
                            @if (Auth::user()->privilege_id > 4)
                                <li><a href="{{ url('/member/create') }}"><i class="fa fa-user"></i> Add new member </a></li>
                            @endif
                        </ul>
                      </li> 

                    <li>
                       <a><i class="fa fa-steam-square"></i> Loan Management <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="{{ url('/loans/approve') }}"><i class="fa fa-building"></i> Approve Loans </a>
                        <li><a href="{{ url('/loans/treated') }}"><i class="fa fa-building"></i> My approved loans </a>
                        </li>
                      
                      </ul>
                    </li> 

                    @endif

                   

                    <li><a><i class="fa fa-steam-square"></i> My contributions <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="{{ url('/user/payments') }}"><i class="fa fa-building"></i> View Payments </a>
                        </li>
                      
                      </ul>
                    </li> 

                    <li><a><i class="fa fa-steam-square"></i> My Loans <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="{{ url('user/loans') }}"><i class="fa fa-building"></i> View Loans </a>
                        <li><a href="{{ url('user/loan') }}"><i class="fa fa-building"></i> Apply for a Loan </a>
                        </li>
                      
                      </ul>
                    </li>

                    <!--<li><a><i class="fa fa-steam-square"></i> Stakeholders <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="local-governments.html"><i class="fa fa-building"></i> Local Governments </a>
                        </li>
                        <li><a href="cooperatives.html"><i class="fa fa-sitemap"></i> Cooperatives </a></li>
                        <li><a href="members.html"><i class="fa fa-users"></i> Members </a></li>
                      </ul>
                    </li>-->

                    <!--<li><a><i class="fa fa-calculator"></i> Premium Calculator <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="premiums/cooperatives.html"><i class="fa fa-sitemap"></i> Cooperatives </a></li>
                      </ul>
                    </li>

                    <li><a><i class="fa fa-users"></i> User Management <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="{{ url('/users') }}"><i class="fa fa-users"></i> All Users </a></li>
                        <li><a href="{{ url('/user/create') }}"><i class="fa fa-user"></i> Add New User </a></li>
                      </ul>
                    </li>-->

                    <li><a><i class="fa fa-cog"></i> Settings <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                      <?php $user_id = Auth::user()->user_id; ?>
                        <li><a href="{{url("/member/$user_id")}}">Profile</a></li>
                        <li><a href="{{url("/user/changepassword")}}">Change Password</a></li>
                        <!--<li><a href="profile/edit.html"> Edit Profile</a></li>-->
                      </ul>
                    </li>

                  @endif
                </ul>
              </div>

            </div>
            