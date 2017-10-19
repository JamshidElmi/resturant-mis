<?php
/**
*  MY Base Model Class
*/
class MY_Model extends CI_Model
{

    protected $_table_name = '';
    protected $_primary_key = '';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    protected $_timestamps = FALSE;

    // Select Single / all function
    public function data_get($id = NULL, $single = FALSE){
        if ($id != NULL) {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->where($this->_primary_key, $id);
            $method = 'row';
        }
        elseif ($single == TRUE) {
            $method = 'row';
        }
        else {
            $method = 'result';
        }

        if (!count($this->_order_by)) {
            $this->db->order_by($this->_order_by);
        }
        return $this->db->get($this->_table_name)->$method();
    }

    // Select function by Condations
    public function data_get_by($where, $single = FALSE){
        $this->db->where($where);
        return $this->data_get(null, $single);
    }

    // Save function (insert | Update) method
    public function data_save($data, $id = NULL){
        //Set timestamp
        if ($this->_timestamps == TRUE) {
            $now = date();
            $id || $data['created'] = $now;
            $data['modified'] = $now;
        }
        // Insert
        if ($id === NULL) {
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
            $this->db->set($data);
            $this->db->insert($this->_table_name);
            $id = $this->db->insert_id();
        }
        // Update
        else {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->set($data);
            $this->db->update($this->_table_name);
        }
        return $id;
    }

    // Delete function by ID
    public function data_delete($id){
        $filter = $this->_primary_filter;
        $id = $filter($id);
        if (!$id) {
            return FALSE;
        }
        $this->db->where($this->_primary_key , $id);
        $this->db->limit(1);
        return $this->db->delete($this->_table_name);
    }

}
 ?>