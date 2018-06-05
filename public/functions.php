<?php
/**
 * Created by PhpStorm.
 * User: Attila
 * Date: 5/06/2018
 * Time: 2:31 PM
 */

function json_response($message = null, $code = 200, $onlyData = false)
{
    // clear the old headers
    header_remove();

    // set the actual code
    http_response_code($code);

    // set the header to make sure cache is forced
    header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");

    // treat this as json
    header('Content-Type: application/json');
    $status = array(
        200 => '200 OK',
        400 => '400 Bad Request',
        422 => 'Unprocessable Entity',
        500 => '500 Internal Server Error'
    );

    // ok, validation error, or failure
    header('Status: ' . $status[$code]);

    if ($onlyData) {
        // return the encoded json
        return json_encode(
            $message
        );
    } else {
        // return the encoded json
        return json_encode(array(
            'status' => $code < 300, // success or not?
            'message' => $message
        ));
    }

}