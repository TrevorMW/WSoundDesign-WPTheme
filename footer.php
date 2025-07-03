<?php
/**
 * @package WordPress
 * @subpackage themename
 */
?>

<?php if (is_front_page()) { ?>
	</main>
<?php } else { ?>
	</main>
<?php } ?>

<footer>
	<div class="wrapper sand globalCTA">
		<div class="container centered small">
			<h5>W Sound Design offers expert on-location sound recording,<br /> sound mixing, &amp; audio
				post-production services<br /> tailored to the needs of filmmakers, producers, &amp; content creators.
			</h5>
			<br />
			<br />
			<div class="ctaGroup">
				<a class="btn btnIcon " href="tel:"><span class="material-symbols-rounded">call</span>&nbsp; Give Me a
					Call</a>
				&nbsp;&nbsp;&nbsp;
				<a class="btn btnIcon btnSecondary" href="/contact"><span
						class="material-symbols-rounded">mail</span>&nbsp; Email Me</a>
			</div>
		</div>
	</div>
	<div class="wrapper deepOcean footer">
		<div class="container flexed spaceBetween">
			<div class="">
				<nav class="footerUtility">
					<!-- <ul>
						<li><a href="YOUR FACEBOOK LINK" title="Facebook" target="_blank" rel="noopener">
							<span class="social"><i class="fa fa-facebook"></i></span></a></li>

						<li><a href="YOUR TWITTER LINK" title="Twitter" target="_blank" rel="noopener">
							<span class="social"><i class="fa fa-twitter"></i></span></a></li>

						<li><a href="YOUR PINTEREST LINK" title="Pinterest" target="_blank" rel="noopener">
							<span class="social"><i class="fa fa-pinterest"></i></span></a></li>

						<li><a href="YOUR INSTAGRAM LINK" title="Instagram" target="_blank" rel="noopener">
							<span class="social"><i class="fa fa-instagram"></i></span></a></li>
					</ul> -->
					<ul>
						<?php wp_nav_menu(array(
							'menu' => 'footer-utility',
							'theme_location' => 'footer-utility',
							'container' => false,
							'items_wrap' => '%3$s',
							'depth' => 0
						)) ?>
					</ul>
				</nav>
			</div>
			<div class="alignRight">
				<p>
					Copyright &copy; <?php echo date("Y") ?> Wagner Sound Design
				</p>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>

</html>