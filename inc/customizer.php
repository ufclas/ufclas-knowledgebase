<?php 

/**
 * Sanitize radio and select boxes using choices
 *
 * @return string Valid input or the default value for the setting 
 * @since 0.3.0
 * @see http://cachingandburning.com/wordpress-theme-customizer-sanitizing-radio-buttons-and-select-lists/
 */
function ufclas_knowledgebase_sanitize_choices( $input, $setting ) {
	global $wp_customize;
	
	$control = $wp_customize->get_control( $setting->id );
	
	if ( array_key_exists( $input, $control->choices ) ){
		return $input;
	}
	else {
		return $setting->default;	
	}
}

/**
 * Add Knowledgebase settings to the Customizer
 *
 * @since 0.0.0
 */
function ufclas_knowledgebase_customize_register( $wp_customize ) {
	// Add a panel
	$wp_customize->add_panel( 'ufclas_knowledgebase', array(
		'title' => __('UFCLAS Knowledge Base', 'ufclas-knowledgebase'),
		'description' => __('Options for modifying the knowledgebase settings.', 'ufclas-knowledgebase'),
		'priority' => '160',
	));
	
	// Newsletter Option
	$wp_customize->add_section( 'theme_options_kb', array(
		'title' => __('Settings', 'ufclas-knowledgebase'),
		'description' => __('', 'ufclas-knowledgebase'),
		'panel' => 'ufclas_knowledgebase',
	));
	
	$wp_customize->add_setting( 'kb_title', array( 'default' => 'Knowledge Base', 'sanitize_callback' => 'sanitize_text_field' ));
	$wp_customize->add_control( 'kb_title', array(
		'label' => __('Knowledge Base Title', 'ufclas-knowledgebase'),
		'description' => __('Title that appears above the search field and in breadcrumbs', 'ufclas-knowledgebase'),
		'section' => 'theme_options_kb',
		'type' => 'text',
	));
	
	$wp_customize->add_setting( 'kb_columns', array( 'default' => 2, 'sanitize_callback' => 'ufclas_knowledgebase_sanitize_choices' ));
	$wp_customize->add_control( 'kb_columns', array(
		'label' => __('Columns', 'ufclas-knowledgebase'),
		'description' => __('Number of columns displayed on the home page', 'ufclas-knowledgebase'),
		'section' => 'theme_options_kb',
		'type' => 'select',
		'choices' => array(
			1 => '1',
			2 => '2',
			3 => '3',
			4 => '4',
		),
	));
	
	$wp_customize->add_setting( 'kb_show_count', array( 'default' => 1, 'sanitize_callback' => 'absint' ));
	$wp_customize->add_control( 'kb_show_count', array(
		'label' => __('Show Article Count', 'ufclas-knowledgebase'),
		'description' => __('', 'ufclas-knowledgebase'),
		'section' => 'theme_options_kb',
		'type' => 'checkbox',
	));
	
	$wp_customize->add_setting( 'kb_post_order', array( 'default' => 'menu_order', 'sanitize_callback' => 'ufclas_knowledgebase_sanitize_choices' ));
	$wp_customize->add_control( 'kb_post_order', array(
		'label' => __('Article Order', 'ufclas-knowledgebase'),
		'description' => __('Select order for articles', 'ufclas-knowledgebase'),
		'section' => 'theme_options_kb',
		'type' => 'select',
		'choices' => array(
			'menu_order' => __('Article Sort Order', 'ufclas-knowledgebase'),
			'title' => __('Article Title', 'ufclas-knowledgebase'),
		),
	));
	
	$wp_customize->add_setting( 'kb_term_order', array( 'default' => 'terms_order', 'sanitize_callback' => 'ufclas_knowledgebase_sanitize_choices' ));
	$wp_customize->add_control( 'kb_term_order', array(
		'label' => __('Category Order', 'ufclas-knowledgebase'),
		'description' => __('Select order for categories', 'ufclas-knowledgebase'),
		'section' => 'theme_options_kb',
		'type' => 'select',
		'choices' => array(
			'terms_order' => __('Category Sort Order', 'ufclas-knowledgebase'),
			'name' => __('Category Title', 'ufclas-knowledgebase'),
		),
	));
	
	$wp_customize->add_setting( 'kb_post_order', array( 'default' => 'menu_order', 'sanitize_callback' => 'ufclas_knowledgebase_sanitize_choices' ));
	$wp_customize->add_control( 'kb_post_order', array(
		'label' => __('Article Order', 'ufclas-knowledgebase'),
		'description' => __('Select order for articles', 'ufclas-knowledgebase'),
		'section' => 'theme_options_kb',
		'type' => 'select',
		'choices' => array(
			'menu_order' => __('Article Sort Order', 'ufclas-knowledgebase'),
			'title' => __('Article Title', 'ufclas-knowledgebase'),
		),
	));
	
}
add_action('customize_register','ufclas_knowledgebase_customize_register');