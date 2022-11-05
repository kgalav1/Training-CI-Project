<?php
class Profile_Model extends CI_Model
{

    public function profile_data()
    {
        $sdata = $this->session->userdata;
        $getdata = $this->db->select('*')->from('signupdetails')->where('sno', $sdata['sno'])->get()->result_array();
        return array('data' => $getdata);
    }

    public function addUpdate($data)
    {

        $sdata = $this->session->userdata;
        $sno = $sdata['sno'];
        $phone = $data["phone"];
        $address = $data["address"];
        $designation = $data["designation"];
        $country = $_POST["country"];
        $state = $_POST["state"];
        $twitter = $_POST["twitter"];
        $insta = $_POST["insta"];
        $facebook = $_POST["facebook"];
        $gender = $_POST["gender"];

        $data = array(
            'phone' => $phone,
            'address' => $address,
            'designation' => $designation,
            'country' => $country,
            'state' => $state,
            'twitter' => $twitter,
            'insta' => $insta,
            'facebook' => $facebook,
            'gender' => $gender
        );
        $this->db->update('signupdetails', $data, "sno = $sno"); // return 1 if user successfully submit in database table user
        return array('code' => '3', 'msg' => 'SuccesFully Updated');
    }
}
