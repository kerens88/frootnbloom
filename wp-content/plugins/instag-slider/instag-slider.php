<?php
/*
Plugin Name: InstaG Slider
Plugin URI: http://www.highschooldiploma.us/extensions
Description: InstaG Slider - Powered by Instagram. Display your instagram updates on website sidebar using Instagram Slider.
Author: Twitter Widget
Version: 1.0
Author URI: http://www.highschooldiploma.us/extensions
*/
class RealInstragramSlider{
    
    public $options;
    
    public function __construct() {
        //you can run delete_option method to reset all data
        //delete_option('real_instagram_plugin_options');
        $this->options = get_option('real_instagram_plugin_options');
        $this->real_instagram_register_settings_and_fields();
    }
    
    public static function add_real_instagram_tools_options_page(){
        add_options_page('InstaG Slider', 'InstaG Slider ', 'administrator', __FILE__, array('RealInstragramSlider','sw_instagram_tools_options'));
    }
    
    public static function sw_instagram_tools_options(){
?>
<div class="wrap">
    <?php screen_icon(); ?>
    <h2>InstaG Slider Configuration</h2>
    <form method="post" action="options.php" enctype="multipart/form-data">
        <?php settings_fields('real_instagram_plugin_options'); ?>
        <?php do_settings_sections(__FILE__); ?>
        <p class="submit">
            <input name="submit" type="submit" class="button-primary" value="Save Changes"/>
        </p>
    </form>
</div>
<?php
    }
    public function real_instagram_register_settings_and_fields(){
        register_setting('real_instagram_plugin_options', 'real_instagram_plugin_options',array($this,'real_instagram_validate_settings'));
        add_settings_section('real_instagram_main_section', 'Settings', array($this,'real_instagram_main_section_cb'), __FILE__);
        //Start Creating Fields and Options
         //sidebar image
        //add_settings_field('sidebarImage', 'Sidebar Image', array($this,'sidebarImage_settings'),__FILE__,'real_instagram_main_section');
        //marginTop
        add_settings_field('marginTop', 'Margin Top', array($this,'marginTop_settings'), __FILE__,'real_instagram_main_section');
        //pageURL
        add_settings_field('pageURL', 'Instagram Name', array($this,'pageURL_settings'), __FILE__,'real_instagram_main_section');
        //width
        add_settings_field('width', 'Width', array($this,'width_settings'), __FILE__,'real_instagram_main_section');
        //height
        add_settings_field('height', 'Height', array($this,'height_settings'), __FILE__,'real_instagram_main_section');
       
        //horizontal options
        add_settings_field('horizontal', 'Horizontal', array($this,'horizontal_settings'),__FILE__,'real_instagram_main_section');
        //vertical options
        add_settings_field('vertical', 'Vertical', array($this,'vertical_settings'),__FILE__,'real_instagram_main_section');
        //alignment option
         add_settings_field('alignment', 'Alignment Position', array($this,'position_settings'),__FILE__,'real_instagram_main_section');
    }
    public function real_instagram_validate_settings($plugin_options){
        return($plugin_options);
    }
    public function real_instagram_main_section_cb(){
        //optional
    }

   
    //marginTop_settings
    public function marginTop_settings() {
        if(empty($this->options['marginTop'])) $this->options['marginTop'] = "400";
        echo "<input name='real_instagram_plugin_options[marginTop]' type='text' value='{$this->options['marginTop']}' />";
    }
    //pageURL_settings
    public function pageURL_settings() {
        if(empty($this->options['pageURL'])) $this->options['pageURL'] = "instagram";
        echo "<input name='real_instagram_plugin_options[pageURL]' type='text' value='{$this->options['pageURL']}' />";
    }

    //width_settings
    public function width_settings() {
        if(empty($this->options['width'])) $this->options['width'] = "400";
        echo "<input name='real_instagram_plugin_options[width]' type='text' value='{$this->options['width']}' />";
    }
    //height_settings
    public function height_settings() {
        if(empty($this->options['height'])) $this->options['height'] = "400";
        echo "<input name='real_instagram_plugin_options[height]' type='text' value='{$this->options['height']}' />";
    }
   

    //image_horizontal_settings
     public function horizontal_settings() {
        if(empty($this->options['horizontal'])) $this->options['horizontal'] = "4";
        echo "<input name='real_instagram_plugin_options[horizontal]' type='text' value='{$this->options['horizontal']}' />";
    }

    //image_vertical_settings
     public function vertical_settings() {
        if(empty($this->options['vertical'])) $this->options['vertical'] = "4";
        echo "<input name='real_instagram_plugin_options[vertical]' type='text' value='{$this->options['vertical']}' />";
    }
    
   
    //alignment_settings
    public function position_settings(){
        if(empty($this->options['alignment'])) $this->options['alignment'] = "left";
        $items = array('left','right');
        echo "<select name='real_instagram_plugin_options[alignment]'>";
        foreach($items as $item){
            $selected = ($this->options['alignment'] === $item) ? 'selected = "selected"' : '';
            echo "<option value='$item' $selected>$item</option>";
        }
        echo "</select>";
    }
    
}
add_action('admin_menu', 'real_instagram_trigger_options_function');

