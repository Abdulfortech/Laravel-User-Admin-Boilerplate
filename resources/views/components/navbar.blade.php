  <!-- Navbar -->
    <!-- header -->
    <header class="header trans_300">
        <!-- Main Navigation -->
        <div class="main_nav_container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <div class="logo_container">
                            <a href="https://onestopshop.ng" class="font-weight-bolder text-primary">OneStop Shop</a>
                        </div>
                        <nav class="navbar">
                            <ul class="navbar_menu">
                                <li><a href="{{route('index')}}" class="h6">home</a></li>
                                <li><a href="{{route('latest')}}" class="h6">Latest</a></li>
                                {{-- <li><a href="{{route('featured')}}" class="h6">Featured</a></li> --}}
                                <li><a href="{{route('category',['Watches'])}}" class="h6">Watches</a></li>
                                <li><a href="{{route('category',['Jewellery'])}}" class="h6">Jewellery</a></li>
                                <li><a href="{{route('category',['Bags'])}}" class="h6">Bags</a></li>
                                <li><a href="{{route('contact')}}" class="h6">Contact Us</a></li>
                            </ul>
                            <ul class="navbar_user">
                                <li><a type="button" id="searchIcon"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
                                    <div class="dropdown-menu text-center">
                                        <center>
                                            @auth
                                                <a href="#" class="dropdown-item bg-primary text-white text-light"><i class="fa fa-user"></i> {{auth()->user()->firstName}}</a>
                                                <a href="{{route('user.account')}}" class="dropdown-item btn">My Account</a>
                                                <a href="{{route('auth.signout')}}" class="dropdown-item btn">Sign Out</a>
                                            @else
                                                <a href="{{route('auth.login')}}" class="dropdown-item btn btn-block">Sign In</a>
                                                <a href="{{route('auth.register')}}" class="dropdown-item btn btn-block">Sign Up</a>
                                            @endauth
                                        </center>
                                    </div>
                                </li>
                            </ul>
                            <div class="hamburger_container">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </div>
                            <div class="search-form">
                                <form action="{{ route('search')}}" method="post">
                                    @csrf
                                    <input type="search" name="term" id="search" placeholder="Type keywords &amp; press enter...">
                                    <button type="submit" class="d-none"></button>
                                </form>
                                <!-- Close Icon -->
                                <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- mobile view of menu -->
    <div class="fs_menu_overlay"></div>
    <div class="hamburger_menu">
        <div class="p-4 d-flex justify-content-between">
            <h3>OneStop</h3>
            <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
        </div>
        <div class="hamburger_menu_content text-left">
            <ul class="menu_top_nav">
                <li class="menu_item"><a href="{{route('index')}}"><b>home</b></a></li>
                <li class="menu_item"><a href="{{route('latest')}}">Latest</a></li>
                {{-- <li class="menu_item"><a href="{{route('featured')}}">Featured</a></li> --}}
                <li class="menu_item"><a href="{{route('category', ['Watches'])}}">Watches</a></li>
                <li class="menu_item"><a href="{{route('category', ['Jewellery'])}}">Jewellery</a></li>
                <li class="menu_item"><a href="{{route('category', ['Bags'])}}">Bags</a></li>
                <li class="menu_item"><a href="{{route('contact')}}">Contact Us</a></li>
                @auth
                <li class="menu_item"><a href="{{route('user.account')}}">My Account</a></li>
                @endauth
            </ul>
            <div>
                <center>
                    @auth
                        <a href="{{route('auth.signout')}}" class="btn btn-primary">Sign Out</a>
                    @else
                        <a href="{{route('auth.login')}}" class="btn btn-primary">Sign In</a>
                        <a href="{{route('auth.register')}}" class="btn btn-primary">Sign Up</a>
                    @endauth
                </center>
            </div>
        </div>
    </div>
    <!-- End Navbar -->