<?php
/**
 * [Admin Logo Hack] ログイン画像置換 コントローラー
 *
 * @copyright  Copyright 2021 - , tecking
 * @link       https://github.com/tecking
 * @package    tecking.bcplugins.admin_logo_hacks
 * @since      baserCMS v 4.3.7.1
 * @version    1.0.0
 * @license    MIT License
 */
class AdminLogoHacksController extends AppController {

	/**
	 * クラス名
	 *
	 * @var string
	 */
	public $name = 'AdminLogoHacks';

	/**
	 * モデル
	 *
	 * @var array
	 */
	public $uses = ['AdminLogoHack.AdminLogoHack'];

	/**
	 * コンポーネント
	 *
	 * @var array
	 */
	public $components = ['BcAuth', 'Cookie', 'BcAuthConfigure'];

	/**
	 * アップロード可能なファイルの拡張子
	 *
	 * @var array
	 */
	public $imgExts = ['gif', 'jpg', 'jpeg', 'jpe', 'jfif', 'png'];

	/**
	 * beforeFilter
	 *
	 * @return void
	 */
	public function beforeFilter() {

		parent::beforeFilter();
		$this->pageTitle = ('ログイン画像置換 設定');
		
	}

	/**
	 * 設定画面のアクション
	 *
	 * @return void
	 */
	public function admin_form() {

		/**
		 * パンくずリスト
		 */
		$this->crumbs = [
			[
				'name' => 'プラグイン管理',
				'url' => [
					'plugin' => '',
					'controller' => 'plugins',
					'action' => 'index'
				]
			],
			[
				'name' => 'ログイン画像置換 設定',
				'url' => [
					'plugin' => 'admin_logo_hack',
					'controller' => 'admin_logo_hacks',
					'action' => 'form'
				]
			]
		];

		/**
		 * ファイルが送信されていなければ、データベースからファイル名を取得
		 * ファイルが送信されていれば、データベースを更新
		 */
		if (!$this->data) {

			$this->data = $this->AdminLogoHack->find('first');

		} else {

			$this->AdminLogoHack->id = $this->data['AdminLogoHack']['id'];
			$pathInfo = pathinfo($this->data['AdminLogoHack']['file']['name']);
			if ($pathInfo['filename'] !== '') {

				$isImg = in_array($pathInfo['extension'], $this->imgExts);

			} else {

				$isImg = true;

			}

			/**
			 * submit 時の処理
			 * 画像ファイル以外のときはエラーメッセージ表示
			 */
			if ($isImg) {

				if ($this->AdminLogoHack->save($this->data)) {

					$this->BcMessage->setSuccess('ログイン画面の画像を設定しました。');

				} else {

					$this->BcMessage->setError('何らかの理由で保存できませんでした。');

				}

			} else {

				$this->BcMessage->setError('画像以外のファイルは設定できません。');
				
			}

			$this->redirect([
				'plugin' => 'admin_logo_hack',
				'controller' => 'admin_logo_hacks',
				'action' => 'form'
			]);
		}

	}

}