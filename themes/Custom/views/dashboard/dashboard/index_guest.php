<?php
use \yii\helpers\Url;
?>

<div class="container">
    <div class="with-right-panel">
        <div class="ads-content">
          <iframe src="<?= Url::toRoute('/p/right-panel-ads?min=true');?>"></iframe>
        </div>
        <div class="all-posts">
            <?= \humhub\modules\dashboard\widgets\DashboardContent::widget(); ?>
        </div>
    </div>
</div>
