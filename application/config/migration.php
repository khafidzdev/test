<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['migration_enabled'] = TRUE;
$config['migration_type'] = 'sequential';
$config['migration_table'] = 'migrations';
$config['migration_auto_latest'] = FALSE;
$config['migration_version'] = 1; // Bump this when adding new migrations
$config['migration_path'] = APPPATH . 'migrations/';
