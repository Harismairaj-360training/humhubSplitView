<?php

namespace humhub\modules\custom\models\forms;

use Yii;
use yii\base\Model;
use humhub\modules\user\libs\Ldap;


/**
 * LoginForm is the model behind the login form.
 */
class Contact extends Model
{

    /**
     * @var string user's fullname
     */
    public $fullname;

    /**
     * @var string user's email
     */
    public $email;

    /**
     * @var string submit
     */
    public $subject;

    /**
     * @var string message
     */
    public $message;

   /**
    * @inheritdoc
    */
   public function init()
   {
       parent::init();
   }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['fullname','email','subject','message'], 'required'],
            ['email', 'email']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array(
            'fullname' => 'Your full name',
            'email' => 'Your email address',
            'subject' => 'Subject',
            'message' => 'Message'
        );
    }

}
