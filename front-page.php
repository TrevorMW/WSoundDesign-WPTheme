<?php
/**
 *
 * @package    WordPress
 * @subpackage themename
 */

get_header();
the_post(); ?>

<div class="hero heroLeft heroBottom heroHomepage">
    <div class="heroInner">
        <div class="heroBody">
            <h1 class="heroHeading">Professional Freelance <br />Sound Engineering</h1>
            <p>Expert Location Sound & Audio Post Production <br />for Film, TV, and Commercials – Based in Chicago.</p>

            <div class="ctaGroup">
                <a class="btn btnPrimary" href="/work">Latest Work</a>
                <a class="btn btnTertiary" href="/contact">Get A Quote</a>
            </div>
        </div>
    </div>
    <picture>
        <img src="<?php echo get_template_directory_uri() ?>/assets/img/studio.jpg" alt="">
    </picture>
</div>

<div class="wrapper white">
    <div class="container small centered">
        <section class="">
            <header>
                <h2>Latest Work</h2>
            </header>
            <p>Heres a bunch of text about my latest work that im working on.</p>
        </section>

        <section class="featuredWorkItems">
            <?php echo Work::getFeaturedWorkItems($post->ID) ?>
        </section>
    </div>
</div>

<?php get_footer(); ?>