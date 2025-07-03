<?php
/**
 * Template Name: Template - Work
 * Description: Generic Sub Page Template
 *
 * @package WordPress
 * @subpackage themename
 */

get_header(); the_post(); ?>

<div class="wrapper subHero">
  <div class="subHeroTitle">
    <h2 class="pageTitle"><?php the_title()?></h2>
  </div>
  <div class="subHeroImage"><?php echo SubHero::getImageHtml($post->ID); ?></div>
</div>

<div class="container">
  <section class="page" role="article">
    <div class="page-content">
      <?php the_content(); ?>
      <?php echo Work::getWorkSection($post->ID) ?>
    </div>
  </section>
</div>

<?php get_sidebar(); get_footer(); ?>
