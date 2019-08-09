<?php

session_start();
define('BASEURL',$_SERVER['DOCUMENT_ROOT'].'/project/');
// Setting up variables
$GLOBALS['config'] = array(
	'mysql'	=> array(
		'host'		=> '127.0.0.1',
		'username'	=> 'root',
		'password'	=> '',
		'db'		=> 'project'
	)
);

// Autolaoding

spl_autoload_register(function($class)
{
	require_once BASEURL.'classes/' .$class. '.php';
});



