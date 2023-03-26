<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" type="text/css" href="{{asset('css/sidebar.css')}}">
<nav class="sidebar close">
        <header>
        <div class="image-text">
     <span class="image">
        <img src="/../images/MTICS3.gif">
    </span>
    
    <div class="text logo-text">
        <span class="name">MTICS</span>
        <span class="profession">TUP-T</span>
    </div>
</div>

<i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links">

                    <li class="nav-link">
                        <a href="{{url('/')}}">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Home</span>
                        </a>
                    </li>

                    <ul class="menu-links">
                    <li class="nav-link">
                        <a href="{{route('students.service')}}">
                            <i class='bx bx-abacus icon'></i>
                            <span class="text nav-text">Services</span>
                        </a>
                    </li>

                    @if (Auth::check())

                    <li class="nav-link">
                        <a href="{{route('student.profile')}}">
                            <i class='bx bx-user icon'></i>

                            <span class="text nav-text">Student Profile</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{route('getPassword')}}">
                            <i class='bx bxs-cog icon' ></i>
                            <span class="text nav-text">Setting</span>
                        </a>
                    </li>

                    <li class="nav-link">
                    <a href="{{ route('shop.index') }}">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Shop</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{route('events.index')}}">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Events</span>
                        </a>
                    </li> 
                    
                    @else

                    @endif
       
                </ul>
            </div>

            <div class="bottom-content">
            @if (Auth::check())
                <li class="">
                    <a href="{{route('user.logout')}}">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            @else
                <li class="">
                    <a href="{{route('user.signin')}}">
                    <i class='bx bx-log-in icon'></i>
                        <span class="text nav-text">Sign In</span>
                    </a>
                </li>
                <li class=""> 
                    <a href="{{route('student.signup')}}">
                    <i class='bx bx-log-in-circle icon'></i>
                        <span class="text nav-text">Register</span>
                    </a>
                </li>
                @endif

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>

    <script>

      const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";
        
    }
});
</script>

