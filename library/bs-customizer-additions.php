<?php
// Add WP 4.5 Custom Logo Support in Customizer
function theme_prefix_setup() {
    add_theme_support( 'custom-logo' );
}
add_action( 'after_setup_theme', 'theme_prefix_setup' );


// Customizer Additions
if ( ! function_exists( 'newuptown_customize_register' ) ) {
function newuptown_customize_register( $wp_customize ) {
  // Create custom panels

  // Color Section
  $wp_customize->get_section('colors')->panel = 'theme-colors';
  $wp_customize->add_panel( 'theme-colors' , array(
    'title' => __( 'Colors', 'brentstemplate' ),
    'priority' => 20,
    'description' => __( 'Customize your the theme colors in this section.', 'brentstemplate' ),
    'capability' => 'edit_theme_options',
  ) );
  $wp_customize->add_section('default_colors', array(
    'title' => __('Default Colors', 'brentstemplate'),
    'description' => __('Change the default colors of the template.', 'brentstemplate'),
    'priority' => 105,
    'panel' => 'theme-colors',
  ));

  /* Paragraph Text Color setting */
  $wp_customize->add_setting('paragraph_color', array(
    'default' => '#272e31',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 10,
  ));
  /* Paragraph Text Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'paragraph_color',array(
    'label' => __('Paragraph Text Color', 'brentstemplate'),
    'section' => 'default_colors',
    'settings' => 'paragraph_color',
  )));
  /* Link Color setting */
  $wp_customize->add_setting('link_color', array(
    'default' => '#2199e8',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 11,
  ));
  /* Link Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'link_color',array(
    'label' => __('Link Color', 'brentstemplate'),
    'section' => 'default_colors',
    'settings' => 'link_color',
  )));
  /* Link Hover Color setting */
  $wp_customize->add_setting('link_hover_color', array(
    'default' => '#272e31',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 13,
  ));
  /* Link Hover Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'link_hover_color',array(
    'label' => __('Link Hover Color', 'brentstemplate'),
    'section' => 'default_colors',
    'settings' => 'link_hover_color',
  )));
  /* H1 Color setting */
  $wp_customize->add_setting('heading1_color', array(
    'default' => '#d28441',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 14,
  ));
  /* H1 Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'heading1_color',array(
    'label' => __('H1 Color', 'brentstemplate'),
    'section' => 'default_colors',
    'settings' => 'heading1_color',
  )));
  /* H2 Color setting */
  $wp_customize->add_setting('heading2_color', array(
    'default' => '#d28441',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 15,
  ));
  /* H2 Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'heading2_color',array(
    'label' => __('H2 Color', 'brentstemplate'),
    'section' => 'default_colors',
    'settings' => 'heading2_color',
  )));
  /* H3 Color setting */
  $wp_customize->add_setting('heading3_color', array(
    'default' => '#d28441',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 16,
  ));
  /* H3 Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'heading3_color',array(
    'label' => __('H3 Color', 'brentstemplate'),
    'section' => 'default_colors',
    'settings' => 'heading3_color',
  )));
  /* H4 Color setting */
  $wp_customize->add_setting('heading4_color', array(
    'default' => '#d28441',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 17,
  ));
  /* H4 Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'heading4_color',array(
    'label' => __('H4 Color', 'brentstemplate'),
    'section' => 'default_colors',
    'settings' => 'heading4_color',
  )));
  /* H5 Color setting */
  $wp_customize->add_setting('heading5_color', array(
    'default' => '#d28441',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 18,
  ));
  /* H5 Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'heading5_color',array(
    'label' => __('H5 Color', 'brentstemplate'),
    'section' => 'default_colors',
    'settings' => 'heading5_color',
  )));
  /* H6 Color setting */
  $wp_customize->add_setting('heading6_color', array(
    'default' => '#d28441',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 19,
  ));
  /* H6 Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'heading6_color',array(
    'label' => __('H6 Color', 'brentstemplate'),
    'section' => 'default_colors',
    'settings' => 'heading6_color',
  )));
  /* Page Title Color setting */
  $wp_customize->add_setting('pagetitle_color', array(
    'default' => '#FFFFFF',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 20,
  ));
  /* Page Title Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'pagetitle_color',array(
    'label' => __('Page Title Color', 'brentstemplate'),
    'section' => 'default_colors',
    'settings' => 'pagetitle_color',
  )));
  /* Highlight Color setting */
  $wp_customize->add_setting('highlight_color', array(
    'default' => '#d28441',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 100,
  ));
  /* highlight color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'highlight_color',array(
    'label' => __('Highlight Color', 'brentstemplate'),
    'section' => 'default_colors',
    'settings' => 'highlight_color',
  )));

  /* header colors section */
  $wp_customize->add_section('header_colors', array(
    'title' => __('Header Colors', 'brentstemplate'),
    'description' => __('Change the colors in the header, such as header background and main nav colors.', 'brentstemplate'),
    'priority' => 106,
    'panel' => 'theme-colors',
  ));

  /* Header Background Color setting */
  $wp_customize->add_setting('header_color', array(
    'default' => '#f4f4f0',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 10,
  ));
  /* Header Background Color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'header_color',array(
    'label' => __('Header Color', 'brentstemplate'),
    'section' => 'header_colors',
    'settings' => 'header_color',
  )));
  /* top level main nav color setting */
  $wp_customize->add_setting('main_nav_color', array(
    'default' => '#272e31',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 10,
  ));
  /* top level main nav color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'main_nav_color',array(
    'label' => __('Top Level Nav Color', 'brentstemplate'),
    'section' => 'header_colors',
    'settings' => 'main_nav_color',
  )));
  /* top level main nav hover color setting */
  $wp_customize->add_setting('main_nav_hover_color', array(
    'default' => '#d28441',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 11,
  ));
  /* top level main nav hover color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'main_nav_hover_color',array(
    'label' => __('Top Level Nav Hover/Focus Color', 'brentstemplate'),
    'section' => 'header_colors',
    'settings' => 'main_nav_hover_color',
  )));
  /* top level main nav submenu background color setting */
  $wp_customize->add_setting('main_nav_sub_bg_color', array(
    'default' => '#e1e1e1',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 12,
  ));
  /* top level main nav submenu background color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'main_nav_sub_bg_color',array(
    'label' => __('Top Level Nav Sub Menu BG', 'brentstemplate'),
    'section' => 'header_colors',
    'settings' => 'main_nav_sub_bg_color',
  )));
  /* top level main nav submenu li color setting */
  $wp_customize->add_setting('main_nav_sub_li_color', array(
    'default' => '#d28441',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 13,
  ));
  /* top level main nav submenu li color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'main_nav_sub_li_color',array(
    'label' => __('Top Level Nav Sub Menu Item Color', 'brentstemplate'),
    'section' => 'header_colors',
    'settings' => 'main_nav_sub_li_color',
  )));
  /* top level main nav submenu li hover color setting */
  $wp_customize->add_setting('main_nav_sub_li_hover_color', array(
    'default' => '#FFFFFF',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 14,
  ));
  /* top level main nav submenu li hover color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'main_nav_sub_li_hover_color',array(
    'label' => __('Top Level Nav Sub Menu Item Hover Color', 'brentstemplate'),
    'section' => 'header_colors',
    'settings' => 'main_nav_sub_li_hover_color',
  )));
  /* top level main nav submenu li hover bg color setting */
  $wp_customize->add_setting('main_nav_sub_li_hover_bg_color', array(
    'default' => '#d28441',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 12,
  ));
  /* top level main nav submenu li hover color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'main_nav_sub_li_hover_bg_color',array(
    'label' => __('Top Level Nav Sub Menu Item Hover BG Color', 'brentstemplate'),
    'section' => 'header_colors',
    'settings' => 'main_nav_sub_li_hover_bg_color',
  )));

  /* Footer colors section */
  $wp_customize->add_section('footer_colors', array(
    'title' => __('Footer Colors', 'brentstemplate'),
    'description' => __('Change the colors in the footer, such as footer background, headings, paragraph text, and link text colors.', 'brentstemplate'),
    'priority' => 107,
    'panel' => 'theme-colors',
  ));

  /* Footer BG color setting */
  $wp_customize->add_setting('footer_bg_color', array(
    'default' => '#272e31',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 10,
  ));
  /* Footer BG color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_bg_color',array(
    'label' => __('Footer BG Color', 'brentstemplate'),
    'section' => 'footer_colors',
    'settings' => 'footer_bg_color',
  )));
  /* Footer widget heading color setting */
  $wp_customize->add_setting('footer_widget_heading_color', array(
    'default' => '#FFFFFF',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 11,
  ));
  /* Footer widget heading color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_widget_heading_color',array(
    'label' => __('Footer Widget Heading Color', 'brentstemplate'),
    'section' => 'footer_colors',
    'settings' => 'footer_widget_heading_color',
  )));
  /* Footer widget paragraph color setting */
  $wp_customize->add_setting('footer_widget_p_color', array(
    'default' => '#FFFFFF',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 11,
  ));
  /* Footer widget paragraph color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_widget_p_color',array(
    'label' => __('Footer Widget Paragraph Color', 'brentstemplate'),
    'section' => 'footer_colors',
    'settings' => 'footer_widget_p_color',
  )));
  /* Footer widget link color setting */
  $wp_customize->add_setting('footer_widget_a_color', array(
    'default' => '#FFFFFF',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 12,
  ));
  /* Footer widget link color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_widget_a_color',array(
    'label' => __('Footer Widget Link Color', 'brentstemplate'),
    'section' => 'footer_colors',
    'settings' => 'footer_widget_a_color',
  )));
  /* Footer widget link hover color setting */
  $wp_customize->add_setting('footer_widget_a_hover_color', array(
    'default' => '#FFFFFF',
    'type' => 'theme_mod',
    'transport' => 'postMessage',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 13,
  ));
  /* Footer widget link hover color control */
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_widget_a_hover_color',array(
    'label' => __('Footer Widget Link Hover Color', 'brentstemplate'),
    'section' => 'footer_colors',
    'settings' => 'footer_widget_a_hover_color',
  )));



  // Add Social Media Section
  $wp_customize->add_section( 'social-media' , array(
    'title' => __( 'Social Media', 'brentstemplate' ),
    'priority' => 30,
    'description' => __( 'Enter the URL to your account for each service for the icon to appear in the header.', 'brentstemplate' )
  ) );

  // Add Facebook Setting
  $wp_customize->add_setting( 'facebook' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook', array(
      'label' => __( 'Facebook', 'brentstemplate' ),
      'section' => 'social-media',
      'settings' => 'facebook',
  ) ) );

  // Add Twitter Setting
  $wp_customize->add_setting( 'twitter' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter', array(
      'label' => __( 'Twitter', 'brentstemplate' ),
      'section' => 'social-media',
      'settings' => 'twitter',
  ) ) );

  // Add LinkedIn Setting
  $wp_customize->add_setting( 'linkedin' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'linkedin', array(
      'label' => __( 'LinkedIn', 'brentstemplate' ),
      'section' => 'social-media',
      'settings' => 'linkedin',
  ) ) );

  // Add Flickr Setting
  $wp_customize->add_setting( 'flickr' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'flickr', array(
      'label' => __( 'Flickr', 'brentstemplate' ),
      'section' => 'social-media',
      'settings' => 'flickr',
  ) ) );

  // Add Instagram Setting
  $wp_customize->add_setting( 'instagram' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'instagram', array(
      'label' => __( 'Instagram', 'brentstemplate' ),
      'section' => 'social-media',
      'settings' => 'instagram',
  ) ) );

  // Add YouTube Setting
  $wp_customize->add_setting( 'youtube' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'youtube', array(
      'label' => __( 'YouTube', 'brentstemplate' ),
      'section' => 'social-media',
      'settings' => 'youtube',
  ) ) );

  // Add Pinterest Setting
  $wp_customize->add_setting( 'pinterest' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pinterest', array(
      'label' => __( 'Pinterest', 'brentstemplate' ),
      'section' => 'social-media',
      'settings' => 'pinterest',
  ) ) );

  // Add Vimeo Setting
  $wp_customize->add_setting( 'vimeo' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'vimeo', array(
      'label' => __( 'Vimeo', 'brentstemplate' ),
      'section' => 'social-media',
      'settings' => 'vimeo',
  ) ) );

  // Add RSS Setting
  $wp_customize->add_setting( 'rss' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rss', array(
      'label' => __( 'RSS', 'brentstemplate' ),
      'section' => 'social-media',
      'settings' => 'rss',
  ) ) );

  // Add Custom Button Setting
  $wp_customize->add_setting( 'custom' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom', array(
      'label' => __( 'Custom Button', 'brentstemplate' ),
      'section' => 'social-media',
      'settings' => 'custom',
  ) ) );
  $wp_customize->add_setting( 'custom-text' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom-text', array(
      'label' => __( 'Custom Button Text', 'brentstemplate' ),
      'section' => 'social-media',
      'settings' => 'custom-text',
  ) ) );


  // Header Options
  $wp_customize->add_section( 'header-options' , array(
    'title' => __( 'Header Options', 'brentstemplate' ),
    'priority' => 40,
    'description' => __( 'Choose options for the header.', 'brentstemplate' )
  ) );
  // Sticky Header
  $wp_customize->add_setting( 'sticky-header' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sticky-header', array(
      'label' => __( 'Sticky Header?', 'brentstemplate' ),
      'section' => 'header-options',
      'type' => 'checkbox',
      'description' => 'Check this box to enable the sticky header',
  ) ) );
  // Search above menu
  $wp_customize->add_setting( 'search-above-menu' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'search-above-menu', array(
      'label' => __( 'Search above menu?', 'brentstemplate' ),
      'section' => 'header-options',
      'type' => 'checkbox',
      'description' => 'Check this box to enable the search box above the menu, below the social media icons',
  ) ) );
  // Search inline with social menu
  $wp_customize->add_setting( 'search-social-menu' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'search-social-menu', array(
      'label' => __( 'Search inline with social menu?', 'brentstemplate' ),
      'section' => 'header-options',
      'type' => 'checkbox',
      'description' => 'Check this box to enable the search box to be inline with the social media icons',
  ) ) );
  // Search in menu
  $wp_customize->add_setting( 'search-menu' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'search-menu', array(
      'label' => __( 'Search in menu?', 'brentstemplate' ),
      'section' => 'header-options',
      'type' => 'checkbox',
      'description' => 'Check this box to enable the search icon to main menu',
  ) ) );


  // Add Copyright Section
  $wp_customize->add_section( 'copyright-text' , array(
    'title' => __( 'Copyright Text', 'brentstemplate' ),
    'priority' => 1000,
    'description' => __( 'Enter the copyright text to appear at the bottom of the page. Do not include the copyright symbol or the year as these are added automatically to the beginning of this line.', 'brentstemplate' )
  ) );

  // Add Copyright Text Field
  $wp_customize->add_setting( 'copyright' , array( 'default' => '' ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'copyright', array(
      'label' => __( 'Copyright', 'brentstemplate' ),
      'section' => 'copyright-text',
      'settings' => 'copyright',
  ) ) );

  // Add Google Analytics Tracking Section
  $wp_customize->add_section( 'analytics-code' , array(
    'title' => __( 'Analytics Tracking Code', 'brentstemplate' ),
    'priority' => 2000,
    'description' => __( 'Paste in the entire Google Analytics tracking code here.', 'brentstemplate' )
  ) );

  // Add Google Analytics Tracking Field
  $wp_customize->add_setting( 'analytics' , array( 'default' => '' ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'analytics-code', array(
      'label' => __( 'Analytics Code', 'brentstemplate' ),
      'type' => 'textarea',
      'section' => 'analytics-code',
      'settings' => 'analytics',
  ) ) );

}

