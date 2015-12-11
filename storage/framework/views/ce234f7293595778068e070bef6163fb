<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="<?php echo e(url('/home')); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>L</b>vL</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">Nuts Pages <span class="nuts-badge-aqua">Free</span>
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
            <ul class="nav navbar-nav">

                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <!-- <img src="/img/adminlte/user2-160x160.jpg" class="user-image" alt="User Image"/> -->
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs"><i class="fa fa-user"></i> <?php echo e(_('Hello, ')); ?><?php echo e(Auth::user()->name); ?> 
                        <?php if( LaravelGettext::getLocale() === 'ja_JP' ) echo _('さん') ?>&nbsp;&nbsp;<i class="fa fa-caret-down"></i></span>
                    </a>
                    <ul class="dropdown-menu">

                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <!-- <img src="/img/adminlte/user2-160x160.jpg" class="img-circle" alt="User Image" /> -->
                            <p>
                                <?php echo e(Auth::user()->name); ?>

                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
<!--                         <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#"><?php echo e(_('Followers')); ?></a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#"><?php echo e(_('Sales')); ?></a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#"><?php echo e(_('Friends')); ?></a>
                            </div>
                        </li>
 -->                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="/profile" class="btn btn-default btn-flat"><?php echo e(_('Profile')); ?></a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo e(url('/auth/logout')); ?>" class="btn btn-default btn-flat"><?php echo e(_('Sign out')); ?></a>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- Language Switcher Menu -->
                <li class="dropdown">
                    <?php $currentLocale = LaravelGettext::getLocale(); ?>
                            <?php if( $currentLocale === 'ja_JP' ) { $currentLabel = _('JP'); } ?>
                            <?php if( $currentLocale === 'en_US' ) { $currentLabel = _('EN'); } ?> 

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="/img/flags/<?php echo e($currentLocale); ?>.png" alt="<?php echo e($currentLabel); ?>-flag"/>
                        <?php echo e($currentLabel); ?>&nbsp;&nbsp;<i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                      <?php foreach(Config::get('laravel-gettext.supported-locales') as $locale): ?>
                            <?php if( $currentLocale === $locale) { continue; } ?>
                            <?php if( $locale === 'ja_JP' ) { $label = '日本語'; } ?>
                            <?php if( $locale === 'en_US' ) { $label = 'English'; } ?>

                            <li>
                                <a href="/lang/<?php echo e($locale); ?>">&nbsp;&nbsp;<img src="/img/flags/<?php echo e($locale); ?>.png" alt="<?php echo e($label); ?>-flag"/><?php echo e($label); ?></a>
                            </li>
                      <?php endforeach; ?>
                    </ul>
                </li>


            </ul>
        </div>
    </nav>
</header>
