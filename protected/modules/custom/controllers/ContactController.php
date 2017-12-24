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
        $mail = "<html>
                  <head>
                  <title>HTML email</title>
                  </head>
                  <body>
                    <strong>Subject:</strong><br>".$request['subject']."<br><br>
                    <strong>Full Name:</strong><br>".$request['fullname']."<br><br>
                    <strong>Email Address:</strong><br>".$request['email']."<br><br>
                    <strong>Message:</strong><br>".$request['message'].
                  "</body>
                </html>";

        // use wordwrap() if lines are longer than 70 characters
        $mail = wordwrap($mail,200);

        //  set headers
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <'.$request['email'].'>' . "\r\n";

        // send email
        mail('info@border1947.com','Border1947 | Contact Us form',$mail,$headers);

        $submit = true;
      }
      return $this->render('/forms/contact', array(
                  'model' => $contact, 'submit' => $submit, 'mail' => $mail
      ));
    }

}
