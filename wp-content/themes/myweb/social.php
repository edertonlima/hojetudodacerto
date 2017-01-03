<ul class="social">
	<?php if(get_field('youtube','option')){ ?>
		<li><a href="<?php the_field('youtube','option') ?>" title="Youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>
	<?php } ?>
	
	<?php if(get_field('instagram','option')){ ?>
		<li><a href="<?php the_field('instagram','option') ?>" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
	<?php } ?>

	<?php if(get_field('facebook','option')){ ?>
		<li><a href="<?php the_field('facebook','option') ?>" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
	<?php } ?>
</ul>