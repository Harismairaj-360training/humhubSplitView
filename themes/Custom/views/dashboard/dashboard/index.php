<?php
/**
 * @var \humhub\modules\user\models\User $contentContainer
 * @var bool $showProfilePostForm
 */
use \yii\helpers\Url;
?>

<div class="container">
    <div class="with-right-panel">
        <div class="ads-content">
          <?php echo humhub\modules\custom\widgets\AdsRightPanel::widget(); ?>
        </div>
        <div class="all-posts layout-content-container">
            <?= \humhub\modules\dashboard\widgets\DashboardContent::widget([
                'contentContainer' => $contentContainer,
                'showProfilePostForm' => $showProfilePostForm
            ])?>
        </div>
    </div>
</div>
