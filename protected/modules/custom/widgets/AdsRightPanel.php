<?php

namespace humhub\modules\custom\widgets;

use humhub\modules\custom_pages\models\Page;

class AdsRightPanel extends \humhub\widgets\BaseMenu
{

    public function run()
    {
        $page = Page::findOne(['id' => 13]);
        return $this->render('adsRightPanel', array(
                    'content' => $page->content
        ));
    }

}
