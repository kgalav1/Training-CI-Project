<?php
class Loginstatus_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function pagination($data)
    {
        $sname = $data['name'];
        $sloginstatus = $data['loginstatus'];
        $limit = $data['limit'];
        $sort_field = $data['sort_field'];
        $sort_type = $data['sort_type'];
        $page = isset($data['page']) ? $data['page'] : '1';
        $offset = ($page - 1) * $limit;

        // $array = array('u.id' => $sid, 'u.master' => $stype);
        // $array = array('u.id' => $sid, 'u.master' => $stype);

        $this->db->select('sno, name, is_login');
        $this->db->from('signupdetails');
        $this->db->where(1, 1);
        if (!empty($sname)) {
            $this->db->where('sno', $sname);
        }
        if ($sloginstatus == '0' || $sloginstatus == '1') {
           $this->db->where('is_login', $sloginstatus);
        }
        $this->db->limit($limit, $offset);
        $search = $this->db->order_by($sort_field, $sort_type)->get();
        // print_r($this->db->last_query());die;
        $searchresult = $search->result();
        $count_row = $search->num_rows($search);

        $total = $this->db->select('*')->from('signupdetails')->get()->num_rows();

        return  array('rows' => $searchresult, 'count' => $count_row, 'total' => $total, 'limit' => $limit, 'page' => $page, 'offset' => $offset);
    }

}
