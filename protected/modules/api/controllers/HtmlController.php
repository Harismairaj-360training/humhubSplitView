<?php
namespace humhub\modules\api\controllers;

use Yii;
use yii\helpers\Html;
use yii\web\HttpException;
use humhub\components\Controller;
use humhub\modules\space\models\Membership;
use humhub\modules\user\models\forms\Login;

function object_to_array($object)
{
    if($object == null)
    {
        return null;
    } else if (is_object($object)) {
        return array_map(__FUNCTION__, get_object_vars($object));
    } else if (is_array($object)) {
        return array_map(__FUNCTION__, $object);
    } else {
        return $object;
    }
}

function prepareRequest()
{
    $request = Yii::$app->request;
    if ($request->isPost && empty($request->getBodyParams())) {
        $request->setBodyParams(object_to_array(json_decode($request->getRawBody())));
    }
}

class HtmlController extends BaseController
{
    public $modelClass = 'humhub\modules\post\models\Post';

    /**
     * @inheritdoc
     */
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index'], $actions['view'], $actions['update'], $actions['create']);
        return $actions;
    }

    public function actionPosting()
    {
      prepareRequest();
      $request = Yii::$app->request;

      if (!$request->post()["message"]) {
          throw new BadRequestHttpException('`message` is required.');
      }
      if (!$request->post()["containerGuid"]) {
          throw new BadRequestHttpException('`containerGuid` is required.');
      }
      if (!$request->post()["containerClass"]) {
          throw new BadRequestHttpException('`containerClass` is required and must be humhub\modules\space\models\\');
      }

      $userId = (int) SPECIAL_USER_ID;
      $canSetActivity = true;
      if(!empty(Yii::$app->user->identity->id))
      {
        $canSetActivity = (Yii::$app->user->identity->id == SPECIAL_USER_ID || Yii::$app->user->identity->id == SPECIAL_USER_ID2);
        if(Yii::$app->user->identity->id == SPECIAL_USER_ID2)
        {
          $userId = (int) SPECIAL_USER_ID2;
        }
      }

      $space = \humhub\modules\space\models\Space::findOne(['guid' => $request->post()["containerGuid"]]);
      $space->addMember($userId);
      $membership = Membership::findOne(['space_id' => $space->id, 'user_id' => $userId]);
      $membership['group_id'] = 'admin';
      $membership->save();

      $post = new \humhub\modules\post\models\Post();
      $post->message = $request->post()["message"];
      $post->html_message = $request->post()["html_message"];
      $post->created_by = $userId;
      $post->updated_by = $userId;
      $post->content->created_by = $userId;
      $post->content->updated_by = $userId;
      $post->content->visibility = 1;
      if($canSetActivity)
      {
        $post->content->contentcontainer_id = $space->contentcontainer_id;
      }

      if($post->save())
      {
        return \humhub\modules\content\widgets\WallCreateContentForm::create($post, $space);
      }
    }
}
