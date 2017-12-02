<?php
/* @var $this \yii\web\View */
/* @var $content string */

\humhub\assets\AppAsset::register($this);
\humhub\modules\custom\assets\CustomAsset::register($this);
use \yii\helpers\Url;

$isCustomer = !empty(Yii::$app->user->identity->username);
$isAdmin = Yii::$app->user->isAdmin();

$onlyPost = isset($_GET['min']);
$bodyCSS = '';
if($onlyPost)
{
  $bodyCSS = 'min';
}else{
  $bodyCSS = 'full';
}

if(Yii::$app->user->isGuest)
{
  $bodyCSS .= ' guest';
}
elseif(!$isAdmin)
{
  $bodyCSS .= ' user';
}

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <title><?= strip_tags($this->pageTitle); ?></title>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <?php $this->head() ?>
        <?= $this->render('head'); ?>
    </head>
    <body class="<?php echo $bodyCSS; ?>">
        <?php $this->beginBody() ?>

        <?php if(!$onlyPost){ ?>
          <!-- start: first top navigation bar -->
          <div id="topbar-first" class="topbar">
              <div class="container">
                  <div class="topbar-brand hidden-xs">
                      <?= \humhub\widgets\SiteLogo::widget(); ?>
                  </div>

                  <div class="topbar-actions pull-right">
                      <?= \humhub\modules\user\widgets\AccountTopMenu::widget(); ?>
                  </div>

                  <div class="notifications pull-right">
                      <?= \humhub\widgets\NotificationArea::widget(); ?>
                  </div>
              </div>
          </div>
          <!-- end: first top navigation bar -->

          <?php if($isCustomer && !$isAdmin){ ?>

            <!-- start - custom left navigation -->
            <div id="top-left-nav">
              <?php
                  function getLeftNav()
                  {
                    $data = array(
                      array(
                        "label" => "Profile",
                        "url" => "/humhub/user/account/edit",
                        "icon" => "fa-user"
                      ),
                      array(
                        "label" => "E-Mail Summaries",
                        "url" => "/humhub/activity/user",
                        "icon" => "fa-envelope"
                      ),
                      array(
                        "label" => "Notifications",
                        "url" => "/humhub/notification/user",
                        "icon" => "fa-bell"
                      ),
                      array(
                        "label" => "Settings",
                        "url" => "/humhub/user/account/edit-settings",
                        "icon" => "fa-wrench"
                      ),
                      array(
                        "label" => "Security",
                        "url" => "/humhub/user/account/security",
                        "icon" => "fa-lock"
                      )
                    );
                    $html = "<div class='nav items'>";
                    foreach($data as $childs)
                    {
                        $html .= "<div class='item'>";
                        $html .= "<a title='".$childs['label']."' href='".$childs['url']."'>";
                        if(!empty($childs['icon']))
                        {
                            $html .= "<i class='fa ".$childs['icon']."'></i>";
                        }
                        $html .= "</a></div>";
                    }
                    $html .= "</div>";
                    return $html;
                }
                echo getLeftNav();
              ?>
            </div>
            <!-- end - custom left navigation -->

        <?php } ?>

          <!-- start: second top navigation bar -->
          <div id="topbar-second" class="topbar">
              <div class="container">
                  <ul class="nav" id="top-menu-nav">
                      <!-- load space chooser widget -->
                      <?= \humhub\modules\space\widgets\Chooser::widget(); ?>

                      <!-- load navigation from widget -->
                      <?= \humhub\widgets\TopMenu::widget(); ?>
                  </ul>

                  <ul class="nav pull-right" id="search-menu-nav">
                      <?= \humhub\widgets\TopMenuRightStack::widget(); ?>
                  </ul>
              </div>
          </div>
          <!-- end: second top navigation bar -->
        <?php } ?>

        <?= $content; ?>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
