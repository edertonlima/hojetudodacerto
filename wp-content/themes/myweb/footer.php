
	<footer class="box-menu footer">
		<div class="container">
			<div class="row logo">
				<div class="col-6">
					<h1><a href="<?php echo get_home_url(); ?>" alt="<?php bloginfo( 'name' ); ?>">
						<img src="<?php the_field('logo','option'); ?>" alt="<?php bloginfo( 'name' ); ?>">
					</a></h1>
				</div>
			</div>
			
			<nav class="nav">
				<?php wp_nav_menu( array(
					'menu'           => 'Menu Principal',
				    'theme_location' => 'primary',
				    'items_wrap'     => '<ul class="menu">%3$s</ul>'
				) ); ?>

				<?php include 'social.php'; ?>
			</nav>

			<div class="bg-footer"></div>
		</div>
	</footer>

</body>
</html>