<?php

/**
 * adding script of slider frontend
 */
add_action( 'wp_enqueue_scripts', 'nivo_slider_simplified_f_scripts' );
add_action( 'wp_enqueue_scripts', 'nivo_slider_simplified_f_style' );
//add_action( 'admin_enqueue_scripts', 'nivo_slider_simplified_add_scripts' );
//add_action( 'admin_enqueue_scripts', 'nivo_slider_simplified_styles' );

/**
 * Register and enqueue a script that does not depend on a JavaScript library.
 */
function nivo_slider_simplified_f_scripts() {
    wp_enqueue_script('jquery');
	//wp_register_script('front_nivo_simplified', (NIVO_SLIDER_SIMPLIFIED_DIR.'/js/jquery.nivo.slider.pack.js'), array("jquery"));
	wp_register_script('front_nivo_simplified', (NIVO_SLIDER_SIMPLIFIED_DIR.'/js/jquery.nivo.slider.js'), array("jquery"));
    wp_enqueue_script('front_nivo_simplified');
}

/**
 * adding front slider css
 */
 function nivo_slider_simplified_f_style() {
    wp_register_style('nivo_simplified_cssd', (NIVO_SLIDER_SIMPLIFIED_DIR.'/css/themes/default/default.css'));
	wp_enqueue_style('nivo_simplified_cssd');
    wp_register_style('nivo_simplified_cssl', (NIVO_SLIDER_SIMPLIFIED_DIR.'/css/themes/light/light.css'));
	wp_enqueue_style('nivo_simplified_cssl');
    wp_register_style('nivo_simplified_cssda', (NIVO_SLIDER_SIMPLIFIED_DIR.'/css/themes/dark/dark.css'));
	wp_enqueue_style('nivo_simplified_cssda');
    wp_register_style('nivo_simplified_cssb', (NIVO_SLIDER_SIMPLIFIED_DIR.'/css/themes/bar/bar.css'));
	wp_enqueue_style('nivo_simplified_cssb');
    wp_register_style('nivo_simplified_cssns', (NIVO_SLIDER_SIMPLIFIED_DIR.'/css/nivo-slider.css'));
	wp_enqueue_style('nivo_simplified_cssns');
    wp_register_style('nivo_simplified_csss', (NIVO_SLIDER_SIMPLIFIED_DIR.'/css/style.css'));
 
   // wp_enqueue_style('nivo_simplified_csss');
  }

/**
 * Nivo slider simplified
 */
 if(!class_exists('nivo_slider_simplified')):
   class nivo_slider_simplified
   {
   public function slider()
   {
	}


public function __construct()
{
add_shortcode( 'nivo_slider_simplified', 'nivo_slider_simplified_shortcode_catcher' );

}

function nivo_slider_simplified_shortcode_catcher() {
 
    ob_start(); 
	 add_filter('widget_text', 'do_shortcode'); //to enable shortcode in  text widget

	 
echo "insde slider ";





   return ob_get_clean();
	 

     }
   
   
   }//class ends here
  endif;
  //$sliders= new nivo_slider_simplified();
  
  
/**
 * short code working on functions
 */ 
  //add_filter('widget_text', 'do_shortcode');  
function nivo_slider_simplified_shortcode_catcher( $atts) {
 extract( shortcode_atts( array(
    'id' => 1
    
    ), $atts ) );
 
    //ob_start(); 
	 add_filter('widget_text', 'do_shortcode'); //to enable shortcode in  text widget

	 



$value = get_post_meta( $id, 'nivo_slider_simplified_slides', true );
//$id=$value;			
			if(isset($value) && !empty($value)){
			
			
			//echo $id;
			$all_posts= explode(',',$value);
			?>  
			<div class="slider-wrapper theme-default">
            <div id="slider_nivo_simplified_<?php echo $id ?>" class="nivoSlider">
			<?php	foreach ($all_posts as $i){				 
				 $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($i), 'large' );
                   $url = $thumb['0'];
				 ?><img src="<?php echo $url; ?>" data-thumb="<?php echo $url; ?>" alt=""  title="<?php echo get_the_title($i); ?>" /><?php } ?>
				 </div></div>
				 <?php  $nssoption =nss_get_option($id); 
				  /**
				   * for testing of setting
				   *
				  echo "<pre>";
				  print_r($nssoption);
				  echo "</pre>";
				  */
				 ?>
	
				 <script type="text/javascript">
				 
jQuery(window).load(function() {
	
jQuery('#slider_nivo_simplified_<?php echo $id ?>').nivoSlider({
    effect: '<?php echo $nssoption['effect'];?>',               // Specify sets like: 'fold,fade,sliceDown'
    slices: <?php echo $nssoption['slices'];?>,                     // For slice animations
    boxCols: <?php echo $nssoption['boxCols'];?>,                     // For box animations
    boxRows: <?php echo $nssoption['boxRows'];?>,                     // For box animations
    animSpeed: <?php echo $nssoption['animSpeed'];?>,                 // Slide transition speed
    pauseTime: <?php echo $nssoption['pauseTime'];?>,                // How long each slide will show
    startSlide: <?php echo $nssoption['startSlide'];?>,                  // Set starting Slide (0 index)
    directionNav: <?php echo $nssoption['directionNav'];?>,             // Next & Prev navigation
    controlNav: <?php echo $nssoption['controlNav'];?>,               // 1,2,3... navigation
    controlNavThumbs: <?php echo $nssoption['controlNavThumbs'];?>,        // Use thumbnails for Control Nav
    pauseOnHover: <?php echo $nssoption['pauseOnHover'];?>,             // Stop animation while hovering
    manualAdvance: <?php echo $nssoption['manualAdvance'];?>,           // Force manual transitions
    prevText: '<?php echo $nssoption['prevText'];?>',               // Prev directionNav text
    nextText: '<?php echo $nssoption['nextText'];?>',               // Next directionNav text
    randomStart: <?php echo $nssoption['randomStart'];?>,             // Start on a random slide
    beforeChange: function(){},     // Triggers before a slide transition
    afterChange: function(){},      // Triggers after a slide transition
    slideshowEnd: function(){},     // Triggers after all slides have been shown
    lastSlide: function(){},        // Triggers when last slide is shown
    afterLoad: function(){}         // Triggers when slider has loaded
});
	
    });
    </script>
	 <?php }
   //return ob_get_clean();
	 

     }
add_shortcode( 'nivo_slider_simplified', 'nivo_slider_simplified_shortcode_catcher' ); 

