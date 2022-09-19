<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forgot extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Forgot_Model');
    }

    public function index()
    {
        $this->load->view('forgotemail_view');
    }

    public function email()
    {
        $this->load->library('form_validation');
        $data = $this->input->post();
        $str_result = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $otp = substr(str_shuffle($str_result), 0, 6);

        $rules = array(
            array(
                'field' => 'email',
                'rules' => 'required|valid_email|trim'
            )
        );

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {

            $fetch =  $this->Forgot_Model->email($data, $otp);
            if ($fetch['statuscode'] == "420") {
                echo json_encode (array('statuscode' => '420', 'msg' => "Email Not Registered"));
            }if ($fetch['statuscode'] == "400"){
            $email = $data['email'];
            $subject = "Password Reset";
            $body = "Hii " . $fetch['name'][0]->name . ", Your OTP for Forgot Password is $otp";
            $headers = "From: test@sansoftwares.com";

            if ($fetch['check'] > 0) {
                $this->mailer->sendEmail($email, $subject, $body, $headers);
                echo json_encode (array('statuscode' => '400', 'msg' => "Email Send Successfully"));
            }
        }
        } else {
            echo json_encode (array('statuscode' => '100', 'msg' => "Please Fill Valid Email"));
        }
    }

    public function otp()
    {
        $data = $this->input->post();

        $rules = array(
            array(
                'field' => 'email',
                'rules' => 'required|valid_email|trim'
            )
        );

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
        $details = $this->Forgot_Model->otp($data);
       if ($details['dbotp'] == $data['otp']) {
            echo json_encode(array('statuscode' => '400', 'msg' => 'OTP Verified Successfully'));
        }else{
            echo json_encode(array('statuscode' => '420', 'msg' => 'OTP Not Match'));
        }
    }else{
        echo json_encode(array('statuscode' => '420', 'msg' => 'Please fill OTP'));
    }
    }

    public function confirmPwd()
    {
        $data = $this->input->post();
        if ($data['password'] == $data['cpassword']) {
            $details = $this->Forgot_Model->confirmPwd($data);

            if ($details == '1') {
                echo json_encode(array('statuscode' => '400', 'msg' => 'Password Change Successfully'));
            }
        } else {
            echo json_encode(array('statuscode' => '420', 'msg' => 'Password not match'));
        }
    }
}
