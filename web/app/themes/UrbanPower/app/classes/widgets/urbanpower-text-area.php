<?php

/******* Urban Power Input Field *******/

class urbanpower_text_area extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'urbanpower_text_area', // Base ID
			esc_html__( 'Urban Power Text Area', 'urbanpower' ), // Name
			array( 
				'classname'	=> 'urbanpower_text_area',
				'description' => esc_html__( 'Custom Widget that has text area', 'urbanpower' ), 
				'customize_selective_refresh' => true
			) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {

		$defaults = array('title' => '');

		$instance = wp_parse_args($instance, $defaults);

		$editor_id = 'urbanpower_form_message';

		echo $args['before_widget'];
			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			} 

			wp_editor('', $editor_id, $settings = array(
						'textarea_rows' => 10,
						'quicktags'		=> false,
						// 'tinymce'		=> true,
						'media_buttons'	=> false
						
			));

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'urbanpower' );
		$is_required = ! empty( $instance['is_required'] ) ? $instance['is_required'] : esc_html__( '', 'urbanpower' );

		?>


		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'urbanpower' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<!-- <p>
			<input type="checkbox" name="<?php echo esc_attr( $this->get_field_name( 'is_required' ) ); ?>" checked="<?php esc_attr( $is_required ) ?>">
		</p> -->
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		$instance['is_required'] = ( ! empty( $new_instance['is_required'] ) ) ? sanitize_text_field( $new_instance['is_required'] ) : '';

		return $instance;
	}

}