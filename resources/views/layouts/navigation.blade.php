<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">Welcome {{ Auth::User()->name }}</strong>
                            </span>
                            <!-- <span class="text-muted text-xs block">Example menu <b class="caret"></b></span> -->
                        </span>
                    </a>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="{{ isActiveRoute('main') }}">
                <a href="{{ url('/') }}"><i class="fa fa-th-large"></i>
                    <span class="nav-label">Location-Based Condition Prediction</span></a>
            </li>
            <li class="{{ isActiveRoute('minor') }}">
                <a href="{{ url('/minor') }}"><i class="fa fa-th-large"></i>
                    <span class="nav-label">Aduino Board Modules</span> </a>
            </li>
            <li>
                <a href="#"><i class="fa fa-th-large"></i>
                    <span class="nav-label">Fine Dust (API)</span> </a>
            </li>
            <li>
                <a href="#"><i class="fa fa-th-large"></i>
                    <span class="nav-label">Mobile-Aduino Communication</span> </a>
            </li>
            <li>
                <a href="#"><i class="fa fa-th-large"></i>
                    <span class="nav-label">Location-Based Facility Data</span> </a>
            </li>
            <li>
                <a href="#"><i class="fa fa-th-large"></i>
                    <span class="nav-label">Cultural Properties facility like museum</span> </a>
            </li>
            <li>
                <a href="healthfacilities"><i class="fa fa-th-large"></i>
                    <span class="nav-label"> Health facility for chronic disease</span> </a>
            </li>
            <li>
                <a href="#"><i class="fa fa-th-large"></i>
                    <span class="nav-label"> Security/Safety facility</span> </a>
            </li>
            <li>
                <a href="#"><i class="fa fa-th-large"></i>
                    <span class="nav-label"> Location-Based Social News</span> </a>
            </li>
            <li>
                <a href="#"><i class="fa fa-th-large"></i>
                    <span class="nav-label"> SNS keyword based crawling</span> </a>
            </li>
            <li>
                <a href="#"><i class="fa fa-th-large"></i>
                    <span class="nav-label"> Social Data Analysis  </span> </a>
            </li>
        </ul>

    </div>
</nav>
