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

    public function generateUserLogs($type = 1, $name, $id = '', $msg = '')
    {
        // die;
        $CI =& get_instance();
        // echo "hu";
        if (!isset($_SESSION['name']))
        // echo "hii";die;
            return;
            $userName = $_SESSION['name'];
            // echo "hlo";die;
 
        switch ($type) {
            case '1':
                // For Add
                $message = "A New $name Addded by $userName";
                break;
            case '2':
                // For Edit
                $message = "$name (ID : $id) Updated by $userName";
                break;
            case '3':
                // For delete
                $message = "$name (ID : $id) Deleted by $userName";
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
}
