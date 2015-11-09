<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!-- <li class="header">{{ _('HEADER') }}</li> -->
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>{{ _('Dashboard') }}</span></a></li>
            <li><a href="#"><i class='fa fa-sticky-note-o'></i> <span>{{ _('Create New Page') }}</span></a></li>
            <li><a href="/{{ Auth::user()->id }}/imagegallery"><i class='fa fa-picture-o'></i> <span>{{ _('Image Gallery') }}</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-user'></i> <span>{{ _('My Account') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">{{ _('Account Settings') }}</a></li>
                    <li><a href="#">{{ _('Billing & Plan Settings') }}</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
