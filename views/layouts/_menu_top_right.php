<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>

<ul class="nav navbar-top-controls navbar-right">

    <?php if (!Yii::$app->user->isGuest) : ?>

    <?php if (Yii::$app->getModule('email')) : ?>
    <li class="pull-left nav-item-unread-mails">
        <a href="<?= Url::toRoute('/email/email'); ?>" class="btn-unread-emails" title="<?php echo Yii::t('infoweb/email', 'Emails'); ?>">
            <i class="fa fa-envelope fa-fw"></i>&nbsp;
            <span class="label label-danger unread-emails<?php if (!Yii::$app->getModule('email')->getUnreadEmails()): ?> hidden<?php endif; ?>">
                <?php echo Yii::$app->getModule('email')->getUnreadEmails(); ?>
            </span>
        </a>
    </li>
    <?php endif; ?>

    <li class="dropdown pull-left">        
        <a href="#" id="dropdown-menu-user" class="dropdown-toggle user" data-toggle="dropdown">
            <img src="<?php echo (Yii::$app->user->identity->image) ? Yii::$app->user->identity->image->getUrl('60px') : $this->params['cmsAssets']->baseUrl . '/img/avatar.png'; ?>" alt="avatar" class="avatar img-circle">
            <?php if (!empty(Yii::$app->user->identity->profile->name)) : ?>
            <?php echo Yii::$app->user->identity->profile->name; ?>
            <?php else : ?>
            <?php echo Yii::$app->user->identity->username; ?>    
            <?php endif; ?>
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdown-menu-user">
            <li role="presentation">
                <a role="menuitem" tabindex="-1" href="<?= Url::toRoute('/user/settings/profile'); ?>" title="<?php echo Yii::t('user', 'Profile'); ?>">
                    <span class="fa fa-fw fa-user"></span> <?php echo Yii::t('user', 'Profile'); ?>
                </a>
            </li>
            <li role="presentation">
                <a role="menuitem" tabindex="-1" href="<?= Url::toRoute('/user/settings/account'); ?>" title="<?php echo Yii::t('app', 'Account'); ?>">
                    <span class="fa fa-fw fa-cogs"></span> <?php echo Yii::t('user', 'Account'); ?>
                </a>
            </li>
            <li role="presentation">
                <a role="menuitem" tabindex="-1" href="<?= Url::toRoute('/user/security/logout', true); ?>" title="<?php echo Yii::t('user', 'Logout'); ?>" data-method="post">
                    <span class="fa fa-fw fa-power-off"></span> <?php echo Yii::t('user', 'Logout'); ?>
                </a>
            </li>    
        </ul>
    </li>
    
    <?php endif; ?>
</ul>