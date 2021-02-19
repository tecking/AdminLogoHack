<?php
/**
 * [Admin Logo Hack] ログイン画像置換 データベーススキーマ
 *
 * @copyright  Copyright 2021 - , tecking
 * @link       https://github.com/tecking
 * @package    tecking.bcplugins.admin_logo_hacks
 * @since      baserCMS v 4.3.7.1
 * @version    1.0.0
 * @license    MIT License
 */
class AdminLogoHacksSchema extends CakeSchema {

	public $file = 'admin_logo_hacks.php';

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $admin_logo_hacks = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'file' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		)
	);

}
