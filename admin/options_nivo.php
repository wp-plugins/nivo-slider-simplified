<?php
class nivo_slider_simplified_options
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_menu_page(
            'Nivo Slider Simplified Admin', 
            'Nivo Slider Simplified', 
            //'manage_options', 
            'administrator', 
            'nivo_slider_simplified', 
            array( $this, 'create_admin_page' )
		
        );
       add_submenu_page(
            //'edit.php?post_type=product',
             'nivo_slider_simplified',			
            'Nivo Slider Simplified', 
            'Default Setting ', 
            'administrator', 
            'nivo_slider_simplified_sub',
            array( $this, 'create_admin_page' )
		
        );
		
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'nivo_slider_simplified_options' );
		echo "<pre>";
		//print_r($this->options);
		echo "</pre>";
        ?>
        <div class="wrap">
            <?php screen_icon(); ?>

  <h2>Nivo Slider Simplified  </h2>
		  <?php //getting current tab
		  /**
		   * currenty no tab will be used in next version
		   */
		if( isset( $_GET[ 'nivo_tab' ] ) ) {  
			$active_tab = $_GET[ 'nivo_tab' ];  
		} // end if  
		//opening first tab by default
		if(!isset( $_GET[ 'nivo_tab' ] ) ) {  
			$active_tab = 'tab1';  
			}?>
   <!--tabs-->
  <h2 class="nav-tab-wrapper"> 
  <!--<a href="?page=nivo_slider_simplified&nivo_tab=tab1" class="nav-tab <?php //echo $active_tab == 'tab1' ? 'nav-tab-active' : ''; ?>"> Sliders </a>--> 
  <a href="?page=nivo_slider_simplified&nivo_tab=tab2" class="nav-tab nav-tab-active<?php //echo $active_tab == 'tab2' ? 'nav-tab-active' : ''; ?>">Default Setting</a>
  </h2>		
  
      <?php //if($active_tab=='tab1') :?>  

      <?php //endif;?>
  
  
  
           <?php //if($active_tab=='tab2') :?>  
		   
		   
		   
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'nivo_slider_simplified_option_group' );   
                do_settings_sections( 'nivo_setting_admin' );
                submit_button(); 
            ?>
            </form>
			<?php // endif;?>
			
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'nivo_slider_simplified_option_group', // Option group
            'nivo_slider_simplified_options', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );  

	    add_settings_section(
            'nivo_section_1', // ID
            'Nivo Slider Simplified Default Setting Section ', // Title
            array( $this, 'nivo_section_1_info' ), // Callback
            'nivo_setting_admin' // Page
        ); 
		
 
		 add_settings_field(
            'effect', 
            'Effect    ', 
            array( $this, 'effect_callback' ), 
            'nivo_setting_admin', 
            'nivo_section_1'
        );
		
		
		add_settings_field(
            'slices', 
            'Slices    ', 
            array( $this, 'slices_callback' ), 
            'nivo_setting_admin', 
            'nivo_section_1'
        );
		
		add_settings_field(
            'boxCols', 
            'Box Columns     ', 
            array( $this, 'boxCols_callback' ), 
            'nivo_setting_admin', 
            'nivo_section_1'
        );
		
		add_settings_field(
            'boxRows', 
            'Box Rows     ', 
            array( $this, 'boxRows_callback' ), 
            'nivo_setting_admin', 
            'nivo_section_1'
        );
		
		add_settings_field(
            'animSpeed', 
            'Animation Speed     ', 
            array( $this, 'animSpeed_callback' ), 
            'nivo_setting_admin', 
            'nivo_section_1'
        );
		
		add_settings_field(
            'pauseTime', 
            'Pause Time', 
            array( $this, 'pauseTime_callback' ), 
            'nivo_setting_admin', 
            'nivo_section_1'
        );
		
		add_settings_field(
            'startSlide', 
            'Start Slide       ', 
            array( $this, 'startSlide_callback' ), 
            'nivo_setting_admin', 
            'nivo_section_1'
        );
		
		add_settings_field(
            'directionNav', 
            '   Direction Navigation     ', 
            array( $this, 'directionNav_callback' ), 
            'nivo_setting_admin', 
            'nivo_section_1'
        );
		
		add_settings_field(
            'controlNav', 
            'Control Navigation     ', 
            array( $this, 'controlNav_callback' ), 
            'nivo_setting_admin', 
            'nivo_section_1'
        );
		
		add_settings_field(
            'controlNavThumbs', 
            ' Control Navigation Thumbnails  ', 
            array( $this, 'controlNavThumbs_callback' ), 
            'nivo_setting_admin', 
            'nivo_section_1'
        );
		
		add_settings_field(
            'pauseOnHover', 
            'Pause On Hover', 
            array( $this, 'pauseOnHover_callback' ), 
            'nivo_setting_admin', 
            'nivo_section_1'
        );
		
		add_settings_field(
            'manualAdvance', 
            'Force Manual Transition', 
            array( $this, 'manualAdvance_callback' ), 
            'nivo_setting_admin', 
            'nivo_section_1'
        );
		
		add_settings_field(
            'prevText', 
            'Previous Button Text', 
            array( $this, 'prevText_callback' ), 
            'nivo_setting_admin', 
            'nivo_section_1'
        );
		
		add_settings_field(
            'nextText', 
            'Next Button Text', 
            array( $this, 'nextText_callback' ), 
            'nivo_setting_admin', 
            'nivo_section_1'
        );
		
		add_settings_field(
            'randomStart', 
            'Random Start', 
            array( $this, 'randomStart_callback' ), 
            'nivo_setting_admin', 
            'nivo_section_1'
        );
		
		
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        
        if( isset( $input['effect'] ) )
            $new_input['effect'] = sanitize_text_field( $input['effect'] );
				
        if( isset( $input['slices'] ) )
            $new_input['slices'] = absint( $input['slices'] );
			
        if( isset( $input['boxCols'] ) )
            $new_input['boxCols'] = absint( $input['boxCols'] );
			
        if( isset( $input['boxRows'] ) )
            $new_input['boxRows'] = absint( $input['boxRows'] );
			
        if( isset( $input['animSpeed'] ) )
            $new_input['animSpeed'] = absint( $input['animSpeed'] );
			
        if( isset( $input['pauseTime'] ) )
            $new_input['pauseTime'] = absint( $input['pauseTime'] );
			
        if( isset( $input['startSlide'] ) )
            $new_input['startSlide'] = absint( $input['startSlide'] );
		
        if( isset( $input['directionNav'] ) )
            $new_input['directionNav'] = sanitize_text_field( $input['directionNav'] );
		
        if( isset( $input['controlNav'] ) )
            $new_input['controlNav'] = sanitize_text_field( $input['controlNav'] );
		
        if( isset( $input['controlNavThumbs'] ) )
            $new_input['controlNavThumbs'] = sanitize_text_field( $input['controlNavThumbs'] );
		
        if( isset( $input['pauseOnHover'] ) )
            $new_input['pauseOnHover'] = sanitize_text_field( $input['pauseOnHover'] );
		
        if( isset( $input['manualAdvance'] ) )
            $new_input['manualAdvance'] = sanitize_text_field( $input['manualAdvance'] );
		
        if( isset( $input['prevText'] ) )
            $new_input['prevText'] = sanitize_text_field( $input['prevText'] );
		
        if( isset( $input['nextText'] ) )
            $new_input['nextText'] = sanitize_text_field( $input['nextText'] );
		
        if( isset( $input['randomStart'] ) )
            $new_input['randomStart'] = sanitize_text_field( $input['randomStart'] );
		
		
        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function nivo_section_1_info()
    {
        print 'Please Select Default settings below for Nivo Sliders';
    }
 
	
	public function effect_callback()
    { 
		?>
		<select name="nivo_slider_simplified_options[effect]">
    <option value="sliceDown" <?php selected( $this->options['effect'], sliceDown ); ?>>sliceDown</option>
    <option value="sliceDownLeft" <?php selected( $this->options['effect'], sliceDownLeft ); ?>>sliceDownLeft</option>
    <option value="sliceUp" <?php selected( $this->options['effect'], sliceUp ); ?>>sliceUp</option>
    <option value="sliceUpLeft" <?php selected( $this->options['effect'], sliceUpLeft ); ?>>sliceUpLeft</option>
    <option value="sliceUpDown" <?php selected( $this->options['effect'], sliceUpDown ); ?>>sliceUpDown</option>
    <option value="sliceUpDownLeft" <?php selected( $this->options['effect'], sliceUpDownLeft ); ?>>sliceUpDownLeft</option>
    <option value="fold" <?php selected( $this->options['effect'], fold ); ?>>fold</option>
    <option value="fade" <?php selected( $this->options['effect'], fade ); ?>>fade</option>
    <option value="random" <?php selected( $this->options['effect'], random ); ?>>random</option>
    <option value="slideInRight" <?php selected( $this->options['effect'], slideInRight ); ?>>slideInRight</option>
    <option value="slideInLeft" <?php selected( $this->options['effect'], slideInLeft ); ?>>slideInLeft</option>
    <option value="boxRandom" <?php selected( $this->options['effect'], boxRandom ); ?>>boxRandom</option>
    <option value="boxRain" <?php selected( $this->options['effect'], boxRain ); ?>>boxRain</option>
    <option value="boxRainReverse" <?php selected( $this->options['effect'], boxRainReverse ); ?>>boxRainReverse</option>
    <option value="boxRainGrow" <?php selected( $this->options['effect'], boxRainGrow ); ?>>boxRainGrow</option>
    <option value="boxRainGrowReverse" <?php selected( $this->options['effect'], boxRainGrowReverse ); ?>>boxRainGrowReverse</option>
	</select>
	// Specify sets like: 'fold,fade,sliceDown'
		<?php
    }
	
	//slice
	 public function slices_callback()
    {
        printf(
            '<input type="text" id="slices" name="nivo_slider_simplified_options[slices]" value="%s" />',
            isset( $this->options['slices'] ) ? esc_attr( $this->options['slices']) : ''
        );
		echo "// For slice animations";
    }
	//boxCols
	 public function boxCols_callback()
    {
        printf(
            '<input type="text" id="boxCols" name="nivo_slider_simplified_options[boxCols]" value="%s" />',
            isset( $this->options['boxCols'] ) ? esc_attr( $this->options['boxCols']) : ''
        );
		echo "// For box animations";
    }
	//boxRows
	 public function boxRows_callback()
    {
        printf(
            '<input type="text" id="boxRows" name="nivo_slider_simplified_options[boxRows]" value="%s" />',
            isset( $this->options['boxRows'] ) ? esc_attr( $this->options['boxRows']) : ''
        );
		echo "// For box animations";
    }
	//animSpeed
	 public function animSpeed_callback()
    {
        printf(
            '<input type="text" id="animSpeed" name="nivo_slider_simplified_options[animSpeed]" value="%s" />',
            isset( $this->options['animSpeed'] ) ? esc_attr( $this->options['animSpeed']) : ''
        );
		echo " // Slide transition speed";
    }
	
	//pauseTime
	 public function pauseTime_callback()
    {
        printf(
            '<input type="text" id="pauseTime" name="nivo_slider_simplified_options[pauseTime]" value="%s" />',
            isset( $this->options['pauseTime'] ) ? esc_attr( $this->options['pauseTime']) : ''
        );
		echo "// How long each slide will show";
    }
	//startSlide
	 public function startSlide_callback()
    {
        printf(
            '<input type="text" id="startSlide" name="nivo_slider_simplified_options[startSlide]" value="%s" />',
            isset( $this->options['startSlide'] ) ? esc_attr( $this->options['startSlide']) : ''
        );
		echo "// Set starting Slide (0 index)";
    }
	//directionNav
	 public function directionNav_callback()
    {		?>
			<input type="checkbox" id="directionNav" name="nivo_slider_simplified_options[directionNav]" value="1" <?php checked($this->options['directionNav'], 1); ?> />
// Next & Prev navigation
			<?php
    }
	//controlNav
	 public function controlNav_callback()
    { 
		?>
			<input type="checkbox" id="controlNav" name="nivo_slider_simplified_options[controlNav]" value="1" <?php checked($this->options['controlNav'], 1); ?> />
// 1,2,3... navigation
			<?php
    }
	//controlNavThumbs
	 public function controlNavThumbs_callback()
    { 
		?>
			<input type="checkbox" id="controlNavThumbs" name="nivo_slider_simplified_options[controlNavThumbs]" value="1" <?php checked($this->options['controlNavThumbs'], 1); ?> />
// Use thumbnails for Control Nav
			<?php
    }
	//pauseOnHover
	 public function pauseOnHover_callback()
    { 
		?>
			<input type="checkbox" id="pauseOnHover" name="nivo_slider_simplified_options[pauseOnHover]" value="1" <?php checked($this->options['pauseOnHover'], 1); ?> />
// Stop animation while hovering
			<?php
    }
	//manualAdvance
	 public function manualAdvance_callback()
    { 
		?>
			<input type="checkbox" id="manualAdvance" name="nivo_slider_simplified_options[manualAdvance]" value="1" <?php checked($this->options['manualAdvance'], 1); ?> />
// Force manual transitions
			<?php
    }
	//prevText
	 public function prevText_callback()
    {
        printf(
            '<input type="text" id="prevText" name="nivo_slider_simplified_options[prevText]" value="%s" />',
            isset( $this->options['prevText'] ) ? esc_attr( $this->options['prevText']) : ''
        );
				echo "// Prev directionNav texts";

    }
	//nextText
	 public function nextText_callback()
    {
        printf(
            '<input type="text" id="nextText" name="nivo_slider_simplified_options[nextText]" value="%s" />',
            isset( $this->options['nextText'] ) ? esc_attr( $this->options['nextText']) : ''
        );
		echo "// Next directionNav texts";
    }
	//randomStart
	 public function randomStart_callback()
    { 
		?>
			<input type="checkbox" id="randomStart" name="nivo_slider_simplified_options[randomStart]" value="1" <?php checked($this->options['randomStart'], 1); ?> />
             // Start on a random slide
			<?php
    }	
	
}

if( is_admin() )
    $nss_settings_page = new nivo_slider_simplified_options();
