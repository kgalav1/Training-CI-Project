<?php
class Item_Model extends CI_Model
{

    public function pagination($data)
    {
        $sname = $data['name'];
        $limit = $data['limit'];
        $sort_field = $data['sort_field'];
        $sort_type = $data['sort_type'];
        $page = isset($data['page']) ? $data['page'] : '1';
        $offset = ($page - 1) * $limit;

        $search = $this->db->select('*')->from('itemmaster')->where(1, 1)->like('name', $sname)->limit($limit, $offset)->order_by($sort_field, $sort_type)->get();
        $searchresult = $search->result();
        $count_row = $search->num_rows($search);

        $total = $this->db->select('*')->from('itemmaster')->get()->num_rows();

        return  array('rows' => $searchresult, 'count' => $count_row, 'total' => $total, 'limit' => $limit, 'page' => $page, 'offset' => $offset);
    }


    public function addUpdate($data, $image)
    {
        $name = $data['name'];
        $desc = $data['desc'];
        $price = $data['price'];
        $destination = $image['upload_data']['file_name'];
        // print_r($data);die;

        if ($data["form_action"] == "insert") {
            $data = array(
                'name' => $name,
                'desc' => $desc,
                'price' => $price,
                'image' => $destination
            );
            $this->db->insert('itemmaster', $data); // return 1 if user successfully submit in database table user
            echo "2";
        } else {

            $sno = $data['snoEdit'];
            $data = array(
                'name' => $name,
                'desc' => $desc,
                'price' => $price,
                'image' => $destination
            );
            $this->db->update('itemmaster', $data, "sno = $sno"); // return 1 if user successfully submit in database table user
            echo "3";
        }
    }



    public function editDetailsFill($data)
    {
        $sno = $data['edit_id'];
        $result = $this->db->select('*')->from('itemmaster')->where('sno', $sno)->get();
        $name = $result->result()[0]->name;
        $desc = $result->result()[0]->desc;
        $price = $result->result()[0]->price;
        $image = $result->result()[0]->image;
        return array('name' => $name, 'desc' => $desc, 'price' => $price, 'image' => $image, 'sno' => $sno);
    }

    public function deleteItem($data)
    {
        $sno = $data['delete_id'];

        $userExistInDB = $this->db->select('*')->from('invoice_item')->where('item_id', $sno)->get()->num_rows();
        if ($userExistInDB) {
            echo "5";
        } else {

            $this->db->where('sno', $sno);
            $this->db->delete('itemmaster');
            echo "4";
        }
    }
}
