<!-- Page Title Section -->
<div class="page-title-section">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>
                            <?php
                            if (is_404()) {
                                esc_html_e('Error 404', 'appointment');
                            } elseif (is_singular()) {
                                the_title();
                            } elseif (is_search()) {
                                esc_html_e("Search results for:", 'appointment');
                                echo ' ';
                                echo get_search_query();
                            } elseif (get_option('show_on_front') == 'posts') {
                                esc_html_e('Home', 'appointment');
                            } else if (get_option('show_on_front')=='page') {
                                echo esc_html(get_the_title( get_option('page_for_posts', true) ));
	                      		}
                            else {
                                the_title();
                            }
                            ?>
                        </h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="page-breadcrumb">
                        <?php if (function_exists('appointment_custom_breadcrumbs')) appointment_custom_breadcrumbs(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Title Section -->
<div class="clearfix"></div>
