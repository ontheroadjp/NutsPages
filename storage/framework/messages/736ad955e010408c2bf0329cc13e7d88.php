<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!-- <li class="header"><?php echo e(_('HEADER')); ?></li> -->
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="<?php echo e(url('dashboard')); ?>"><i class='fa fa-home'></i> <span><?php echo e(_('Dashboard')); ?></span></a></li>
            <li><a href="#"><i class='fa fa-sticky-note-o'></i> <span><?php echo e(_('Create New Page')); ?></span></a></li>
            <li><a href="/imagegallery"><i class='fa fa-picture-o'></i> <span><?php echo e(_('Image Gallery')); ?></span></a></li>
            <li><a href="/whois/search"><i class='fa fa-search'></i> <span><?php echo e(_('Domain Search')); ?></span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-user'></i> <span><?php echo e(_('My Account')); ?></span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#"><?php echo e(_('Account Settings')); ?></a></li>
                    <li><a href="#"><?php echo e(_('Billing & Plan Settings')); ?></a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
