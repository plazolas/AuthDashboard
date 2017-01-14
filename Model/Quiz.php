<?php

Class Quiz extends Database {

    public $table_name = 'quiz';
    public $fields;

    function __construct() {
        parent::__construct();
        if ($this->db === false) {
            error_log(__METHOD__ . ' Database connection failed: ');
            return false;
        }
        $sql = "SELECT * FROM {$this->table_name} WHERE id > 1 LIMIT 1";
        $result = $this->db->query($sql);
        $fields = $result->fetch_fields();
        $fields_arr = array();
        foreach ($fields as $field) {
            $fields_arr[] = $field->name;
        }
        $this->fields = $fields_arr;
    }

    function get_answers() {
        $sql = "SELECT * FROM `{$this->table_name}` WHERE `id` = 1";
        $result = $this->db->query($sql);
        if ($result == false) {
            error_log(__METHOD__ . 'ERROR mysqli query : ' . $sql);
            return false;
        }
        return $result->fetch_assoc();
    }

    function get_by_practice($pid) {
        if ($pid == '' || strlen($pid) == 0) {
            error_log(__METHOD__ . 'ERROR Invalid Practtice id : ', E_USER_WARNING);
            return false;
        }
        $sql = "SELECT * FROM `{$this->table_name}` WHERE `pid`  = '" . $pid . "'";
        $result = $this->db->query($sql);
        if ($result == false) {
            error_log(__METHOD__ . 'ERROR mysqli query : ' . $sql);
            return false;
        }
        return $result->fetch_assoc();
    }

}
