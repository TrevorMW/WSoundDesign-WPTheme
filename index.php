<?php
/**
 * @package WordPress
 * @subpackage themename
 */

$blog_id = get_option('page_for_posts'); 

get_header(); ?>

<div class="wrapper subHero">
  <div>
    <h2 class="pageTitle"><?php the_title()?></h2>
  </div>
</div>

<div class="container small" role="structure">
  <section class="page posts-page">
    <div class="page-content">
      <?php $post = get_post( $blog_id ); $post->post_content; ?><hr />
      <?php get_template_part( 'loop', 'index' ); ?>
    </div>
  </section>
</div>

<?php  get_footer(); ?>
