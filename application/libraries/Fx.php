<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fx
{

    static function p($p, $t=0)
    {
        if ($t == "1") {
            print_r($p);
        }
        if ($t == "0") {
            print_r($p);
            die;
        }
    }
}
