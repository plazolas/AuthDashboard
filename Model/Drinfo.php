<?php

Class Drinfo extends Database {

    public $table_name = 'drinfo';
    public $fields;

    function __construct() {
        parent::__construct();
        $database = new Database();
        $this->db = $database->db;
        if ($this->db === false) {
            erro_log(__METHOD__ . ' Database connection failed: ');
            return false;
        }
        $sql = "SELECT * FROM {$this->table_name} WHERE 1=1 LIMIT 1";
        $result = $this->db->query($sql);
        $fields = $result->fetch_fields();
        $fields_arr = array();
        foreach ($fields as $field) {
            $fields_arr[] = $field->name;
        }
        $this->fields = $fields_arr;
    }

    function delete_by_parent($pid) {
        if ($pid == 0 || $pid == '') {
            return true;
        }
        $sql = "DELETE FROM `{$this->table_name}` WHERE `pid` = " . $pid;
        $result = $this->db->query($sql);
        if ($result == false) {
            erro_log(__METHOD__ . 'ERROR mysqli query : ' . $sql);
            return false;
        } else {
            return true;
        }
    }

    function get_by_parent($pid) {
        if ($pid != '' && strlen($pid) > 0) {
            $sql = "SELECT * FROM `{$this->table_name}` WHERE `pid` = '" . $pid . "'";
            $result = $this->db->query($sql);
            if ($result == false) {
                erro_log(__METHOD__ . 'ERROR mysqli query : ' . $sql);
                return false;
            }
            $rows = array();
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            erro_log(__METHOD__ . 'ERROR mysqli invalid input ', E_USER_WARNING);
            return false;
        }
    }

    function get_by_practice_drname($pid, $drname) {
        if ($pid == '' || strlen($pid) == 0 || $drname == '' || strlen($drname) == 0) {
            erro_log(__METHOD__ . 'ERROR mysqli query : ' . $sql);
            return false;
        }
        $sql = "SELECT * FROM `{$this->table_name}` WHERE `pid` = " . $pid . " AND drname = '".$drname."'";
        $result = $this->db->query($sql);
        if ($result == false) {
            erro_log(__METHOD__ . 'ERROR mysqli query : ' . $sql);
            return false;
        }
        return $result->fetch_assoc();
    }

}
