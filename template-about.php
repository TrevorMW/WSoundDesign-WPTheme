<?php
/**
 * Template Name: Template - About
 * Description: Generic Sub Page Template
 *
 * @package WordPress
 * @subpackage themename
 */

get_header();
the_post(); ?>

<div class="wrapper subHero">
  <div class="subHeroTitle">
    <h2 class="pageTitle"><?php the_title() ?></h2>
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
<!-- 
<div class="wrapper darkGray clientLogos">
  <section class="container small">
    <header>
      <h5>Clients</h5>
      <br />
      <p>Below are some of the brands that we have had the pleasure of working with.</p>
    </header>
    <div class="clientLogoList">
      <ul>
        <li><img src="" alt="" title="" /></li>
        <li><img src="" alt="" title="" /></li>
        <li><img src="" alt="" title="" /></li>
      </ul>
    </div>
  </section>
</div> -->

<?php get_footer(); ?>