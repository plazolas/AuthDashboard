<?php

/**
 * Oswald Plazola
 */
/**
 * Class Config.
 *
 * Reads and loads database configuration from db_config file.
 */

//namespace Model\Config;

Class Config {

    public $server = '';
    public $user = '';
    public $password = '';
    public $database = '';

    function __construct() {
        if(file_exists(__DIR__.'/../../dbConfig.php')){
            $config_json = file_get_contents(__DIR__ . '/../../dbConfig.php');
            $config = json_decode($config_json);
        } else {
            throw new Exception("Missing configuration file");
            trigger_error('Missing dbConfig file: ', E_USER_ERROR);
        }
            $this->server   = $config->server;
            $this->user     = $config->user;
            $this->password = $config->password;
            $this->database = $config->database;
    }
}
