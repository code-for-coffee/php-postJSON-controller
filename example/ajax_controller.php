<?php
/**
 * User: code-for-coffee
 * Date: 2/15/2015
 * Time: 4:28 PM
 *
 * This code isn't safe; no HTML is escaped. Do not use live; this is an example only!
 */

function is_valid_ajax_request() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

if (is_valid_ajax_request()) {
    if (isset($_POST) && !empty($_POST)) {
        on_valid_ajax_request();
    } else {
        on_invalid_ajax_request();
    }
}

function on_valid_ajax_request(){

    $email = "no-reply@yourwebsite.com";
    $toEmail = "youremailhere@yourwebsite.com";

    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "CC: " . $toEmail . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $body = "You have received a new comment!<br><br> \n\n";
    $body .= "Name: " . $_POST['Name'] . "<br>\n";
    $body .= "LastName: " . $_POST['Email'] . "<br>\n";
    $body .= "Comments: " . $_POST['Comments'] . "<br>\n";

    mail($toEmail, "New Comment", $body, $headers);

    echo json_encode($_POST);
}

function on_invalid_ajax_request(){
    $return = array(
        'type' => 'error',
        'message' => 'Invalid request.'
    );
    header('HTTP/1.1 400 Bad Request');
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($return);
}