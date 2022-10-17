<?php
class User_Model extends CI_Model
{

    public function pagination($data)
    {
        $sname = $data['name'];
        $semail = $data['email'];
        $sphone = $data['phone'];
        $limit = $data['limit'];
        $sort_field = $data['sort_field'];
        $sort_type = $data['sort_type'];
        $page = isset($data['page']) ? $data['page'] : '1';
        $offset = ($page - 1) * $limit;

        $array = array('name' => $sname, 'email' => $semail, 'phone' => $sphone);

        $search = $this->db->select('*')->from('signupdetails')->where(1, 1)->like($array)->limit($limit, $offset)->order_by($sort_field, $sort_type)->get();
        $searchresult = $search->result();
        $count_row = $search->num_rows($search);

        $total = $this->db->select('*')->from('signupdetails')->get()->num_rows();

        return  array('rows' => $searchresult, 'count' => $count_row, 'total' => $total, 'limit' => $limit, 'page' => $page, 'offset' => $offset);
    }


    public function addupdate($data)
    {

        $name = $data["name"];
        $email = $data["email"];
        $phone = $data["phone"];
        $password = $_POST["password"];
        $hiddenpassword = $_POST["hiddenpassword"];
        $token = bin2hex(random_bytes(15));

        if ($data["form_action"] == "insert") {

            $pass = password_hash($data['password'], PASSWORD_DEFAULT);
            $userExistInDB = $this->db->select('email')->from('signupdetails')->where('email', $email)->get()->num_rows();

            // print_r($this->db->last_query());die;

            if ($userExistInDB) {
                echo "1";
            } else {
                $data = array(
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'password' => $pass,
                    'token' => $token,
                    'status' => 'active'
                );
                $responce = $this->db->insert('signupdetails', $data); // return 1 if user successfully submit in database table user
                if($responce){

                    return array('code' => '2', 'msg' => 'SuccesFully Added');
                }else{
                    
                    return array('code' => '420', 'msg' => 'error');
                }
            }
        } else {
            $sno = $data["snoEdit"];

            $userExistInDB = $this->db->select('email')->from('signupdetails')->where('email', $email)->where('sno <>', $sno)->get()->num_rows();

            if ($userExistInDB) {
                echo "1";
            } else {
                if ($hiddenpassword == $password) {
                    $data = array(
                        'name' => $name,
                        'email' => $email,
                        'phone' => $phone,
                        'password' => $hiddenpassword,
                    );
                    $responce = $this->db->update('signupdetails', $data, "sno = $sno"); // return 1 if user successfully submit in database table user
                    if($responce){

                        return array('code' => '3', 'msg' => 'SuccesFully Edit');
                    }else{
                        
                        return array('code' => '420', 'msg' => 'error');
                    }
                } else {
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $data = array(
                        'name' => $name,
                        'email' => $email,
                        'phone' => $phone,
                        'password' => $hash,
                    );
                    $responce = $this->db->update('signupdetails', $data, "sno = $sno"); // return 1 if user successfully submit in database table user
                    if($responce){

                        return array('code' => '3', 'msg' => 'SuccesFully Edit');
                    }else{
                        
                        return array('code' => '420', 'msg' => 'error');
                    }
                }
            }
        }
    }

    public function editDetailsFill($data)
    {
        $sno = $data['edit_id'];
        $result = $this->db->select('*')->from('signupdetails')->where('sno', $sno)->get();
        $name = $result->result()[0]->name;
        $email = $result->result()[0]->email;
        $phone = $result->result()[0]->phone;
        $password = $result->result()[0]->password;
        return array('name' => $name, 'email' => $email, 'phone' => $phone, 'password' => $password, 'sno' => $sno);
    }

    public function deleteuser($data)
    {
        $sno = $data['delete_id'];
        $this->db->where('sno', $sno);
        $responce = $this->db->delete('signupdetails');
        if($responce){

            return array('code' => '4', 'msg' => 'SuccesFully Deleted');
        }else{
            
            return array('code' => '420', 'msg' => 'error');
        }
    }


    public function excel($data)
    {
        $sname = $data['name'];
        $semail = $data['email'];
        $sphone = $data['phone'];
        $limit = $data['limit'];
        $sort_field = $data['sort_field'];
        $sort_type = $data['sort_type'];
        $page = isset($data['page']) ? $data['page'] : '1';
        $offset = ($page - 1) * $limit;

        $array = array('name' => $sname, 'email' => $semail, 'phone' => $sphone);

        $search = $this->db->select('*')->from('signupdetails')->where(1, 1)->like($array)->limit($limit, $offset)->order_by($sort_field, $sort_type)->get();
        $searchresult = $search->result();
        $count_row = $search->num_rows($search);

        $total = $this->db->select('*')->from('signupdetails')->get()->num_rows();

        return  array('rows' => $searchresult, 'count' => $count_row);
    }
}
