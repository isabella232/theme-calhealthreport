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
  // Add Social Media Section
  $wp_customize->add_section( 'social-media' , array(
    'title' => __( 'Social Media', '_s' ),
    'priority' => 30,
    'description' => __( 'Enter the URL to your account for each service for the icon to appear in the header.', '_s' )
  ) );

  // Add Facebook Setting
  $wp_customize->add_setting( 'facebook' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook', array(
      'label' => __( 'Facebook', '_s' ),
      'section' => 'social-media',
      'settings' => 'facebook',
  ) ) );

  // Add Twitter Setting
  $wp_customize->add_setting( 'twitter' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter', array(
      'label' => __( 'Twitter', '_s' ),
      'section' => 'social-media',
      'settings' => 'twitter',
  ) ) );

  // Add LinkedIn Setting
  $wp_customize->add_setting( 'linkedin' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'linkedin', array(
      'label' => __( 'LinkedIn', '_s' ),
      'section' => 'social-media',
      'settings' => 'linkedin',
  ) ) );

  // Add Flickr Setting
  $wp_customize->add_setting( 'flickr' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'flickr', array(
      'label' => __( 'Flickr', '_s' ),
      'section' => 'social-media',
      'settings' => 'flickr',
  ) ) );

  // Add Instagram Setting
  $wp_customize->add_setting( 'instagram' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'instagram', array(
      'label' => __( 'Instagram', '_s' ),
      'section' => 'social-media',
      'settings' => 'instagram',
  ) ) );

  // Add YouTube Setting
  $wp_customize->add_setting( 'youtube' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'youtube', array(
      'label' => __( 'YouTube', '_s' ),
      'section' => 'social-media',
      'settings' => 'youtube',
  ) ) );

  // Add Pinterest Setting
  $wp_customize->add_setting( 'pinterest' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pinterest', array(
      'label' => __( 'Pinterest', '_s' ),
      'section' => 'social-media',
      'settings' => 'pinterest',
  ) ) );

  // Add Vimeo Setting
  $wp_customize->add_setting( 'vimeo' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'vimeo', array(
      'label' => __( 'Vimeo', '_s' ),
      'section' => 'social-media',
      'settings' => 'vimeo',
  ) ) );

  // Add RSS Setting
  $wp_customize->add_setting( 'rss' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rss', array(
      'label' => __( 'RSS', '_s' ),
      'section' => 'social-media',
      'settings' => 'rss',
  ) ) );

  // Add Custom Button Setting
  $wp_customize->add_setting( 'custom' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom', array(
      'label' => __( 'Custom Button', '_s' ),
      'section' => 'social-media',
      'settings' => 'custom',
  ) ) );
  $wp_customize->add_setting( 'custom-text' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom-text', array(
      'label' => __( 'Custom Button Text', '_s' ),
      'section' => 'social-media',
      'settings' => 'custom-text',
  ) ) );


  // Header Options
  $wp_customize->add_section( 'header-options' , array(
    'title' => __( 'Header Options', '_s' ),
    'priority' => 40,
    'description' => __( 'Choose options for the header.', '_s' )
  ) );
  // Sticky Header
  $wp_customize->add_setting( 'sticky-header' , array( 'default' => '' ));
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sticky-header', array(
      'label' => __( 'Sticky Header?', '_s' ),
      'section' => 'header-options',
      'type' => 'checkbox',
      'description' => 'Check this box to enable the sticky header',
  ) ) );


  // Add Copyright Section
  $wp_customize->add_section( 'copyright-text' , array(
    'title' => __( 'Copyright Text', '_s' ),
    'priority' => 1000,
    'description' => __( 'Enter the copyright text to appear at the bottom of the page. Do not include the copyright symbol or the year as these are added automatically to the beginning of this line.', '_s' )
  ) );

  // Add Copyright Text Field
  $wp_customize->add_setting( 'copyright' , array( 'default' => '' ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'copyright', array(
      'label' => __( 'Copyright', '_s' ),
      'section' => 'copyright-text',
      'settings' => 'copyright',
  ) ) );

  // Add Google Analytics Tracking Section
  $wp_customize->add_section( 'analytics-code' , array(
    'title' => __( 'Analytics Tracking Code', '_s' ),
    'priority' => 2000,
    'description' => __( 'Paste in the entire Google Analytics tracking code here.', '_s' )
  ) );

  // Add Google Analytics Tracking Field
  $wp_customize->add_setting( 'analytics' , array( 'default' => '' ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'analytics-code', array(
      'label' => __( 'Analytics Code', '_s' ),
      'type' => 'textarea',
      'section' => 'analytics-code',
      'settings' => 'analytics',
  ) ) );

}

add_action( 'customize_register', 'newuptown_customize_register' );
}
