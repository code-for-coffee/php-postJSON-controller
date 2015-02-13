<?php
/**
 * User: code-for-coffee
 * Date: 2/13/2015
 * Time: 4:28 PM
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

    // do stuff here; return whatever you want.
    $return = Array(
        "message" => "Success"
    );

    echo json_encode($return);
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