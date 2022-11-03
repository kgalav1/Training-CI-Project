<?php
class Profile_Model extends CI_Model
{

    public function profile_data()
    {
        $sdata = $this->session->userdata;
        $getdata = $this->db->select('*')->from('signupdetails')->where('sno', $sdata['sno'])->get()->result_array();
        return array('data' => $getdata);
    }
}