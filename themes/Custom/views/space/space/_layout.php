<?php
/**
 * @var \humhub\modules\space\models\Space $space
 * @var string $content
 */

$space = $this->context->contentContainer;
$onlyPost = isset($_GET['min']);
?>
<div class="container space-layout-container">

    <?php if(!$onlyPost){ ?>
    <div class="row">
        <div class="col-md-12">
            <?php echo humhub\modules\space\widgets\Header::widget(['space' => $space]); ?>
        </div>
    </div>
    <?php } ?>
    <div class="row space-content">
        <?php if (isset($this->context->hideSidebar) && $this->context->hideSidebar) : ?>
            <div class="col-md-12 layout-content-container">
                <?= \humhub\modules\space\widgets\SpaceContent::widget([
                    'contentContainer' => $space,
                    'content' => $content
                ]) ?>
            </div>
        <?php else: ?>
            <div class="col-md-12 layout-content-container">
                <?= \humhub\modules\space\widgets\SpaceContent::widget([
                    'contentContainer' => $space,
                    'content' => $content
                ]) ?>
            </div>
        <?php endif; ?>
    </div>
</div>
