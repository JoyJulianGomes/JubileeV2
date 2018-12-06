<?php
class AdminModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getParticipantInfo($rid)
    {
        $this->db->select("regid,name, batch, total_amount, paid_amount, status");
        $this->db->where("regid", $rid);
        $this->db->from('userinfo');
        $query = $this->db->get();
        $rst = $query->result();
        return $rst[0];
    }
    
    public function getParticipantList($btch)
    {
        $this->db->select("regid, name, gender, batch, contact");
        $this->db->where("batch", $btch);
        $this->db->from('userinfo');
        $query = $this->db->get();
        $rst = $query->result();
        return $rst[0];
    }

}