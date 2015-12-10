<?php
    $rooturl = Request::root() . "/";
    $currenturl = Request::url();
    $current_page = str_replace($rooturl, '', $currenturl); 

    $menus = [
        ['url' => 'dashboard', 'icon' => 'home', 'label'=> _('Dashboard')],
        ['url' => 'imagegallery', 'icon' => 'picture-o', 'label'=> _('Image Gallery')],
        ['url' => 'whois/search', 'icon' => 'search', 'label'=> _('Domain Search')],
        ['url' => 'profile', 'icon' => 'user', 'label'=> _('Account Settings')],
    ]
?>

<aside class="main-sidebar">

    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <?php foreach( $menus as $menu ): ?>
                <li class="main-menu-item <?php echo e($menu['url'] === $current_page ? "active" : ""); ?>"><a href="<?php echo e(url($menu['url'])); ?>"><i class="fa fa-<?php echo e($menu['icon']); ?>"></i> <span><?php echo e($menu['label']); ?></span></a></li>
            <?php endforeach; ?>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>


