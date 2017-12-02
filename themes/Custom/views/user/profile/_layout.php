<?php
$user = $this->context->getUser();
?>
<div class="container profile-layout-container">
    <div class="with-right-panel">
        <div class="all-posts">
          <div>
              <?= \humhub\modules\user\widgets\ProfileHeader::widget(['user' => $user]); ?>
          </div>
          <div>
            <?php echo $content; ?>
          </div>
        </div>
        <div class="ads-content">
          <iframe src="http://localhost/humhub/p/right-panel-ads?min"></iframe>
        </div>
    </div>
</div>
