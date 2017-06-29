<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 7/17/2016
 * Time: 9:18 PM
 */

function shorten($string)
{
    if (strlen($string) >= 20) {
        return substr($string, 0, 10) . " ... " . substr($string, -5);
    } else {
        return $string;
    }
}
