<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fx
{

    static function p($p, $d = 1)
    {
        if ($d == "1") {
            print_r($p);
            die;
        }
        if ($d == "0") {
            print_r($p);
        }
    }

    public function generateUserLogs($type = 1, $name, $id = '', $msg = '')
    {
        $CI = &get_instance();
        if (!isset($_SESSION['name']))
            return;
        $userName = $_SESSION['name'];

        switch ($type) {
            case '1':
                // For Add
                $message = "A New $name Added by $userName";
                break;
            case '2':
                // For Edit
                $message = "Record $id of $name Updated by $userName";
                break;
            case '3':
                // For delete
                $message = "Record $id of $name Deleted by $userName";
                break;
            case '4':
                // For Search
                $message = "$name List Search by $userName";
                break;
            case '5':
                // For Login
                $message = "Software Login by $userName";
                break;
            case '6':
                // For Logout
                $message = "Software Logout by $userName";
                break;
            default:
                break;
        }
        if ($msg != '')
            $message = $msg;

        if ($message == '')
            return;


        $logData = array('type' => $type, 'message' => $message, 'master' => $CI->router->fetch_class(), 'method' => $CI->router->fetch_method(), 'user_id' => $_SESSION['sno'], 'remote_ip' => $_SERVER['REMOTE_ADDR']);
        return $CI->Login_Model->enterUserLog($logData);
    }

    public function requireToVar($file, $data)
    {
        ob_start();
        foreach ($data as $key => $val) {
            $$key = $val;
        }
        require($file);
        return ob_get_clean();
    }
}
