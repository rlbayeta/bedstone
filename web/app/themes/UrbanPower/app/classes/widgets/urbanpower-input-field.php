<?php

/******* Urban Power Input Field *******/

class urbanpower_input_field extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'urbanpower_input_field', // Base ID
			esc_html__( 'Urban Power Input Field', 'urbanpower' ), // Name
			array( 
				'classname'	=> 'urbanpower_input_field',
				'description' => esc_html__( 'Custom Widget that has text input field ', 'urbanpower' ), 
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

		$defaults = array('title' => '', 'name' => '', 'is_required' => NULL);

		$instance = wp_parse_args($instance, $defaults);

		$instance['name'] = str_replace(' ', '-', strtolower(trim($instance['title'])));


		if (isset($instance['is_required'])) {
			$instance['is_required'] = 'required';
		}


		echo $args['before_widget'];

			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			} ?>
			
			<input type="text" name="<?php echo esc_attr($instance['name']); ?>" class="form-control" <?php echo esc_attr($instance['is_required']); ?>>						
	<?php

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
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( ' ', 'urbanpower' );

		$is_required = ! empty( $instance['is_required'] ) ? 'checked' : esc_html__( '', 'urbanpower' );

		$name = '';

		if (!empty($instance['name'])) {
			$name = $instance['name'];
		}
		if (isset($instance['title'])) {
			$name = str_replace(' ', '-', strtolower($instance['title']));
		}

		?>


		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'urbanpower' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'name' ) ) ?>">Slug</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'name' ) ) ?>" type="text" value="<?php echo esc_attr( $name ); ?>" disabled>
			<small class="label-color">The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</small>
		</p>

		<p>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'is_required' ) ) ?>" name="<?php echo esc_attr( $this->get_field_name( 'is_required' ) ) ?>" <?php checked( $is_required, 'on' ) ?> <?php echo $is_required; ?> >
		</p> 
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

		// $instance['is_required'] = ( ! empty( $new_instance['is_required'] ) ) ? sanitize_text_field( $new_instance['is_required'] ) : '';

		$instance['is_required'] = $new_instance['is_required'];

		$instance['name'] = ( ! empty( $new_instance['name'] ) ) ? sanitize_text_field( $new_instance['name'] ) : '';

		return $instance;
	}

}