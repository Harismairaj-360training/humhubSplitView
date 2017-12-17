<?php
use \yii\helpers\Url;
$user = $this->context->getUser();

if(!Yii::$app->user->isGuest)
{
?>
<div class="container profile-layout-container">
    <div class="with-right-panel">
        <div class="ads-content">
          <?php echo humhub\modules\custom\widgets\AdsRightPanel::widget(); ?>
        </div>
        <div class="all-posts">
          <div>
              <?= \humhub\modules\user\widgets\ProfileHeader::widget(['user' => $user]); ?>
          </div>
          <div>
            <?php echo $content; ?>
          </div>
        </div>
    </div>
</div>
<?php }else{ ?>

  <div class="container profile-layout-container">
      <div class="with-right-panel">
          <div class="ads-content">
            <?php echo humhub\modules\custom\widgets\AdsRightPanel::widget(); ?>
          </div>
          <div class="all-posts">
            <div class="panel">
              <div class="panel-heading">
                To view user profile, you need to Join or Login.
              </div>
              <div class="panel-body">
                <a href="#" class="btn btn-primary" data-action-click="ui.modal.load" data-action-url="<?= Url::toRoute('/user/auth/login'); ?>">
                    <?php if (Yii::$app->getModule('user')->settings->get('auth.anonymousRegistration')): ?>
                        <?= Yii::t('UserModule.base', 'Join or Login'); ?>
                    <?php else: ?>
                        <?= Yii::t('UserModule.base', 'Sign in'); ?>
                    <?php endif; ?>
                </a>
              </div>
            </div>
          </div>
      </div>
  </div>

<?php } ?>
