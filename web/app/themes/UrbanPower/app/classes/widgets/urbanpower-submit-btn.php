<?php

/******* Urban Power Submit Button *******/

class urbanpower_submit_button extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'urbanpower_submit_button', // Base ID
			esc_html__( 'Urban Power Submit Button', 'urbanpower' ), // Name
			array( 
				'classname'	=> 'urbanpower_submit_button',
				'description' => esc_html__( 'Custom submit button widget', 'urbanpower' )
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
		$captcha_instance = new ReallySimpleCaptcha();
		$captcha_instance->bg = array( 0, 230, 230 );
		$word = $captcha_instance->generate_random_word();
		$prefix = mt_rand();
		$filename = $captcha_instance->generate_image( $prefix, $word );
		// $img_path = $captcha_instance->tmp_dir . '/' . $filename;
		// $img_path = str_replace('\\', '/', $img_path);

		$img_path = path_join(plugins_url() , 'really-simple-captcha/tmp/');
		$img_path .= $filename;
?>		
		<div class="captcha-wrapper">
			<div class="captcha clearfix">
				<label for="form-captcha">Please copy the verification text</label>
				<img name="form-captcha" src="<?php echo $img_path; ?>" alt="captcha">
				<input type="text" name="captcha" class="form-control" required>
			</div>
		</div>
		<button type="submit" class="btn form-submit-btn"><?php echo $instance['name'] ?></button>
<?php	
}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$name = ! empty( $instance['name'] ) ? $instance['name'] : esc_html__( 'Submit', 'urbanpower' );

		?>


		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>"><?php esc_attr_e( 'Name:', 'urbanpower' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'name' ) ); ?>" type="text" value="<?php echo esc_attr( $name ); ?>">
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
		$instance['name'] = ( ! empty( $new_instance['name'] ) ) ? sanitize_text_field( $new_instance['name'] ) : '';

		return $instance;
	}

}