<?php if (!defined('UPDRAFTPLUS_DIR')) die('No direct access allowed'); ?>

<div class="updraft-ad-container updated">
	<div class="updraft_notice_container">
		<div class="updraft_advert_content_left">
			<img src="<?php echo esc_url(UPDRAFTPLUS_URL.'/images/'.$image);?>" width="60" height="60" alt="<?php esc_attr_e('notice image', 'updraftplus');?>" />
		</div>
		<div class="updraft_advert_content_right">
			<h3 class="updraft_advert_heading">
				<?php
					if (!empty($prefix)) echo esc_html($prefix).' ';
					echo esc_html($title);
				?>
				<div class="updraft-advert-dismiss">
				<?php if (!empty($dismiss_time)) { ?>
					<a href="#" onclick="jQuery('.updraft-ad-container').slideUp(); jQuery.post(ajaxurl, {action: 'updraft_ajax', subaction: '<?php echo esc_js($dismiss_time);?>', nonce: '<?php echo esc_js(wp_create_nonce('updraftplus-credentialtest-nonce'));?>' });"><?php esc_html_e('Dismiss', 'updraftplus'); ?></a>
				<?php } else { ?>
					<a href="#" onclick="jQuery('.updraft-ad-container').slideUp();"><?php esc_html_e('Dismiss', 'updraftplus'); ?></a>
				<?php } ?>
				</div>
			</h3>
			<p>
				<?php
					echo wp_kses_post($text);

					if (isset($discount_code)) echo ' <b>'.esc_html($discount_code).'</b>';
					
					if (!empty($button_link) && (!empty($button_meta) || !empty($button_text))) {
				?>
				<a class="updraft_notice_link" href="<?php echo esc_attr(apply_filters('updraftplus_com_link', $button_link));?>"><?php
					global $updraftplus_admin;
					$updraftplus_admin->include_template(
						'wp-admin/notices/button-label.php',
						false,
						array(
							'button_meta' => isset($button_meta) ? $button_meta : '',
							'button_text' => isset($button_text) ? $button_text : ''
						)
					);
					?></a>
				<?php
					}
				?>
			</p>
		</div>
	</div>
	<div class="clear"></div>
</div>
