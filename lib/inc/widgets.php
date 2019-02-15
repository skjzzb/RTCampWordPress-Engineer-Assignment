<?php
class Social_widget extends WP_Widget {
 
  public function __construct() {
      $widget_ops = array('classname' => 'Social_widget', 'description' => 'Displays as Social Media widget!' );
      $this->WP_Widget('Social_widget', 'Social Media widget', $widget_ops);
  }
  
  function widget($args, $instance) {
    // PART 1: Extracting the arguments + getting the values
    extract($args, EXTR_SKIP);
    $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
    $text1 = empty($instance['text1']) ? '' : $instance['text1'];
    $text2 = empty($instance['text2']) ? '' : $instance['text2'];
    $text3 = empty($instance['text3']) ? '' : $instance['text3'];
    $text4 = empty($instance['text4']) ? '' : $instance['text4'];
   
    // Before widget code, if any
    echo (isset($before_widget)?$before_widget:'');
   
    // PART 2: The title and the text output
    if (!empty($title))
      echo $before_title . $title . $after_title;
    if (!empty($text1))
      echo '<div id="icon"><li><a class="icon-link" href="'. $text1.'"><p class="face"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i> Facebook</p></a></li></div><br/>';
	if (!empty($text2))
      echo '<div id="icon"><li><a class="icon-link" href="'. $text2.'"><p class="twit"><i class="fa fa-twitter-square fa-2x " aria-hidden="true"></i> Twitter</p></a></div><br/>';
	if (!empty($text3))
      echo '<div id="icon"><li><a class="icon-link" href="'. $text3.'"><p class="linkedin"><i class="fa fa-linkedin-square fa-2x " aria-hidden="true"></i> Linkedin</p></a></div><br/>'; 
	if (!empty($text4))
      echo '<div id="icon"><li><a class="icon-link" href="'. $text4.'"><p class="rssfeed"><i class="fa fa-rss-square fa-2x" aria-hidden="true"></i> RSS feed</p></a></div><br/>';
   
    // After widget code, if any  
    echo (isset($after_widget)?$after_widget:'');
  }
 
  public function form( $instance ) {
   
     // PART 1: Extract the data from the instance variable
     $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
     $title = $instance['title'];
     $text1 = $instance['text1'];  
     $text2 = $instance['text2'];  
     $text3 = $instance['text3'];  
     $text4 = $instance['text4'];  
   
     // PART 2-3: Display the fields
     ?>
     <!-- PART 2: Widget Title field START -->
     <p>
      <label for="<?php echo $this->get_field_id('title'); ?>">Include Facebook?: 
        
      </label>
      </p>
      <!-- Widget Title field END -->
   
     <!-- PART 3: Widget Text field START -->
     <p>
      <label for="<?php echo $this->get_field_id('text1'); ?>">URL: 
        <input class="widefat" id="<?php echo $this->get_field_id('text1'); ?>" 
               name="<?php echo $this->get_field_name('text1'); ?>" type="text" 
               value="<?php echo attribute_escape($text1); ?>" />
      </label>
      </p>
      <!-- Widget Text field END -->
	  <p>
      <label for="<?php echo $this->get_field_id('title'); ?>">Include Twitter?: 
        
      </label>
      </p>
      <!-- Widget Title field END -->
   
     <!-- PART 3: Widget Text field START -->
     <p>
      <label for="<?php echo $this->get_field_id('text2'); ?>">URL: 
        <input class="widefat" id="<?php echo $this->get_field_id('text2'); ?>" 
               name="<?php echo $this->get_field_name('text2'); ?>" type="text" 
               value="<?php echo attribute_escape($text2); ?>" />
      </label>
      </p>
      <!-- Widget Text field END -->
	  <p>
      <label for="<?php echo $this->get_field_id('title'); ?>">Include Linked In?: 
        
      </label>
      </p>
      <!-- Widget Title field END -->
   
     <!-- PART 3: Widget Text field START -->
     <p>
      <label for="<?php echo $this->get_field_id('tex3'); ?>">URL: 
        <input class="widefat" id="<?php echo $this->get_field_id('text3'); ?>" 
               name="<?php echo $this->get_field_name('text3'); ?>" type="text" 
               value="<?php echo attribute_escape($text3); ?>" />
      </label>
      </p>
      <!-- Widget Text field END -->
	  <p>
      <label for="<?php echo $this->get_field_id('title'); ?>">Include RSS feeds?: 
        
      </label>
      </p>
      <!-- Widget Title field END -->
   
     <!-- PART 3: Widget Text field START -->
     <p>
      <label for="<?php echo $this->get_field_id('text4'); ?>">URL: 
        <input class="widefat" id="<?php echo $this->get_field_id('text4'); ?>" 
               name="<?php echo $this->get_field_name('text4'); ?>" type="text" 
               value="<?php echo attribute_escape($text4); ?>" />
      </label>
      </p>
      <!-- Widget Text field END -->
     <?php
   
  }
 
  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['text1'] = $new_instance['text1'];
    $instance['text2'] = $new_instance['text2'];
    $instance['text3'] = $new_instance['text3'];
    $instance['text4'] = $new_instance['text4'];
    return $instance;
  }
  
}

add_action( 'widgets_init', create_function('', 'return register_widget("Social_widget");') );
?>