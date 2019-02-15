<?php
/**
 * rt_simple functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rt_simple
 */

if ( ! function_exists( 'rt_simple_t_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function rt_simple_t_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on rt_simple, use a find and replace
		 * to change 'rt_simple_t' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'rt_simple_t', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', '_s' ),
		'secondary' => __('Secondary', '_s')
	) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'rt_simple_t_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'rt_simple_t_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rt_simple_t_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'rt_simple_t_content_width', 640 );
}
add_action( 'after_setup_theme', 'rt_simple_t_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rt_simple_t_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'rt_simple_t' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'rt_simple_t' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'rt_simple_t_widgets_init' );


add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id'            => 'primary',
            'name'          => __( 'Latest News Section' ),
            'description'   => __( 'Edit the Latest news sidebar' ),
            'before_widget' => '<div id="latest_news"><div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
	register_sidebar(
        array(
            'id'            => 'secondary',
            'name'          => __( 'Recent Projects Section' ),
            'description'   => __( 'Edit the Recent projects content' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
	register_sidebar(
        array(
            'id'            => 'tertiary',
            'name'          => __( 'Stay in Touch Section' ),
            'description'   => __( 'Manage Social Media Links on sidebar' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
	
    /*  Repeat register_sidebar() code for additional sidebars. */
}
/**
 * Enqueue scripts and styles.
 */
function rt_simple_t_scripts() {
	
  wp_enqueue_style( 'rt_simple_t-style', get_stylesheet_uri() );
    
    wp_enqueue_style( 'rt_simple_t-bootstrep-css', get_template_directory_uri() . '/lib/css/bootstrap.css', array(),'1.0.0', 'all' );
   
   wp_enqueue_style( 'rt_simple_t-bootstrep-css_custom1', get_template_directory_uri() . '/lib/css/custom.css', array(), '1.0.0', 'all');
	
	wp_enqueue_style( 'rt_simple_t-bootstrep-css_custom2', get_template_directory_uri() . '/lib/css/font-awesome.min.css', array(), '1.0.0', 'all');

	 wp_enqueue_script( 'rt_simple_t-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
    
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/jquery/jquery.min.js', array(), '20151215', true );

   /* wp_deregister_script('jquery');
    
    wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js','',FALSE,'' );
    
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js','',FALSE,'' );*/
    
	
    
   
    
    wp_enqueue_script( 'rt_simple_t-bootstrap-js', get_template_directory_uri() . '/lib/js/bootstrap.js', array(), '20151215', true );

wp_enqueue_script( '_s-jstether', get_template_directory_uri() . '/lib/js/tether.min.js', array(), '20151215', true );
    

	wp_enqueue_script( 'rt_simple_t-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	////owl 
	 /* wp_enqueue_style( 'rt_simple_t-owl-css', get_template_directory_uri() . '/css/owl.carousel.css', array() );
	  wp_enqueue_style( 'rt_simple_t-owl-theme-css', get_template_directory_uri() . '/css/owl.theme.default.css', array() );


	  wp_enqueue_script( 'rt_simple_t-owl-js', get_template_directory_uri() . '/js/owl.carousel.min.js','',FALSE,'' );*/
	  ///////

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rt_simple_t_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/*--------------------Custom functions*/
/*--------------------Custom functions*/
/*Admin Footer Custom text edit option*/
function Custom_footer_edit($wp_customize){
	$wp_customize->add_section('footer_edit_section', array(
	'title' => 'Footer Copyright'
	));
	
	$wp_customize->add_setting('footer_edit_setting', array(
	'default' => '&copy; 2019 Simple_Rt. All Rights Reserved. Designed by Saurabh_Jadhav'
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer_edit_control', array(
	'label' => 'Footer Text',
	'section' => 'footer_edit_section',
	'settings' => 'footer_edit_setting'
	)));
}
add_action('customize_register', 'Custom_footer_edit');

function footer_logo($wp_customize){
	$wp_customize->add_section('Footer_Logo_change', array(
	'title' => 'Footer Logo'
	));
	
	$wp_customize->add_setting('footer_logo_setting');
	
	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'footer_logo', array(
	'label' => 'Footer Logo Change',
	'section' => 'Footer_Logo_change',
	'settings' => 'footer_logo_setting',
	'width' => 194,
	'height' => 60
	)));
}
add_action('customize_register','footer_logo');

/*Featured posts*/
function Custom_feature_edit($wp_customize){
	$wp_customize->add_section('featured_post_image_one_section', array(
	'title' => 'Featured Slide Carousel'
	));
	
	$wp_customize->add_setting('featured_post_image_one_setting');
	
	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'footer_post_image_one_control', array(
	'label' => 'Featured post image 1',
	'section' => 'featured_post_image_one_section',
	'settings' => 'featured_post_image_one_setting',
	'width' => 960,
	'height' => 300
	)));
	$wp_customize->add_setting('featured_post_image_two_setting');
	
	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'footer_post_image_two_control', array(
	'label' => 'Featured post image 2',
	'section' => 'featured_post_image_one_section',
	'settings' => 'featured_post_image_two_setting',
	'width' => 960,
	'height' => 300
	)));
	
	$wp_customize->add_setting('featured_post_image_three_setting');
	
	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'footer_post_image_three_control', array(
	'label' => 'Featured post image 3',
	'section' => 'featured_post_image_one_section',
	'settings' => 'featured_post_image_three_setting',
	'width' => 960,
	'height' => 300
	)));
	$wp_customize->add_setting('featured_post_image_four_setting');
	
	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'footer_post_image_four_control', array(
	'label' => 'Featured post image 4',
	'section' => 'featured_post_image_one_section',
	'settings' => 'featured_post_image_four_setting',
	'width' => 960,
	'height' => 300
	)));
	$wp_customize->add_setting('featured_image_one_title', array(
	'default' => 'Title one'
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'featured_post_one_title', array(
	'label' => 'Title Text 1',
	'section' => 'featured_post_image_one_section',
	'settings' => 'featured_image_one_title'
	)));
	
	
	$wp_customize->add_setting('featured_image_two_title', array(
	'default' => 'Title two'
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'featured_post_two_title', array(
	'label' => 'Title Text 2',
	'section' => 'featured_post_image_one_section',
	'settings' => 'featured_image_two_title'
	)));
	
	
	
	$wp_customize->add_setting('featured_image_three_title', array(
	'default' => 'Title three'
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'featured_post_three_title', array(
	'label' => 'Title Text 3',
	'section' => 'featured_post_image_one_section',
	'settings' => 'featured_image_three_title'
	)));
	

	$wp_customize->add_setting('featured_image_four_title', array(
	'default' => 'Title four'
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'featured_post_four_title', array(
	'label' => 'Title Text 4',
	'section' => 'featured_post_image_one_section',
	'settings' => 'featured_image_four_title'
	)));
	
	$wp_customize->add_setting('features_post_content_one', array(
	'default' => 'Lorem Ipsum dolor sit amet'
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'features_post_content_one_control', array(
	'label' => 'Content for post 1',
	'section'=>'featured_post_image_one_section',
	'settings'=>'features_post_content_one',
	'type'=>'textarea'
	)));
	
	$wp_customize->add_setting('features_post_content_two', array(
	'default' => 'Lorem Ipsum dolor sit amet'
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'features_post_content_two_control', array(
	'label' => 'Content for post 2',
	'section'=>'featured_post_image_one_section',
	'settings'=>'features_post_content_two',
	'type'=>'textarea'
	)));
	
		$wp_customize->add_setting('features_post_content_three', array(
	'default' => 'Lorem Ipsum dolor sit amet'
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'features_post_content_three_control', array(
	'label' => 'Content for post 3',
	'section'=>'featured_post_image_one_section',
	'settings'=>'features_post_content_three',
	'type'=>'textarea'
	)));
	
	$wp_customize->add_setting('features_post_content_four', array(
	'default' => 'Lorem Ipsum dolor sit amet'
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'features_post_content_four_control', array(
	'label' => 'Content for post 4',
	'section'=>'featured_post_image_one_section',
	'settings'=>'features_post_content_four',
	'type'=>'textarea'
	)));
}
add_action('customize_register', 'Custom_feature_edit');
/*Featured posts*/
/*Admin Footer Custom text edit option*/
/*Widget*/

/*Widget*/
/*Child pages post use Child Page A--> 7 , B---> 16 , C---> 1*/
function Child_pages($wp_customize){
	$wp_customize->add_section('Child_pages_section', array(
	'title' => 'Child Pages'
	));
	
	$wp_customize->add_setting('Child_pages_setting_one', array(
	'default' => '6'
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'Child_pages_control_A', array(
	'label' => 'Select Category(in numbers) for A',
	'section' => 'Child_pages_section',
	'settings' => 'Child_pages_setting_one'
	)));
	
	$wp_customize->add_setting('Child_pages_setting_two', array(
	'default' => '1'
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'Child_pages_control_B', array(
	'label' => 'Select Category(in numbers) for B',
	'section' => 'Child_pages_section',
	'settings' => 'Child_pages_setting_two'
	)));
	
	$wp_customize->add_setting('Child_pages_setting_three', array(
	'default' => '7'
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'Child_pages_control_C', array(
	'label' => 'Select Category(in numbers) for C',
	'section' => 'Child_pages_section',
	'settings' => 'Child_pages_setting_three'
	)));
}
add_action('customize_register', 'Child_pages');
/*Child pages post*/
