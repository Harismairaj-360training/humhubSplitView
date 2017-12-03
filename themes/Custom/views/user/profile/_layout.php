<?php
use \yii\helpers\Url;
$user = $this->context->getUser();
?>
<div class="container profile-layout-container">
    <div class="with-right-panel">
        <div class="ads-content">
          <iframe src="<?= Url::toRoute('/p/right-panel-ads?min=true');?>"></iframe>
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
