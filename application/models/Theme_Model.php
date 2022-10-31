<?php
class Theme_Model extends CI_Model
{

    public function update($data)
    {

        $navcolor = $data["navcolor"];
        $sidecolor = $data["sidecolor"];
        $thcolor = $data["thcolor"];
        $sno = $_SESSION['sno'];

       

        $colorExistInDB = $this->db->select('id')->from('theme')->where('user_id', $sno)->get()->num_rows();
        if ($colorExistInDB) {
            $data = array(
                'nav' => $navcolor,
                'side' => $sidecolor,
                'th' => $thcolor
            );
            $responceUpdate = $this->db->update('theme', $data, "id = $sno"); 
            if ($responceUpdate) {
                return array('code' => '11', 'msg' => 'SuccesFully Update');
            } else {
                return array('code' => '420', 'msg' => 'error');
            }
        } else {
            $data = array(
                'nav' => $navcolor,
                'side' => $sidecolor,
                'th' => $thcolor,
                'user_id' => $sno
            );
            $responceInsert = $this->db->insert('theme', $data);
            if ($responceInsert) {
                return array('code' => '11', 'msg' => 'SuccesFully Insert');
            } else {
                return array('code' => '420', 'msg' => 'error');
            }
        }

       
    }

    public function fetch(){
        $userid = $_SESSION['sno'];
        return $this->db->select('*')->from('theme')->where('user_id', $userid)->get()->result();
    }
}
