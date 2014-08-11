<?php
 /*
  Plugin Name: Nivo Slider Simplified
  Plugin URI: http://ajaysharma3085006.wordpress.com/
  Description: Nivo Slider Simplified is slider using jquery , you can use drag drop you slide to slider , can use multi instance and setting to set the default features.use short code <code>[nivo_slider_simplified id='X']</code> to your page or post or text widget where X is slider id
  Version: 0.1
  Author: Ajay Sharma
  Author URI: http://ajaysharma3085006.wordpress.com/
  License: GPLv2 or later
 */
 
 
 require_once('inc/functions_nivo.php');
 require_once('inc/class.php');
 require_once('admin/options_nivo.php');
 define("NIVO_SLIDER_SIMPLIFIED_DIR",plugins_url('nivo-slider-simplified'));

 
 /**
  * activation hook
  */
  if(!function_exists('nivo_slider_activation')):
  function nivo_slider_activation() {
    $option=Array
(
    "effect" => "random",
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
); 
    
     add_option( nivo_slider_simplified_options, $option, '', yes );  
    
    }
	endif;
register_activation_hook(__FILE__, 'nivo_slider_activation');
//deactivation
  if(!function_exists('nivo_slider_deactivation')):

function nivo_slider_deactivation() {
    
delete_option( 'nivo_slider_simplified_options' ); 

}
endif;
register_deactivation_hook(__FILE__, 'nivo_slider_deactivation');
