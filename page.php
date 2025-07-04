<?php
/**
 * Template Name: Template - Generic
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

<div class="container small">
  <section class="page" role="article">
    <div class="page-content">
      <?php the_content(); ?>
    </div>
  </section>
</div>

<?php  get_footer(); ?>
