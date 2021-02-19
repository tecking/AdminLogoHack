<?php
/**
 * [Admin Logo Hack] ログイン画像置換 モデル
 *
 * @copyright  Copyright 2021 - , tecking
 * @link       https://github.com/tecking
 * @package    tecking.bcplugins.admin_logo_hacks
 * @since      baserCMS v 4.3.7.1
 * @version    1.0.0
 * @license    MIT License
 */
class AdminLogoHack extends AppModel {

	/**
	 * クラス名
	 *
	 * @var string
	 */
	public $name = 'AdminLogoHack';

	/**
	 * プラグイン名
	 *
	 * @var string
	 */
	public $plugin = 'AdminLogoHack';

	/**
	 * データベース接続設定
	 *
	 * @var string
	 */
	public $useDbConfig = 'plugin';

	/**
	 * ビヘイビア
	 *
	 * @var array
	 */
	public $actsAs = [
		'BcUpload' => [
			'saveDir' => 'uploads/admin_logo_hack',
			'fields' => [
				'file' => [
					'type' => 'image',
					'getUniqueFileName' => false
				]
			]
		]
	];

}