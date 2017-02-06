<?php


function theme_styles() {

	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'bootstrap-glyphicons_css', get_template_directory_uri() . '/css/bootstrap-glyphicons.css' );
	wp_enqueue_style( 'mystyles_css', get_template_directory_uri() . '/css/mystyles.css' );
	
	wp_enqueue_style( 'style_css', get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'theme_styles' );


function add_isotope() {
    wp_register_script( 'isotope', get_template_directory_uri().'/js/isotope.js', array('jquery'),  true );
    wp_register_script( 'isotope-init', get_template_directory_uri().'/js/isotope_init.js', array('jquery', 'isotope'),  true );
    wp_register_style( 'isotope-css', get_stylesheet_directory_uri() . '/css/isotope.css' );
 
    wp_enqueue_script('isotope-init');
    wp_enqueue_style('isotope-css');
}
 
add_action( 'wp_enqueue_scripts', 'add_isotope' );



function theme_js() {

	global $wp_scripts;

	wp_register_script( 'html5_shiv', get_template_directory_uri().'/js/html5shiv.js', '', '', false );
	wp_register_script( 'respond_js', get_template_directory_uri().'/js/respond.min.js', '', '', false );

	$wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
	$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );


}
add_action( 'wp_enqueue_scripts', 'theme_js' );



add_action( 'after_setup_theme', 'theme_slug_setup' );

function theme_slug_setup() {

	add_theme_support( 'title-tag' );
}


function pagination_nav() {
    global $wp_query;
 
    if ( $wp_query->max_num_pages > 1 ) { ?>
        <nav class="pagination" role="navigation">
            <div class="nav-previous"><?php next_posts_link( '&larr; Older posts' ); ?></div>
            <div class="nav-next"><?php previous_posts_link( 'Newer posts &rarr;' ); ?></div>
        </nav>
<?php }
}

//RSS
add_theme_support( 'automatic-feed-links' );




 	$defaults = array(
		'before'           => '<p>' . __( 'Pages:' ),
		'after'            => '</p>',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => __( 'Next page' ),
		'previouspagelink' => __( 'Previous page' ),
		'pagelink'         => '%',
		'echo'             => 1
	);
 
        wp_link_pages( $defaults );
// Content Width
if ( ! isset( $content_width ) ) $content_width = 900; 

// Add custom menus 

add_theme_support('menus');
add_theme_support('post-thumbnails');

function register_theme_menus() {
	register_nav_menus (
	array(
	'header-menu' => _('Header Menu'),
	'1990s' => _('1990s'),
	'2000s' => _('2000s'),
	'2010s' => _('2010s')
	
	)
	
	);
}

add_action ('init', 'register_theme_menus'); 


function wpb_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Front Page Left', 'mk-bootstrap-template' ),
		'id' => 'sidebar-1',
		'description' => __( 'Displays on the left of the homepage', 'mk-bootstrap-template' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Front Page Center', 'mk-bootstrap-template' ),
		'id' => 'sidebar-2',
		'description' => __( 'Displays on the center of homepage', 'mk-bootstrap-template' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
		register_sidebar( array(
			'name' => __( 'Front Page Right', 'mk-bootstrap-template' ),
		'id' => 'sidebar-3',
		'description' => __( 'Displays on the center of the homepage', 'mk-bootstrap-template' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
		register_sidebar( array(
		'name' =>__( 'Blog Sidebar', 'mk-bootstrap-template'),
		'id' => 'sidebar-4',
		'description' => __( 'Displays on the blog sidebar', 'mk-bootstrap-template' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
		register_sidebar( array(
		'name' =>__( 'Page Sidebar', 'mk-bootstrap-template'),
		'id' => 'sidebar-5',
		'description' => __( 'Displays on the pages sidebar', 'mk-bootstrap-template' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
		register_sidebar( array(
		'name' =>__( 'item Sidebar', 'mk-bootstrap-template'),
		'id' => 'sidebar-6',
	'description' => __( 'Displays on the item page sidebar', 'mk-bootstrap-template' ),
	'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
		register_sidebar( array(
		'name' => __( 'Footer Left', 'mk-bootstrap-template' ),
		'id' => 'sidebar-7',
		'description' => __( 'Displays on the left of the footer', 'mk-bootstrap-template' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
		register_sidebar( array(
		'name' => __( 'Footer Center', 'mk-bootstrap-template' ),
		'id' => 'sidebar-8',
		'description' => __( 'Displays on the center of the footer', 'mk-bootstrap-template' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
		register_sidebar( array(
		'name' => __( 'Footer Right', 'mk-bootstrap-template' ),
		'id' => 'sidebar-9',
		'description' => __( 'Displays on the right of the footer', 'mk-bootstrap-template' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
	

	}

add_action( 'widgets_init', 'wpb_widgets_init' );






 function new_excerpt_more($more) {
   global $post;
   return '<a href="'. get_permalink($post->ID) . '">' . 'Read More &raquo;' . '</a>';
   }
   add_filter('excerpt_more', 'new_excerpt_more');
   
  
  

function theme_queue_js(){
if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') )
  wp_enqueue_script( 'comment-reply' );
}
add_action('wp_print_scripts', 'theme_queue_js');


add_editor_style(); 


$defaults = array(
	'default-color'          => '',
	'default-image'          => '',
	'default-repeat'         => '',
	'default-position-x'     => '',
	'default-attachment'     => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $defaults );



?>
