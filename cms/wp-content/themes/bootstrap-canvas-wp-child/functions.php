<?php 
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri().'/style.css' );
} 



add_theme_support( 'post-thumbnails' );

// Define additional "post thumbnails". Relies on MultiPostThumbnails to work
if (class_exists('MultiPostThumbnails')) {

$types = array('page', 'artists', 'show', 'episode', 'set', 'standup', 'sliders' ); /* 'landing_pages' adds support for landing pages CPT,  'post' adds support for blog single pages */
     foreach($types as $type) {

     new MultiPostThumbnails(array('label' => '2nd Feature Image', 'id' => 'feature-image-2', 'post_type' => $type));
     
     }

};

add_filter( 'rwmb_meta_boxes', 'YOURPREFIX_register_meta_boxes' );
function YOURPREFIX_register_meta_boxes( $meta_boxes )
{
    $prefix = 'rw_';
    // 1st meta box
    $meta_boxes[] = array(
        'id'         => 'personal',
        'title'      => 'Personal Information',
        'post_types' => array( 'post', 'page' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'name'  => 'Full name',
                'desc'  => 'Format: First Last',
                'id'    => $prefix . 'fname',
                'type'  => 'text',
                'std'   => 'Anh Tran',
                'class' => 'custom-class',
                'clone' => true,
            ),
        )
    );
    // 2nd meta box
    $meta_boxes[] = array(
        'title'      => 'Media',
        'post_types' => array('sliders' ),
        'fields'     => array(
            array(
                'name' => 'URL',
                'id'   => $prefix . 'media_file',
                'type' => 'file_input',
				'clone' => true,
            ),
        )
    );
    return $meta_boxes;
}



 /*?>add_action( 'init', 'create_my_post_types' );

function create_my_post_types() {
	register_post_type( 'sliders', 
		array(
			'labels' => array(
				'name' => __( 'Sliders and Banners' ),
				'singular_name' => __( 'Slider/Banner' ),
				'add_new' => __( 'Add New Slider/Banner' ),
				'add_new_item' => __( 'Add New Slider/Banner' ),
				'edit_item' => __( 'Edit Slider/Banner' ),
				'new_item' => __( 'Add New Slider/Banner' ),
				'view_item' => __( 'View Slider/Banner' ),
				'search_items' => __( 'Search Slider/Banner' ),
				'not_found' => __( 'No Slider/Banner found' ),
				'not_found_in_trash' => __( 'No Slider/Banner found in trash' )
			),
			'public' => true,
			'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'category'),
			'capability_type' => 'post',
			'rewrite' => array( 'slug' => 'slider','with_front' => FALSE),
	
	'hierarchical' => false,
			
			'menu_position' => 5,
			'taxonomies' => array('category'),  
			
		)
	);
	register_post_type( 'artists', 
		array(
			'labels' => array(
				'name' => __( 'Artists' ),
				'singular_name' => __( 'Artist' ),
				'add_new' => __( 'Add New Artist' ),
				'add_new_item' => __( 'Add New Artist' ),
				'edit_item' => __( 'Edit Artist' ),
				'new_item' => __( 'Add New Artist' ),
				'view_item' => __( 'View Artist' ),
				'search_items' => __( 'Search Artists' ),
				'not_found' => __( 'No Artist found' ),
				'not_found_in_trash' => __( 'No Artist found in trash' )
			),
			'public' => true,
			'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'category'),
			'taxonomies' => array('category'), 
			'capability_type' => 'post',
			'rewrite' => array( 'slug' => 'artist','with_front' => FALSE),
	
	'hierarchical' => false,
			
			'menu_position' => 4,
			 
			
		)
	);

}<?php */

    
	   register_taxonomy('custom_cat', 
    	array('custom_type'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Custom Categories', 'jointstheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Custom Category', 'jointstheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Custom Categories', 'jointstheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Custom Categories', 'jointstheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Custom Category', 'jointstheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Custom Category:', 'jointstheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Custom Category', 'jointstheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Custom Category', 'jointstheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Custom Category', 'jointstheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Custom Category Name', 'jointstheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true, 
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'custom-slug' ),
    	)
    );   
    
	// now let's add custom tags (these act like categories)
    register_taxonomy( 'custom_tag', 
    	array('custom_type'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => false,    /* if this is false, it acts like tags */                
    		'labels' => array(
    			'name' => __( 'Custom Tags', 'jointstheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Custom Tag', 'jointstheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Custom Tags', 'jointstheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Custom Tags', 'jointstheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Custom Tag', 'jointstheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Custom Tag:', 'jointstheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Custom Tag', 'jointstheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Custom Tag', 'jointstheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Custom Tag', 'jointstheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Custom Tag Name', 'jointstheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true,
    		'show_ui' => true,
    		'query_var' => true,
    	)
    ); 
    
    /*
    	looking for custom meta boxes?
    	check out this fantastic tool:
    	https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
    

    	// let's create the function for the custom type
    	function espacio() { 
    		// creating (registering) the custom type 
    		register_post_type( 'espacio', /* (http://codex.wordpress.org/Function_Reference/register_post_type)  d
    		 	// let's now add all the options for this post type
    			array('labels' => array(
    				'name' => __('Espacios de exhibición', 'jointstheme'), 
    				'singular_name' => __('Espacio', 'jointstheme'), 
    				'all_items' => __('Todos los espacios', 'jointstheme'), 
    				'add_new' => __('Crear nuevo espacio', 'jointstheme'), 
    				'add_new_item' => __('Nuevo espacio', 'jointstheme'), 
    				'edit' => __( 'Editar este espacio', 'jointstheme' ),
    				'edit_item' => __('Editar este espacio', 'jointstheme'),
    				'new_item' => __('Nuevo espacio', 'jointstheme'), 
    				'view_item' => __('Ver este espacio', 'jointstheme'), 
    				'search_items' => __('Buscar espacio', 'jointstheme'), 
    				'not_found' =>  __('No ha sido creado ningún espacio.', 'jointstheme'), 
    				'not_found_in_trash' => __('No hay nada en la basura.', 'jointstheme'),
    				'parent_item_colon' => ''
    				), 
    				'description' => __( 'Esta es una publicacion de tipo Espacio', 'jointstheme' ), 
    				'public' => true,
    				'publicly_queryable' => true,
    				'exclude_from_search' => false,
    				'show_ui' => true,
    				'query_var' => true,
    				'menu_position' => 12, 
    				'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png',
    				'rewrite'	=> array( 'slug' => 'espacio', 'with_front' => false ), 
    				'has_archive' => 'espacios', 
    				'capability_type' => 'post',
    				'hierarchical' => false,
    				
    				'supports' => array( 'title',
    									 'editor',
    									 'author', 
    									 'thumbnail', 
    									 'excerpt',
    									 'custom-fields',
    									 'comments',
    									 'revisions', 'category')
    				) 
    		); 
    		
    		
    		register_taxonomy_for_object_type('category', 'custom_type');
    		register_taxonomy_for_object_type('post_tag', 'custom_type');
    		
    	} 

    		add_action( 'init', 'espacio');


*/



// let's create the function for the custom type
function sliders() { 
	// creating (registering) the custom type 
	register_post_type( 'sliders', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Sliders', 'jointstheme'), /* This is the Title of the Group */
			'singular_name' => __('Sliders', 'jointstheme'), /* This is the individual type */
			'all_items' => __('All Sliders', 'jointstheme'), /* the all items menu item */
			'add_new' => __('Add New Slider', 'jointstheme'), /* The add new menu item */
			'add_new_item' => __('Add New Slider', 'jointstheme'), /* Add New Display Title */
			'edit' => __( 'Edit Sliders', 'jointstheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Slider', 'jointstheme'), /* Edit Display Title */
			'new_item' => __('New Slider', 'jointstheme'), /* New Display Title */
			'view_item' => __('View Slider', 'jointstheme'), /* View Display Title */
			'search_items' => __('Search Sliders', 'jointstheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'jointstheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'jointstheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'All Main Sliders', 'jointstheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 12, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-images-alt2', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'sliders', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'sliders', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title',
								 'editor', 
								 'thumbnail', 
								 'excerpt',
								 'trackbacks', 
								 'custom-fields',
								 'sticky'),
								 
			
			) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type('category', 'sliders');
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type('post_tag', 'custom_type');
	
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'sliders');


/*
// let's create the function for the custom type
function eventos() { 
	// creating (registering) the custom type 
	register_post_type( 'shows', /* (http://codex.wordpress.org/Function_Reference/register_post_type) 
	 	// let's now add all the options for this post type
		
		array('labels' => array(
			'name' => __('Shows', 'jointstheme'), 
			'singular_name' => __('Show', 'jointstheme'), 
			'all_items' => __('All Shows', 'jointstheme'), 
			'add_new' => __('Add New Show', 'jointstheme'), 
			'add_new_item' => __('Add New Show', 'jointstheme'), 
			'edit' => __( 'Edit Show', 'jointstheme' ), 
			'edit_item' => __('Edit Show', 'jointstheme'),
			'new_item' => __('New Show', 'jointstheme'),
			'view_item' => __('View Show', 'jointstheme'), 
			'search_items' => __('Search Shows', 'jointstheme'), 
			'not_found' =>  __('Nothing found in the Database.', 'jointstheme'), 
			'not_found_in_trash' => __('Nothing found in Trash', 'jointstheme'),
			'parent_item_colon' => ''
			), 
			'description' => __( 'Gunga7 Shows', 'jointstheme' ), 
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 12, 
			'menu_icon' => 'dashicons-format-video', 
			'rewrite'	=> array( 'slug' => 'shows', 'with_front' => false ),
			'has_archive' => 'shows', 
			'capability_type' => 'post',
			'hierarchical' => false,
			'yarpp_support' => true,
			
			'supports' => array( 'title',
								 'editor',
								 'author', 
								 'thumbnail', 
								 'excerpt',
								 'trackbacks', 
								 'custom-fields',
								 'comments',
								 'revisions',
								 'sticky'),
								 
			) 
	); 
	
	register_taxonomy_for_object_type('category', 'shows', 'post_tag');
	register_taxonomy_for_object_type('post_tag', 'shows');
	

	
}  */

	// adding the function to the Wordpress init
	//add_action( 'init', 'eventos');

// let's create the function for the custom type
function featured() { 
	// creating (registering) the custom type 
	register_post_type( 'featured', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Featured Items', 'jointstheme'), /* This is the Title of the Group */
			'singular_name' => __('Featured Item', 'jointstheme'), /* This is the individual type */
			'all_items' => __('All Featured Items', 'jointstheme'), /* the all items menu item */
			'add_new' => __('Add New', 'jointstheme'), /* The add new menu item */
			'add_new_item' => __('Add New Featured Item', 'jointstheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'jointstheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Featured Item', 'jointstheme'), /* Edit Display Title */
			'new_item' => __('New Featured Item', 'jointstheme'), /* New Display Title */
			'view_item' => __('View Featured Item', 'jointstheme'), /* View Display Title */
			'search_items' => __('Search Featured Items', 'jointstheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'jointstheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'jointstheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Featured items on site', 'jointstheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 5, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-star-filled', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'featured', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'featured', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title',
								 'editor',
								 'thumbnail', 
								 'excerpt',
								 'custom-fields',
								 'sticky')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type('category', 'featured', 'post_tag');
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type('post_tag', 'custom_type');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'featured');



// let's create the function for the custom type
function artists() { 
	// creating (registering) the custom type 
	
	register_post_type( 'artists',/* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Artists', 'jointstheme'), /* This is the Title of the Group */
			
			'singular_name' => __('Artist', 'jointstheme'), /* This is the individual type */
			'all_items' => __('All Artists', 'jointstheme'), /* the all items menu item */
			'add_new' => __('New Artist', 'jointstheme'), /* The add new menu item */
			'add_new_item' => __('Add New Artist', 'jointstheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'jointstheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Artist', 'jointstheme'), /* Edit Display Title */
			'new_item' => __('New Artist', 'jointstheme'), /* New Display Title */
			'view_item' => __('View Artist', 'jointstheme'), /* View Display Title */
			'search_items' => __('Search Artists', 'jointstheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'jointstheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'jointstheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			
			), /* end of arrays */
			'description' => __( 'All Artists', 'jointstheme' ), /* Custom Type Description */
			'public' => true,
			
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 4, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-admin-users', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'artists', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'artists', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			
			
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title',
								 'editor',
								 'thumbnail', 
								 'excerpt',
								 'custom-fields',
								 'sticky',
								 'yarpp_support')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type('category', 'artists');
	
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type('post_tag', 'artists');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'artists');




function add_custom_types_to_tax( $query ) {
if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {

// Get all your post types

	

$post_types = array( 'post', 'artists', 'show', 'standup' );

$query->set( 'post_type', $post_types );
return $query;
}
}
add_filter( 'pre_get_posts', 'add_custom_types_to_tax' );


/*
 * Add a portfolio custom post type.
 
add_action('init', 'create_redvine_portfolio');
function create_redvine_portfolio() 
{
  $labels = array(
    'name' => _x('Portfolio', 'portfolio'),
    'singular_name' => _x('Portfolio', 'portfolio'),
    'add_new' => _x('Add New', 'portfolio'),
    'add_new_item' => __('Add New Portfolio Item'),
    'edit_item' => __('Edit Item'),
    'new_item' => __('New Item'),
    'view_item' => __('View Item'),
    'search_items' => __('Search Items'),
    'not_found' =>  __('No items found'),
    'not_found_in_trash' => __('No items found in Trash'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 20,
    'supports' => array('title','editor','thumbnail')
  ); 
  register_post_type('portfolio',$args);
}
register_taxonomy( "portfolio-categories", 
	array( 	"portfolio" ), 
	array( 	"hierarchical" => true,
			"labels" => array('name'=>"Creative Fields",'add_new_item'=>"Add New Field"), 
			"singular_label" => __( "Field" ), 
			"rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
							'with_front' => false)
		 ) 
);*/



/*
 * Add a SHOWS custom post type.
 */
add_action('init', 'create_redvine_shows');
function create_redvine_shows() 
{
  $labels = array(
    'name' => _x('Shows', 'Show'),
    'singular_name' => _x('Show', 'show'),
    'add_new' => _x('Add New', 'show'),
    'add_new_item' => __('Add New Show Item'),
    'edit_item' => __('Edit Item'),
    'new_item' => __('New Item'),
    'view_item' => __('View Item'),
    'search_items' => __('Search Items'),
    'not_found' =>  __('No items found'),
    'not_found_in_trash' => __('No items found in Trash'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
	'publicly_queryable' => true,
	'exclude_from_search' => false,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite'	=> array( 'slug' => 'show', 'with_front' => false ), /* you can specify its url slug */
	'has_archive' => 'show', /* you can rename the slug here */
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 3,
	'menu_icon' => 'dashicons-format-video', /* the icon for the custom post type menu */
    'supports' => array('title','editor','thumbnail'),
	'exclude_from_search' => false,
  ); 
  register_post_type('show',$args);
  register_taxonomy_for_object_type('category', 'show');
}
register_taxonomy( "show-categories", 
	array( 	"show" ), 
	array( 	"hierarchical" => true,
			"labels" => array('name'=>"Featured Artists",'add_new_item'=>"Add New Field"), 
			"singular_label" => __( "Field" ), 
			//"rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
							//'with_front' => false)
		 ) 
);
register_taxonomy( "season", 
	array( 	"show" ), 
	array( 	"hierarchical" => true,
			"labels" => array('name'=>"Season",'add_new_item'=>"Add New Field"), 
			"singular_label" => __( "Field" ), 
			//"rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
							//'with_front' => false)
		 ) 
);

/*register_taxonomy( "show-recommended", 
	array( 	"show" ), 
	array( 	"hierarchical" => true,
			"labels" => array('name'=>"Recommended",'add_new_item'=>"Add New Field"), 
			"singular_label" => __( "Field" ), 
			//"rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
							//'with_front' => false)
		 ) 
);*/
/*
 * Add a EPISODES / SKETCHES custom post type.
 */
add_action('init', 'create_redvine_episodes');
function create_redvine_episodes() 
{
  $labels = array(
    'name' => _x('Episodes / Sketches', 'Episode / Sketch'),
    'singular_name' => _x('Episode / Sketch', 'episode'),
    'add_new' => _x('Add New', 'episode'),
    'add_new_item' => __('Add New Episode / Sketch'),
    'edit_item' => __('Edit Episode / Sketch'),
    'new_item' => __('New Episode / Sketch'),
    'view_item' => __('View Episode / Sketch'),
    'search_items' => __('Search Episodes / Sketches'),
    'not_found' =>  __('No items found'),
    'not_found_in_trash' => __('No items found in Trash'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 3,
	'menu_icon' => 'dashicons-format-video', /* the icon for the custom post type menu */
    'supports' => array('title','editor','thumbnail'),
	'exclude_from_search' => false,
  ); 
  register_post_type('episode',$args);
  register_taxonomy_for_object_type('category', 'episode');
}
register_taxonomy( "episode-categories", 
	array( 	"episode" ), 
	array( 	"hierarchical" => true,
			"labels" => array('name'=>"Featured Artists",'add_new_item'=>"Add New Field"), 
			"singular_label" => __( "Field" ), 
			//"rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
							//'with_front' => false)
		 ) 
);
register_taxonomy( "show-titles", 
	array( 	"episode" ), 
	array( 	"hierarchical" => true,
			"labels" => array('name'=>"Show Titles",'add_new_item'=>"Add New Field"), 
			"singular_label" => __( "Field" ), 
			//"rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
							//'with_front' => false)
		 ) 
);
register_taxonomy( "season", 
	array( 	"episode" ), 
	array( 	"hierarchical" => true,
			"labels" => array('name'=>"Season",'add_new_item'=>"Add New Field"), 
			"singular_label" => __( "Field" ), 
			//"rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
							//'with_front' => false)
		 ) 
);

/* this adds your post categories to your custom post type */
	
/*
 * Add a Stand-Up custom post type.
 */
add_action('init', 'create_redvine_standup');
function create_redvine_standup() 
{
  $labels = array(
    'name' => _x('Stand-Up', 'Stand-Up'),
    'singular_name' => _x('Stand-Up', 'standup'),
    'add_new' => _x('Add New', 'standup'),
    'add_new_item' => __('Add New Stand-Up Item'),
    'edit_item' => __('Edit Item'),
    'new_item' => __('New Item'),
    'view_item' => __('View Item'),
    'search_items' => __('Search Items'),
    'not_found' =>  __('No items found'),
    'not_found_in_trash' => __('No items found in Trash'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 2,
	'menu_icon' => 'dashicons-universal-access-alt', /* the icon for the custom post type menu */
    'supports' => array('title','editor','thumbnail'),
	'exclude_from_search' => false,
  ); 
  register_post_type('standup',$args);
  register_taxonomy_for_object_type('category', 'standup');
}
register_taxonomy( "standup-categories", 
	array( 	"standup" ), 
	array( 	"hierarchical" => true,
			"labels" => array('name'=>"Featured Artists",'add_new_item'=>"Add New Field"), 
			"singular_label" => __( "Field" ), 
			//"rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
							//'with_front' => false)
		 ) 
);
/*register_taxonomy( "standup-recommended", 
	array( 	"standup" ), 
	array( 	"hierarchical" => true,
			"labels" => array('name'=>"Recommended",'add_new_item'=>"Add New Field"), 
			"singular_label" => __( "Field" ), 
			//"rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
							//'with_front' => false)
		 ) 
);*/

/*
 * Add a Stand-Up custom post type.
 */
add_action('init', 'create_redvine_set');
function create_redvine_set() 
{
  $labels = array(
    'name' => _x('Sets', 'Set'),
    'singular_name' => _x('Set', 'set'),
    'add_new' => _x('Add New', 'set'),
    'add_new_item' => __('Add New Set'),
    'edit_item' => __('Edit Set'),
    'new_item' => __('New Set'),
    'view_item' => __('View Set'),
    'search_items' => __('Search Sets'),
    'not_found' =>  __('No items found'),
    'not_found_in_trash' => __('No items found in Trash'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 2,
	'menu_icon' => 'dashicons-universal-access-alt', /* the icon for the custom post type menu */
    'supports' => array('title','editor','thumbnail'),
	'exclude_from_search' => false,
  ); 
  register_post_type('set',$args);
  register_taxonomy_for_object_type('category', 'set');
}
register_taxonomy( "set-categories", 
	array( 	"set" ), 
	array( 	"hierarchical" => true,
			"labels" => array('name'=>"Featured Artists",'add_new_item'=>"Add New Field"), 
			"singular_label" => __( "Field" ), 
			//"rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
							//'with_front' => false)
		 ) 
);
register_taxonomy( "set-titles", 
	array( 	"set" ), 
	array( 	"hierarchical" => true,
			"labels" => array('name'=>"Stand-Up Titles",'add_new_item'=>"Add New Field"), 
			"singular_label" => __( "Field" ), 
			//"rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
							//'with_front' => false)
		 ) 
);


/* this adds your post categories to your custom post type */

 /*?>add_theme_support( 'post-thumbnails' );
//Set second featured image
if (class_exists('MultiPostThumbnails')) {
	new MultiPostThumbnails(array(
	'label' => 'Thumbnail',
	'id' => 'secondary-image',
	'post_type' => array('show','artists','set','standup','episode')
	)
);
}
add_image_size('second-image', 160, 95);<?php */



function SearchFilter($query) {
  if ($query->is_search) {
    // Insert the specific post type you want to search
    $query->set('post_type', array('shows', 'standup'));
  }
  return $query;
}

// This filter will jump into the loop and arrange our results before they're returned
add_filter('pre_get_posts','SearchFilter');

function filter_search($query) {
    if ($query->is_search) {
	$query->set('post_type', array('post', 'artists','show','standup','episode', 'set'));
    };
    return $query;
};
add_filter('pre_get_posts', 'filter_search');


//META BOX
define('MY_WORDPRESS_FOLDER',$_SERVER['DOCUMENT_ROOT']);
define('MY_THEME_FOLDER',str_replace("\\",'/',dirname(__FILE__)));
define('MY_THEME_PATH','/' . substr(MY_THEME_FOLDER,stripos(MY_THEME_FOLDER,'wp-content')));
 
add_action('admin_init','my_meta_init');
 
function my_meta_init()
{
    // review the function reference for parameter details
    // http://codex.wordpress.org/Function_Reference/wp_enqueue_script
    // http://codex.wordpress.org/Function_Reference/wp_enqueue_style
 
    wp_enqueue_script('my_meta_js', MY_THEME_PATH . '/custom/bootstrap.min.js', array('jquery'));
	wp_enqueue_script('my_meta_js', MY_THEME_PATH . '/custom/jquery.js', array('jquery'));
    wp_enqueue_style('my_meta_css', MY_THEME_PATH . '/custom/meta.css');
 
    // review the function reference for parameter details
    // http://codex.wordpress.org/Function_Reference/add_meta_box
 	
    // add a meta box for each of the wordpress page types: posts and pages
    foreach (array('post','page','episode', 'artists', 'show', 'set', 'standup') as $type) 
    {
        add_meta_box('my_all_meta', 'Video URL', 'my_meta_setup', $type, 'normal', 'high');
    }
	
    // add a callback function to save any data a user enters in
    add_action('save_post','my_meta_save');
	
}
 
function my_meta_setup()
{
    global $post;
  
    // using an underscore, prevents the meta variable
    // from showing up in the custom fields section
    $meta = get_post_meta($post->ID,'_my_meta',TRUE);
  
    // instead of writing HTML here, lets do an include
    include(MY_THEME_FOLDER . '/custom/meta.php');
  
    // create a custom nonce for submit verification later
    echo '<input type="hidden" name="my_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}

  
function my_meta_save($post_id) 
{
    // authentication checks
 
    // make sure data came from our meta box
    if (!wp_verify_nonce($_POST['my_meta_noncename'],__FILE__)) return $post_id;
 
    // check user permissions
    if ($_POST['post_type'] == 'page') 
    {
        if (!current_user_can('edit_page', $post_id)) return $post_id;
    }
    else
    {
        if (!current_user_can('edit_post', $post_id)) return $post_id;
    }
 
    // authentication passed, save data
 
    // var types
    // single: _my_meta[var]
    // array: _my_meta[var][]
    // grouped array: _my_meta[var_group][0][var_1], _my_meta[var_group][0][var_2]
 
    $current_data = get_post_meta($post_id, '_my_meta', TRUE);  
  
    $new_data = $_POST['_my_meta'];
 
    my_meta_clean($new_data);
     
    if ($current_data) 
    {
        if (is_null($new_data)) delete_post_meta($post_id,'_my_meta');
        else update_post_meta($post_id,'_my_meta',$new_data);
    }
    elseif (!is_null($new_data))
    {
        add_post_meta($post_id,'_my_meta',$new_data,TRUE);
    }
 
    return $post_id;
}
 
function my_meta_clean(&$arr)
{
    if (is_array($arr))
    {
        foreach ($arr as $i => $v)
        {
            if (is_array($arr[$i])) 
            {
                my_meta_clean($arr[$i]);
 
                if (!count($arr[$i])) 
                {
                    unset($arr[$i]);
                }
            }
            else
            {
                if (trim($arr[$i]) == '') 
                {
                    unset($arr[$i]);
                }
            }
        }
 
        if (!count($arr)) 
        {
            $arr = NULL;
        }
    }
}





//Stop duplicate posts from showing under shows where multiple taxonomies are selected//
/*
$bmIgnorePosts = array();

function bm_ignorePost ($id) {
	if (!is_page()) {
		global $bmIgnorePosts;
		$bmIgnorePosts[] = $id;
	}
}
function bm_ignorePostReset () {
	global $bmIgnorePosts;
	$bmIgnorePosts = array();
}
function bm_postStrip ($where) {
	global $bmIgnorePosts, $wpdb;
	if (count($bmIgnorePosts) > 0) {
		$where .= ' AND ' . $wpdb->posts . '.ID NOT IN(' . implode (',', $bmIgnorePosts) . ') ';
	}
	return $where;
}

add_filter ('posts_where', 'bm_postStrip');
*/

// Add to admin_init function
add_filter('manage_edit-episode_columns', 'add_new_episode_columns');

function add_new_episode_columns($episode_columns) {
    $new_columns['cb'] = '<input type="checkbox" />';
     
    /*$new_columns['id'] = __('ID');*/
    $new_columns['title'] = _x('Show Title', 'column name');
	$new_columns['secondary_title'] = __('Season / Episode');
     
    $new_columns['categories'] = __('Categories');
    $new_columns['tags'] = __('Tags');
 
    $new_columns['date'] = _x('Date', 'column name');
 
    return $new_columns;
}

   // Add to admin_init function
add_action('manage_episode_posts_custom_column', 'manage_episode_columns', 10, 2);
 
function manage_episode_columns($column_name, $id) {
    global $wpdb;
    switch ($column_name) {
    case 'id':
        echo $id;
            break;
 
    case 'images':
        // Get number of images in gallery
        $num_images = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $wpdb->posts WHERE post_parent = %d;", $id));
        echo $num_images; 
        break;
    default:
        break;
    } // end switch
	
}   





