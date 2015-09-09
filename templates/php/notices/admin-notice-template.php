<?php
$sBaseDirName = dirname(__FILE__).ICWP_DS;
?>
<div style="transition: all 0.5s ease;" id="<?php echo $unique_render_id;?>" class="<?php echo $notice_classes; ?> icwp-admin-notice notice is-dismissible notice-<?php echo $icwp_admin_notice_template; ?>">
	<?php require_once( $sBaseDirName.$icwp_admin_notice_template.'.php' ); ?>
</div>

<script type="text/javascript">
	jQuery(document).on(
		'click',
		'#<?php echo $unique_render_id; ?> button.notice-dismiss, #<?php echo $unique_render_id; ?> button.icwp-notice-dismiss',
		function() {
			$oContainer = jQuery('#<?php echo $unique_render_id; ?>');
			var requestData = {
				'action': 'icwp_DismissAdminNotice',
				'_ajax_nonce': '<?php echo $icwp_ajax_nonce; ?>',
				'hide': '1',
				'notice_id': '<?php echo $notice_attributes['notice_id']; ?>'
			};
			jQuery.get( ajaxurl, requestData );
			$oContainer.remove();
		}
	);
</script>