<?php
	// Register and load the widget
	function appointment_info_callout() {
	    register_widget( 'appointment_info_widget' );
	}
	add_action( 'widgets_init', 'appointment_info_callout' );

// Creating the widget
	class appointment_info_widget extends WP_Widget {
	 
	function __construct() {
		parent::__construct(
			'appointment_info_callout', // Base ID
			esc_html__('WBR : Info Widget','appointment'), // Widget Name
			array(
				'classname' => 'appointment_info_widget',
				'description' => esc_html__('Appointment theme information widget','appointment'),
			),
			array(
				'width' => 600,
			)
		);
		
	 }
	
	public function widget( $args, $instance ) {
	
	echo $args['before_widget']; ?>
	<div class="contact-area">
		<div class="media">
			<div class="contact-icon">
				<?php if(!empty($instance['fa_icon'])) { ?>
                            <i class="fa <?php echo esc_attr( $instance['fa_icon'] ); ?>"></i>
				<?php } else { ?> 
				<i class="fa fa-mobile"></i>
				<?php } ?>
			</div>
			<div class="media-body">
				<?php if(!empty($instance['title'])) { ?>
				<h6><?php echo esc_html( $instance['title'] ); ?></h6>
				<?php } else { ?> 
				<h6><?php echo esc_html__('Lorem Ipsum? dolor sit','appointment'); ?></h6>
				<?php } ?>
				<?php if(!empty($instance['description'])) { ?>
				<h4><?php echo wp_kses_post($instance['description']); ?></h4>
				<?php } else { ?> 
				<h4><?php echo esc_html__('+99 999 999 99','appointment'); ?></h4>
				<?php } ?>
			</div>
		</div>
	</div>

	<?php
	echo $args['after_widget'];
	}
	         
	// Widget Backend
	public function form( $instance ) {
	if ( isset( $instance[ 'title' ])){
	$title = $instance[ 'title' ];
	}
	else {
	$title = esc_html__('Lorem Ipsum? dolor sit','appointment' );
	}
	if ( isset( $instance[ 'fa_icon' ])){
	$fa_icon = $instance[ 'fa_icon' ];
	}
	else {
	$fa_icon =  'fa fa-phone';
	}
	if ( isset( $instance[ 'description' ])){
	$description = $instance[ 'description' ];
	}
	else {
	$description = esc_html__('+99 999 999 99','appointment');
	}

	// Widget admin form
	?>
	
	<h4 for="<?php echo esc_attr( $this->get_field_id( 'title' )) ; ?>"><?php esc_html_e('Title','appointment' ); ?></h4>
	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php if($title) echo esc_attr( $title ); else esc_attr_e( 'Lorem Ipsum? dolor sit', 'appointment' );?>" />
	
	<h4 for="<?php echo esc_attr($this->get_field_id( 'fa_icon' )); ?>"><?php esc_html_e('FontAwesome icon','appointment' ); ?></h4>
	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'fa_icon' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'fa_icon' )); ?>" type="text" value="<?php if($fa_icon) echo esc_attr( $fa_icon ); else echo 'fa fa-phone';?>" />
	<span><?php esc_html_e('Link to get FontAwesome icon','appointment'); ?><a href="<?php echo esc_url('http://fortawesome.github.io/Font-Awesome/icons/');?>" target="_blank" ><?php echo 'fa-icon'; ?></a></span>
	
	<h4 for="<?php echo esc_attr( $this->get_field_id( 'description' )); ?>"><?php esc_html_e('Description','appointment' ); ?></h4>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' )); ?>" type="text" value="<?php if($description) echo esc_attr($description); else esc_attr_e( '+99 999 999 99','appointment' );?>" /><br><br>
	
	<?php
    }
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
	
	$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['fa_icon'] = ( ! empty( $new_instance['fa_icon'] ) ) ? sanitize_text_field( $new_instance['fa_icon'] ) : '';
		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? appointment_news_sanitize_html( $new_instance['description']) : '';
		
		return $instance;
	}
	}