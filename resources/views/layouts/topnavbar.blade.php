<div class="row border-bottom">
    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <button class=" minimalize-styl-2 btn btn-primary " id="search-updater"
            ><i class="fa fa-map-marker"></i> </button>
            <form role="search" class="navbar-form-custom" id="navbar-search-form" method="get" action="/">
                <div class="form-group">

                    <input type="text" placeholder="Where you are..."
                           class="form-control" name="top-search" id="top-search" />

                </div>
            </form>

        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <a href="{{ url('/logout') }}">
                    <i class="fa fa-sign-out"></i> Log out
                </a>
            </li>
        </ul>
    </nav>
</div>




