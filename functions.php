<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: bud3.com | @bud3
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 300, 330, true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');


    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('bud3', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function bud3_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load HTML5 Blank scripts (header.php)
function bud3_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!


        wp_register_script('bud3scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('bud3scripts'); // Enqueue it!
		
		
		wp_register_script('sticky-sidebar', get_template_directory_uri() . '/assets/js/jquery.sticky-sidebar.min.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('sticky-sidebar'); // Enqueue it!
    }
}

// Load HTML5 Blank conditional scripts
function bud3_conditional_scripts()
{
	if ( is_front_page() || is_single() || is_page('o-nama')) {
        wp_register_script('slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.0.0', true); // Conditional script(s)
        wp_enqueue_script('slick'); // Enqueue it!
    }
    
    if (is_front_page() || is_page('o-nama')) {
        wp_register_script('sliderinit', get_template_directory_uri() . '/js/sliderinit.js', array( 'slick' ), '1.0.0', true); // initial slider 
        wp_enqueue_script('sliderinit'); // Enqueue it!
    }
	
	 if (is_front_page() || is_page_template('templates/page-tpl-filter-cats.php') || is_archive()  || is_search()) {
        wp_register_script('select2', get_template_directory_uri() . '/assets/js/select2.min.js', array( 'jquery' ), '1.0.0', true); // initial slider 
        wp_enqueue_script('select2'); // Enqueue it!
    }

    if (is_single()  ) {
        wp_register_script('fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox.min.js', array( 'jquery' ), '3.5.2', true); // fancybox 
        wp_enqueue_script('fancybox'); // Enqueue it!
    }
	if(is_page_template('single-post-bigreads.php')){
        wp_register_script('wow', get_template_directory_uri() . '/assets/js/wow.min.js', array( 'jquery' ), '1.1.3', true); // wow 
        wp_enqueue_script('wow'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function bud3_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('fontawesome', get_template_directory_uri() . '/assets/css/fontawesome-all.min.css', array(), '1.0', 'all');
    wp_enqueue_style('fontawesome'); // Enqueue it!   

    if ( is_front_page() || is_single() || is_page('o-nama')) {
        wp_register_style('slicks', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.0', 'all'); // slick styles
        wp_enqueue_style('slicks'); // Enqueue it!
    }
    if(is_front_page() || is_page_template('templates/page-tpl-filter-cats.php') || is_archive() || is_search()){
         wp_register_style('select2css', get_template_directory_uri() . '/assets/css/select2.min.css', array(), '1.0', 'all'); // select2 styles
        wp_enqueue_style('select2css'); // Enqueue it!
    }
    if ( is_single()) {
        wp_register_style('fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css', array(), '1.0', 'all'); // fancybox styles
        wp_enqueue_style('fancybox'); // Enqueue it!
    }

    wp_register_style('bud3', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('bud3'); // Enqueue it! 
}

// Load HTML5 Blank conditional styles
/*function suva_conditional_styles()
{
    if ( is_front_page() || is_single() || is_page('o-nama')) {
        wp_register_style('slicks', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.0', 'all'); // slick styles
        wp_enqueue_style('slicks'); // Enqueue it!
		
		 wp_register_style('select2css', get_template_directory_uri() . '/assets/css/select2.min.css', array(), '1.0', 'all'); // slick styles
        wp_enqueue_style('select2css'); // Enqueue it!
    }
    if ( is_single()) {
        wp_register_style('fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css', array(), '1.0', 'all'); // fancybox styles
        wp_enqueue_style('fancybox'); // Enqueue it!
    }
    
}*/

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'bud3'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'bud3'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'bud3'), // Extra Navigation if needed (duplicate as many as you need!)
        'footer-menu' => __('Footer Menu', 'bud3')
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'bud3'),
        'description' => __('Description for this widget-area...', 'bud3'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'bud3'),
        'description' => __('Description for this widget-area...', 'bud3'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'bud3') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function bud3gravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function bud3comments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>
	<div class="comment-content-wrapper">
		<div class="comment-meta commentmetadata">
		<?php printf(__('<cite class="fn">%s</cite> <span class="says">//</span>'), get_comment_author_link()) ?>	
		<!-- <a href="<?php// echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"> -->
			<?php
			echo 'pre '. human_time_diff(get_comment_date('U'), current_time('timestamp'));
				//printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?><!-- </a> --><?php edit_comment_link(__('(Edit)'),'  ','' );
			?>
		</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>

</div><!-- /comment-content-wrapper -->
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'bud3_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'bud3_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'bud3_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination
//add_action('wp_enqueue_scripts', 'suva_conditional_styles');

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'bud3gravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
/*add_filter('show_admin_bar', 'remove_admin_bar');*/ // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]



/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}




/*------------------------------------*\
    Add acf options page
\*------------------------------------*/
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Theme options',
        'menu_title'    => 'Theme options',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'update_core',
        'redirect'      => false
    ));
    acf_add_options_sub_page(array(
        'page_title'    => 'Banners',
        'menu_title'    => 'Banners',
        'parent_slug'   => 'theme-general-settings',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Social networks',
        'menu_title'    => 'Social networks',
        'parent_slug'   => 'theme-general-settings',
    ));
	
	acf_add_options_sub_page(array(
        'page_title'    => 'Category page',
        'menu_title'    => 'Category page',
        'parent_slug'   => 'theme-general-settings',
    ));
}

