<?php  
$appointee_actions = $this->recommended_actions;
$appointee_actions_todo = get_option( 'recommending_actions', false );
?>
<div id="recommended_actions" class="appointee-tab-pane panel-close">
	<div class="action-list">
		<?php if($appointee_actions): foreach ($appointee_actions as $appointee_key => $appointee_actionValue): ?>
		<div class="action" id="<?php echo esc_attr($appointee_actionValue['id']); ?>">
			<div class="recommended_box col-md-6 col-sm-6 col-xs-12">
				<img width="772" height="180" src="<?php echo esc_url(APPOINTEE_TEMPLATE_DIR_URI.'/images/'.str_replace(' ', '-', strtolower($appointee_actionValue['title'])).'.png');?>">
				<div class="action-inner">
					<h3 class="action-title"><?php echo esc_html($appointee_actionValue['title']); ?></h3>
					<div class="action-desc"><?php echo esc_html($appointee_actionValue['desc']); ?></div>
					<?php echo wp_kses_post($appointee_actionValue['link']); ?>
					<div class="action-watch">
						<?php if(!$appointee_actionValue['is_done']): ?>
							<?php if(!isset($appointee_actions_todo[$appointee_actionValue['id']]) || !$appointee_actions_todo[$appointee_actionValue['id']]): ?>
								<span class="dashicons dashicons-visibility"></span>
							<?php else: ?>
								<span class="dashicons dashicons-hidden"></span>
							<?php endif; ?>
						<?php else: ?>
							<span class="dashicons dashicons-yes"></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; endif; ?>
	</div>
</div>