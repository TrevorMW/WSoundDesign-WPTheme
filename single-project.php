<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header();
the_post();

$project = new Project($post); ?>

<div class="wrapper subHero">
  <header class="subHeroTitle">
    <h2 class="pageTitle"><?php the_title() ?></h2>
  </header>
  <div class="subHeroImage"><?php echo SubHero::getImageHtml($post->ID); ?></div>
</div>

<div class="container small">
  <div class="page-content">
    <?php the_content(); ?><br />
    <?php echo $project->getEmbedLink(); ?>
  </div>
</div>

<?php if($project->hasRelatedProjects) { ?>
  <div class="wrapper relatedProjects">
    <section class="container small centered">
      <header>
        <h2>Related Projects</h2>
      </header>
    </section>

    <section class="projects relatedProjects">
      <?php echo $project->getRelatedProjects() ?>
    </section>
  </div>
<?php } ?>

<?php get_footer(); ?>