function bud3_custom_scripts_on_single(){ 
     if (is_page_template('single-post-bigreads.php')) { ?>
    <script>
        jQuery(document).ready(function(){
            if(jQuery('comment-replies').length){ jQuery('span.scroll-to-comments').click(); }
            jQuery('span.scroll-to-comments').on( 'click', function () {
                    jQuery('html, body').animate({
                        scrollTop: jQuery(".comments-share").offset().top
                     }, 2000);
                    jQuery('a#open-comment').click();
            });
            /*vertical sliders init*/
            var verticalSliders = jQuery('.vertical-slider-container');
            var inst=1;
            verticalSliders.each(function(){
                jQuery(this).find('.vertical-slider').addClass("instance_"+inst);
                jQuery(this).find('.slide-count-links').addClass('instance_'+inst);
                jQuery('.slide-count-links.instance_'+inst).slick({
                  asNavFor: ".vertical-slider.instance_"+inst,
                  infinite:true,
                  arrows:false,
                  focusOnSelect:true,
                  vertical:true,
                  verticalSwiping:true,
                  speed: 700,
                  slidesToShow: 3,
                  slidesToScroll: 1,
                  backFocus:false
                });
                jQuery('.vertical-slider.instance_'+inst).slick({
                  arrows:false,
                  infinite:true,
                  vertical:true,
                  verticalSwiping:true,
                  focusOnSelect:true,
                  draggable:true,
                  speed: 700,
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  asNavFor:".slide-count-links.instance_"+inst
                });
                inst++;
            });
            /*end of vertical sliders init*/
            jQuery('.horizontal-slider').slick({
              infinite:true,
              draggable:true,
              speed: 300,
              slidesToShow: 4,
              slidesToScroll: 1,
              nextArrow: '<span class="next arrow line"><i class="fa fa-chevron-right"></i></span>',
				responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                  }
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
              ]
            });
            /*FANCY BOX INIT*/
            jQuery('.slick-cloned').find('a').removeAttr('data-fancybox');

            jQuery("[data-fancybox]").fancybox({
                // Options will go here
                loop: true,
                backFocus: false
            }); 
            /*OPEN COMMENT BLOCK*/
            jQuery('#open-comment').on('click',function(){
                jQuery('.comments-wrapper').slideToggle();
            });
            /*OPEN SPECIFICATION DATA*/
            jQuery('.js-specification-data').on('click',function(){
                jQuery('.specification-data').slideToggle();
                jQuery(this).toggleClass('opened');
            });
            /*SEARCH FORM MANIPULATION*/
           /* jQuery('.br-search-field .search-submit').on('click',function(e){
                var searchContainer=jQuery(this).closest('.br-search-field');
                var inputField=searchContainer.find('.search-input');
                if(!searchContainer.hasClass('active')){
                    e.preventDefault();
                    searchContainer.addClass('active');
                    inputField.focus();
                   // jQuery('button.search-submit').append('<i class="fas fa-times"></i>');
                }
                else{
                    searchContainer.find('form').submit();
                    searchContainer.removeClass('active');
                }
            });*/
            jQuery('body').on('click',function(e){
                if(jQuery('.br-search-field').hasClass('active') && !jQuery(e.target).closest('.search').length){
                    jQuery('.br-search-field').removeClass('active');
                }
            });
            /*LOAD MORE BOTTOM GALLERY*/
            if(jQuery('.bottom-gallery-load-more').length){

                function loadBottomGalleryImgs(perPage){

                    var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";

                    var page = parseInt(jQuery('.bottom-gallery-load-more').data('page'));
                    var postId = parseInt(jQuery('.bottom-gallery-load-more').data('post-id'));
                    var offset = parseInt(jQuery('.bottom-gallery-load-more').data('offset'));
                    var images = parseInt(jQuery('.bottom-gallery-load-more').data('images'));
                    var fieldName = jQuery('.bottom-gallery-load-more').data('fieldname');

                    var data = {
                        'action': 'load_bottom_gallery',
                        'postId': postId,
                        'fieldName': fieldName,
                        'page': page,
                        'perPage': perPage,
                        'offset': offset,
                    };
                    
                    jQuery.ajax({
                        url: ajaxurl,
                        type: 'post',
                        data: data,
                        success: function(response){
                                jQuery(response).hide().appendTo('ul.bottom-gallery').fadeIn('slow');
                            
                            //turn of load more button
                            var postsToLoad=images-offset-page*perPage;
                            if(postsToLoad<=0){
                                jQuery('.bottom-gallery-load-more').addClass('none');
                            }
                            else{
                                if(jQuery(".bottom-gallery-load-more").hasClass('none')){
                                    jQuery('.bottom-gallery-load-more').removeClass('none');
                                }
                                jQuery('.bottom-gallery-load-more').data('page',page+1).text('Još '+postsToLoad);
                            }
                        }
                    });
                }
                jQuery('.bottom-gallery-load-more').on('click',function(){
                    loadBottomGalleryImgs(12);
                });
                jQuery('.load-br-gallery').on('click',function(){
                    if(!jQuery(this).data('pressed')){
                        jQuery(this).data('pressed','true');
                        jQuery('.bottom-gallery-load-more').trigger('click');

                        }
                    jQuery(this).toggleClass('opened');    
                    if(jQuery(".load-br-gallery").hasClass('opened')){
                        jQuery('ul.bottom-gallery, .bottom-gallery-load-more').slideDown();
                    } else {
                        jQuery('ul.bottom-gallery, .bottom-gallery-load-more').slideUp();
                    }
                });

               
            }
			new WOW().init();
        });
        /*});*/
       
        /*jQuery('.slide-count-links').on('beforeChange', function(event, slick, currentSlide, nextSlide){
                    console.log(nextSlide);
                    jQuery('.slide-count-links').find('.slick-list.draggable').height(210);
                });*/
    </script>
    <?php } elseif (is_single() && !is_page_template('single-post-bigreads.php')) { ?>
	<script>
		jQuery(document).ready(function(){
            //scroll to comments section
            if(jQuery("body").hasClass("comment-replies")){ 
				jQuery('html, body').animate({
                        scrollTop: jQuery(".comments-share").offset().top
                     }, 2000);
                jQuery('.comments-wrapper').show();
            }
                jQuery('span.scroll-to-comments').on( 'click', function () {
                    jQuery('html, body').animate({
                        scrollTop: jQuery(".comments-share").offset().top
                     }, 2000);
                    jQuery('a#open-comment').click();
                });

			/*SINGLE TEMPLATE SLIDER INIT*/
			jQuery('.thumbnails-slider').slick({
			  infinite:true,
			  draggable:true,
			  speed: 300,
			  slidesToShow: 3,
			  slidesToScroll: 1,
			  prevArrow: '<span class="prev arrow"><i class="fa fa-chevron-left"></i></span>',
			  nextArrow: '<span class="next arrow"><i class="fa fa-chevron-right"></i></span>',
				responsive: [
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                  }
                }
              ]
			});

			/*FANCY BOX INIT*/
            jQuery('.slick-cloned').find('a').removeAttr('data-fancybox');

			jQuery("[data-fancybox]").fancybox({
				// Options will go here
                loop: true,
				backFocus: false
			});		
			/*SINGLE TEMPLATE ANSWERS SLIDER INIT*/
            if(jQuery('.answers-image-slider')){
              jQuery('.answers-image-slider').slick({
                arrows:false,
                slidesToShow: 1,
                speed: 1000,
              });
              jQuery('.answers-text-slider').slick({
                slidesToShow: 1,
                speed: 1000,    
                asNavFor: ".answers-image-slider",
                prevArrow: '<span class="answer prev arrow"><i class="fa fa-chevron-left"></i></span>',
                nextArrow: '<span class="answer next arrow"><i class="fa fa-chevron-right"></i></span>'
              });
              jQuery('.answers-text-slider').on('afterChange', function(event, slick, currentSlide, nextSlide){
                  jQuery('.answer').find('.img-number').text(slick.slideCount-currentSlide);
                });
            }
			/*SINGLE TEMPLATE GALLERY MANIPULATION*/
            var galleryInst;
            function changeBigImage(elem){
                /*Change number*/
                galleryInst=jQuery(elem).closest('.gallery');
                var largeSrc=galleryInst.find('.thumbnail-item.slick-current img').data('large');
                var id=galleryInst.find('.thumbnail-item.slick-current').data('id');
                galleryInst.find('.big-image>img').attr('src',largeSrc).data('id',id);
                if(galleryInst.hasClass('top-gallery')){
                    jQuery('.img-number').text(galleryInst.find('.thumbnail-item.slick-current').data('num'));
                }
                /*Change large image*/
                var largeSrc=galleryInst.find('.thumbnail-item.slick-current img').data('large');
                var id=galleryInst.find('.thumbnail-item.slick-current').data('id');
                galleryInst.find('.big-image>img').attr('src',largeSrc).data('id',id);
                if(galleryInst.hasClass('top-gallery')){
                    jQuery('.img-number').text(galleryInst.find('.thumbnail-item.slick-current').data('num'));
                }
            }
            /*On click thumbnail*/
			jQuery('.thumbnail-item').on('click',function(){
                galleryInst=jQuery(this).closest('.gallery');
                var slickInd=jQuery(this).data('slick-index');
                galleryInst.find('.thumbnails-slider').slick('slickGoTo',parseInt(slickInd));
                if(!galleryInst.find('.slick-cloned').length && !jQuery(this).hasClass('slick-current')){
                    var that = this;
                    galleryInst.find('.big-image img').fadeTo('fast',0.7,function(){
                        galleryInst.find('.thumbnail-item.slick-current').removeClass('slick-current');
                        jQuery(that).addClass('slick-current');
                        changeBigImage(that);
                    });
                }
			});
			/*Big image fadeTo 1 on load*/
            jQuery('.big-image img').on('load',function(){
                jQuery(this).fadeTo('fast',1);
            });
            /*On click full-size icon*/
			jQuery('.full-size').on('click',function(){
				var targetA=jQuery(this).siblings('img').data('id');
				jQuery('#link'+targetA).trigger('click');
			});
			/*Before change slide*/
            jQuery('.thumbnails-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
                    jQuery(this).closest('.gallery').find('.big-image img').fadeTo('fast',0.7);
            });
            /*After change slide*/
            jQuery('.thumbnails-slider').on('afterChange', function(event, slick, currentSlide, nextSlide){
                changeBigImage(this);
            });

			/*OPEN COMMENT BLOCK*/
			jQuery('#open-comment').on('click',function(){
				jQuery('.comments-wrapper').slideToggle();
			});

            /*LOAD MORE BOTTOM GALLERY*/
            if(jQuery('.bottom-gallery-load-more').length){

                function loadBottomGalleryImgs(perPage){

                    var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";

                    var page = parseInt(jQuery('.bottom-gallery-load-more').data('page'));
                    var postId = parseInt(jQuery('.bottom-gallery-load-more').data('post-id'));
                    var offset = parseInt(jQuery('.bottom-gallery-load-more').data('offset'));
                    var images = parseInt(jQuery('.bottom-gallery-load-more').data('images'));
                    var fieldName = jQuery('.bottom-gallery-load-more').data('fieldname');

                    var data = {
                        'action': 'load_bottom_gallery',
                        'postId': postId,
                        'fieldName': fieldName,
                        'page': page,
                        'perPage': perPage,
                        'offset': offset,
                    };
                    
                    jQuery.ajax({
                        url: ajaxurl,
                        type: 'post',
                        data: data,
                        success: function(response){
                                jQuery(response).hide().appendTo('ul.bottom-gallery').fadeIn('slow');
                            
                            //turn of load more button
                            var postsToLoad=images-offset-page*perPage;

                            if(postsToLoad<=0){
                                jQuery('.bottom-gallery-load-more').addClass('none');
                            }
                            else{
                                jQuery('.bottom-gallery-load-more').data('page',page+1).text('Još '+postsToLoad);

                            }
							//update sticky-sidebar
                            window.dispatchEvent(new Event('resize'));
                        }
                    });
                }
                jQuery('.bottom-gallery-load-more').on('click',function(){
                    loadBottomGalleryImgs(12);
                });

                
            }
		});
	</script>
		
