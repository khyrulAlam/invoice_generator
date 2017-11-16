<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_Model extends CI_Model
{
	public function insert_bill_info($json){
		$this->db->insert('invoice_data', $json);
	}
	public function bill(){
		$this->db->select('*');
		$this->db->from('invoice_data');
		$query = $this->db->get();
		return $result = $query->result();
	}

	public function Bill_paid_info($id){
		$this->db->set('invoice_status', 1);
		$this->db->where('invoice_id', $id);
		$this->db->update('invoice_data');
	}
	public function single_bill($id){
		$this->db->select('*');
		$this->db->from('invoice_data');
		$this->db->where('invoice_id', $id);
		$query = $this->db->get();
		return $result = $query->row();
	}
	public function bill_edit_infoId($json,$id){
		$this->db->where('invoice_id',$id);
        $this->db->update('invoice_data',$json);
	}

	public function last_row_count(){
		$result = $this->db->count_all_results('invoice_data');
		return $result;
	}
}
