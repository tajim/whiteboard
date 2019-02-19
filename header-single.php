<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package setopati
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">	
    <meta name="author" content="newsetopati">	    
   
	<?php 
	$featurted_image = wp_get_attachment_image_url(get_post_thumbnail_id( get_the_ID() ), 'setopati-single-content'); 
	if ($featurted_image) {
	$fb_image = $featurted_image;
	}
	else {
	$fb_image = 'https://setopati.com/wp-content/themes/setopati/img/defaultimg.png';	
	}
	?>
	<!-- Social Tags -->

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?php the_title( '', '' ); ?>">
    <meta itemprop="description" content="<?php echo km_get_the_excerpt(get_the_ID()); ?>">
    <meta itemprop="image" content="<?php echo $fb_image; ?>">
    <meta name="description" content="<?php the_title(); ?>">    

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@setopati">
    <meta name="twitter:title" content="<?php the_title( '', '' ); ?>">
    <meta name="twitter:description" content="<?php echo km_get_the_excerpt(get_the_ID()); ?>">
    <meta name="twitter:creator" content="@setopati">
    <meta name="twitter:image:src" content="<?php echo $fb_image; ?>">

    <!-- Open Graph data -->
    <meta property="og:title" content="<?php the_title( '', '' ); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php the_permalink(); ?>" />
    <meta property="og:image" content="<?php echo $fb_image; ?>" />
    <meta property="og:description" content="<?php echo km_get_the_excerpt(get_the_ID()); ?>" />
    <meta property="og:site_name" content="Setopati" />
    <!-- Social Tags Ends -->   
   
<script type="text/javascript">
  window._taboola = window._taboola || [];
  _taboola.push({article:'auto'});
  !function (e, f, u, i) {
    if (!document.getElementById(i)){
      e.async = 1;
      e.src = u;
      e.id = i;
      f.parentNode.insertBefore(e, f);
    }
  }(document.createElement('script'),
  document.getElementsByTagName('script')[0],
  '//cdn.taboola.com/libtrc/setopati/loader.js',
  'tb_loader_script');
  if(window.performance && typeof window.performance.mark == 'function')
    {window.performance.mark('tbl_ic');}
</script>    

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=1905630016387216";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> 
    	<?php wp_head(); ?>     
           
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-101649819-1', 'auto');
  ga('send', 'pageview');

</script>      

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '157935928126083', {
em: 'insert_email_variable'
});
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=157935928126083&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->
     
           
    </head>
         
  <body <?php body_class(); ?>> 
<?php
$mashhead_one_img = get_field('mast_head_one_image', 'option');
$mashhead_one_url = get_field('mast_head_one_url', 'option');

$mashhead_two_img = get_field('mast_head_two_image', 'option');
$mashhead_two_url = get_field('mast_head_two_url', 'option');

$mainmenu_one_img = get_field('main_menu_one_image', 'option');
$mainmenu_one_url = get_field('main_menu_one_url', 'option');

$masthead_scrolling = get_field('mast_head_three_scrolling_ads', 'option');

$topsticky_img = get_field('top_sticky_image', 'option');
$topsticky_url = get_field('top_sticky_url', 'option');

if ($topsticky_img) {
$tackclass = "tacky-sticky";
}
else {
$tackclass = "tackynot";
}
?>

<?php if ($topsticky_img) { ?>
<div class="tacky hidden-lg hidden-md hidden-sm hidden-xs">
   <a target="_blank" href="<?php echo esc_url($topsticky_url); ?>"><img class="img-responsive" src="<?php echo esc_url($topsticky_img); ?>" style="margin: 0;"></a>
</div>
<?php } ?>


