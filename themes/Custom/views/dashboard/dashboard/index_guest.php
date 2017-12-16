<?php
use \yii\helpers\Url;
?>

<div class="container">
    <div class="with-right-panel">
        <div class="ads-content">
          <?php echo humhub\modules\custom\widgets\AdsRightPanel::widget(); ?>
        </div>
        <div class="all-posts">
            <?= \humhub\modules\dashboard\widgets\DashboardContent::widget(); ?>
        </div>
    </div>
</div>
