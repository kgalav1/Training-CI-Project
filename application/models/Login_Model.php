<?php
class Login_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function loginform($data)
    {
        $email = $data['email'];
        $pass = $data['loginpassword'];
        $query = $this->db->select('*')->from('signupdetails')->where('email',$email)->get();
        $rows = $query->result();
        $passfromdb = $rows[0]->password;
        
        if (password_verify($pass, $passfromdb)) {
            $newdata = array(
                'sno' => $rows[0]->sno,
                'name' => $rows[0]->name,
                'email' => $email,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($newdata);
            return array('code' => '104', 'msg' => 'SuccesFully Login');
            // echo "104";
        } else {
            return array('code' => '101', 'msg' => 'Something Wrong');
        }
    }

    public function logindata()
    {
        $tables = array('signupdetails', 'clientmaster', 'itemmaster', 'main_invoice');
        $data = array();
        for ($i = 0; $i < count($tables); $i++) {
            $data[$tables[$i]] = $this->db->select('*')->from($tables[$i])->count_all_results();
            $data['title'] = "Dashboard";
        }
        return $data;
    }

    public function enterUserLog($logData)
    {
        // print_r($logData);die;
        $this->db->insert('userlogs', $logData);
    }

}