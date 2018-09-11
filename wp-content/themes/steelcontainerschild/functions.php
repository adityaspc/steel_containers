<?php
//
// Recommended way to include parent theme styles.
//  (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
//  
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}
//  add custom menu
register_nav_menus( array(		
		'footer-menu' => __( 'Footer Menu', 'twentyseventeen' ),
	) );

function connect_form( $atts ) {
	require_once('ajax_connect_form.php');	
	require_once('connect_form.php');	
}
add_shortcode( '360connect', 'connect_form' );

function ajax_form_submit(){
 parse_str($_POST['formdata'], $searcharray);
$ch = curl_init();
$live_url = "https://app.leadconduit.com/flows/56f43aaa2de2a66e7b86c529/sources/5ad4ee85fa4d955a898bc1a5/submit";
$fields = array(
    'answer1_text_360' => urlencode($searcharray['answer1_text_360']),
    'answer2_text_360' => urlencode($searcharray['answer2_text_360']),    
    'building_dim_length_360' => urlencode($searcharray['building_dim_length_360']),
    'building_dim_height_360' => urlencode($searcharray['building_dim_height_360']),
    'building_dim_width_360' => urlencode($searcharray['building_dim_width_360']),
    'building_dim_sqf_360' => urlencode($searcharray['building_dim_sqf_360']),
    'first_name' => urlencode($searcharray['FirstName']),
    'last_name' => urlencode($searcharray['LastName']),
    'company' => urlencode($searcharray['CompanyName']),
    'phone_1' => urlencode($searcharray['Phone']),
    'email' => urlencode($searcharray['Email']),    
    'install_postal_code_360'=>urlencode($searcharray['PostalCode']),
    'affiliate_campaign_id_360' => 'C4A88C2A-D431-4A34-AFF3-A821C6F06DE0',
    'category_name_360' => 'Steel Buildings',
    'test_mode_360' => '1'    
);
echo "<pre>"; print_r($fields);
//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');
//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $live_url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);



print_r($result);

}
add_action("wp_ajax_ajax_form_submit", "ajax_form_submit");
add_action("wp_ajax_nopriv_ajax_form_submit", "ajax_form_submit");


/*Slider*/
function custom_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Slider', 'Post Type General Name', 'weddingwhisper' ),
        'singular_name'       => _x( 'Sliders', 'Post Type Singular Name', 'weddingwhisper' ),
        'menu_name'           => __( 'Slider', 'weddingwhisper' ),
        'parent_item_colon'   => __( 'Parent Sliders', 'weddingwhisper' ),
        'all_items'           => __( 'All Slider', 'weddingwhisper' ),
        'view_item'           => __( 'View Sliders', 'weddingwhisper' ),
        'add_new_item'        => __( 'Add New Sliders', 'weddingwhisper' ),
        'add_new'             => __( 'Add New', 'weddingwhisper' ),
        'edit_item'           => __( 'Edit Sliders', 'weddingwhisper' ),
        'update_item'         => __( 'Update Sliders', 'weddingwhisper' ),
        'search_items'        => __( 'Search Sliders', 'weddingwhisper' ),
        'not_found'           => __( 'Not Found', 'weddingwhisper' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'weddingwhisper' ),
    );
      $labels_logo = array(
        'name'                => _x( 'Logo', 'Post Type General Name', 'weddingwhisper' ),
        'singular_name'       => _x( 'Logo', 'Post Type Singular Name', 'weddingwhisper' ),
        'menu_name'           => __( 'Logo', 'weddingwhisper' ),
        'parent_item_colon'   => __( 'Parent Logo', 'weddingwhisper' ),
        'all_items'           => __( 'All Logo', 'weddingwhisper' ),
        'view_item'           => __( 'View Logo', 'weddingwhisper' ),
        'add_new_item'        => __( 'Add New Logo', 'weddingwhisper' ),
        'add_new'             => __( 'Add New', 'weddingwhisper' ),
        'edit_item'           => __( 'Edit Logo', 'weddingwhisper' ),
        'update_item'         => __( 'Update Logo', 'weddingwhisper' ),
        'search_items'        => __( 'Search Logo', 'weddingwhisper' ),
        'not_found'           => __( 'Not Found', 'weddingwhisper' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'weddingwhisper' ),
    );
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'slider', 'weddingwhisper' ),
        'description'         => __( 'Slider news and reviews', 'weddingwhisper' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    $args_logo = array(
        'label'               => __( 'Logo', 'weddingwhisper' ),
        'description'         => __( 'Footer Logo', 'weddingwhisper' ),
        'labels'              => $labels_logo,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    ); 
    // Registering your Custom Post Type
    register_post_type( 'sldier', $args );
     register_post_type( 'logo', $args_logo );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_post_type', 0 );

/*Services*/
function post_type_services() {
register_post_type('services',
    array(
    'labels' => array(
            'name' => __( 'Services' ),
            'singular_name' => __( 'Services' ),
            'add_new' => __( 'Add New' ),
            'add_new_item' => __( 'Add New Services' ),
            'edit' => __( 'Edit' ),
            'edit_item' => __( 'Edit Services' ),
            'new_item' => __( 'New Services' ),
            'view' => __( 'View Services' ),
            'view_item' => __( 'View Services' ),
            'search_items' => __( 'Search Services' ),
            'not_found' => __( 'No Services found' ),
            'not_found_in_trash' => __( 'No Services found in Trash' ),
            'parent' => __( 'Parent Services' ),
        ),
  'public' => true,
  'show_ui' => true,
        'exclude_from_search' => true,
        'hierarchical' => true,
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'query_var' => true
        )
  );
}
add_action('init', 'post_type_services');
add_action( 'init', 'create_services_taxonomies', 0 );
function create_services_taxonomies()
{
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name' => _x( 'Services Category', 'taxonomy general name' ),
    'singular_name' => _x( 'Services Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Services Category' ),
    'popular_items' => __( 'Popular Services Category' ),
    'all_items' => __( 'All Services Category' ),
    'parent_item' => __( 'Parent Services Category' ),
    'parent_item_colon' => __( 'Parent Services Category:' ),
    'edit_item' => __( 'Edit Services Category' ),
    'update_item' => __( 'Update Services Category' ),
    'add_new_item' => __( 'Add New Services Category' ),
    'new_item_name' => __( 'New Services Category Name' ),
  );
  register_taxonomy('services_cat',array('services'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'services-cat' ),
  ));
}