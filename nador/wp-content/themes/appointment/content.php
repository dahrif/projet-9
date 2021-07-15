<div id="post-<?php the_ID(); ?>" <?php post_class('blog-lg-area-left'); ?>>
	<div class="media">
	<?php appointment_aside_meta_content(); ?>
		<div class="media-body">
			<?php // Check Image size for fullwidth template
				 appointment_post_thumbnail('','img-responsive');
				 appointment_post_meta_content();
				?>
				<?php if( !is_single() ){ ?>
                    <h3 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php }else{ ?>
                    <h3 class="blog-single-title"><?php the_title(); ?></h3>
                    <?php } ?>
                    <div class="blog-content">
				<?php
				// call editor content of post/page
				the_content( __('Read More', 'appointment' ) );
				wp_link_pages( );
			   ?>
			</div>
		</div>
	 </div>
</div>
