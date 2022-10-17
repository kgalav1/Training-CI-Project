<?php
class Invoice_Model extends CI_Model
{

    public function getInvoiceCount()
    {
        $count = $this->db->select('max(invoice_id) as max')->from('main_invoice')->get()->result_array();
        return $count;
    }

    public function clientAutofill($data)
    {
        $term = $data['search'];

        $search = $this->db->select('clientmaster.sno, clientmaster.client_name, clientmaster.email, clientmaster.phone, CONCAT_WS(",", clientmaster.address, states.name,cities.name) AS address')->from('clientmaster')->join('states', 'clientmaster.state=states.id', 'inner')->join('cities', 'clientmaster.city=cities.id', 'inner')->like('clientmaster.client_name', $term)->get()->result_array();
        // print_r($this->db->last_query());die;

        return $search;
    }

    public function itemAutofill($data)
    {
        $term = $data['search'];

        $search = $this->db->select('*')->from('itemmaster')->like('name', $term)->get()->result_array();

        return $search;
    }

    public function pagination($data)
    {
        $sid = $data['invoice_id'];
        $sname = $data['name'];
        $semail = $data['email'];
        $sphone = $data['phone'];
        $limit = $data['limit'];
        $sort_field = $data['sort_field'];
        $sort_type = $data['sort_type'];
        $page = isset($data['page']) ? $data['page'] : '1';
        $offset = ($page - 1) * $limit;

        $array = array('invoice_id' => $sid, 'client_name' => $sname, 'email' => $semail, 'phone' => $sphone);


        $search = $this->db->select('main_invoice.invoice_id, clientmaster.client_name, clientmaster.email, clientmaster.phone, CONCAT_WS(",", clientmaster.address, states.name,cities.name) AS address, main_invoice.grand_total')->from('clientmaster')->join('states', 'clientmaster.state=states.id', 'inner')->join('cities', 'clientmaster.city=cities.id', 'inner')->join('main_invoice', 'main_invoice.client_id = clientmaster.sno', 'inner')->where(1, 1)->like($array)->limit($limit, $offset)->order_by($sort_field, $sort_type)->get();

        $searchresult = $search->result();
        $count_row = $search->num_rows($search);

        $total = $this->db->select('*')->from('main_invoice')->get()->num_rows();

        return  array('rows' => $searchresult, 'count' => $count_row, 'total' => $total, 'limit' => $limit, 'page' => $page, 'offset' => $offset);
    }


    public function addupdate($data)
    {
        $client_id = $data["asno"];
        $invoice_id = $data["number"];
        $invoice_date = $data["date"];
        $total_Amount = $data["tamount"];

        if ($data["form_action"] == "insert") {

            $client = array(
                'client_id' => $client_id,
                'grand_total' => $total_Amount,
                'invoice_date' => $invoice_date
            );

            $resp = $this->db->insert('main_invoice', $client);
            $last_id = $this->db->insert_id();
            if ($resp == 1) {
                foreach ($_POST['itemsno']  as $key => $val) {
                    $itemarr = array(
                        'item_id' => $val,
                        'item_price' => $_POST['itemprice'][$key],
                        'item_quantity' =>  $_POST['itemquantity'][$key],
                        'item_amount' => $_POST['itemamount'][$key],
                        'invoice_id' => $last_id
                    );
                    $this->db->insert('invoice_item', $itemarr);
                }
                echo "2";
            }
        } else {

            $id = $data['number'];
            $client = array(
                'client_id' => $data['asno'],
                'invoice_date' => $data['date'],
                'grand_total' => $data['tamount']
            );

            $resp = $this->db->update('main_invoice', $client, "invoice_id=$id");
            $this->db->delete('invoice_item', array("invoice_id" => $id));
            if ($resp == 1) {
                foreach ($data['itemsno']  as $key => $val) {
                    $itemarr = array(
                        'item_id' => $val,
                        'item_price' => $_POST['itemprice'][$key],
                        'item_quantity' =>  $_POST['itemquantity'][$key],
                        'item_amount' => $_POST['itemamount'][$key],
                        'invoice_id' => $id
                    );
                    $this->db->insert('invoice_item', $itemarr);
                }
            }
            echo "3";
        }
    }

    public function editDetailsFill($data)
    {

        $sno = $data['invoice_id'];

        $result = $this->db->select('main_invoice.client_id, main_invoice.invoice_id, main_invoice.invoice_date,clientmaster.client_name, clientmaster.email, clientmaster.phone, CONCAT_WS(",", clientmaster.address, states.name,cities.name) AS full_address, main_invoice.grand_total, invoice_item.item_id, invoice_item.item_price, invoice_item.item_quantity, invoice_item.item_amount, itemmaster.name')->from('main_invoice')->join('invoice_item', 'main_invoice.invoice_id=invoice_item.invoice_id', 'inner')->join('clientmaster', 'main_invoice.client_id = clientmaster.sno', 'inner')->join('states', 'clientmaster.state=states.id', 'inner')->join('cities', 'clientmaster.city=cities.id', 'inner')->join('itemmaster', 'invoice_item.item_id=itemmaster.sno', 'inner')->where('main_invoice.invoice_id', $sno)->get()->result();

        return array('responce' => $result);
    }


    public function getdetails($id)
    {
        
        $result = $this->db->select('main_invoice.client_id, main_invoice.invoice_id, main_invoice.invoice_date,clientmaster.client_name, clientmaster.email, clientmaster.phone, CONCAT_WS(",", clientmaster.address, states.name,cities.name) AS full_address, main_invoice.grand_total, invoice_item.item_id, invoice_item.item_price, invoice_item.item_quantity, invoice_item.item_amount, itemmaster.name')->from('main_invoice')->join('invoice_item', 'main_invoice.invoice_id=invoice_item.invoice_id', 'inner')->join('clientmaster', 'main_invoice.client_id = clientmaster.sno', 'inner')->join('states', 'clientmaster.state=states.id', 'inner')->join('cities', 'clientmaster.city=cities.id', 'inner')->join('itemmaster', 'invoice_item.item_id=itemmaster.sno', 'inner')->where('main_invoice.invoice_id', $id)->get()->result();
        // print_r($this->db->last_query());die;
        // print_r($result);die;

        return array('responce' => $result);
    }


    public function deleteuser($data)
    {
        $sno = $data['delete_id'];
        $this->db->where('sno', $sno);
        $this->db->delete('signupdetails');
        echo "4";
    }
}
