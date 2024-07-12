<header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo"><b>DIT</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- Notifications: style can be found in dropdown.less -->
             
              <!-- Tasks: style can be found in dropdown.less -->
             
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="admin/dist/img/dit_logo.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">Administrator</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="admin/dist/img/dit_logo.png" class="" alt="User Image" />
                    <p>
                     Department of Information Technology
                      <small></small>
                    </p>
                  </li>
                  <!-- Menu Body -->

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                    <x-responsive-nav-link :href="route('profile.edit')" class="btn btn-default btn-flat">
                        {{ __('Profile') }}
                        </x-responsive-nav-link>
                    </div>
                    <div class="pull-right">
                        <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();"  class="btn btn-default btn-flat">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                        </form>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>