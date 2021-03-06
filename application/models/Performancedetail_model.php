<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Performancedetail_model extends CI_Model
{

    public $table = 'performancedetail';
    public $id = 'RowID';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
/*
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
*/  
return $this->db->query("
select 
b.EmployeeName,
b.EmployeeStatus,
b.EmployeeGrade,
c.EmployeeName as SPV,
d.SalesCenterName,
e.AgencyName,

a.*
    FROM PerformanceDetail a
LEFT JOIN Employee b ON a.Parameter6=b.EmployeeNewCode
LEFT JOIN Employee c ON b.ParentEmployeeID=c.EmployeeID
LEFT JOIN AgencySalesCenter d ON a.Parameter5=d.SalesCenterCode
LEFT JOIN Agency e ON d.AgencyID=e.AgencyID

")->result();

    }

	
//get all by batch
    function get_all_by_batch($BatchID)
    {
/*
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
*/  
return $this->db->query("
select 
b.EmployeeName,
b.EmployeeStatus,
b.EmployeeGrade,
c.EmployeeName as SPV,
d.SalesCenterName,
e.AgencyName,

a.*
    FROM PerformanceDetail a
LEFT JOIN Employee b ON a.Parameter6=b.EmployeeNewCode
LEFT JOIN Employee c ON b.ParentEmployeeID=c.EmployeeID
LEFT JOIN AgencySalesCenter d ON a.Parameter5=d.SalesCenterCode
LEFT JOIN Agency e ON d.AgencyID=e.AgencyID
WHERE BatchID='$BatchID'
")->result();

    }



	
	
    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('RowID', $q);
    $this->db->or_like('BatchID', $q);
    $this->db->or_like('ApplicationSource', $q);
    $this->db->or_like('AsOfDate', $q);
    $this->db->or_like('CustomerName', $q);
    $this->db->or_like('CustomerBirthDate', $q);
    $this->db->or_like('Parameter1', $q);
    $this->db->or_like('Parameter2', $q);
    $this->db->or_like('Parameter3', $q);
    $this->db->or_like('Parameter4', $q);
    $this->db->or_like('Parameter5', $q);
    $this->db->or_like('Parameter6', $q);
    $this->db->or_like('Parameter7', $q);
    $this->db->or_like('Parameter8', $q);
    $this->db->or_like('Parameter9', $q);
    $this->db->or_like('Parameter10', $q);
    $this->db->or_like('Parameter11', $q);
    $this->db->or_like('Parameter12', $q);
    $this->db->or_like('Parameter13', $q);
    $this->db->or_like('Parameter14', $q);
    $this->db->or_like('Parameter15', $q);
    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('RowID', $q);
    $this->db->or_like('BatchID', $q);
    $this->db->or_like('ApplicationSource', $q);
    $this->db->or_like('AsOfDate', $q);
    $this->db->or_like('CustomerName', $q);
    $this->db->or_like('CustomerBirthDate', $q);
    $this->db->or_like('Parameter1', $q);
    $this->db->or_like('Parameter2', $q);
    $this->db->or_like('Parameter3', $q);
    $this->db->or_like('Parameter4', $q);
    $this->db->or_like('Parameter5', $q);
    $this->db->or_like('Parameter6', $q);
    $this->db->or_like('Parameter7', $q);
    $this->db->or_like('Parameter8', $q);
    $this->db->or_like('Parameter9', $q);
    $this->db->or_like('Parameter10', $q);
    $this->db->or_like('Parameter11', $q);
    $this->db->or_like('Parameter12', $q);
    $this->db->or_like('Parameter13', $q);
    $this->db->or_like('Parameter14', $q);
    $this->db->or_like('Parameter15', $q);
    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Performancedetail_model.php */
/* Location: ./application/models/Performancedetail_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-28 06:48:32 */
/* http://harviacode.com */