<?php } elseif (is_page_template('templates/page-tpl-filter-cats.php') || is_category()) { ?>
			
	<script>
		jQuery(document).ready(function(){
			//ajax for post cats
            <?php $category_id=get_queried_object()->term_id;?>
            <?php $category_id=$category_id?$category_id:-1;?>
            <?php echo "var categoryId=".$category_id.';';?>

            categoryId=categoryId>=0?categoryId:false;

            var filter = jQuery('#filter');

            var loader=jQuery('.loading');

            function loadPostsByAjax(perPage, page){
                jQuery('.loadmore').removeClass('none'); //reset load more

                var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
                
                var catID = parseInt(jQuery('.checkedradio').find('.selected-cat').val());
                var data = {
                    'pageName': 'category',
                    'action': 'myfilter',
                    'page': page,
                    'perPage': perPage,
                    'categoryfilter': catID?catID:categoryId,
                    'security': '<?php echo wp_create_nonce("load_more_posts"); ?>'
                };
                
                jQuery.ajax({
                    url: ajaxurl,
                    type: 'post',
                    data: data,
                    beforeSend:function(xhr){
                        jQuery('#response').append(loader);
                        jQuery(loader).fadeIn('fast');
                        if(page==1){
                            jQuery('#response').fadeTo('fast',0.3);
                        }
                    },
                    success: function(response){
                        loader.fadeOut('fast',function(){
                            loader.remove();
                            jQuery(response).find('.brend-automobila-select select').select2();
                            if(page>1){
                                jQuery(response).hide().appendTo('#response').fadeIn('slow');
                                jQuery('#filter').data('paged',page);
                            }
                            else{
                                jQuery('#response').html(response);
                                jQuery('#response').fadeTo('fast',1);
                            }
                            //turn of load more button
                            var postsToLoad=jQuery('.load-posts-data').last().data('posts-to-load');
                            if(!postsToLoad>0){
                                jQuery('.loadmore').addClass('none');
                            }
							
							//update sticky-sidebar
                            window.dispatchEvent(new Event('resize'));

                            jQuery('#response').find('.brend-automobila-select select').select2();
                        });

                    }
                });
            }
            
			jQuery('#filter').submit(function(){
                loadPostsByAjax(24, 1);                
            });
					
            /*Change category*/
            jQuery('#filter .selected-cat').click(function () {
                  jQuery('#filter .selected-cat').parent().removeClass('checkedradio');
                  jQuery(this).parent(this).addClass('checkedradio');
                  jQuery('#filter').data('paged',1);
                  loadPostsByAjax(24, 1);
                });

            /*Load more*/
             jQuery('body').on('click', '.loadmore', function() {
                var page = parseInt(jQuery('#filter').data('paged'))+1;
                loadPostsByAjax(24, page);                
            });   
			
			/*on window load*/
            jQuery(window).on('load',function(){
                loadPostsByAjax(24, 1);
            });

            /*SELECT2*/
            jQuery('.brend-automobila-select select').select2();

});
	</script>	
<?php } elseif (is_front_page()) { ?>
    <script>
        jQuery(document).ready(function(){
            var loader=jQuery('.loading');
            /*on window load*/
            jQuery(window).on('load',function(){
                loadPostsByAjax(18, 1);
            });
            /*Load more*/
             jQuery('body').on('click', '.loadmore', function() {
                var page = parseInt(jQuery('.home-archive-posts').data('paged'))+1;
                loadPostsByAjax(18, page);                
            });   
            function loadPostsByAjax(perPage, page){
                jQuery('.loadmore').removeClass('none'); //reset load more

                var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
                
                var data = {
                    'pageName': 'home',
                    'action': 'myfilter',
                    'page': page,
                    'perPage': perPage,
					'offset': 9,
                    'security': '<?php echo wp_create_nonce("load_more_posts"); ?>'
                };                
                jQuery.ajax({
                    url: ajaxurl,
                    type: 'post',
                    data: data,
                    beforeSend:function(xhr){
                            jQuery('.home-archive-posts').append(loader);
                            jQuery(loader).fadeIn('fast');
                    },
                    success: function(response){
                        loader.fadeOut('fast',function(){
                            loader.remove();
                            if(page>1){
                                jQuery(response).hide().appendTo('.home-archive-posts').fadeIn('slow');
                                jQuery('.home-archive-posts').data('paged',page);
                            }
                            else{
                                jQuery('.home-archive-posts').html(response);
                            }
                            //turn of load more button
                            var postsToLoad=jQuery('.load-posts-data').last().data('posts-to-load');
                            if(!postsToLoad>0){
                                jQuery('.loadmore').addClass('none');
                            }
							//update sticky-sidebar
                            window.dispatchEvent(new Event('resize'));
                        });
                    }
                });
            }			
			
			jQuery('.brend-automobila-select select').select2();

        });
    </script> 
    <?php } elseif (is_archive() || is_search()) { 
        global $wp_query;
    ?>
    <script>
        jQuery(document).ready(function(){
            var query_vars=<?php echo json_encode( $wp_query->query );?>;
            var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";

            var loader=jQuery('.loading');
            /*on window load*/
            jQuery(window).on('load',function(){
                loadPostsByAjax(24, 1);
            });
            /*Load more*/
             jQuery('body').on('click', '.loadmore', function() {
                var page = parseInt(jQuery('.archive-posts-container').data('paged'))+1;
                loadPostsByAjax(24, page);                
            });   
            function loadPostsByAjax(perPage, page){
                jQuery('.loadmore').removeClass('none'); //reset load more
                
                var data = {
                    'query_vars': query_vars,
                    'action': 'myfilter',
                    'page': page,
                    'perPage': perPage,
                    'pageName': 'archive'
                };                
                jQuery.ajax({
                    url: ajaxurl,
                    type: 'post',
                    data: data,
                    beforeSend:function(xhr){
                        jQuery('.archive-posts-container').append(loader);
                        jQuery(loader).fadeIn('fast');
                    },
                    success: function(response){
                        loader.fadeOut('fast',function(){
                            loader.remove();
                            if(page>1){
                                jQuery(response).hide().appendTo('.archive-posts-container').fadeIn('slow');
                                jQuery('.archive-posts-container').data('paged',page);
                            }
                            else{
                                jQuery('.archive-posts-container').html(response);
                            }
                            //turn of load more button
                            var postsToLoad=jQuery('.load-posts-data').last().data('posts-to-load');
                            if(!postsToLoad>0){
                                jQuery('.loadmore').addClass('none');
                            }
							//update sticky-sidebar
                            window.dispatchEvent(new Event('resize'));
							
                            jQuery('.brend-automobila-select select').select2();
                        });
                    }
                });
            }            
        });
    </script>  
<?php }
}
add_action('wp_footer', 'bud3_custom_scripts_on_single');


	
//load bottom gallery by ajax on single page
function load_bottom_gallery(){
    $postId=$_POST['postId'];
    $perPage=$_POST['perPage'];
    $offset=$_POST['offset'];
    $page=$_POST['page'];
    $fieldName=$_POST['fieldName'];

    $images=get_field($fieldName, $postId);
    $imagesCount=count($images);
    $newImages=$imagesCount-$offset-($page-1)*$perPage;

    $output='';
    $startPosition=$offset+($page-1)*$perPage;
    $endPosition=$imagesCount>$startPosition+$perPage?$startPosition+$perPage:$imagesCount;
    for($i=$startPosition; $i<$endPosition; $i++){
        $output.=
        '<li>'.
            '<a data-fancybox="content-gallery" href="'.
                $images[$i]['url'].'">'.
                 '<img src="'.$images[$i]['sizes']['medium'].'" alt="'.$images[$i]['alt'].'"/>'.
            '</a>'.            
        '</li>';
    }
    echo $output;  
    wp_die();  
}
add_action('wp_ajax_load_bottom_gallery', 'load_bottom_gallery'); 
add_action('wp_ajax_nopriv_load_bottom_gallery', 'load_bottom_gallery'); 

