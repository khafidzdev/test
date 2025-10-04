<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$defaultDbPath = APPPATH . 'database/database.sqlite';

$db['default'] = array(
    'dsn'      => 'sqlite:' . $defaultDbPath,
    'hostname' => '',
    'username' => '',
    'password' => '',
    'database' => '',
    'dbdriver' => 'pdo',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt'  => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);
