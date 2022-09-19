<?php
class Client_Model extends CI_Model
{

    public function getCountry()
    {
        $result = $this->db->select('*')->from('countries')->get();
        return $result->result_array();
    }

    public function getState($state_data)
    {
        $result = $this->db->select('*')->from('states')->where('country_id', $state_data['category_id'])->get();
        return $result->result_array();
    }

    public function getCity($state_data)
    {
        $result = $this->db->select('*')->from('cities')->where('state_id', $state_data['category_id'])->get();
        // print_r($result);die;
        return $result->result_array();
    }

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

        $array = array('client_name' => $sname, 'email' => $semail, 'phone' => $sphone);

        $search = $this->db->select('clientmaster.sno, clientmaster.client_name, clientmaster.email, clientmaster.phone, clientmaster.address, states.name as state,cities.name as city')->from('clientmaster')->join('states', 'clientmaster.state=states.id', 'inner')->join('cities', 'clientmaster.city=cities.id', 'inner')->where(1, 1)->like($array)->limit($limit, $offset)->order_by($sort_field, $sort_type)->get();

        $searchresult = $search->result();
        $count_row = $search->num_rows($search);

        $total = $this->db->select('*')->from('clientmaster')->get()->num_rows();

        return  array('rows' => $searchresult, 'count' => $count_row, 'total' => $total, 'limit' => $limit, 'page' => $page, 'offset' => $offset);
    }


    public function addUpdate($data)
    {

        $name = $data["name"];
        $email = $data["email"];
        $phone = $data["phone"];
        $password = $_POST["password"];
        $hiddenpassword = $_POST["hiddenpassword"];
        $address = $_POST["address"];
        $country = $_POST["country"];
        $state = $_POST["state"];
        $city = $_POST["city"];
       
        if ($data["form_action"] == "insert") {

            $pass = password_hash($data['password'], PASSWORD_DEFAULT);
            $userExistInDB = $this->db->select('email')->from('clientmaster')->where('email', $email)->get()->num_rows();

            // print_r($this->db->last_query());die;

            if ($userExistInDB) {
                echo "1";
            } else {
                $data = array(
                    'client_name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'password' => $pass,
                    'address' => $address,
                    'country' => $country,
                    'state' => $state,
                    'city' => $city
                );
                $this->db->insert('clientmaster', $data); // return 1 if user successfully submit in database table user
                echo "2";
            }
        } else {
            $sno = $data["sno"];

            $userExistInDB = $this->db->select('email')->from('clientmaster')->where('email', $email)->where('sno <>', $sno)->get()->num_rows();

            if ($userExistInDB) {
                echo "1";
            } else {
                if ($hiddenpassword == $password) {
                    $data = array(
                        'client_name' => $name,
                        'email' => $email,
                        'phone' => $phone,
                        'password' => $hiddenpassword,
                        'address' => $address
                    );
                    $this->db->update('clientmaster', $data, "sno = $sno"); // return 1 if user successfully submit in database table user
                    echo "3";
                } else {
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $data = array(
                        'name' => $name,
                        'email' => $email,
                        'phone' => $phone,
                        'password' => $hash,
                        'address' => $address
                    );
                    $this->db->update('clientmaster', $data, "sno = $sno"); // return 1 if user successfully submit in database table user
                    echo "3";
                }
            }
        }
    }

    public function editDetailsFill($data)
    {
        $sno = $data['edit_id'];
        $result = $this->db->select('*')->from('clientmaster')->where('sno', $sno)->get();
        $name = $result->result()[0]->client_name;
        $email = $result->result()[0]->email;
        $phone = $result->result()[0]->phone;
        $password = $result->result()[0]->password;
        $address = $result->result()[0]->address;
        return array('client_name' => $name, 'email' => $email, 'phone' => $phone, 'password' => $password, 'address' => $address, 'sno' => $sno);
    }

    public function deleteInvoice($data)
    {
        $sno = $data['delete_id'];

        $userExistInDB = $this->db->select('*')->from('main_invoice')->where('client_id', $sno)->get()->num_rows();
        if ($userExistInDB) {
            echo "5";
        } else {

            $this->db->where('sno', $sno);
            $this->db->delete('clientmaster');
            echo "4";
        }
    }
}