//load posts via ajax on home and category page
function bud3_filters_function(){
    if(isset($_POST['query_vars'])){
        $args = $_POST['query_vars'] ;
        
    }
    else{

            $args = array(
                /*'posts_per_page' => 24,*/
                'orderby' => 'date',
                'order' => 'DESC',
                'post_type' => 'post',
            );           
    

        // for taxonomies / categories
        if( isset( $_POST['categoryfilter'] )   ) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'id',
                    'terms' => $_POST['categoryfilter']
                )
            );        
        }
    }



    $args['post_status']="publish";
    $args['meta_query']=array(
                                array(
                                    'key' => '_thumbnail_id',
                                    'compare' => '!=',
                                    'value' => ''
                                )
                            );
    //for pages
    if(isset($_POST['page'])){
        $args['paged']=$_POST['page'];
    }
    //per page
    if(isset($_POST['perPage'])){
        $args['posts_per_page']=$_POST['perPage'];
    }
    /*page name*/
    $page_name;
    if( isset( $_POST['pageName'] )){
        $page_name=$_POST['pageName'];
    }
	/*offset*/
    $initialOffset=0;
    $offset=0;
    if(isset($_POST['offset'])){
        $initialOffset=$_POST['offset'];
        $args['offset']= $_POST['perPage']*($_POST['page'] - 1) + $_POST['offset'];
        $offset=$args['offset'];
    }

    //QUERY
    $query = new WP_Query( $args );

    if( $query->have_posts()) :
        $numberOfPosts=$query->post_count;
        global $i;
        $i=1;
	
		$total_posts_count = $query->found_posts;

        $posts_to_load = $total_posts_count - $args['posts_per_page']*$args['paged']-$initialOffset;
        $posts_to_load=$posts_to_load>0?$posts_to_load:0;
        
        echo '<div class="none load-posts-data" data-posts-to-load="'.$posts_to_load.'" data-per-page="'.$args['posts_per_page'].'"></div>';

        while( $query->have_posts() ): $query->the_post();
          
            /*get_template_part('template-parts/link-shadow-box');*/
            if($page_name=="category" || $page_name=="archive"){
                printCategoryLayout($numberOfPosts);
            }
            elseif($page_name=="home"){
               printArchiveHomeLayout($numberOfPosts); 
            }
    	endwhile;
        wp_reset_postdata();

    else :
        echo '<div class="no-posts">Nije pronađen nijedan post</div>';
    endif;
 
    die();

}
 
