<?php

namespace humhub\modules\custom\widgets;

class CustomMeta extends \humhub\widgets\BaseMenu
{

    public function run()
    {
        $desc = 'Border1947 is a virtual window between Pakistan and India. It provides latest news of the two nations and a platform for sharing and discussing peoples’ opinion. B1947 covers all in their news, analysis, reviews and trends whether it is entertainment, sports, business or technology.';
        if(!empty($_GET['contentId']))
        {
           $content = \humhub\modules\content\models\Content::find()->where(['content.id' => $_GET['contentId']])->asArray()->one();
           if(!empty($content['object_id']))
           {
             $post = \humhub\modules\post\models\Post::find()->where(['id' => $content['object_id']])->asArray()->one();
             if(!empty($post['message']))
             {
               $desc = $post['message'];
             }
           }
        }

        return $this->render('customMeta', array(
                    'desc' => $desc
        ));
    }

}
