<?php
function appointment_custom_breadcrumbs() {

  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = ''; // delimiter between crumbs
  $home = esc_html__('Home','appointment'); // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<li class="active">'; // tag before the current crumb
  $after = '</li>'; // tag after the current crumb

  global $post;
  $homeLink = home_url('/');

  if( is_home() && ! is_front_page() ) {
       $posts_page = esc_html(get_the_title(get_option('page_for_posts')));
       echo '<li><a href="' . esc_url( $homeLink ) . '">' . $home . '</a> ' . '&nbsp &#47; &nbsp'." $posts_page ".'</li>';
  }
  elseif (is_home() || is_front_page()) {

    if ($showOnHome == 1) echo '<li><a href="' . esc_url ( $homeLink  ) . '">' . $home . '</a></li>';

  } else {

    echo '<li><a href="' . esc_url( $homeLink ) . '">' . $home . '</a> ' . '&nbsp &#47; &nbsp';

    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . ' ');
      echo $before . esc_html__('Archive by category','appointment'). ' "' . single_cat_title('', false) . '"' . $after;

    } elseif ( is_search() ) {
    echo $before . get_search_query() . $after;

    } elseif ( is_day() ) {
      echo '<a href="' . esc_url( get_year_link( get_the_time('Y')) ) . '">' . esc_html(get_the_time('Y')) . '</a> ' . '&nbsp &#47; &nbsp';
      echo '<a href="' . esc_url( get_month_link(get_the_time('Y'),get_the_time('m')) ) . '">' . esc_html(get_the_time('F')) . '</a> ' . '&nbsp &#47; &nbsp';
      echo $before . esc_html(get_the_time('d')) . $after;

    } elseif ( is_month() ) {
      echo '<a href="' . esc_url( get_year_link(get_the_time('Y')) ) . '">' . esc_html(get_the_time('Y')) . '</a> ' . $delimiter . '&nbsp &#47; &nbsp';
      echo $before . esc_html(get_the_time('F')) . $after;

    } elseif ( is_year() ) {
      echo $before . esc_html(get_the_time('Y')) . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . esc_url ( $homeLink ) . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . '&nbsp &#47; &nbsp' . $before . esc_html(get_the_title()) . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . '&nbsp &#47; &nbsp');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . esc_html(get_the_title()) . $after;
      }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;

    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID);
    if(!empty($cat)){
    $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . '&nbsp &#47; &nbsp');
    }
      echo '<a href="' . esc_url( get_permalink($parent)) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . esc_html(get_the_title()) . $after;

    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . esc_html(get_the_title()) . $after;

    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . esc_url(get_permalink($page->ID)) . '">' . esc_html(get_the_title($page->ID)) . '</a>' . '&nbsp &#47; &nbsp';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter;
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . esc_html(get_the_title()) . $after;

    } elseif ( is_tag() ) {
      echo $before . esc_html__('Posts tagged','appointment').' "' . single_tag_title('', false) . '"' . $after;

    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . esc_html__('Articles posted by','appointment').' ' . $userdata->display_name . $after;

    } elseif ( is_404() ) {
      echo $before . esc_html__('Error 404','appointment') . $after;
    }

    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
      echo ' ( ' . esc_html__('Page','appointment') . '' . get_query_var('paged'). ' )';
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
    }

  if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
      echo ' ( ' . esc_html__('Page','appointment') . '' . get_query_var('paged'). ' )';
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
    }

    echo '</li>';
  }
} // end appointment_custom_breadcrumbs()
