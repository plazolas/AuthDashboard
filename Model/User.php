<?php
//namespace Model;

Class User extends Database {

    public $table_name = 'user';
    public $fields;

    function __construct() {
        parent::__construct();
        if ($this->db === false) {
            error_log(__METHOD__ . ' Database connection failed: ');
            return false;
        }
        $sql = "SELECT * FROM {$this->table_name} WHERE `id` > 1 LIMIT 1";
        $result = $this->db->query($sql);
        $fields = $result->fetch_fields();
        $fields_arr = array();
        foreach ($fields as $field) {
            $fields_arr[] = $field->name;
        }
        $this->fields = $fields_arr;
    }

    function get_by_practice($practice) {
        if ($practice == '' || strlen($practice) == 0) {
            error_log(__METHOD__ . ' ERROR Invalid Practtice id : ' . $practice);
            return false;
        }
        $sql = "SELECT * FROM `{$this->table_name}` WHERE `practice`  = '" . $practice . "'";
        $result = $this->db->query($sql);
        if ($result == false) {
            error_log(__METHOD__ . ' ERROR mysqli query : ' . $sql);
            return false;
        }
        return $result->fetch_assoc();
    }
    
    function get_by_pid($pid) {
        if ($pid == 0) {
            error_log(__METHOD__ . ' ERROR Invalid Practtice id : ' . $practice);
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

    public function register_user($auth_id, stdClass $obj) {
        
        $uid = $this->create($obj);
        if ($uid === false) {
            error_log(__METHOD__ . ' ERROR unable to create user: ');
            return false;
        }
        if ($uid != $auth_id) {
            $sql = "UPDATE `users` SET `id` = " . $uid . " WHERE `id` = " . $auth_id;
            $result = $this->db->query($sql);
            if ($result === false) {
                error_log(__METHOD__ . ' DB ERROR unable to register user: ');
                return false;
            }
        }
        return $auth_id;
    }

    public function update_registered($uid, stdClass $obj) {
        if($uid == '' || $uid == 0) {
            error_log(__METHOD__ . ' unable to update user: ');
            return false;
        }
        $obj->id = $uid;
        $result = $this->update($obj);
        if ($result === false) {
            error_log(__METHOD__ . ' unable to update user: ');
            return false;
        }
    }
    
    public function update_authid($uid, $auth_id) {
        
        if ($uid != $auth_id) {
            $sql = "UPDATE `users` SET `id` = " . $uid . " WHERE `id` = " . $auth_id;
            $result = $this->db->query($sql);
            if ($result === false) {
                error_log(__METHOD__ . ' DB ERROR ids in table users: ');
                return false;
            }
        }
    }
    
    public function delete_user($id) {
        
            if ($id == '' || $id == 0) {
                return true;
            }
            $sql = " DELETE FROM `users` WHERE `id` = " . $id;
            $result = $this->db->query($sql);
            if ($result === false) {
                error_log(__METHOD__ . ' DB ERROR unable to delete in users: ');
                return false;
            }
            $this->delete($id);
     
    }

    public function workarea() {
        //$sql = "UPDATE users SET password = SHA1('y6u7i8o9')  WHERE id= 52";
        //$result = $this->db->query($sql);
        //if ($result === false) {
        //die(__METHOD__ . 'ERROR workarea sql  : ' . $sql);
        //}
        //$result = exec("chmod 777 /var/php_sessions");
        //print_r($result);
    }

}
