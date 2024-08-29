<nav id="sidebar"
    class="bg-app w3-sidebar w3-top w3-bottom w3-collapse w3-text-white w3-border-right w3-border-top scrollbar"
    style="z-index:3;width:230px;height:auto;margin-top:54px;border-color:rgba(0, 0, 0, .1)!important" id="mySidebar">
    <div class="w3-bar-item w3-border-bottom w3-hide-large" style="padding:6px 0">
        <label for="sidebar-control" class="w3-left w3-button w3-large w3-opacity-min"
            style="background:#5216ac!important"><i class="fa fa-bars"></i></label>
        <h5 class="" style="line-height:1; margin:0!important; font-weight:300">
            <a href="#" class="w3-button" style="background:#5216ac!important">
                <img src="{{ asset('image/hakateq.png') }}" alt="w3mix" class="w3-image"> &nbsp; Hakateq Solutions
            </a>
        </h5>
    </div>

    <div class="w3-bar-block">
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}" class="w3-bar-item w3-button w3-padding-large w3-hover-text-primary">
            <i class="fa fa-fw fa-bar-chart"></i>&nbsp; Dashboard </a>

        @if (Auth::user()->user_type == 'admin')
            <!-- Team Management -->
            <a href="{{ route('team') }}" class="w3-bar-item w3-button w3-padding-large w3-hover-text-primary">
                <i class="fa fa-fw fa-users"></i>
                &nbsp;<span>Team</span>

            </a>
        @endif


        <!-- services Management -->
        <a href="{{route('services.index')}}"
            class="w3-bar-item w3-button w3-padding-large w3-hover-text-primary">
            <i class="fa fa-fw fa-tasks"></i>
            &nbsp;<span>Services</span>

        </a>

        <!-- Blogs Management -->
        <a href="{{route('blogs.index')}}"
            class=" w3-bar-item w3-button w3-padding-large w3-hover-text-primary">
            <i class="fa fa-fw fa-book"></i>
            &nbsp;<span>Blogs</span>

        </a>

        <!-- contact Management -->
        <a  href="{{route('contacts')}}"
            class=" w3-bar-item w3-button w3-padding-large w3-hover-text-primary">
            <i class="fa fa-fw fa-phone"></i>
            &nbsp;<span>Contacts</span>

        </a>


        <!-- Settings -->
        <a id="dropdownBtn7" href="javascript:void(0);"
            class="dropdown-btn w3-bar-item w3-button w3-padding-large w3-hover-text-primary">
            <i class="fa fa-cog"></i> &nbsp;<span>Settings</span>
            <span class="menu-arrow"><i id="arrowIcon7" class="fa fa-chevron-right" style="font-size: 10px;"></i></span>
        </a>
        <div id="dropdownContainer7" class="dropdown-container">
            <ul>
                <a href="{{route('profile')}}" class="nav-link w3-bar-item w3-button w3-hover-text-primary">Profile Settings</a>
                <a href="{{route('password.change')}}" class="nav-link w3-bar-item w3-button w3-hover-text-primary">Change Password</a>

            </ul>
        </div>
    </div>
</nav>
