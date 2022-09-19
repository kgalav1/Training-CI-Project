<?php
class Forgot_Model extends CI_Model
{
    public function email($data, $otp)
    {
        $email = $data['email'];

        $check = $this->db->select('email')->from('signupdetails')->where('email', $email)->get()->num_rows();
        if ($check) {
            $submit = $this->db->update('signupdetails', array('otp' => $otp), "email= '$email'");

            $find = $this->db->select('name')->from('signupdetails')->where('email', $email)->get();
            $result = $find->result();
            $check = $find->num_rows();

            return array('name' => $result, 'check' => $check, 'statuscode' => "400");
        } else {
            return array('statuscode' => "420");
        }
    }

    public function otp($data)
    {
        $email = $data['email'];
        $otp = $data['otp'];
        $fetch = $this->db->select('otp')->from('signupdetails')->where('email', $email)->get()->result();
        // print_r($fetch[0]->otp);die;
        $dbotp = $fetch[0]->otp;
        return array('dbotp' => $dbotp);
    }

    public function confirmPwd($data)
    {
        $email = $data['email'];
        $pass = $data['password'];
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $fetch = $this->db->update('signupdetails', array('password' => $hash), "email = '$email'");

        return $fetch;
    }
}
