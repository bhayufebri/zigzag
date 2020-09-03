<nav class="navbar navbar-expand-lg bg-white justify-content-between" id="navbar">
        <div class="left-side mb-3 mb-md-0">
            <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target=".nav-sidebar"><i class="burger-menu"></i></button>
            <a class="navbar-brand text-accent font-weight-bold" href="#">
                <img src="{{ asset('assets/images/logo.png') }}" alt="" height="40" class="my-n5 mr-3">
                CMS
            </a>
        </div>
        <div class="right-side d-flex">
          

            <div class="dropdown">
                <button class="btn btn-link text-dark d-flex" type="button" data-toggle="dropdown">
                    <img src="{{ asset('assets/images/background/default-avatar.png') }}" alt="" width="30" height="30" class="radius-circle object-fit-cover my-n2 mr-3">
                    
                    <!-- <i class="feather-user-check mr-3" style="width: 15px; height: 15px"></i> -->
                    <div class="name my-n2 text-left">
                        <div><strong>{{auth()->user()->first_name}}</strong></div>
                        <div class="text-muted mt-n2"><small>Admin</small></div>
                    </div>
                    <i class="fa fa-angle-down ml-3"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow-lg-light" aria-labelledby="dropdownMenuButton">
                    <!-- <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Message</a>
                    <a class="dropdown-item" href="#">Setting</a> -->
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Keluar</a>
                    
				<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;"> 
					{{ csrf_field() }}
				</form>
                </div>
            </div>
            
        </div>
    </nav>







