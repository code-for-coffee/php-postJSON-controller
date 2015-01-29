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

    public $actionObject = null;

    abstract public function onError($object);
    abstract public function onSuccess($args, $actionObject);

    public function isJsonValid($jsonObj){

        try {
            $obj = strip_tags($jsonObj);
            $obj = json_decode($obj);
        } catch (ErrorException $ex) {
            return false;
        }

        return true;
    }

    public function toJson($jsonObj){

        try {
            $obj = strip_tags($jsonObj);
            $obj = json_decode($obj);
        } catch (ErrorException $ex) {
            throw new ErrorException($ex);
        }

        return $obj;
    }

    /**
     * @param $jsonObj -- accepts a JSON object on post, parses
     * @throws ErrorException
     */
    public function OnPost ($jsonObj)
    {
        if (!actionObject) {
            throw new ErrorException("No action object defined!");
        }

        if (!$jsonObj) {

            parent::onError();

        } else {

            $result = parent::isJsonValid($jsonObj);

            if ($result) {

                $obj = parent::toJson($jsonObj);
                parent::onSuccess($obj);

            } else {

                parent::onError();

            }



        }

    }
}

