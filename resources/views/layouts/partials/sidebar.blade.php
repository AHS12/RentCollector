<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark sidenav-active-rounded">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="index.html"><img class="hide-on-med-and-down "
                    src="{{asset('app-assets/images/logo/materialize-logo.png')}}" alt="materialize logo" /><img
                    class="show-on-medium-and-down hide-on-med-and-up"
                    src="{{asset('app-assets/images/logo/materialize-logo-color.png')}}" alt="materialize logo" /><span
                    class="logo-text hide-on-med-and-down">Materialize</span></a><a class="navbar-toggler" href="#"><i
                    class="material-icons">radio_button_checked</i></a></h1>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out"
        data-menu="menu-navigation" data-collapsible="accordion">
        <li class="navigation-header"><a class="navigation-header-text">Core</a><i
                class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        {{-- home/apertments --}}
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i
                    class="material-icons">apartment</i>
                <span class="menu-title" data-i18n="Dashboard">Home/Apertments</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                <li><a href="{{url('apertments')}}"><i class="material-icons">radio_button_unchecked</i><span
                                data-i18n="Modern">Apertments</span></a>
                    </li>
                    <li><a href="dashboard-ecommerce.html"><i class="material-icons">radio_button_unchecked</i><span
                                data-i18n="eCommerce">Collect Rent</span></a>
                    </li>

                </ul>
            </div>
        </li>
        {{-- Shops --}}
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i
                    class="material-icons">storefront</i><span class="menu-title" data-i18n="Templates">Shops</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a href="dashboard-modern.html"><i class="material-icons">radio_button_unchecked</i><span
                                data-i18n="Modern">Shops</span></a>
                    </li>
                    <li><a href="dashboard-ecommerce.html"><i class="material-icons">radio_button_unchecked</i><span
                                data-i18n="eCommerce">Collect Rent</span></a>
                    </li>


                </ul>
            </div>
        </li>
        <li class="navigation-header"><a class="navigation-header-text">Reports</a><i
                class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        <li class="bold"><a class="waves-effect waves-cyan " href="app-email.html"><i
                    class="material-icons">local_atm</i><span class="menu-title" data-i18n="Mail">Rent Report</span></a>
        </li>
        <li class="navigation-header"><a class="navigation-header-text">Invoice</a><i
                class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        <li class="bold"><a class="waves-effect waves-cyan " href="app-email.html"><i
                    class="material-icons">receipt</i><span class="menu-title" data-i18n="Mail">Inoice</span></a>
        </li>

    </ul>
    <div class="navigation-background"></div><a
        class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only"
        href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>
