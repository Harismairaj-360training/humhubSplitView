<?php

namespace humhub\modules\custom\controllers;

use Yii;
use humhub\components\Controller;
use humhub\modules\custom\models\forms\Contact;

/**
 * MailController provides messaging actions.
 *
 * @package humhub.modules.mail.controllers
 * @since 0.5
 */
class ContactController extends Controller
{
    public function actionIndex()
    {
      $contact = new Contact;
      $submit = false;
      $mail = '';
      if ($contact->load(Yii::$app->request->post()) && $contact->validate())
      {
        $request = Yii::$app->request->post()['Contact'];

        // the message
        $mail = '<strong>Full Name:</strong><br>'.$request['fullname'].'<br><br>';
        $mail .= '<strong>Email Address:</strong><br>'.$request['email'].'<br><br>';
        $mail .= '<strong>Message:</strong><br>'.$request['message'];

        // use wordwrap() if lines are longer than 70 characters
        $mail = wordwrap($mail,200);

        // send email
        mail('haris_meraj@hotmail.com',$request['subject'],$mail);

        $submit = true;
      }
      return $this->render('/forms/contact', array(
                  'model' => $contact, 'submit' => $submit, 'mail' => $mail
      ));
    }

}
