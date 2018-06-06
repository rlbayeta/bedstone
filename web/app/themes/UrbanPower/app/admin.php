<?php

namespace App;
/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {

	// Add Customize Section for Header Banner in Homepage
    $wp_customize->add_section('urban_banner', [
    	'title' 		=> __('Homepage Banner', 'urbanpower'),
    	'priority' 		=> 129
    ]);

    $wp_customize->add_setting('urban_banner_heading', [
    	'default' 	=> _x('Digital Asset Exchange','urbanpower'),
    	'type'		=> 'theme_mod'
    ]);

    $wp_customize->add_control('urban_banner_heading',[
    	'label'		=> __('Banner Heading', 'urbanpower'),
    	'section'	=> 'urban_banner',
    	'priority'	=> 1
    ]);

    $wp_customize->add_setting('urban_banner_text', [
    	'default' 	=> _x('We are Ibinex based digital asset exchange offering maximum security and advanced trading features.','urbanpower'),
    	'type'		=> 'theme_mod'
    ]);

    $wp_customize->add_control('urban_banner_text',[
    	'type'		=> 'textarea',
    	'label'		=> __('Banner Text', 'urbanpower'),
    	'section'	=> 'urban_banner',
    	'priority'	=> 2
    ]);

    $wp_customize->add_setting('urban_content_alignment', [
    	'default' 	=> 'center',
    	'type'		=> 'theme_mod'
    ]);

    $wp_customize->add_control('urban_content_alignment',[
    	'label'		=> __('Content Alignment', 'urbanpower'),
    	'section'	=> 'urban_banner',
    	'type'		=> 'radio',
    	'choices'	=> [
			    		'left'	=> 'Left',
			    		'center'=> 'Center',
			    		'right' => 'Right'
				    ],
    	'priority'	=> 3
    ]);

    $wp_customize->add_setting('urban_banner_image', [
    	'default' 	=> get_bloginfo('template_directory') . '/assets/images/banner.jpg',
    	'type'		=> 'theme_mod'
    ]);

    $wp_customize->add_control(new \WP_Customize_Image_Control($wp_customize,'urban_banner_image',[
    	'label'		=> __('Banner Image', 'urbanpower'),
    	'section'	=> 'urban_banner',
    	'settings'	=> 'urban_banner_image',
    	'priority'	=> 4
    ]));

    $wp_customize->add_setting('urban_banner_height', [
    	'default' 	=> _x('500px','urbanpower'),
    	'type'		=> 'theme_mod'
    ]);

    $wp_customize->add_control('urban_banner_height',[
    	'label'		=> __('Banner Height (px)', 'urbanpower'),
    	'section'	=> 'urban_banner',
    	'type'		=> 'number',
    	'priority'	=> 5
    ]);
});

add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {

    // Add Customize Section for Custom Links of the Theme
    $wp_customize->add_section('urban_link_url', [
        'title'         => __('Site Custom Links', 'urbanpower'),
        'priority'      => 130
    ]);

    $wp_customize->add_setting('urban_login_url', [
        'default'   => _x('http://ibinex.net','urbanpower'),
        'type'      => 'theme_mod'
    ]);

    $wp_customize->add_control('urban_login_url',[
        'label'     => __('Login URL', 'urbanpower'),
        'section'   => 'urban_link_url',
        'priority'  => 1
    ]);

    $wp_customize->add_setting('urban_register_url', [
        'default'   => _x('http://ibinex.net','urbanpower'),
        'type'      => 'theme_mod'
    ]);

    $wp_customize->add_control('urban_register_url',[
        'label'     => __('Register URL', 'urbanpower'),
        'section'   => 'urban_link_url',
        'priority'  => 2
    ]);

    $wp_customize->add_setting('urban_contact_url', [
        'default'   => _x('http://ibinex.net','urbanpower'),
        'type'      => 'theme_mod'
    ]);

    $wp_customize->add_control('urban_contact_url',[
        'label'     => __('Contact Us URL', 'urbanpower'),
        'section'   => 'urban_link_url',
        'priority'  => 3
    ]);
});

