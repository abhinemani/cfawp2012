

<?php
/**
 * The template for displaying all pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

/*
Template Name: All Cities
*/

get_header(); ?>

<div class="wrap clearfix" id="cities">
  <!--PARTICIPATING CITIES -->
  <div id="participating-wrap" class="clearfix">
    <div id="participating">
      <h2>PARTICIPATING CITIES</h2>
      <div class="links"><a href="#">All <span>&raquo;</span></a> <a href="#">Boston <span>&raquo;</span></a> <a href="#">Washington, D.C. <span>&raquo;</span></a> <a href="#">Philadelphia <span>&raquo;</span></a> <a href="#">Seattle <span>&raquo;</span></a></div>
      <p>Cities matter. Big or small, they are where we work, how we survive, and what we call home. CfA connects forward-thinking cities with the talent from the web industry to develop reusable civic technology. Partnering cities will not only solve a critical problem using technology, but also help cultivate the next generation of tech-savvy, civic leaders.
	
	</p>
      <ul>
        <li><a href="#">Learn about becoming a cfa city</a></li>
        <li><a href="#">Recommend your city for cfa</a></li>
        <li><a href="#" class="active">apply to become a cfa city</a></li>
      </ul>
    </div>
    <ul id="slider">
      <li> <img src="<?php bloginfo( 'template_url' ); ?>/images/Boston.jpg" alt="Boston" />
        <div class="clearfix">
          <table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th>Boston</th>
              <td>Home to the first public school in the nation. The perfect place for Code for America Fellows to build a platform for educational services. &raquo;</td>
            </tr>
          </table>
        </div>
      </li>
      <li> <img src="<?php bloginfo( 'template_url' ); ?>/images/Boston.jpg" alt="Boston" />
        <div class="clearfix">
          <table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th>Washington, D.C.</th>
              <td>Home to the first public school in the nation. The perfect place for Code for America Fellows to build a platform for educational services. &raquo;</td>
            </tr>
          </table>
        </div>
      </li>
    </ul>
  </div>
  <div id="twocols-container" class="clearfix">
    <div id="maincontent" class="entry-content">
      
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


								<?php the_content(); ?>
							
								<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>


		<?php endwhile; ?>


    </div>
    <div class="right-col">
      <h3>Dates To Keep In Mind</h3>
      <h4>2012 City Application Timeline</h4>
      <p>The application process for 2012 cities will be opening in early November. For more information, see the timeline below and don’t hesitate to get in touch with any questions.</p>
      <table border="0" cellspacing="0" cellpadding="0">
        <tr class="odd">
          <td>11/01/10</td>
          <th>Application Process<br />
            Opened <span>&raquo;</span></th>
        </tr>
        <tr>
          <td>11/10 - 03/11</td>
          <th>City Application Period <span>&raquo;</span></th>
        </tr>
        <tr class="odd">
          <td>03/01/11</td>
          <th>Deadline for 
            Applications <span>&raquo;</span></th>
        </tr>
        <tr>
          <td>05/01/11</td>
          <th>Finalists Announced <span>&raquo;</span></th>
        </tr>
        <tr class="odd">
          <td>06/01/11</td>
          <th>Selected Cities Notified <span>&raquo;</span></th>
        </tr>
        <tr>
          <td>06/15/11</td>
          <th>Selected Cities Announced <span>&raquo;</span></th>
        </tr>
        <tr class="odd">
          <td>06/11 - 09/11</td>
          <th>Product Scoping and
            Contracting <span>&raquo;</span></th>
        </tr>
        <tr>
          <td>09/15/11</td>
          <th>Product Overviews
            Announced <span>&raquo;</span></th>
        </tr>
        <tr class="odd">
          <td>01/12</td>
          <th>New Class of Fellows
            Begins Development Cycle <span>&raquo;</span></th>
        </tr>
      </table>
    </div>
  </div>
</div>
<?php get_footer(); ?>