add_action('wp_ajax_myfilter', 'bud3_filters_function'); 
add_action('wp_ajax_nopriv_myfilter', 'bud3_filters_function');	

/*CATEGORY PAGE*/
/*ACF DODATE OPCIJE ZA CATEGORY STRANU*/
//print random large banner
/*function the_random_large_banner(){
    $horizontal_banners = get_field('horizontal_banners','option' ); // get all the rows
    $horizontal_banner = $horizontal_banners[ array_rand( $horizontal_banners ) ]; // get the first row
    echo $horizontal_banner['horizontal_banner'];
}
//print random small banner
function the_random_small_banner(){
    $small_banners = get_field('small_banners','option' ); // get all the rows
    $small_banner = $small_banners[ array_rand( $small_banners ) ]; // get the first row
    echo $small_banner['small_banner'];
}
*/
function the_random_large_banner(){
    $fixed_banner_768 = get_field('fixed_banner_768','option' ); 
    $fixed_banner_768_url = get_field('fixed_banner_768_url','option' );  ?>
    <a href="<?php echo $fixed_banner_768_url; ?>" target="_blank"><img src="<?php echo $fixed_banner_768['url']; ?>" alt="<?php echo $fixed_banner_768['alt']; ?>" class="alignnone size-medium" /></a>
<?php }
//print random small banner
function the_random_small_banner(){
 $fixed_banner_768 = get_field('fixed_banner_768','option' ); 
    $fixed_banner_768_url = get_field('fixed_banner_768_url','option' );  ?>
    <a href="<?php echo $fixed_banner_768_url; ?>" target="_blank"><img src="<?php echo $fixed_banner_768['url']; ?>" alt="<?php echo $fixed_banner_768['alt']; ?>" class="alignnone size-medium" /></a>
<?php }

