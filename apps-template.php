<?php
/**
 * The template for displaying all pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

/*
Template Name: Apps
*/

get_header(); ?>

<div class="wrap clearfix" id="inner">
  <div id="apps-page" class="fullcolumn" style="width: 940px;" >

    <h1>Our Apps and Projects</h1>

    <p class="page-description">
      Our fellowship, accelerator and incubator apps are the product of hundreds of community interviews. In partnership with our government partners, fellows and startup founders figure out how to best serve citizens. For a list of more civic apps check out <a href="http://commons.codeforamerica.org/">CfA Commons</a>.
    </p>

    <form class="search-input-wrapper">
      <input type="text" placeholder="Search for an app or project" />
      <span class="search-icon"></span>
    </form>

    <ul class="project-category-links">
      <li>
        <a data-filter="services">Local Service Apps</a>
      </li>
      <li>
        <a data-filter="engagement">Citizen Engagement Apps</a>
      </li>
      <li>
        <a data-filter="free">Free Apps</a>
      </li>
      <li>
        <a data-filter="paid">Paid Apps</a>
      </li>
    </ul>

    <div class="sort-by">
      Sort by <a data-sort="date">Most Recent</a> | <a data-sort="name" class="active">A - Z</a>
    </div>

    <div class="apps" id="apps-page">

      <?php
      $args = array( 'post_type' => 'cfa_app', 'posts_per_page' => 40, 'orderby' => 'date' );
      $loop = new WP_Query( $args );
      while ( $loop->have_posts() ) : $loop->the_post(); ?>

      <?php $post_custom = get_post_custom($post->ID); ?>

        <div class="app <?php if ($post_custom['app-featured']){ ?>featured<?php } ?>"
             style="display: none;"
             data-date="<?php echo get_post_time('U', true); ?>"
             data-content="<?php echo strip_tags($post->post_content); ?>"
             data-name="<?php echo $post->post_title ?>"
             <?php if ($post_custom['app-services']){ ?>data-services="true" <?php } ?>
             <?php if ($post_custom['app-engagement']){ ?>data-engagement="true" <?php } ?>
             <?php if ($post_custom['app-free']){ ?>data-free="true" <?php } ?>
             <?php if ($post_custom['app-paid']){ ?>data-paid="true" <?php } ?>
             <?php if ($post_custom['app-other']){ ?>data-other="true" <?php } ?>
             >
          <div class="app-inner">
            <div class="featured-app">Featured App</div>
            <a href="<?php echo get_permalink() ?>">
              <img src="<?php $img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); echo $img_url[0] ?>" />
            </a>
            <div class='app-info'>
              <p class="description">
                <?php echo $post->post_excerpt; ?>
              </p>
              <?php if ($post_custom['app-reuse-count']): ?>
                <div class="reuse-stats">
                  <span class="reuse-icon"></span>
                  Reused in <?php echo sprintf(_n('1 city', '%s cities', $post_custom['app-reuse-count'][0]), $post_custom['app-reuse-count'][0]); ?>
                </div>
              <?php endif; ?>
              <div class="get-this-app-wrapper">
                <a class="get-this-app" href="<?php echo get_permalink() ?>">
                  Get this app &amp; learn more
                </a>
              </div>
            </div>
          </div>
        </div>



      <?php endwhile; ?>
    </div>
  </div>
</div>

<script>
$(function(){

  jQuery.fn.sort = function() {
    return this.pushStack( [].sort.apply( this, arguments ), []);
  };

  var $selectedFilter;

  var showApps = function($apps) {
    $(".app").hide();
    $apps.show();
  }

  var sortApps = function() {
    var sortBy = $("[data-sort].active").data('sort');

    var apps = $(".apps .app").remove();

    apps.sort(function(a, b){
      var direction = 0;

      if ($(a).hasClass('featured')) direction--;
      if ($(b).hasClass('featured')) direction++;

      if (direction == 0) {
        if (sortBy == 'name') {
          direction = direction + ($(a).data('name').toLowerCase() > $(b).data('name').toLowerCase() ? 1 : -1);
        } else if (sortBy == 'date') {
          direction = direction + (parseInt($(a).data('date')) < parseInt($(b).data('date')) ? 1 : -1);
        }
      }

      return direction > 0 ? 1 : -1;

    }).appendTo($(".apps"));
  }

  $("[data-filter]").click(function(e){
    $(".search-input-wrapper input").val('')
    $selectedFilter = $(this);
    $("[data-filter]").removeClass("active");
    $(this).addClass('active');
    var filterName = $(this).data('filter');

    showApps($(".app[data-"+filterName+"]"))
  });

  $("[data-sort]").click(function(){
    $("[data-sort]").removeClass('active');
    $(this).addClass('active');
    sortApps();
  });

  $(".search-input-wrapper").submit(function(e){
    e.preventDefault();
  });

  $(".search-input-wrapper input").keyup(function(){
    var filter = $(this).val();

    if (filter == "") {
      return $selectedFilter.click();
    }

    $("[data-filter].active").removeClass('active');

    var regexp = new RegExp(filter, 'i');

    var apps = $(".app").filter(function(){
      return $(this).text().match(regexp) ||
             $(this).data('content').match(regexp) ||
             $(this).data('name').match(regexp);
    });

    showApps(apps);
  });

  sortApps();
  $("[data-filter]").eq(0).click()
});
</script>


<?php get_footer(); ?>