<header id="masthead" class="site-header" role="banner">
    <div class="container nopadding">

      <div class="banner-add">
        <?php if ($mashhead_one_img) { ?><a target="_blank" href="<?php echo esc_url($mashhead_one_url); ?>"><img class="aligncenter img-responsive" src="<?php echo esc_url($mashhead_one_img); ?>" alt=""></a><?php } ?>
      </div>

      <div class="banner-add">

          <div class="col-md-9 col-sm-8 col-xs-12 no-gutter-mobile">
                <?php if ($mashhead_two_img) { ?><a target="_blank" href="<?php echo esc_url($mashhead_two_url); ?>"><img style="margin-top:17px;" class="alignright img-responsive" src="<?php echo esc_url($mashhead_two_img); ?>" alt=""></a><?php } ?>
          <div id="logo">
                <div class="site-branding">
                  <a id="noNewTab" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-home-final.jpeg" alt="Setopati"></a>
                </div><!-- .site-branding -->
            <div class="clearfix"></div>
            <h3 class="category_title">
			  <?php
				$category = get_the_category();
				if ($category) {
					echo esc_html($category[0]->cat_name);
				}
			  ?>
            </h3></div>
          </div>

			<div class="col-md-3 col-sm-4 col-xs-12" style="overflow:hidden;">
			<?php if ($masthead_scrolling) {
			// check if the repeater field has rows of data
			if( have_rows('mast_head_three_scrolling_ads', 'option') ): ?>
			<div id="carousel-add">
			<?php
			while ( have_rows('mast_head_three_scrolling_ads', 'option') ) : the_row();
            $adimage = get_sub_field ('ad_image', 'option');
            $adurl = get_sub_field ('ad_url', 'option');
            ?>
                            <div>
				              <center><a target="_blank" href="<?php echo esc_url($adurl); ?>"><img src="<?php echo esc_url($adimage); ?>" class="img-responsive aligncenter" alt=""></a></center>
                            </div>
            <?php
			endwhile;
			else :
			?>
            </div>
            <?php
            endif;
			} ?>
          </div>

        </div>
      </div>
      <div class="clearfix"></div>
		<div class="daily-menu text-center">
        <div class="days"><?php do_action('setopati_header_info'); ?></div>
        <div id="servertime"></div>
        <div class="news-paper"><i class="fa fa-newspaper-o" aria-hidden="true"></i> <a href="http://setopati.com/from-paper"><?php echo esc_html('आजको छापा', 'setopati'); ?></a> </div>
		<div class="news-paper">
        <img src="https://setopati.com/wp-content/uploads/2017/07/enlang.png" style="width: 15px;border-radius: 102px;">
		<a target="_blank" href="http://setopati.net/">English</a>
        </div>        
        <div class="social-icons">
            <a target="_blank" href="http://facebook.com/setopati"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a target="_blank" href="https://twitter.com/setopati"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a target="_blank" href="https://www.youtube.com/user/setopati"><i class="fa fa-youtube" aria-hidden="true"></i></a>
        </div>
      </div>

    </div>
     <div class="clearfix"></div>
    <div id="header" class="<?php echo $tackclass ?>">
      <div class="container nopadding">
        <nav id="site-navigation" class="main-menu">
				<?php
                $defaults = array(
                    'theme_location'  => 'primary',
                    'container'       => 'ul',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'items_wrap'      => '<ul id="top-menu" class="%2$s">%3$s</ul>',
                );
                wp_nav_menu( $defaults );
                ?>
        </nav>
      </div>
  </div>
  <div id="sub-menu">
    <div class="container nopadding">

		<?php
		$post_cat_id = $category[0]->cat_ID;
		$taxonomy_name = 'category';

			if(category_has_parent($post_cat_id)) {
				$child = get_category($post_cat_id);
				$parent = $child->parent;
				$parent_name = get_category($parent);
				$menu_cat_id = $parent_name->term_id;
			}
			else {
				$menu_cat_id = $post_cat_id;
			}

		$term_children = get_term_children( $menu_cat_id, $taxonomy_name );
		if ($term_children) {
		?>

         <ul id="menu-down">
				<?php foreach( $term_children as $key => $value){ ?>
		            <li><a href="<?php echo esc_url(get_category_link( $value )); ?>"><?php echo esc_html(get_cat_name( $value )); ?></a></li>
				<?php } ?>
         </ul>

       <?php } ?>

    </div>
  </div>

</header>

<div class="clearfix"></div>
<div class="container nopadding">
<center>
<?php if ($mainmenu_one_img) { ?>
<a style="margin:0px 0px 27px 0px; display:block;" class="withpadding" target="_blank" href="<?php echo esc_url($mainmenu_one_url); ?>"><img class="aligncenter img-responsive" src="<?php echo esc_url($mainmenu_one_img); ?>" alt=""></a>
<?php } ?>
        </center>
</div>
