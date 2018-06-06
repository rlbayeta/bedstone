<?php

/****** Register Widgets ******/

function urbanpower_register_widgets() {
	register_widget('urbanpower_input_field');
	register_widget('urbanpower_text_area');
	register_widget('urbanpower_submit_button');
}
add_action('widgets_init', 'urbanpower_register_widgets');


/**** Include Widgets ****/

require_once('widgets/urbanpower-input-field.php');
require_once('widgets/urbanpower-text-area.php');
require_once('widgets/urbanpower-submit-btn.php');