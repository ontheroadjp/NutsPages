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
            <?php foreach( $params as $val ): ?>
                <li class="main-menu-item <?php echo e($val['url'] === $page ? "active" : ""); ?>"><a href="<?php echo e(url($val['url'])); ?>"><i class="fa fa-<?php echo e($val['icon']); ?>"></i> <span><?php echo e($val['label']); ?></span></a></li>
            <?php endforeach; ?>

            <!-- <li class="header"><?php echo e(_('HEADER')); ?></li> -->
            <!-- Optionally, you can add icons to the links -->
<!--             <li class="main-menu-item active"><a href="<?php echo e(url('/dashboard')); ?>"><i class='fa fa-home'></i> <span><?php echo e(_('Dashboard')); ?></span></a></li>
            <li class="main-menu-item"><a href="#"><i class='fa fa-sticky-note-o'></i> <span><?php echo e(_('Create New Page')); ?></span></a></li>
            <li class="main-menu-item"><a href="<?php echo e(url('/imagegallery')); ?>"><i class='fa fa-picture-o'></i> <span><?php echo e(_('Image Gallery')); ?></span></a></li>
            <li class="main-menu-item"><a href="<?php echo e(url('/whois/search')); ?>"><i class='fa fa-search'></i> <span><?php echo e(_('Domain Search')); ?></span></a></li>
            <li class="main-menu-item"><a href="<?php echo e(url('/profile')); ?>"><i class='fa fa-user'></i> <span><?php echo e(_('Account Settings')); ?></span></a></li>
 -->
<!--             <li class="treeview">
                <a href="#"><i class='fa fa-user'></i> <span><?php echo e(_('My Account')); ?></span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#"><?php echo e(_('Account Settings')); ?></a></li>
                    <li><a href="#"><?php echo e(_('Billing & Plan Settings')); ?></a></li>
                </ul>
            </li>
 -->
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>


