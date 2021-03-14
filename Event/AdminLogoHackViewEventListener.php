<?php
/**
 * [Admin Logo Hack] ログイン画像置換 ビューイベントリスナー
 *
 * @copyright  Copyright 2021 - , tecking
 * @link       https://github.com/tecking
 * @package    tecking.bcplugins.admin_logo_hacks
 * @since      baserCMS v 4.3.7.1
 * @version    1.0.0
 * @license    MIT License
 */
class AdminLogoHackViewEventListener extends BcViewEventListener {

	/**
	 * イベント
	 *
	 * @var array
	 */
	public $events = ['Users.afterLayout'];

	/**
	 * ビュー
	 *
	 * @param CakeEvent $event
	 * @return void
	 */
	public function usersAfterLayout(CakeEvent $event) {

		/**
		 * 管理画面でなければ処理しない
		 */
		if (!BcUtil::isAdminSystem()) {

			return;

		}

		$View = $event->subject();

		$Model = ClassRegistry::init('AdminLogoHack.AdminLogoHack');
		$row = $Model->find('first');
		$value = $row['AdminLogoHack']['file'];

		$content = $View->Blocks->get('content');

		/**
		 * データベースからファイル名を取得して HTML タグを生成
		 */
		$html = $View->BcUpload->fileLink('AdminLogoHack.AdminLogoHack.file', ['imgsize' => '', 'value' => $value, 'link' => false]);

		/**
		 * 管理画面のテーマ判定
		 */
		if ($View->viewVars['siteConfig']['admin_theme'] === 'admin-third') {

			preg_match('/img src="(.+?)"/', $View->BcBaser->getImg('admin/logo_large.png'), $search);

		} else {

			preg_match('/img src="(.+?)"/', $View->BcBaser->getImg('/img/admin/logo_header.png'), $search);

		}

		/**
		 * ロゴ画像が設定されていれば置換
		 */
		preg_match('/img src="(.+?)"/', $html, $replace);
		if (!empty($search[1]) && !empty($replace[1])) {

			$content = str_replace($search[1], $replace[1], $content);

		}

		$View->Blocks->set('content', $content);

	}
	
}