//print posts on category page
function printCategoryLayout($numberOfPosts){
    
    global $i;

    if($numberOfPosts>3){
        if($i==4){
            get_template_part('template-parts/small-banner');
        }
    
        
        if($numberOfPosts>7){   
            if($i==8){
                get_template_part('template-parts/large-banner-filter');
                get_template_part('template-parts/highlighted-box');
                if($numberOfPosts>8){
                    echo '<div class="no-padding col6 four-posts-wrapper flex flex-wrap">';
                }
                $i++;
                return;
            }
            if($i>8 && $i<=12){
                get_template_part('template-parts/link-shadow-box');
                if(($i==$numberOfPosts) || $i==12){
                    echo '</div>';
                }
                if($i==12 && $numberOfPosts>15){
                    echo '<div class="no-padding four-posts-wrapper col6 flex flex-wrap">';
                }
                $i++;
                return;
            }
            
        }

        if($numberOfPosts>12){  
            
            if($i>12 && $i<=14) {
                if($i==14){
                    get_template_part('template-parts/small-banner');
                }
                get_template_part('template-parts/link-shadow-box');
                $i++;
                return;
            }
            if($i==15 && $numberOfPosts>15){
                get_template_part('template-parts/link-shadow-box');
                echo '</div>';
                $i++;
                return;
            }
            if($i==16){
                get_template_part('template-parts/highlighted-box');
                $i++;
                return;
            }
        }
    }
        
    get_template_part('template-parts/link-shadow-box');

    $i++;
}
/*custom excerpt length on page-tpl-filter-cats.php template*/
function category_custom_excerpt_length( $length ) {
    
    if(wp_is_mobile() || is_page('o-nama')){
        return 12;
    }
    return 40;
}
add_filter( 'excerpt_length', 'category_custom_excerpt_length',20 );
/*short excerpt*/
function bud3_shortexcerpt($length){
    return 12;
}

/*Eliminate View Article on category page*/
function category_custom_excerpt_more( $more ) {
    
    return '...';
}
add_filter( 'excerpt_more', 'category_custom_excerpt_more' );

/*FILTER GALLERY SHORTCODE*/
remove_shortcode('gallery');
add_shortcode('gallery', 'bud3_new_gallery_shortcode');

