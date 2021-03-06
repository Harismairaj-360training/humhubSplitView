<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2017 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */
use \yii\helpers\Html;
use \yii\helpers\Url;

/** @var \humhub\modules\user\models\User $userModel */
$userModel = Yii::$app->user->getIdentity();
?>

<a href="<?= Url::toRoute('/dashboard'); ?>" class="btn btn-custom" title="Go to Home Page"><span class="fa fa-home"></span> <small>Home</small></a>

<?php if ($userModel === null): ?>
    <a href="#" class="btn btn-enter" data-action-click="ui.modal.load" data-action-url="<?= Url::toRoute('/user/auth/login'); ?>">
        <?php if (Yii::$app->getModule('user')->settings->get('auth.anonymousRegistration')): ?>
            <?= Yii::t('UserModule.base', 'Join or Login'); ?>
        <?php else: ?>
            <?= Yii::t('UserModule.base', 'Sign in'); ?>
        <?php endif; ?>
    </a>
<?php else: ?>
    <ul class="nav">
        <li class="dropdown account">
            <a href="#" id="account-dropdown-link" class="dropdown-toggle" data-toggle="dropdown" aria-label="<?= Yii::t('base', 'Profile dropdown') ?>">

                <?php if ($this->context->showUserName): ?>
                    <div class="user-title pull-left hidden-xs">
                        <strong><?= Html::encode($userModel->displayName); ?></strong><span class="truncate"><?= Html::encode($userModel->profile->title); ?></span>
                    </div>
                <?php endif; ?>

                <img id="user-account-image"
                     src="<?= $userModel->getProfileImage()->getUrl(); ?>"
                     height="50" width="50" alt="<?= Yii::t('base', 'My profile image') ?>" data-src="holder.js/32x32"
                     style="width: 50px; height: 50px;"/>

                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu pull-right">
                <?php foreach ($this->context->getItems() as $item): ?>
                    <?php if ($item['label'] == '---'): ?>
                        <li class="divider"></li>
                        <?php else: ?>
                        <li>
                            <a <?= isset($item['id']) ? 'id="' . $item['id'] . '"' : '' ?> href="<?= $item['url']; ?>" <?= isset($item['pjax']) && $item['pjax'] === false ? 'data-pjax-prevent' : '' ?>>
                                <?= $item['icon'] . ' ' . $item['label']; ?>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </li>
    </ul>
<?php endif; ?>
