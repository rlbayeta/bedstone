<?php
namespace App;

class UrbanPower_Customize_Color {

    function __construct() {
        add_action( 'customize_register', [&$this, 'urbanpower_customize'] );
        add_action( 'wp_enqueue_scripts', [&$this, 'urbanpower_enqueue_styles'] );
    }

    public function urbanpower_customize($wp_customize) {
        // Text color
        $this->add_customizer($wp_customize, 'text_color', 'Body text color');

        // Header Menu Text Color
        $this->add_customizer($wp_customize, 'header_menu_color', 'Header menu text color');

        // Header Menu Hover Color
        $this->add_customizer($wp_customize, 'header_menu_hover_color', 'Header menu hover color');

        // Header Menu Hover Background Color
        $this->add_customizer($wp_customize, 'header_menu_hover_bg_color', 'Header menu hover background color');

        // Footer Menu Text Color
        $this->add_customizer($wp_customize, 'footer_menu_color', 'Footer menu text color');

        // Footer Menu Hover Color
        $this->add_customizer($wp_customize, 'footer_menu_hover_color', 'Footer menu hover color');

        // Footer Copyright Background Color
        $this->add_customizer($wp_customize, 'footer_cpy_bg_color', 'Footer copyright background color');

    }

    private function add_customizer($wp_customize, $id, $text) {
        $wp_customize->add_setting( $id, array(
            'default'   => '',
            'transport' => 'refresh',
        ) );

        $wp_customize->add_control( new \WP_Customize_Color_Control( $wp_customize, $id, array(
            'section' => 'colors',
            'label'   => esc_html__( $text, 'theme' ),
        ) ) );
    }

    private function append_theme_mod($id, array $element, $mod_default = '') {
        $theme_mod = get_theme_mod( $id, $mod_default );
        if ( ! empty( $theme_mod ) ) {
            if(count($element) > 1) {
                return " $element[0] {
                        $element[1] : $theme_mod !important;
                    }
                ";
            }
        }
        return false;
    }

    public function urbanpower_get_customizer_css() {
        ob_start();

        echo $this->append_theme_mod('text_color',['body','color']);
        echo $this->append_theme_mod('header_menu_color',['.header-wrapper .header-main ul.navbar-nav li a.nav-link','color']);
        echo $this->append_theme_mod('header_menu_hover_color',['.header-wrapper .header-main ul.navbar-nav li a.nav-link:hover,.header-wrapper .header-main ul.navbar-nav li.active a.nav-link','color']);
        echo $this->append_theme_mod('header_menu_hover_bg_color',['.header-wrapper .header-main ul.navbar-nav li a.nav-link:hover, .header-wrapper .header-main ul.navbar-nav li.active a','background']);
        echo $this->append_theme_mod('footer_menu_color',['.footer-wrapper .footer-main .menu a','color']);
        echo $this->append_theme_mod('footer_menu_hover_color',['.footer-wrapper .footer-main .menu a:hover','color']);
        echo $this->append_theme_mod('footer_cpy_bg_color',['.footer-wrapper .footer-copyright','background']);

        $css = ob_get_clean();
        return $css;
    }

    // Modify our styles registration like so:
    public function urbanpower_enqueue_styles() {
        wp_enqueue_style( 'theme-styles', get_stylesheet_uri() ); // This is where you enqueue your theme's main stylesheet
        $custom_css = $this->urbanpower_get_customizer_css();
        wp_add_inline_style( 'theme-styles', $custom_css );
    }
}

