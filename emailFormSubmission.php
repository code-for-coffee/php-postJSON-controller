<?php
/**
 * User: code-for-coffee
 * Date: 1/28/2015
 * Time: 11:48 PM
 */

/**
 * Class emailFormSubmission
 */
class emailFormSubmission extends postJSONController {

    public $recipientEmail = null;
    public $sender = null;
    public $senderEmail = null;
    public $body = null;

    public $errorSubject = "Error";
    public $successSubject = "Form Submission Title";
    public $errorBody = "An error has occurred";

    public function sendEmail($json) {

        $obj = $json;

        //$headers = "From: " . $sender . "\r\n";
        //$headers .= "Reply-To: $senderEmail\r\n";
        //$headers .= "MIME-Version: 1.0\r\n";
        //$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        try {

            //mail($recipientEmail, $subject, $body, $headers);

        } catch(OutOfBoundsException $ex){

            echo $ex;

        }

    }

    public function onError()
    {
        $this::sendEmail($this->recipientEmail, $this->sender, $this->senderEmail, $this->errorSubject, $this->errorBody);
    }
    public function onSuccess($args)
    {
        $this::sendEmail($args);
    }

}