function real_instagram_trigger_options_function(){
    RealInstragramSlider::add_real_instagram_tools_options_page();
}

add_action('admin_init','real_instagram_trigger_create_object');
function real_instagram_trigger_create_object(){
    new RealInstragramSlider();
}
add_action('wp_footer','real_instagram_add_content_in_footer');
function real_instagram_add_content_in_footer(){
    
    $o = get_option('real_instagram_plugin_options');
    extract($o);

$print_instagram = '';
$print_instagram .= '<iframe src="http://widget.stagram.com/in/'.$pageURL.'/?s=100&w='.$horizontal.'&h='.$vertical.'&b=no&bg=#000&p=3" allowtransparency="true" frameborder="0"
 scrolling="no" style="border:none;overflow:hidden; width:'.$width.'px; height:'.$height.'px" ></iframe>';
//$imgURL = plugins_url('instagram-widget-slider/assets/instagram-icon.png');

$imgURL = plugins_url('instag-slider/assets/instagram-icon.png');


?>
<?php if($alignment=='left'){?>
<div id="real_instagram_display">
    <div id="ibox1" style="left: -<?php echo trim($width+10);?>px; top: <?php echo $marginTop;?>px; z-index: 10000; height:<?php echo trim($height+10);?>px;">
        <div id="ibox2" style="text-align: left;width:<?php echo trim($width);?>px;height:<?php echo trim($height);?>;">
            <a class="open" id="ilink" href="#"></a><img style="top: 0px;right:-50px;" src="<?php echo $imgURL;?>" alt="">
            <?php echo $print_instagram; ?>
		<div style="font-size: 9px; color: #808080; font-weight: normal; font-family: tahoma,verdana,arial,sans-serif; line-height: 1.28; text-align: right; direction: ltr; margin-top:<?php echo trim($height);?>px;"><a href="http://www.personaltrainercertification.us" target="_blank" style="color: #808080;" title="Homepage">Visit the website</a></div>
        </div>
    </div>
</div>

<script type="text/javascript">
jQuery.noConflict();
jQuery(function (){
jQuery(document).ready(function()
{
jQuery.noConflict();
jQuery(function (){
jQuery("#ibox1").hover(function(){ 
jQuery('#ibox1').css('z-index',101009);
jQuery(this).stop(true,false).animate({left:  0}, 500); },
function(){ 
    jQuery('#ibox1').css('z-index',10000);
    jQuery("#ibox1").stop(true,false).animate({left: -<?php echo trim($width+10); ?>}, 500); });
});}); });
jQuery.noConflict();
</script>
<?php } else { ?>
<div id="real_instagram_display">
    <div id="ibox1" style="right: -<?php echo trim($width+10);?>px; top: <?php echo $marginTop;?>px; z-index: 10000; height:<?php echo trim($height+10);?>px;">
        <div id="ibox2" style="text-align: left;width:<?php echo trim($width);?>px;height:<?php echo trim($height);?>;">
            <a class="open" id="ilink" href="#"></a><img style="top: 0px;left:-50px;" src="<?php echo $imgURL;?>" alt="">
            <?php echo $print_instagram; ?>
		<div style="font-size: 9px; color: #808080; font-weight: normal; font-family: tahoma,verdana,arial,sans-serif; line-height: 1.28; text-align: right; direction: ltr; margin-top:<?php echo trim($height);?>px;"><a href="http://www.personaltrainercertification.us" target="_blank" style="color: #808080;" title="Homepage">Visit the website</a></div>
        </div>
    </div>
</div>

<script type="text/javascript">
jQuery.noConflict();
jQuery(function (){
jQuery(document).ready(function()
{
jQuery.noConflict();
jQuery(function (){
jQuery("#ibox1").hover(function(){ 
jQuery('#ibox1').css('z-index',101009);
jQuery(this).stop(true,false).animate({right:  0}, 500); },
function(){ 
    jQuery('#ibox1').css('z-index',10000);
    jQuery("#ibox1").stop(true,false).animate({right: -<?php echo trim($width+10); ?>}, 500); });
});}); });
jQuery.noConflict();
</script>
<?php } ?>
<?php
}
add_action( 'wp_enqueue_scripts', 'register_real_instagram_slider_styles' );
 function register_real_instagram_slider_styles() {
    wp_register_style( 'real_instagram_slider_styles', plugins_url( 'assets/style.css' , __FILE__ ) );
    wp_enqueue_style( 'real_instagram_slider_styles' );
        wp_enqueue_script('jquery');
 }
 $real_instagram_default_values = array(
     
     'marginTop' => 400,
     'pageURL' => 'instagram',
     'width' => '400',
     'height' => '400',
     'horizontal' => '4',
     'vertical' => '4',
     'alignment' => 'left'
    
 );
 add_option('real_instagram_plugin_options', $real_instagram_default_values);