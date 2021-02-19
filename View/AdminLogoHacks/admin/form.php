<?php
/**
 * [Admin Logo Hack] ログイン画像置換 ビュー
 *
 * @copyright  Copyright 2021 - , tecking
 * @link       https://github.com/tecking
 * @package    tecking.bcplugins.admin_logo_hacks
 * @since      baserCMS v 4.3.7.1
 * @version    1.0.0
 * @license    MIT License
 */
?>
<style>
.alh-description {
	margin-bottom: 10px;
	padding-bottom: 10px;
	border-bottom: 1px solid #eeeeea;
}
.bca-file__figure {
	margin-top: 10px;
}
</style>
<div class="bca-main__contents clearfix">
	<div class="alh-description">
		<p>ログイン画面に表示するロゴ画像をアップロードしてください。管理画面のテーマによって推奨サイズが異なります。</p>
		<ul>
			<li>admin-third … 横 460px / 縦 90px</li>
			<li>admin-second … 横 306px / 縦 60px</li>
		</ul>
	</div>
	
	<?php echo $this->BcForm->create('AdminLogoHack', ['type' => 'file']) ?>
	<?php echo $this->BcForm->hidden('AdminLogoHack.id', ['value' => $this->data['AdminLogoHack']['id']]) ?>
	<table class="form-table bca-form-table">
		<tr>
			<th class="bca-form-table__label">ログイン画面のロゴ画像</th>
			<td class="bca-form-table__input"><?php echo $this->BcForm->input('AdminLogoHack.file', ['type' => 'file', 'link' => false, 'width' => 300]) ?></td>
		</tr>
	</table>
	<div class="submit bca-actions">
		<?php echo $this->BcForm->button('保存', [
			'type' => 'submit',
			'id' => 'BtnSave',
			'div' => false,
			'class' => 'button bca-btn',
			'data-bca-btn-type' => 'save',
			'data-bca-btn-size' => 'lg',
			'data-bca-btn-width' => 'lg'
		])
		?>
	</div>
	<?php echo $this->BcForm->end() ?>
</div>