function bud3_new_gallery_shortcode($atts)
{

    global $post;
    $pid = $post->ID;
    $gallery = "";
    $counterlinks="";

    if (empty($pid)) {$pid = $post['ID'];}

    if (!empty($atts['ids'])) {
        $atts['orderby'] = 'post__in';
        $atts['include'] = $atts['ids'];
    }

    extract(shortcode_atts(array('orderby' => 'menu_order ASC, ID ASC', 'include' => '', 'id' => $pid, 'itemtag' => 'dl', 'icontag' => 'dt', 'captiontag' => 'dd', 'columns' => 3, 'size' => 'large', 'link' => 'file', 'gallerytype' => 'thumbnailpreview', 'title'=>null, 'text'=>null), $atts));

    $args = array('post_type' => 'attachment', 'post_status' => 'inherit', 'post_mime_type' => 'image', 'orderby' => $orderby);

    if (!empty($include)) {$args['include'] = $include;} else {
        $args['post_parent'] = $id;
        $args['numberposts'] = -1;
    }

    /*if ($args['include'] == "") {$args['orderby'] = 'date';
        $args['order'] = 'asc';}*/
    /*$args['orderby']='date';
    $args['order']='asc';*/

    $images = get_posts($args);

    $imageNum=1; 
    $imagesCount= count($images);

    foreach ($images as $image) {
        
        $imgSmall=wp_get_attachment_image_src($image->ID,'medium');
        $imgLarge=wp_get_attachment_image_src($image->ID,'large');
        $imgFull=wp_get_attachment_image_src($image->ID,'full');
        $imgVerticalCustom=wp_get_attachment_image_src($image->ID,'vertical-slider-size');

        if($gallerytype=='thumbnailpreview'):

            if($imageNum==1):
                $gallery.=
                '<div class="content-gallery gallery">'.
                    '<div class="big-image o-fit">'.
                        '<img src="'.$imgFull[0].'" data-id="'.$image->ID.'">'.
                        '<span class="full-size"><i class="fa fa-expand-arrows-alt"></i></span>'.
                    '</div>'.
                    '<div class="thumbnails-slider content-gallery">';
            endif;

            $gallery .= 
                
                        '<div class="thumbnail-item o-fit '.(($imageNum==1)?'active"':'"').' data-id="'.$image->ID.'" data-num="'.$imageNum.'">'.
                                '<a href="'.$imgFull[0].'" data-fancybox="content-gallery" data-width="'.$imgFull[1].'" data-height="'.$imgFull[2].'" id="link'.$image->ID.'"></a>'.
                                '<img src="'.$imgSmall[0].'" data-large="'.$imgFull[0].'">'.
                        '</div>';

            if($imageNum==count($images)):
                $gallery .="</div></div>";
            endif;

            /*$imageNum++;*/

        elseif($gallerytype=="verticalnavleft" || $gallerytype=="verticalnavright"):
            if($imageNum==1):
                $gallery.=
            '<div class="vertical-slider-container">'.
                '<div class="vertical-slider '.(($gallerytype=="verticalnavleft")?'navleft">':'navright">');
                $counterlinks.=
                '<div class="slide-count-links '.(($gallerytype=="verticalnavleft")?'navleft">':'navright">');
            endif;
            $gallery .=
                '<div class="slide-item o-fit">'.
                    '<a href="'.$imgFull[0].'" data-fancybox="gallery" data-width="'.$imgFull[1].'" data-height="'.$imgFull[2].'">'.
                        '<img src="'.$imgVerticalCustom[0].'">'.
                    '</a>'.
                '</div>';
            $counterlinks.=
                '<span class="slidenumber" data-slide-index="'.($imageNum-1).'">'.
                    $imageNum.
                '</span>';
            if($imageNum==$imagesCount):
                $counterlinks.='</div>';
                $gallery.='</div>';//vertical-slider
                $gallery=$gallery . $counterlinks;
                $gallery.='</div>'; //vertical-slider-container
            endif;
        elseif($gallerytype=="horizontalslider"):
            if($imageNum==1):
                $gallery.=
            '<div class="horizontal-slider-container">'.
                '<div class="horizontal-slider">';
            endif;
            $gallery .=
                '<div class="slide-item o-fit">'.
                    '<a href="'.$imgFull[0].'" data-fancybox="gallery" data-width="'.$imgFull[1].'" data-height="'.$imgFull[2].'">'.
                        '<img src="'.$imgLarge[0].'">'.
                    '</a>'.
                '</div>';
            if($imageNum==$imagesCount):
                $gallery.= '</div>';//horizontal-slider
                $gallery.= '<div class="images-count-big">'.
                            $imagesCount.
                            '</div>';
                $gallery.='</div>';//horizontal-slider-container
            endif;
        elseif($gallerytype=="full-left-gallery" || $gallerytype=="full-right-gallery"):
            if($imagesCount==2):
                if($imageNum==1):
                    $gallery.=
                '<div class="full-side-gallery o-fit '.(($gallerytype=="full-left-gallery")?'full-left">':'full-right">');
                endif;
                if($imageNum==1 || $imageNum==2):
                    $gallery.=
                    '<div class="side-image-wrapper">'.
                        '<a href="'.$imgFull[0].'" data-fancybox="gallery" data-width="'.$imgFull[1].'" data-height="'.$imgFull[2].'">'.
                            '<img src="'.$imgFull[0].'">'.
                        '</a>'.
                    '</div>';
                endif;
                if($imageNum==2):
                    $gallery.=
                    '</div>';  
                endif;              
            elseif($imagesCount==1 && $text && $gallerytype=="full-left-gallery"):
                    $gallery.=
                '<div class="full-side-gallery o-fit full-left">'.
                    '<div class="side-image-wrapper">'.
                        '<a href="'.$imgFull[0].'" data-fancybox="gallery" data-width="'.$imgFull[1].'" data-height="'.$imgFull[2].'">'.
                            '<img src="'.$imgLarge[0].'">'.
                        '</a>'.
                    '</div>'.
                    '<div class="side-image-wrapper side-text-block">'.
                        ($title?
                        '<h4 class="text-center quotes-close bordered">'.$title.'</h4>':'').
                        '<p class="text-center">'.$text.'</p>'.
                    '</div>'.
                '</div>';
            elseif($imagesCount==1 && $text && $gallerytype=="full-right-gallery"):
                    $gallery.=
                '<div class="full-side-gallery o-fit full-right">'.
                    '<div class="side-image-wrapper side-text-block">'.
                        ($title?
                        '<h4 class="text-center quotes-close bordered">'.$title.'</h4>':'').
                        '<p class="text-center">'.$text.'</p>'.
                    '</div>'.
                    '<div class="side-image-wrapper">'.
                        '<a href="'.$imgFull[0].'" data-fancybox="gallery" data-width="'.$imgFull[1].'" data-height="'.$imgFull[2].'">'.
                            '<img src="'.$imgLarge[0].'">'.
                        '</a>'.
                    '</div>'.
                '</div>';
            endif;
        elseif($gallerytype=="triangle-gallery"):
            if($imagesCount==3):
                if($imageNum==1):
                    $gallery.= 
                    '<div class="triangle o-fit">'.
                        '<div class="top-image">'.
                            '<a href="'.$imgFull[0].'" data-fancybox="gallery" data-width="'.$imgFull[1].'" data-height="'.$imgFull[2].'">'.
                                '<img src="'.$imgFull[0].'">'.
                            '</a>'.
                        '</div>';
                endif;
                if($imageNum==2):
                    $gallery.=
                        '<div class="bottom-images">'.
                            '<div class="bottom-left">'.
                                '<a href="'.$imgFull[0].'" data-fancybox="gallery" data-width="'.$imgFull[1].'" data-height="'.$imgFull[2].'">'.
                                    '<img src="'.$imgFull[0].'">'.
                                '</a>'.
                            '</div>';
                endif;
                if($imageNum==3):
                    $gallery.=
                           '<div class="bottom-right">'.
                                '<a href="'.$imgFull[0].'" data-fancybox="gallery" data-width="'.$imgFull[1].'" data-height="'.$imgFull[2].'">'.
                                    '<img src="'.$imgLarge[0].'">'.
                                '</a>'.
                            '</div>'.
                        '</div>'.
                    '</div>'; 
                endif;
            endif;
        endif;
        $imageNum++;
    }

    return $gallery;
}
/*SHORTCODE FOR ADVICES*/
function bud3_bigreads_advices(){
    $output='';
    if(get_field('advices')):
        $num=1;
        $output.=
        '<div class="advices-container">'.
            '<h4 class="advice-title frank text-uppercase title-bar">'.
                __("Par saveta...").
            '</h4>';
        $advices=get_field('advices');
        foreach($advices as $advice){
            $output.=
            '<div class="advice-wrapper row">'.
                '<div class="advice-number">'.$num.'</div>'.
                '<div class="advice-text col9">'.$advice['text'].'</div>'.
                '<div class="advice-image col3">'.
                    '<img src='.$advice['image']['sizes']['medium'].' alt='.$advice['image']['alt'].'/>'.
                '</div>'.
            '</div>';
            $num++;
        }
        $output.='</div>';
        return $output;
    endif;
}
add_shortcode( 'advices', 'bud3_bigreads_advices' );

