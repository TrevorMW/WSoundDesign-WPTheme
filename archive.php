<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header(); the_post();?>

<div class="wrapper subHero" role="structure">
  <div>
    <h2 class="pageTitle" role="heading">
      <?php if ( is_day() ) : printf( __( 'Daily Archives: <span>%s</span>', 'themename' ), get_the_date() ); ?>
        <?php elseif ( is_month() ) : printf( __( 'Monthly Archives: <span>%s</span>', 'themename' ), get_the_date( 'F Y' ) ); ?>
        <?php elseif ( is_year() ) : printf( __( 'Yearly Archives: <span>%s</span>', 'themename' ), get_the_date( 'Y' ) ); ?>
        <?php else : _e( 'Blog Archives', 'themename' );  endif; ?>
    </h2>
  </div>
</div>

<div class="container small" role="structure">
  <section class="page archive">
    <div class="page-content">
      <?php rewind_posts(); get_template_part( 'loop', 'archive' ); ?>
    </div>
  </section>
</div>

<?php get_sidebar(); get_footer(); ?>
