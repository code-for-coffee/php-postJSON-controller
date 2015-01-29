<?php
/**
 * User: code-for-coffee
 * Date: 1/28/2015
 * Time: 11:48 PM
 */

/**
 * Class postJSONController
 * onError() is to be implemented
 * onSuccess() is to be implemented
 * OnPost() reads the $jsonResult passed in and delegates to above functions
 */
abstract class postJSONController {

    abstract public function onError($args);
    abstract public function onSuccess($args);
    public function OnPost ($jsonObj)
    {

        if (!$jsonObj) {

            // require our
            parent::onError();

        } else {

            parent::onSuccess();

        }

    }
}

