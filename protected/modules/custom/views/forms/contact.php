<?php

use \yii\helpers\Url;
use yii\widgets\ActiveForm;
use \humhub\compat\CHtml;

?>

<div class="container">

  <div class="with-right-panel">

    <div class="ads-content">
      <?php echo humhub\modules\custom\widgets\AdsRightPanel::widget(); ?>
    </div>

    <div class="all-posts">
        <div>
            <div class="well">
              <?php if(!$submit){ ?>
                <h1 class="text-center"><strong>Get</strong> in touch</h1>
                <div class="panel-body">
                  <hr>
                  <?php $form = ActiveForm::begin(['id' => 'contact-form', 'enableClientValidation' => true]); ?>

                  <?= $form->field($model, 'fullname')->textInput(['id' => 'fullname', 'placeholder' => $model->getAttributeLabel('fullname'), 'aria-label' => $model->getAttributeLabel('fullname')])->label(false); ?>
                  <?= $form->field($model, 'email')->textInput(['id' => 'email', 'placeholder' => $model->getAttributeLabel('email'), 'aria-label' => $model->getAttributeLabel('email')])->label(false); ?>

                  <div>Subject could be related to <strong>Advertisement</strong>, general feedack or Other.</div>
                  <?= $form->field($model, 'subject')->textInput(['id' => 'subject', 'placeholder' => $model->getAttributeLabel('subject'), 'aria-label' => $model->getAttributeLabel('subject')])->label(false); ?>

                  <?= $form->field($model, 'message')->textarea(['id' => 'message', 'placeholder' => $model->getAttributeLabel('message'), 'aria-label' => $model->getAttributeLabel('message')])->label(false); ?>

                  <hr>
                  <div class="text-center">
                    <?= CHtml::submitButton('Send', array('id' => 'contact-form-submit', 'data-ui-loader' => "", 'class' => 'btn btn-large btn-info')); ?>
                    <?= CHtml::resetButton('Reset', array('id' => 'contact-form-reset', 'class' => 'btn btn-large btn-primary')); ?>
                  </div>

                  <?php ActiveForm::end(); ?>

                </div>
              <?php }else{ ?>
                  <div class="text-center">
                      <h1><strong>Thank</strong> You</h1>
                      <div class="panel-body">
                        <h3>Your message has been submit successfully.</h3>
                        <hr>
                        <div>We will get back to you soon.</div>
                        <br><br>
                        <a class="btn btn-large btn-info" href="<?= Url::toRoute('/dashboard');?>"><span class="fa fa-home"></span> Go Back to Home</a>
                      </div>
                  </div>
              <?php } ?>

            </div>
        </div>
      </div>
</div>
