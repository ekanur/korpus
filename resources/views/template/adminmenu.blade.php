<ul class="navbar-nav align-items-center  ml-md-auto">
                        <li class="nav-item dropdown">
                            <!-- <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
                <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">Administrator</span>
                </div>
            </div>
        </a> -->
                            <button type="button" class="btn-icon-clipboard" data-toggle="dropdown" title="" data-original-title="Hello, Administrator" style="padding:.5rem">
            <div>
                <i class="ni ni-single-02"></i>
                <span>
                    {{strtoupper(Auth::user()->role)}}
                </span>
            </div>
          </button>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0"></h6>
                                </div>
                                <a href="{{route(Auth::user()->role)}}" class="dropdown-item">
                                    <i class="ni ni-app"></i>
                                    <span>Dashboard</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>Profile</span>
                                </a>
                                <!-- <a href="#!" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
            </a>
            <a href="#!" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
            </a> -->
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-support-16"></i>
                                    <span>Support</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </div>
                        </li>
                    </ul>
