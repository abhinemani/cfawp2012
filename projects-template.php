<?php
/**
 * The template for displaying all pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

/*
Template Name: Projects
*/

get_header(); ?>

<div class="wrap clearfix" id="inner">
	
	  <div id="maincontent" class="fullcolumn" style="width: 940px;" >

      <div style="width: 295px; height: 500px; padding-right: 0px; float: left; ">	
          <div class="ttl" style="padding: 5px; font-size: 1.51em;">Our Apps and Projects</div>  
          
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
          
      <?php the_content(); ?><?php endwhile; ?>
      <h4>Developer Resources</h4>
<ul>
    <li><a href="http://groups.google.com/group/cfa-labs">Join the Main Google Group</a></li>
	<li><a href="http://github.com/codeforamerica">Code for America GitHub</a></li>    
</ul>
      
    </div>
    
        <div style="width: 630px; padding-left: 15px; float: left; " class="entry-content">	
            <div id="issues">	

<?php
$args = array( 'post_type' => 'cfa_project', 'posts_per_page' => 20, 'orderby' => 'rand' );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>

    <h3 id="page-header" style="text-align: left; padding-left: 0px; background:url(<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'); echo $large_image_url[0]; ?>) center center no-repeat"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" ><?php the_title(); ?></a></h3>
  
<?php endwhile; ?>


</div></div></div>


<?php get_footer(); ?>
