<nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark bg-dark">
            <span class="navbar-toggler-icon leftmenutrigger"></span>
            <a class="navbar-brand" href="#">LINKIFY</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav animate side-nav">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('categories.index')}}" title="Cart"><i class="fas fa-tags"></i> Categories <i
                                class="fas fa-tags shortmenu animate"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('links.index')}}" title="Links"><i class="fas fa-link"></i> Links <i
                                class="fas fa-link shortmenu animate"></i></a>
                    </li>
                    
                </ul>
                <ul class="navbar-nav ml-md-auto d-md-flex">
                <li class="nav-item">
                        @if(auth()->check())
                        <span class="text-white text-2xl mt-2">Namaste , <b> {{auth()->user()->name}}</b></span>
                        @endif
                </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('profile.edit')}}"><i class="fas fa-user"></i> Profile</a>
                    </li>
                    <li class="nav-item">
                        <!-- <a class="nav-link" href="#"><i class="fas fa-key"></i> Logout</a>
                         -->
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link"><i class="fas fa-key"></i> Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>