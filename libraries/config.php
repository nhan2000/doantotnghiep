<?php
	if(!defined('LIBRARIES')) die("Error");
	/* Root */
	define('ROOT',__DIR__);
	/* Timezone */
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	/* Cấu hình coder */
	define('NN_MSHD','2583820w');
	define('NN_AUTHOR','nhan2000ts@gmail.com');
	/* Cấu hình chung */
	$config = array(
		'author' => array(
			'name' => 'Nhan Nguyen',
			'email' => 'nhan2000ts@gmail.com',
			'timefinish' => '2020'
		),
		'arrayDomainSSL' => array(), // 
		'database' => array(
			'server-name' => $_SERVER["SERVER_NAME"],
			'url' => '/doan/',
			'type' => 'mysql',
			'host' => 'localhost',
			'username' => 'root',
			'password' => '',
			'dbname' => 'real_bds',
			'port' => 3306,
			'prefix' => 'table_',
			'charset' => 'utf8'
		),
		'website' => array(
			'error-reporting' => false,
			'secret' => '$nina@',
			'salt' => 'swKJjeS!t',
			'debug-developer' =>true,
			'debug-css' => true,
			'debug-js' => true,
			'index' => false,
			'upload' => array(
				'max-width' => 1600,
				'max-height' => 1600
			),
			'lang' => array(
				'vi'=>'Tiếng Việt',
			),
			'lang-doc' => 'vi',
			'slug' => array(
				'vi'=>'Tiếng Việt',
			),
			'seo' => array(
				'vi'=>'Tiếng Việt',
			),
		),
		'order' => array(
			'ship' => false
		),
		'login' => array(
			'admin' => 'LoginAdmin'.NN_MSHD,
			'member' => 'LoginMember'.NN_MSHD,
			'attempt' => 5,
			'delay' => 15
		),
		'googleAPI' => array(
			'recaptcha' => array(
				'active' => false,
				'urlapi' => 'https://www.google.com/recaptcha/api/siteverify',
				'sitekey' => '6LdGV9UZAAAAAIc9wN9fqs_QingACNNK6S_lvjye',
				'secretkey' => '6LdGV9UZAAAAABHVbH4952UopXs_LeVDbtzb3-wn'
			)
		),
		'license' => array(
			'version' => "7.0.0",
		)
	);
	/* Error reporting */
	error_reporting(($config['website']['error-reporting']) ? E_ALL : 0);
	/* Cấu hình base */
	require_once LIBRARIES."checkSSL.php";
	$http = $Protocol;
	// $http = 'http://';
	$config_url = $config['database']['server-name'].$config['database']['url'];
	$config_base = $http.$config_url;
	/* Cấu hình login */
	$login_admin = $config['login']['admin'];
	$login_member = $config['login']['member'];
	/* Cấu hình upload */
	require_once LIBRARIES."constant.php";
?>