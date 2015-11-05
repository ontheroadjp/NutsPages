<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!-- <li class="header"><?php echo e(_('HEADER')); ?></li> -->
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="<?php echo e(url('home')); ?>"><i class='fa fa-home'></i> <span><?php echo e(_('Home')); ?></span></a></li>
            <li><a href="#"><i class='fa fa-sticky-note-o'></i> <span><?php echo e(_('Create New Page')); ?></span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span><?php echo e(_('Help')); ?></span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#"><?php echo e(_('Sample Link 01')); ?></a></li>
                    <li><a href="#"><?php echo e(_('Sample Link 02')); ?></a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
