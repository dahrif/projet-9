<?php
$appointment_actions = $this->recommended_actions;
$appointment_actions_todo = get_option('recommending_actions', false);
?>
<div id="recommended_actions" class="appointment-tab-pane panel-close">
    <div class="action-list">
        <?php if ($appointment_actions): foreach ($appointment_actions as $key => $appointment_actionValue): ?>
                <div class="action" id="<?php echo esc_attr($appointment_actionValue['id']);?>">
                    <div class="recommended_box col-md-6 col-sm-6 col-xs-12">
                        <img width="772" height="180" src="<?php echo APPOINTMENT_TEMPLATE_DIR_URI . '/images/' . str_replace(' ', '-', strtolower($appointment_actionValue['title'])) . '.png'; ?>">
                        <div class="action-inner">
                            <h3 class="action-title"><?php echo esc_html($appointment_actionValue['title']); ?></h3>
                            <div class="action-desc"><?php echo esc_html($appointment_actionValue['desc']); ?></div>
                            <?php echo wp_kses_post($appointment_actionValue['link']); ?>
                            <div class="action-watch">
                                <?php if (!$appointment_actionValue['is_done']): ?>
                                    <?php if (!isset($appointment_actions_todo[$appointment_actionValue['id']]) || !$appointment_actions_todo[$appointment_actionValue['id']]): ?>
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
            <?php endforeach;
        endif; ?>
    </div>
</div>