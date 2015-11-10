<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>L</b>vL</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">Nuts Pages <span class="nuts-badge-white">Free</span>
</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
  
  <style>
  /* ---------------------------------------------------------------------- */
/* Global Styles
/* ---------------------------------------------------------------------- */
.nuts-language-switcher {
    font: 14px/1.5em "Helvetica Neue", Helvetica, Arial, sans-serif !important; /* edit or delete so that the switcher inherits the font styles of your project */
    z-index: 999 !important;
}

.nuts-language-switcher,
.nuts-language-switcher * {
    margin: 0 !important;
    padding: 0 !important;
}

.nuts-language-switcher {
    position: relative !important;
}

.nuts-language-switcher ul {
    list-style: none !important;
}

.nuts-language-switcher a {
    transition: all 0.2s ease-in-out !important;
}

.nuts-language-switcher img {
    margin-right: 3px !important;
}
</style>


            <ul class="nav navbar-nav">

      @foreach(Config::get('laravel-gettext.supported-locales') as $locale)
            <li><a href="/lang/{{$locale}}">{{$locale}}</a></li>
      @endforeach



                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <!-- <img src="/img/adminlte/user2-160x160.jpg" class="user-image" alt="User Image"/> -->
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs"><i class="fa fa-user"></i> {{ _('こんにちは、') }}{{ Auth::user()->name }} {{ _('さん') }}</span>
                    </a>
                    <ul class="dropdown-menu">

                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <!-- <img src="/img/adminlte/user2-160x160.jpg" class="img-circle" alt="User Image" /> -->
                            <p>
                                {{ Auth::user()->name }}
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
<!--                         <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">{{ _('Followers') }}</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">{{ _('Sales') }}</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">{{ _('Friends') }}</a>
                            </div>
                        </li>
 -->                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="/profile" class="btn btn-default btn-flat">{{ _('Profile') }}</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/auth/logout') }}" class="btn btn-default btn-flat">{{ _('Sign out') }}</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>