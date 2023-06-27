<div class="dlabnav">
    <div class="dlabnav-scroll">
        <div class="dropdown header-profile2 ">
            <a class="nav-link " href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                <div class="header-info2 d-flex align-items-center">
                    <img src="{{ get_gravatar(Auth::user()->email) }}" alt="{{ Auth::user()->name }}" />
                    <div class="d-flex align-items-center sidebar-info">
                        <div>
                            <span class="font-w400 d-block">{{ Auth::user()->name }}</span>
                            <small class="text-end font-w400">{{ Auth::user()->role  }}</small>
                        </div>
                        <i class="fas fa-chevron-down"></i>
                    </div>

                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="{{ route('admin.profile.index') }}" class="dropdown-item ai-icon ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span class="ms-2">Profile </span>
                </a>
                <a href="{{ route('admin.logout') }}" class="dropdown-item ai-icon" onclick="event.preventDefault();document.getElementById('logout-form').submit();" >
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    <span class="ms-2">Logout </span>
                </a>
            </div>
        </div>
        
        <ul class="metismenu" id="menu">
             <li>
                <a href="{{ route('admin.home') }}" class="" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-picture-2"></i>
                    <span class="nav-text">Gallery</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.gallery.index') }}">Images</a></li>
                    <li><a href="{{ route('admin.video.index') }}">Video</a></li>
                    
                </ul>
            </li>
            
            
           
            

           
            
        </ul>
       
        
        <div class="copyright">
            <p><strong>Kemlu</strong> © {{ date('Y') }} All Rights Reserved</p>
            <p class="fs-12 d-none">Made with <span class="heart"></span> by <a href="https://rasalogi.com/" target="_blank">Rasalogi {{ date('Y') }}</a></p>
        </div>
    </div>
</div>