/*ADD INLINE CSS*/
function bud3_inline_css(){
    $custom_css='';
    if(is_page_template('single-post-bigreads.php')):
        if(get_field('transparent_background')['image']):
            $transparent_background=get_field('transparent_background');
            $width=$transparent_background['width'].'%';
            $top=$transparent_background['top'].'%';
            $left=$transparent_background['left'].'%';
            $custom_css.="
                .transparent-background{
                    width: $width;
                    top: $top;
                    left: $left;
                }
            ";
        endif;
        if(get_field('background_text')['text']):
            $background_text=get_field('background_text');
            $top=$background_text['top_position'].'%';
            $custom_css.="
                .background-text{
                    top: $top;
                }
            ";
        endif;
    elseif(is_front_page() && wp_is_mobile()):
        $custom_css.="
                .izdvajamo{
                    margin-bottom: 50px;
                }
                .home .news-section{
                    margin-top: 0;
                }
            ";
    endif;
    wp_add_inline_style( 'bud3', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'bud3_inline_css' );


/*HOME PAGE*/
function printArchiveHomeLayout($numberOfPosts){
    global $i;

    if($i==1){
        get_template_part('template-parts/highlighted-box');
        $i++;
        return;
    }
    if($i==2){
        if($numberOfPosts>2){
            echo '<div class="no-padding col6 four-posts-wrapper flex flex-wrap">';
            get_template_part('template-parts/link-shadow-box');
            $i++;
            return;
        }        
    }
    if($i>2 && $i<=5){
        get_template_part('template-parts/link-shadow-box');
        if(($i==$numberOfPosts) || $i==5){
            echo '</div>';
        }
        if($i==5 && $numberOfPosts>9){
            echo '<div class="no-padding four-posts-wrapper col6 flex flex-wrap">';
        }
        $i++;
        return;
    }
    if($i==10){
        echo '</div>';
        get_template_part('template-parts/highlighted-box');
        $i++;
        return;
    }
    get_template_part('template-parts/link-shadow-box');
    $i++;
}

/*------------------------------------*\
 LOAD POSTS ON CLICK WITH AJAX
\*------------------------------------*/ 

function load_posts_by_ajax_callback() {
    check_ajax_referer('load_more_posts', 'security');
    $paged = $_POST['page'];
    $cat_id = $_POST['cat'];
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'orderby'   => 'post_date',
        'order'   => 'DESC',
        'posts_per_page' => '22',
        'paged' => $paged,
        'cat' => $cat_id,
    );
    $my_posts = new WP_Query( $args );
    if ( $my_posts->have_posts() ) :
        $counter = 0;
        ?>
         <div class="row">
        <?php while ( $my_posts->have_posts() ) : $my_posts->the_post(); 
            $counter++;

            ?>
         
                <div class="col3 latest-post-item">
                    <!-- article -->
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="img-container noto text-uppercase">
                            <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
                                <div class="img-wrap o-fit">
                                    <?php the_post_thumbnail(array( 400, 400), array( 'class' => 'img-fit' ));  ?>
                                </div>
                            <?php endif; ?>
                            <div class="image-caption">
                                <p class="cat-title-loop"><span>KATEGORIJA</span></p>
                                <a href="<?php the_permalink(); ?>"> +
                                </a>
                            </div>
                        </div>
                        <h3 class="text-uppercase title-bar" title="<?php the_title(); ?>"><?php the_title(); ?></h3>

                    </article>
                    <!-- /article -->
                </div><!-- /col3 -->


                    <?php if ($counter === 3) { ?>
                        <div class="col3 latest-post-item">
                            <h2>REKLAMA</h2>
                        </div><!-- /col3 -->
                    <?php } ?>


                    <?php if ($counter === 7) { ?>
                        <div class="col12 latest-post-item">
                            <h2>VELIKA REKLAMA</h2>
                        </div><!-- /col3 -->
                    <?php } ?>

                    <?php if ($counter === 16) { ?>
                        <div class="col3">
                            <h2>MALA REKLAMA</h2>
                        </div><!-- /col3 -->
                    <?php } ?>
           
        <?php endwhile ?>
         </div>
        <?php
    endif;
 
    wp_die();
}
add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');




// Custom post tags
add_action( 'init', 'create_topics_nonhierarchical_taxonomy', 0 );
 
function create_topics_nonhierarchical_taxonomy() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'Brendovi automobila', 'taxonomy general name' ),
    'singular_name' => _x( 'Brend automobila', 'taxonomy singular name' ),
    'search_items' =>  __( 'Pretraži brendove automobila' ),
    'popular_items' => __( 'Popularni brendovi automobila' ),
    'all_items' => __( 'Svi brendovi automobila' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edituj brend automobila' ), 
    'update_item' => __( 'Ažuriraj brend automobila' ),
    'add_new_item' => __( 'Dodaj novi brend automobila' ),
    'new_item_name' => __( 'Novi brend automobila' ),
    'separate_items_with_commas' => __( 'Razdvoji zarezima' ),
    'add_or_remove_items' => __( 'Dodaj ili ukloni brend automobila' ),
    'choose_from_most_used' => __( 'Izaberi među najkorišćenijima' ),
    'menu_name' => __( 'Brend automobila' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('brend-automobila','post',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'brend-automobila' ),
  ));
}


//custom image size
add_image_size( 'vertical-slider-size', 950, 500 );




function be_portfolio_archive_body_class( $classes ) {
  if(strpos($_SERVER['REQUEST_URI'], 'replytocom') !== false){
	 $classes[] = 'comment-replies';
  }
 
  return $classes;
}
add_filter( 'body_class', 'be_portfolio_archive_body_class' );

?>