add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {

    // Add Customize Section for Footer Settings
    $wp_customize->add_section('urban_footer', [
        'title'         => __('Footer Settings', 'urbanpower'),
        'priority'      => 131
    ]);

    $wp_customize->add_setting('urban_bg_color', [
        'default'   => '#131313',
        'type'      => 'theme_mod'
    ]);

    $wp_customize->add_control( new \WP_Customize_Color_Control( $wp_customize, 'urban_bg_color',[
            'label'      => __( 'Background Color', 'urbanpower' ),
            'section'    => 'urban_footer',
            'settings'   => 'urban_bg_color',
            'priority'   => 1
    ]));

    $wp_customize->add_setting('urban_footer_bg_image', [
        'default'   => '',
        'type'      => 'theme_mod'
    ]);

    $wp_customize->add_control(new \WP_Customize_Image_Control($wp_customize,'urban_footer_bg_image',[
        'label'     => __('Banner Image', 'urbanpower'),
        'section'   => 'urban_footer',
        'settings'  => 'urban_footer_bg_image',
        'priority'  => 2
    ]));

    $wp_customize->add_setting('urban_footer_alignment', [
        'default'   => 'left',
        'type'      => 'theme_mod'
    ]);

    $wp_customize->add_control('urban_footer_alignment',[
        'label'     => __('Footer Alignment', 'urbanpower'),
        'section'   => 'urban_footer',
        'type'      => 'radio',
        'choices'   => [
                        'left'  => 'Left',
                        'center'=> 'Center',
                        'right' => 'Right'
                    ],
        'priority'  => 3
    ]);
});

add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {

    // Add Customize Section for Social Media Links
    $wp_customize->add_section('urban_social_media', [
        'title'         => __('Social Media Links', 'urbanpower'),
        'description'   => __('Social Media Links which are located in the footer of the site.', 'urbanpower'),
        'priority'      => 132
    ]);

    $wp_customize->add_setting('urban_facebook_enable', [
        'default'   => 'true',
        'type'      => 'theme_mod'
    ]);

    $wp_customize->add_control('urban_facebook_enable',[
        'label'     => __('Enable Facebook', 'urbanpower'),
        'section'   => 'urban_social_media',
        'type'      => 'checkbox',
        'priority'  => 1
    ]);

    $wp_customize->add_setting('urban_facebook', [
        'default'   => 'http://facebook.com/',
        'type'      => 'theme_mod'
    ]);

    $wp_customize->add_control('urban_facebook',[
        'label'     => __('Facebook', 'urbanpower'),
        'section'   => 'urban_social_media',
        'priority'  => 2
    ]);

    $wp_customize->add_setting('urban_instagram_enable', [
        'default'   => 'true',
        'type'      => 'theme_mod'
    ]);

    $wp_customize->add_control('urban_instagram_enable',[
        'label'     => __('Enable Instagram', 'urbanpower'),
        'section'   => 'urban_social_media',
        'type'      => 'checkbox',
        'priority'  => 3
    ]);

    $wp_customize->add_setting('urban_instagram', [
        'default'   => 'http://instagram.com/',
        'type'      => 'theme_mod'
    ]);

    $wp_customize->add_control('urban_instagram',[
        'label'     => __('Instagram', 'urbanpower'),
        'section'   => 'urban_social_media',
        'priority'  => 4
    ]);

    $wp_customize->add_setting('urban_twitter_enable', [
        'default'   => 'true',
        'type'      => 'theme_mod'
    ]);

    $wp_customize->add_control('urban_twitter_enable',[
        'label'     => __('Enable Twitter', 'urbanpower'),
        'section'   => 'urban_social_media',
        'type'      => 'checkbox',
        'priority'  => 5
    ]);

    $wp_customize->add_setting('urban_twitter', [
        'default'   => 'http://twitter.com/',
        'type'      => 'theme_mod'
    ]);

    $wp_customize->add_control('urban_twitter',[
        'label'     => __('Twitter', 'urbanpower'),
        'section'   => 'urban_social_media',
        'priority'  => 6
    ]);

    $wp_customize->add_setting('urban_linkedin_enable', [
        'default'   => 'true',
        'type'      => 'theme_mod'
    ]);

    $wp_customize->add_control('urban_linkedin_enable',[
        'label'     => __('Enable Linkedin', 'urbanpower'),
        'section'   => 'urban_social_media',
        'type'      => 'checkbox',
        'priority'  => 7
    ]);

    $wp_customize->add_setting('urban_linkedin', [
        'default'   => 'http://linkedin.com/',
        'type'      => 'theme_mod'
    ]);

    $wp_customize->add_control('urban_linkedin',[
        'label'     => __('Linkedin', 'urbanpower'),
        'section'   => 'urban_social_media',
        'priority'  => 8
    ]);

    $wp_customize->add_setting('urban_google_plus_enable', [
        'default'   => 'true',
        'type'      => 'theme_mod'
    ]);

    $wp_customize->add_control('urban_google_plus_enable',[
        'label'     => __('Enable Google Plus', 'urbanpower'),
        'section'   => 'urban_social_media',
        'type'      => 'checkbox',
        'priority'  => 9
    ]);

    $wp_customize->add_setting('urban_google_plus', [
        'default'   => 'http://plus.google.com/',
        'type'      => 'theme_mod'
    ]);

    $wp_customize->add_control('urban_google_plus',[
        'label'     => __('Google Plus', 'urbanpower'),
        'section'   => 'urban_social_media',
        'priority'  => 10
    ]);
});


