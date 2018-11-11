  <div class="top_nav">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ url('/images/user.png')}}" alt="">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }} [ {{ Auth::user()->privilege->privilege_name }} ]
                    <span class="fa fa-angle-down"></span>
                    <!-- <span class=" fa fa-angle-down">{{ Auth::user()->privilege->privilege_name }}</span> -->
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                   <?php $user_id = Auth::user()->user_id; ?>
                    <li><a href="{{url("/member/$user_id")}}">Profile</a></li>
                    <!--<li>
                      <a href="javascript:;"><i class="fa fa-cog pull-right"></i>
                        <!--<span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>-->
                    <!--<li><a href="javascript:;">Help</a></li>-->
                    <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                 <!-- Start Notifications Section -->
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-blue">{{ count($toploans) }}</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  @foreach ($toploans as $toploan)
                    <li>
                      <a href="{{ url('/loans/approve') }}">
                        <!-- <span class="image"><img src="{{ url('/images/user.png')}}" alt="Profile Image" /></span> -->
                        <span>
                          <span>{{ $toploan->loan->user->firstname }} {{ $toploan->loan->user->lastname }}</span><br>
                          <span class="time">{{ date('F jS, Y', strtotime($toploan->loan->created_at)) }}</span><br>
                        </span>
                        <span class="message">
                          Loan Request
                        </span>
                      </a>
                    </li>
                  @endforeach
                      <div class="text-center">
                        <a href="{{ url('/loans/approve') }}">
                          <strong>See All Notifications</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
                <!-- End Notifications Section -->

              </ul>
            </nav>
          </div>
        </div>