<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">Frest</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="far fa-dot-circle d-block  font-medium-4 primary"> </i><i
                        class="toggle-icon far fa-dot-circle  font-medium-4 d-none primary"></i></a>
            </li>

        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation"
            data-icon-style="lines">
            <li class=" navigation-header"><span>CORE</span>
            </li>
        <li class=" @if (Route::getCurrentRoute()->uri() == "/") active @endif nav-item"><a href="{{URL('/')}}"><i
                        class="bx bx-desktop"></i><span class="menu-title"
                        data-i18n="Dashboard">Dashboard</span></a>
            </li>

            <li class=" nav-item"><a href="javascript:void(0)"><i
                        class="far fa-building"></i><span class="menu-title"
                        data-i18n="Dashboard">Home/Apertment</span></a>
                <ul class="menu-content">
                    <li class=" @if (Route::getCurrentRoute()->uri() == "apertments"||Route::getCurrentRoute()->uri() == "apertment/details/{id}") active @endif "><a href="
                        {{URL('apertments')}}"><i class="fas fa-arrow-right"></i><span class="menu-item"
                            data-i18n="eCommerce">Apertments</span></a>
                    </li>
                <li class="@if (Route::getCurrentRoute()->uri() == "apertment/rents") active @endif"><a href="{{URL('apertment/rents')}}"><i class="fas fa-arrow-right"></i><span class="menu-item"
                                data-i18n="Analytics">Rents</span></a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>

</div>
