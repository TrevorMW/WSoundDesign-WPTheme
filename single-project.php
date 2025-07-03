<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header();  the_post(); 

$project = new Project($post);?>


<article class="page" role="article">
  <div class="wrapper subHero">
    <header class="subHeroTitle">
      <h2 class="pageTitle"><?php the_title()?></h2>
    </header>
    <div class="subHeroImage"><?php echo SubHero::getImageHtml($post->ID); ?></div>
  </div>

  <div class="container small">
      <div class="page-content">
        <?php the_content(); ?>
        <?php echo $project->getEmbedLink();?>
      </div>
  </div>

</article>
<!-- 
<div class="primary">
    <article class="post individual-post" role="article">
      <header class="entry-header">
        <h1 class="entry-title" role="heading">
          <?php the_title(); ?>
        </h1>
        <div class="entry-meta">
          <?php printf( __( '<span class="meta-prep meta-prep-author">Posted on </span>
			                       <a href="%1$s" rel="bookmark">
			                         <time class="entry-date" datetime="%2$s" pubdate>%3$s</time>
                             </a> ', 'themename' ),
				                    get_permalink(),
				                    get_the_date( 'c' ),
				                    get_the_date()
			    ); ?>	
        </div>
      </header>
      
      <div class="entry-content">
        <?php the_content(); ?>
      </div>

    </article>
    <hr />
    <nav id="nav-below" role="navigation">
      <div class="nav-prev"><?php previous_post_link( '%link',  _x( '&larr;', 'Previous post link', 'themename' ) . ' %title' ); ?></div>
      <div class="nav-next"><?php next_post_link( '%link', '%title ' . _x( '&rarr;', 'Next post link', 'themename' ) ); ?></div>
    </nav>
    
</div> -->

<?php get_sidebar(); get_footer(); ?>
