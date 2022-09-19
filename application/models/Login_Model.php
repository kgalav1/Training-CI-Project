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
                'name'     => $rows[0]->name,
                'email'  => $email,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($newdata);
            echo "104";
        } else {
            echo "101";
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

}