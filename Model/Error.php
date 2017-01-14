<?php

Class Error {
    public $errno;
    public $errstr;
    public $errfile;
    public $errline;

    function __construct() {
       
    }

    public static function all_error($errno,$errstr,$errfile,$errline) {
        $this->errno   = $errno;
        $this->errstr  = $errstr;
        $this->errfile = $errfile;
        $this->errline = $errline;
        switch($errno) {
            case E_USER_ERROR:
            case E_USER_WARNING:
            case E_USER_NOTICE :
            default:
                $msg = "<h1>{$errno} - {$errstr} in file: {$errfile} at line: {$errline}</h1>/r/n";
                if(isset($_SESSION['debug']) && $_SESSION['debug'] == '1') {
                   echo $msg;
                }
                error_log($msg);
        }
        // prevents execution of PHP internal error handler
        return true;
    }

}