/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});

/**
 * CSS For Urban Banner Heading
 */
add_action( 'wp_head', function () {
	$bnr_alignment 		= get_theme_mod( 'urban_content_alignment' );
	$bnr_background_img = get_theme_mod( 'urban_banner_image', 
						get_bloginfo('template_directory') . '/assets/images/banner.jpg');
	$bnr_height 		= get_theme_mod( 'urban_banner_height' ) . 'px';

    $ftr_bg_color       = get_theme_mod( 'urban_bg_color' );
    $ftr_bg_image       = get_theme_mod( 'urban_footer_bg_image' );
    $ftr_alignment      = get_theme_mod( 'urban_footer_alignment' );

    $social_facebook    = get_theme_mod( 'urban_facebook_enable' )     ? 'block' : 'none';
    $social_instagram   = get_theme_mod( 'urban_instagram_enable' )    ? 'block' : 'none';
    $social_twitter     = get_theme_mod( 'urban_twitter_enable' )      ? 'block' : 'none';
    $social_linkedin    = get_theme_mod( 'urban_linkedin_enable' )     ? 'block' : 'none';
    $social_google_plus = get_theme_mod( 'urban_google_plus_enable' )  ? 'block' : 'none';

    $ftr_bg_image = $ftr_bg_image ? 'url('.$ftr_bg_image.')' : '';
?>

	 <style type="text/css">
	 	body #main-content .header-banner{
	 		text-align: <?php echo $bnr_alignment ?>;
	 		background-image: url( <?php echo "'$bnr_background_img'" ?> );
	 		height: <?php echo $bnr_height ?>;
	 	}

        footer.footer-wrapper .footer-main{
            <?php if ($ftr_bg_image) { ?>
                background: <?php echo $ftr_bg_color . ' ' . $ftr_bg_image ?> repeat left top;
            <?php } else { ?>
                background: <?php echo $ftr_bg_color ?>;
            <?php } ?>
        }
        footer.footer-wrapper .footer-child{
            text-align: <?php echo $ftr_alignment ?>;
        }

        footer.footer-wrapper .urban-facebook{
            display: <?php echo $social_facebook ?>; ;
        }
        footer.footer-wrapper .urban-instagram{
            display: <?php echo $social_instagram ?>; ;
        }
        footer.footer-wrapper .urban-twitter{
            display: <?php echo $social_twitter ?>; ;
        }
        footer.footer-wrapper .urban-linkedin{
            display: <?php echo $social_linkedin ?>; ;
        }
        footer.footer-wrapper .urban-google-plus{
            display: <?php echo $social_google_plus ?>; ;
        }
	 </style>

<?php
});


/**
 * UrbanPower Theme
 */
require_once (dirname(__DIR__) . '/app/classes/UrbanPower_Customize_Color.php');
new UrbanPower_Customize_Color();