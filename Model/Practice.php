<?php

//namespace OzCrud\Model;

//use OzCrud\User;

Class Practice extends Database {

    public $table_name = 'practice';
    public $fields;

    function __construct() {
        parent::__construct();
        if ($this->db === false) {
            error_log(__METHOD__ . ' Database connection failed: ');
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

    public function get_by_name($pname) {
        if ($pname != '' && strlen($pname) > 0) {
            $sql = "SELECT * FROM `{$this->table_name}` WHERE `pname` = '" . $pname . "' LIMIT 1";
            $result = $this->db->query($sql);
            if ($result == false) {
                error_log(__METHOD__ . 'ERROR mysqli query : ' . $sql);
                return false;
            }
            return $result->fetch_assoc();
        } else {
            error_log(__METHOD__ . 'ERROR invalid input : ');
            return false;
        }
    }

    public function get_practices($user_id) {
        if ($user_id == 0 || $user_id == '') {
            return [];
        }
        $userObj = new User();
        $user = $userObj->get($user_id);
        if (isset($user['role']) && $user['role'] == 'admin') {
            $sql = "SELECT * FROM `{$this->table_name}` ORDER BY id DESC";
        } else {
            $sql = "SELECT * FROM `{$this->table_name}` WHERE `user_id` = {$user_id} ORDER BY id DESC";
        }
        $result = $this->db->query($sql);
        if ($result === false) {
            error_log(__METHOD__ . 'ERROR mysqli query : ' . $sql);
            return false;
        }
        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function get_by_region($region) {
        if ($region == '') {
            error_log(__METHOD__ . 'ERROR invalid region : ');
            return false;
        }
        $sql = "SELECT * FROM `{$this->table_name}` WHERE `region` = '{$region}' ORDER BY pname";
        $result = $this->db->query($sql);
        if ($result === false) {
            error_log(__METHOD__ . 'ERROR mysqli query : ' . $sql);
            return false;
        }
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

}
