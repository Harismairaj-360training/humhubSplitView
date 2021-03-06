<?php
/**
 * @var \humhub\modules\space\models\Space $space
 * @var string $content
 */
use \yii\helpers\Url;

$space = $this->context->contentContainer;
$onlyPost = isset($_GET['min']);

?>
<div class="container space-layout-container">
  <div class="with-right-panel">

    <?php if(!$onlyPost){ ?>
    <div class="ads-content">
      <?php echo humhub\modules\custom\widgets\AdsRightPanel::widget(); ?>
    </div>
    <?php } ?>

    <div class="all-posts">

        <?php if(!$onlyPost){ ?>

          <?php
          if(Yii::$app->user->id == 1 || Yii::$app->user->id == SPECIAL_USER_ID)
          { ?>
          <div class="row">
              <div class="col-md-12">
                  <?php echo humhub\modules\space\widgets\Header::widget(['space' => $space]); ?>
              </div>
          </div>
          <?php }else{ ?>
          <div style="background-color:<?php echo $space->color; ?>" class="space-title"><?php echo $space->name; ?></div>
          <?php } ?>
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

  </div>
</div>

<script>
  var spaceGUID = "<?php echo $space->guid;?>";
</script>
