<?php
    $rooturl = Request::root() . "/";
    $currenturl = Request::url();
    $page = str_replace($rooturl, '', $currenturl); 
    info($page);

    $params = [
        ['url' => 'dashboard', 'icon' => 'home', 'label'=> _('Dashboard')],
        ['url' => '#', 'icon' => 'sticky-note-o', 'label'=> _('Create New Page')],
        ['url' => 'imagegallery', 'icon' => 'picture-o', 'label'=> _('Image Gallery')],
        ['url' => 'whois/search', 'icon' => 'search', 'label'=> _('Domain Search')],
        ['url' => 'profile', 'icon' => 'user', 'label'=> _('Account Settings')],
    ]


?>



<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            @foreach( $params as $val )
                <li class="main-menu-item {{ $val['url'] === $page ? "active" : "" }}"><a href="{{ url($val['url']) }}"><i class="fa fa-{{ $val['icon'] }}"></i> <span>{{ $val['label'] }}</span></a></li>
            @endforeach

            <!-- <li class="header">{{ _('HEADER') }}</li> -->
            <!-- Optionally, you can add icons to the links -->
<!--             <li class="main-menu-item active"><a href="{{ url('/dashboard') }}"><i class='fa fa-home'></i> <span>{{ _('Dashboard') }}</span></a></li>
            <li class="main-menu-item"><a href="#"><i class='fa fa-sticky-note-o'></i> <span>{{ _('Create New Page') }}</span></a></li>
            <li class="main-menu-item"><a href="{{ url('/imagegallery') }}"><i class='fa fa-picture-o'></i> <span>{{ _('Image Gallery') }}</span></a></li>
            <li class="main-menu-item"><a href="{{ url('/whois/search') }}"><i class='fa fa-search'></i> <span>{{ _('Domain Search') }}</span></a></li>
            <li class="main-menu-item"><a href="{{ url('/profile') }}"><i class='fa fa-user'></i> <span>{{ _('Account Settings') }}</span></a></li>
 -->
<!--             <li class="treeview">
                <a href="#"><i class='fa fa-user'></i> <span>{{ _('My Account') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">{{ _('Account Settings') }}</a></li>
                    <li><a href="#">{{ _('Billing & Plan Settings') }}</a></li>
                </ul>
            </li>
 -->
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>


