<?php

/**
 * adding script of slider 
 */
//add_action( 'wp_enqueue_scripts', 'nivo_slider_simplified_add_scripts' );
add_action( 'admin_enqueue_scripts', 'nivo_slider_simplified_add_scripts' );
add_action( 'admin_enqueue_scripts', 'nivo_slider_simplified_styles' );

/**
 * Register and enqueue a script that does not depend on a JavaScript library.
 */
function nivo_slider_simplified_add_scripts() {
   

    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-draggable');
    //wp_enqueue_script('jquery-ui-droppable');
    wp_enqueue_script('jquery-ui-sortable');
	//wp_register_script('admin_nivo_simplified', plugins_url('js/admin_nivo.js', __FILE__), array("jquery"));
	wp_register_script('admin_nivo_simplified', (NIVO_SLIDER_SIMPLIFIED_DIR.'/js/admin_nivo.js'), array("jquery"));
    wp_enqueue_script('admin_nivo_simplified');
    
    	 
}

/**
 * adding admin css
 */
 function nivo_slider_simplified_styles() {
    wp_register_style('nivo_simplified_css', (NIVO_SLIDER_SIMPLIFIED_DIR.'/css/admin_styles.css'));
    wp_enqueue_style('nivo_simplified_css');
  }





add_action( 'init', 'nivo_slider_simplified_sliders' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function nivo_slider_simplified_sliders() {
	$labels = array(
		'name'               => _x( 'Nivo Sliders', 'post type general name', 'nivo-slider-simplified' ),
		'singular_name'      => _x( 'Nivo Sliders', 'post type singular name', 'nivo-slider-simplified' ),
		'menu_name'          => _x( 'Nivo Sliders', 'admin menu', 'nivo-slider-simplified' ),
		'name_admin_bar'     => _x( 'Nivo Sliders', 'add new on admin bar', 'nivo-slider-simplified' ),
		'add_new'            => _x( 'Add New Nivo Slider', 'Nivo Slider', 'nivo-slider-simplified' ),
		'add_new_item'       => __( 'Add New Nivo Slider', 'nivo-slider-simplified' ),
		'new_item'           => __( 'New Nivo Slider', 'nivo-slider-simplified' ),
		'edit_item'          => __( 'Edit Nivo Slider', 'nivo-slider-simplified' ),
		'view_item'          => __( 'View Nivo Slider', 'nivo-slider-simplified' ),
		'all_items'          => __( 'All Nivo Sliders', 'nivo-slider-simplified' ),
		'search_items'       => __( 'Search Nivo Slider', 'nivo-slider-simplified' ),
		'parent_item_colon'  => __( 'Parent Nivo Sliders:', 'nivo-slider-simplified' ),
		'not_found'          => __( 'No Nivo Slider found.', 'nivo-slider-simplified' ),
		'not_found_in_trash' => __( 'No Nivo Slider found in Trash.', 'nivo-slider-simplified' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'nivo_sliders' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'show_in_menu'   => 'nivo_slider_simplified',
		'supports'           => array( 
									'title',
									//'editor', 
									//'author', 
									//'thumbnail', 
									//'excerpt', 
									//'comments' 
									)
	);
	
	

	register_post_type( 'nivo_sliders', $args );
	
	$labels = array(
		'name'               => _x( 'Nivo Slides', 'post type general name', 'nivo-slider-simplified' ),
		'singular_name'      => _x( 'Nivo Slide', 'post type singular name', 'nivo-slider-simplified' ),
		'menu_name'          => _x( 'Nivo Slides', 'admin menu', 'nivo-slider-simplified' ),
		'name_admin_bar'     => _x( 'Nivo Slide', 'add new on admin bar', 'nivo-slider-simplified' ),
		'add_new'            => _x( 'Add Nivo Slide', 'book', 'nivo-slider-simplified' ),
		'add_new_item'       => __( 'Add New Nivo Slide', 'nivo-slider-simplified' ),
		'new_item'           => __( 'New Nivo Slide', 'nivo-slider-simplified' ),
		'edit_item'          => __( 'Edit Nivo Slide', 'nivo-slider-simplified' ),
		'view_item'          => __( 'View Nivo Slide', 'nivo-slider-simplified' ),
		'all_items'          => __( 'All Nivo Slides', 'nivo-slider-simplified' ),
		'search_items'       => __( 'Search Nivo Slides', 'nivo-slider-simplified' ),
		'parent_item_colon'  => __( 'Parent Nivo Slides:', 'nivo-slider-simplified' ),
		'not_found'          => __( 'No Nivo Slides found.', 'nivo-slider-simplified' ),
		'not_found_in_trash' => __( 'No Nivo Slides found in Trash.', 'nivo-slider-simplified' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'nivo_slides' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		 'show_in_menu'   => 'nivo_slider_simplified',
		'supports'           => array( 
									'title',
									//'editor', 
									//'author', 
									'thumbnail', 
									'excerpt', 
									//'comments' 
									)
	);
	
		register_post_type( 'nivo_slides', $args );

	
}

// Change the columns for the edit CPT screen
function change_columns( $cols ) {
  $cols = array(
    'cb'       => '<input type="checkbox" />',
    'title'      => __( 'title',      'trans' ),
    'shortcode'      => __( 'Shortcode',      'trans' ),
     );
  return $cols;
}
add_filter( "manage_nivo_sliders_posts_columns", "change_columns" );

//content to fields
function custom_columns( $column, $post_id ) {
  switch ( $column ) {
    case "shortcode":
      $url = get_post_meta( $post_id, 'shortcode', true);
      echo '<a href="' . $shortcode . '">' . $shortcode. '</a>';
	  echo "[nivo_slider_simplified id='$post_id']";
      break;    
  }
}

add_action( "manage_nivo_sliders_posts_custom_column", "custom_columns", 10, 2 );

//meta boxes


/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function myplugin_add_meta_box() {

	$screens = array( 'nivo_sliders');

	foreach ( $screens as $screen ) {

		add_meta_box(
			'nivo_simplified_meta_box',
			__( 'Slides', 'nivo_slider_simplified' ),
			'nivo_simplified_meta_box_callback',
			$screen
		);
	}
}
add_action( 'add_meta_boxes_nivo_sliders', 'myplugin_add_meta_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function nivo_simplified_meta_box_callback( $post ) {

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'myplugin_meta_box', 'myplugin_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value = get_post_meta( $post->ID, 'nivo_slider_simplified_slides', true );

	//echo '<label for="myplugin_new_field">';
	//_e( 'Description for this field', 'nivo_slider_simplified' );
	//echo '</label> ';
	//echo '<input type="text" id="myplugin_new_field" name="myplugin_new_field" value="' . esc_attr( $value ) . '" size="25" />';
	echo '<input type="hidden" id="input_ttt" name="myplugin_new_field" value="' . esc_attr( $value ) . '" size="25" />';
	
	
//$args = array('post_type' => 'sbook','post_status' => 'publish',);
//query_posts($value);

                                
                
                
                
                
                ////////////////////////////////////////
                ?>
                
	<div id="full_content">
		
	<div class="content_area" id="droppable">
		
		<ul id="wp_sort">
			<p class="message_s"> Drop Below Slides Here</p>
			
						
		
				
		<?php
		


$id=$value;
			
			if(isset($id) && !empty($id)){
			
			
			//echo $id;
			$id= explode(',',$id);
			
			// echo $id;
			 foreach ($id as $i){
				 
				 $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($i), 'small' );
		
        $url = $thumb['0'];
				 
				 ?>
				 
				 <li><span id="<?php echo $i; ?>" class="wp_value"></span>
				 <img src="<?php echo $url; ?>" width="70px" height="70px"/>
				<span > <?php echo get_the_title(); ?></span>
				 <span class='ui-icon-trash'> Remove</span></li>
				<?php 
				 }
				 
				 
				 }


		  ?>
              
               
                
		
		
		
			
			
			
			
			
		
		</ul>
		
		
		
		
	
	</div>
	
	<div class="content_area_small">
	<ul>
		<p class="message_s"> Drag  Slides Up</p>
		
		<?php
			
$args = array('post_type' => 'nivo_slides','post_status' => 'publish',);
query_posts($args);

		 if ( have_posts() ) : while ( have_posts() ) : the_post();
		 
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'small' );
		
        $url = $thumb['0'];
		  ?>
                
                
                <li>
				<span id="<?php echo get_the_ID() ?>" class="wp_value"></span>
                <img src="<?php echo $url; ?>" width="70px" height="70px"/>
                <?php //the_post_thumbnail('small'); ?>
                <span ><?php the_title_attribute(); ?></span>
                <span class='ui-icon-trash'> Remove</span>
                </li>
                
                <?php endwhile; 
                
                else:
                echo "No slide yet added";
				echo "<br/>click here to any some Slide";
				echo "<a href='".admin_url("post-new.php?post_type=nivo_slides")."'> Add New Slide</a>";
                
                endif; 
                
                
                
                
                
                
                ////////////////////////////////////////
                ?>
		
		
		
		
		
		
		
		
		</ul>
	
	</div>
	
	</div>
                <?php
                /////////////////////////////////////////////
	
	



	
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function nivo_simplified_save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['myplugin_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['myplugin_meta_box_nonce'], 'myplugin_meta_box' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */
	
	// Make sure that it is set.
	if ( ! isset( $_POST['myplugin_new_field'] ) ) {
		return;
	}

	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['myplugin_new_field'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'nivo_slider_simplified_slides', $my_data );
}
add_action( 'save_post', 'nivo_simplified_save_meta_box_data' );

/**
 * Get option of current slide
 */
 function nss_get_option($slider_id)
 {
 $option =get_option("nivo_slider_simplified_options"); 
 //$option =$slider_id; 
   $effect = $option['effect'];
   $slices = $option['slices'];
   $boxCols = $option['boxCols'];
   $boxRows = $option['boxRows'];
   $animSpeed = $option['animSpeed'];
   $pauseTime = $option['pauseTime'];
   $startSlide = $option['startSlide'];
   $directionNav = $option['directionNav'];
   $directionNav=check_true_false($directionNav);

   $controlNav = $option['controlNav'];
   $controlNav=check_true_false($controlNav);

   $controlNavThumbs = $option['controlNavThumbs'];
   $controlNavThumbs=check_true_false($controlNavThumbs);

   $pauseOnHover = $option['pauseOnHover'];
   $pauseOnHover=check_true_false($pauseOnHover);

   $manualAdvance = $option['manualAdvance'];
   $manualAdvance=check_true_false($manualAdvance);

   $prevText = $option['prevText'];
   $nextText = $option['nextText'];
   $randomStart = $option['randomStart'];
   $randomStart=check_true_false($randomStart);
	
	$option=Array(
						"effect" => "$effect",
						"slices" => $slices,
						"boxCols" => $boxCols,
						"boxRows" => $boxRows,
						"animSpeed" => $animSpeed,
						"pauseTime" => $pauseTime,
						"startSlide" => $startSlide,
						"directionNav" => $directionNav,
						"controlNav" => $controlNav,
						"controlNavThumbs" => $controlNavThumbs,
						"pauseOnHover" => $pauseOnHover,
						"manualAdvance" => $manualAdvance,
						"prevText" => "$prevText",
						"nextText" => "$nextText",
						"randomStart" => $randomStart
					);
 /* $option=Array
(
    "effect" => "sliceDown",
    "slices" => 15,
    "boxCols" => 8,
    "boxRows" => 4,
    "animSpeed" => 500,
    "pauseTime" => 3000,
    "startSlide" => 1,
    "directionNav" => 1,
    "controlNav" => 1,
    "controlNavThumbs" => 1,
    "pauseOnHover" => 1,
    "manualAdvance" => 1,
    "prevText" => "Next",
    "nextText" => "Prev",
    "randomStart" => 1
); */
 return $option;
 
 }
 /**
  * check true or false
  */  
 function check_true_false($value)
 {
  if($value==1){$value="true";}else{$value="false";}
  return $value;
 }
