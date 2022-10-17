<?php
class Logs_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function pagination($data)
    {
        $sid = $data['id'];
        $stype = $data['type'];
        $sname = $data['name'];
        $limit = $data['limit'];
        $sort_field = $data['sort_field'];
        $sort_type = $data['sort_type'];
        $page = isset($data['page']) ? $data['page'] : '1';
        $offset = ($page - 1) * $limit;

        $array = array('u.id' => $sid, 'u.master' => $stype, 's.name' => $sname);

        $search = $this->db->select('u.id, u.master, u.type, u.message, u.remote_ip, u.datetime, s.name')->from('userlogs u')->join('signupdetails s', 'u.user_id = s.sno', 'inner')->where(1, 1)->like($array)->limit($limit, $offset)->order_by($sort_field, $sort_type)->get();

        $searchresult = $search->result();
        $count_row = $search->num_rows($search);

        $total = $this->db->select('*')->from('userlogs')->get()->num_rows();

        return  array('rows' => $searchresult, 'count' => $count_row, 'total' => $total, 'limit' => $limit, 'page' => $page, 'offset' => $offset);
    }

}