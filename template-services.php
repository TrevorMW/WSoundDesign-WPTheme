<?php
/**
 * Template Name: Template - Services Page
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
      <?php $services = get_field('service_blocks', $post->ID);
      
      if ($services) { 
        echo '<ul>'; 
        foreach($services as $service) { ?>

          <li>
            <h5><?php echo $service['service_name']; ?></h5>
            <p><?php echo $service['service_description'] ?></p>
          </li>
    
        <?php } 
        echo '</ul>';
      }?>
    </div>
  </section>
</div>

<?php get_sidebar(); get_footer(); ?>
