<?php

class Response {

    var $status = false;
    var $title = '';
    var $message = '';

    public static function jsonEncode($status, $title, $message, $redirect = null) {
        return json_encode(array(
            'status' => $status,
            'title' => $title,
            'message' => $message,
            'redirect' => $redirect
        ));
    }

}
