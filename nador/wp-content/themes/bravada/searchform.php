<?php
/**
 * The template for displaying the searchform
 *
 * @package Bravada
 */
?>

<form role="search" method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _e( 'Search for:', 'bravada' ); ?></span>
		<input type="search" class="s" placeholder="<?php echo esc_attr_e( 'Search', 'bravada' ); ?>" value="<?php echo get_search_query(); ?>" name="s" size="10"/>
	</label>
	<button type="submit" class="searchsubmit"><span class="screen-reader-text"><?php echo _e( 'Search', 'bravada' ); ?></span><i class="icon-search2"></i><i class="icon-search2"></i></button>
</form>
