<nav class="navbar header-top fixed-top navbar-expand-lg custom-navbar">
    <span class="navbar-toggler-icon leftmenutrigger"></span>
    <a class="navbar-brand" href="#">LINKIFY</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav animate side-nav custom-sidebar">
            
            @if(auth()->check() && auth()->user()->role == 'admin')
            <li class="nav-item">
                <a class="nav-link" href="{{route('users.index')}}" title="Users"><i class="fas fa-users"></i> Users <i
                        class="fas fa-users shortmenu animate"></i></a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{route('categories.index')}}" title="Cart"><i class="fas fa-tags"></i> Categories <i
                        class="fas fa-tags shortmenu animate"></i></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('links.index')}}" title="Links"><i class="fas fa-link"></i> Links <i
                        class="fas fa-link shortmenu animate"></i></a>
            </li>
            @endif
            
        </ul>
        <ul class="navbar-nav ml-md-auto d-md-flex">
            <li class="nav-item d-flex align-items-center">
                @if(auth()->check())
                <span class="text-white mr-3">Namaste , <b>{{auth()->user()->name}}</b></span>
                @endif
            
                <div class="dropdown">
                    <a class="dropdown-toggle user-dropdown d-flex align-items-center" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(auth()->user()->profile_image)
                        <div class="profile-image mr-2">
                            <img src="{{asset(auth()->user()->profile_image)}}" alt="" width="40px">
                        </div>
                        @else
                        <i class="fas fa-user mr-2"></i>
                        @endif
                        <span class="text-white">User</span>
                    </a>
                    <div class="dropdown-menu custom-dropdown" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{route('profile.edit')}}">
                            <i class="fas fa-user-circle"></i> Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>

<style>
    .custom-navbar {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    /* Specific sidebar styling - targeting all possible selectors */
    .side-nav,
    .animate.side-nav,
    .navbar-nav.animate.side-nav,
    .custom-sidebar,
    .navbar .side-nav,
    .navbar-nav.side-nav {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    }
    
    /* Ensure the sidebar keeps the gradient when expanded */
    body .side-nav {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    }
    
    /* If the sidebar has a before/after pseudo-element that might be overriding the background */
    .side-nav:before,
    .side-nav:after {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    }
    
    .profile-image {
        display: inline-block;
        width: 40px;
        background-color: #f0f0f0;
        height: 40px;
        overflow: hidden;
        border-radius: 50%;
    }

    .profile-image img {
        border-radius: 50%;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .user-dropdown {
        color: white;
        text-decoration: none;
    }
    
    .user-dropdown:hover {
        color: #f0f0f0;
        text-decoration: none;
    }
    
    .custom-dropdown {
        background-color: #4a4a4a;
        border: none;
        border-radius: 0;
        padding: 0;
        margin-top: 0;
    }
    
    .custom-dropdown .dropdown-item {
        color: #fff;
        padding: 12px 20px;
    }
    
    .custom-dropdown .dropdown-item:hover,
    .custom-dropdown .dropdown-item:focus {
        background-color: #555;
        color: white;
    }
    
    .custom-dropdown .dropdown-divider {
        border-top: 1px solid #555;
        margin: 0;
    }
    
    .custom-dropdown .dropdown-item i {
        margin-right: 10px;
        width: 20px;
        text-align: center;
    }
    
    .custom-dropdown button.dropdown-item {
        width: 100%;
        text-align: left;
        background: none;
        border: none;
    }
    
    .dropdown-toggle::after {
        vertical-align: middle;
    }
    
    /* Ensure text is readable on the gradient background */
    .navbar-brand, .nav-link, .text-white {
        color: white !important;
    }
    
    .nav-link:hover {
        color: rgba(255, 255, 255, 0.8) !important;
    }
</style>