add_action( 'customize_register', 'newuptown_customize_register' );
}

function bs_customize_css() { ?>
<style type="text/css" id="bs-customizer-css">
body:before {
  background: <?php echo esc_attr(get_theme_mod('header_color','#f4f4f0')); ?>;
}
@media only screen and (max-width: 40em) {
  header#masthead {
    background: <?php echo esc_attr(get_theme_mod('header_color','#f4f4f0')); ?>;
  }
  .off-canvas.position-right {
    background: <?php echo esc_attr(get_theme_mod('header_color','#f4f4f0')); ?>;
  }
}
p {
  color: <?php echo esc_attr(get_theme_mod('paragraph_color','#272e31')); ?>;
}
a {
  color: <?php echo esc_attr(get_theme_mod('link_color','#2199e8')); ?>;
}
a:hover, a:focus {
  color: <?php echo esc_attr(get_theme_mod('link_color','#272e31')); ?>;
}
h1 {
  color: <?php echo esc_attr(get_theme_mod('heading1_color','#d28441')); ?>;
}
h2 {
  color: <?php echo esc_attr(get_theme_mod('heading2_color','#d28441')); ?>;
}
h3 {
  color: <?php echo esc_attr(get_theme_mod('heading3_color','#d28441')); ?>;
}
h4 {
  color: <?php echo esc_attr(get_theme_mod('heading4_color','#d28441')); ?>;
}
h5 {
  color: <?php echo esc_attr(get_theme_mod('heading5_color','#d28441')); ?>;
}
h6 {
  color: <?php echo esc_attr(get_theme_mod('heading6_color','#d28441')); ?>;
}
h1.entry-title {
  color: <?php echo esc_attr(get_theme_mod('pagetitle_color','#FFFFFF')); ?>;
}
.top-bar .top-bar-right .menu > li > a,
nav.off-canvas > .menu > li > a,
nav.off-canvas .submenu li a  {
  color: <?php echo esc_attr(get_theme_mod('main_nav_color','#272e31')); ?>;
  -webkit-transition: color .2s ease-out;
  -moz-transition: color .2s ease-out;
  -o-transition: color .2s ease-out;
  transition: color .2s ease-out;
}
.top-bar .top-bar-right .menu > li > a:hover,
.top-bar .top-bar-right .menu > li > a:focus,
.top-bar .top-bar-right > .menu > .active > a,
nav.off-canvas .menu li a:hover,
nav.off-canvas .menu li a:focus {
  color: <?php echo esc_attr(get_theme_mod('main_nav_hover_color','#d28441')); ?>;
}
.top-bar .top-bar-right .menu .dropdown {
  background: <?php echo esc_attr(get_theme_mod('main_nav_sub_bg_color','#e1e1e1')); ?>;
  border-top: 4px solid <?php echo esc_attr(get_theme_mod('highlight_color','#d28441')); ?>;
}
.top-bar .top-bar-right .menu .dropdown li a {
  color: <?php echo esc_attr(get_theme_mod('main_nav_sub_li_color','#d28441')); ?>;
}
.top-bar .top-bar-right .menu .dropdown li:hover a,
.top-bar .top-bar-right .menu .dropdown li:focus a,
.top-bar .top-bar-right .menu .dropdown li.active a,
nav.off-canvas .menu li.active > a {
  color: <?php echo esc_attr(get_theme_mod('main_nav_sub_li_hover_color','#FFFFFF')); ?>;
  background: <?php echo esc_attr(get_theme_mod('main_nav_sub_li_hover_bg_color','#d28441')); ?>;
}
.top-bar .top-bar-right .menu > li:after {
  background: <?php echo esc_attr(get_theme_mod('highlight_color','#d28441')); ?>;
}
.above-menu-search-wrapper form#searchform :after,
.inline-social-search-wrapper form#searchform :after {
  color: <?php echo esc_attr(get_theme_mod('highlight_color','#d28441')); ?>;
}
#footer-container {
  background-color: <?php echo esc_attr(get_theme_mod('footer_bg_color','#272e31')); ?>;
}
#footer-container #footer h6 {
  color: <?php echo esc_attr(get_theme_mod('footer_widget_heading_color','#FFFFFF')); ?>;
}
#footer-container #footer p, #footer-container #footer li, #footer-container #footer span, #footer-container #footer .vcard abbr, #copyright p {
  color: <?php echo esc_attr(get_theme_mod('footer_widget_p_color','#FFFFFF')); ?>;
}
#footer-container #footer a,
#footer-container #footer ul.menu li a,
#copyright a {
  color: <?php echo esc_attr(get_theme_mod('footer_widget_a_color','#FFFFFF')); ?>;
}
#footer-container #footer a:hover,
#footer-container #footer a:focus,
#footer-container #footer ul.menu li a:hover,
#footer-container #footer ul.menu li a:focus,
#footer-container #footer ul.menu li.active a,
#copyright a:hover, #copyright a:focus {
  color: <?php echo esc_attr(get_theme_mod('footer_widget_a_hover_color','#d28441')); ?>;
}
</style>
<?php }
add_action( 'wp_head', 'bs_customize_css', 999);
