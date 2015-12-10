

<?php
    $resources = [
        "CREATED_USER_ACCOUNT" => [
            "icon" => "fa-user",
            "icon_color" => "nuts-bg-aqua",
            "message" => _('Welcome to the Nuts Pages !!'),
        ],
        "SIGNED_IN" => [
            "icon" => "",
            "icon_color" => "",
            "message" => _('Signed in.'),
        ],
        "UPDATED_USER_NAME" => [
            "icon" => "fa-user",
            "icon_color" => "nuts-bg-warning",
            "message" => _('Updated user name.'),
        ],
        "UPDATED_EMAIL_ADDRESS" => [
            "icon" => "fa-user",
            "icon_color" => "nuts-bg-warning",
            "message" => _('Updated e-mail address.'),
        ],
        "CHANGE_PASSWORD" => [
            "icon" => "fa-user",
            "icon_color" => "nuts-bg-warning",
            "message" => _('Change password.'),
        ],
        "CREATED_USER_SITE" => [
            "icon" => "fa-pencil-square-o",
            "icon_color" => "nuts-bg-success",
            "message" => _('Created new site.'),
        ]
    ];
?>

<div class="box box-primary no-box-shadow">
<div class="box-header">
	<h3 class="box-title"><i class="fa fa-history"></i><?php echo e(_('Action History')); ?></h3>
</div>

<div class="timeline">
    <div class="tl-header now nuts-bg-indigo nuts-text-white"><?php echo e(_('Now')); ?></div>
    
    <?php for( $n=0; $n<count($history); $n++ ): ?>
        <?php $val = $history[$n]->message; ?>
        <div class="tl-entry">
            <div class="tl-time"><?php echo e($history[$n]->created_at); ?></div>
            <?php if($resources[$val]['icon'] !== ""): ?>
                <div class="tl-icon <?php echo e($resources[$val]['icon_color']); ?> nuts-text-white">
                    <i class="fa <?php echo e($resources[$val]['icon']); ?>"></i>
                </div>
            <?php endif; ?>
            <div class="panel tl-body"><?php echo e($resources[$val]['message']); ?></div>
        </div>
    <?php endfor; ?>

</div><!-- / .timeline -->
</div><!-- / .box -->
