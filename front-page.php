<?php
/**
 *
 * @package    WordPress
 * @subpackage themename
 */

get_header();
the_post(); 

$heroImg      = get_field('hero_image', $post->ID); 
$heroTitle    = get_field('hero_title', $post->ID); 
$heroSubtitle = get_field('hero_subtitle', $post->ID); 
$heroText     = get_field('hero_text', $post->ID);

?>
 
<?php if($heroImg) { ?>
<div class="hero heroLeft heroBottom heroHomepage">
    <div class="heroInner">
        <div class="heroBody">
            <?php if($heroTitle) { ?>
                <h1 class="heroHeading"><?php echo $heroTitle; ?></h1>
            <?php } ?>

            <?php if($heroSubtitle) { ?>
                <h4 class="heroHeading"><?php echo $heroSubtitle; ?></h4>
            <?php } ?>

            <?php if($heroText) { ?>
                <p><?php echo $heroText;?></p>
            <?php } ?>
        </div>
    </div>
    <?php if($heroImg){ ?>
        <picture>
            <source srcset="<?php echo $heroImg['sizes']['desktop'] ?>" media="(min-width:768px)" />
            <img src="<?php echo $heroImg['sizes']['mobile'] ?>" 
                 alt="<?php echo $heroImg['alt'] ?>" 
                 title="<?php echo $heroImg['title'] ?>"/>
        </picture>
    <?php } ?>
</div>
<?php } ?>

<div class="wrapper darkGray mainCta">
    <section class="container ">
        <div>
            <h3>Do you need to hire sound or <br />rent equipment for a shoot?</h3>
            <br />
            <a href="/contact-us" class="btn btnTertiary">Get in Touch</a>
        </div>

        <div>
            <h3>Looking to learn more <br />about the services we offer?</h3>
            <br />
            <a href="/services" class="btn btnPrimary">Services</a>
        </div>
    </section>
</div>

<!-- <div class="wrapper subHero homepageSubhero">
    <section class="container small centered">
        <header>
            <h2>About W Sound Design</h2>
        </header>
        <p><?php echo the_content();?></p>
    </section>
</div> -->

<div class="wrapper white noPadBottom noPadTop">
    <!-- <section class="container small centered">
        <header>
            <h2>Latest Work</h2>
        </header>
        <p>Heres a bunch of text about my latest work that im working on.</p>
    </section> -->

    <section class="featuredWorkItems">
        <?php echo Work::getFeaturedWorkItems($post->ID) ?>
    </section>
</div>

<?php get_footer(); ?>