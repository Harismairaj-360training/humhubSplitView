<?php
/**
 * @var \humhub\modules\space\models\Space $space
 * @var string $content
 */

$space = $this->context->contentContainer;
$onlyPost = isset($_GET['min']);
?>
<div class="container space-layout-container">
  <div class="with-right-panel">

    <div class="all-posts">

        <?php if(!$onlyPost){ ?>
          <div class="space-title"><?php echo $space->name; ?></div>
        <?php } ?>
        <div class="space-content">
          <div class="layout-content-container">
              <?= \humhub\modules\space\widgets\SpaceContent::widget([
                  'contentContainer' => $space,
                  'content' => $content
              ]) ?>
          </div>
        </div>

    </div>

    <?php if(!$onlyPost){ ?>
    <div class="ads-content">
      <iframe src="http://localhost/humhub/p/right-panel-ads?min"></iframe>
    </div>
    <?php } ?>

  </div>
</div>
