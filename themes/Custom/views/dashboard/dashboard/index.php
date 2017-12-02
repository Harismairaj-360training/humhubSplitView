<?php
/**
 * @var \humhub\modules\user\models\User $contentContainer
 * @var bool $showProfilePostForm
 */

?>

<div class="container">
    <div class="with-right-panel">
        <div class="all-posts layout-content-container">
            <?= \humhub\modules\dashboard\widgets\DashboardContent::widget([
                'contentContainer' => $contentContainer,
                'showProfilePostForm' => $showProfilePostForm
            ])?>
        </div>
        <div class="ads-content">
          <iframe src="http://localhost/humhub/p/right-panel-ads?min"></iframe>
        </div>
    </div>
</div>
