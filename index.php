<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rt_simple
 */
$pagename='index';
get_header(); ?>
<div class="covercarousel">
<div class="container">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0"></li><br/>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li><br/>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li><br/>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="<?php echo wp_get_attachment_url(get_theme_mod('featured_post_image_one_setting'));?>" alt="First slide">
	  <div class="carousel-caption d-none d-md-block">
		<div class="cover">
			<h3 class="post_title"><?php echo get_theme_mod('featured_image_one_title');?></h3>
			<p class="post_content"><?php echo get_theme_mod('features_post_content_one');?></p>
		</div>
	  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="<?php echo wp_get_attachment_url(get_theme_mod('featured_post_image_two_setting'));?>" alt="Second slide">
	  <div class="carousel-caption d-none d-md-block">
	  <div class="cover">
		<h3 class="post_title"><?php echo get_theme_mod('featured_image_two_title');?></h3>
		<p class="post_content"><?php echo get_theme_mod('features_post_content_two');?></p>
	  </div>
	  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="<?php echo wp_get_attachment_url(get_theme_mod('featured_post_image_three_setting'));?>" alt="Third slide">
	  <div class="carousel-caption d-none d-md-block">
	  <div class="cover">
		<h3 class="post_title"><?php echo get_theme_mod('featured_image_three_title');?></h3>
		<p class="post_content"><?php echo get_theme_mod('features_post_content_three');?></p>
	  </div>
	  </div>
    </div>
	<div class="carousel-item">
      <img class="d-block img-fluid" src="<?php echo wp_get_attachment_url(get_theme_mod('featured_post_image_four_setting'));?>" alt="Fourth slide">
	  <div class="carousel-caption d-none d-md-block">
	  <div class="cover">
		<h3 class="post_title"><?php echo get_theme_mod('featured_image_four_title');?></h3>
		<p class="post_content"><?php echo get_theme_mod('features_post_content_four');?></p>
	  </div>
	  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<div class="container child-pages-box">
				<div class="row">
					<div class="col-md-3 col-4-pad">
					<div class="tab">
					  <button class="tablinks" onmouseover="openCity(event, 'London')" onClick="openCity(event, 'London')" id="defaultOpen">FINDING</button>
					  <button class="tablinks" onmouseover="openCity(event, 'Paris')">PROMOTIONAL ACTIVITIES</button>
					  <button class="tablinks" onmouseover="openCity(event, 'Tokyo')">ENVIRONMENT</button>
					</div>
					</div>

					<div id="London" class="col-md-9 tabcontent">
					
					  <?php
						$mod1=get_theme_mod('Child_pages_setting_one');
						$args = array( 'numberposts' => '3', 'category'=>$mod1, 'order'=>'DESC' );
						$recent_posts = wp_get_recent_posts($args);
						
						foreach( $recent_posts as $recent ){
							echo '
							<div class="col-md-4 child-pages-box-right">
							'?>
							<?php	the_post_thumbnail($post=$recent["ID"]);					
								echo '
								<br/><a class="featured-post-title simple-link" href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a><br/>';
								echo '<p class="post-excerpt">' .substr(get_the_excerpt(), 0,110). '';
							echo '&rarr;</p></div>
							
							
								';
							}
							
							wp_reset_query();
						?>
						
					</div>

					<div id="Paris" class="col-md-9 tabcontent">
					  <?php
						$mod2=get_theme_mod('Child_pages_setting_two');
						$args = array( 'numberposts' => '3', 'category'=>$mod2, 'order'=>'DESC' );
						$recent_posts = wp_get_recent_posts($args);
						
						foreach( $recent_posts as $recent ){
							echo '
							<div class="col-md-4 child-pages-box-right">
							'?>
							<?php	the_post_thumbnail($post=$recent["ID"]);					
								echo '
								<br/><a class="featured-post-title simple-link" href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a><br/>';
								echo '<p class="post-excerpt">' .substr(get_the_excerpt(), 0,110). '';
							echo '&rarr;</p></div>
							
							
								';
							}
							
							wp_reset_query();
						?>
					</div>

					<div id="Tokyo" class="col-md-9 tabcontent">
					  <?php
						$mod3=get_theme_mod('Child_pages_setting_three');
						$args = array( 'numberposts' => '3', 'category'=>$mod3, 'order'=>'DESC' );
						$recent_posts = wp_get_recent_posts($args);
						
						foreach( $recent_posts as $recent ){
							echo '
							<div class="col-md-4 child-pages-box-right">
							'?>
							<?php	the_post_thumbnail($post=$recent["ID"]);					
								echo '
								<br/><a class="featured-post-title simple-link" href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a><br/>';
								echo '<p class="post-excerpt">' .substr(get_the_excerpt(), 0,110). '';
							echo ' &rarr;</p></div>
							
							
								';
							}
							
							wp_reset_query();
						?>
						
					</div>
				
				<div class="clearclass">
				</div>
				</div>
		</div>
		
		

		</main><!-- #main -->	
	</div><!-- #primary -->

<?php
get_sidebar('primary');

?>
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<?php
get_footer();