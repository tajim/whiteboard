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
    <meta name="google-site-verification" content="32jswBpdkE5-s55rGqHAUgeUsoUrG4Xjisj-ToIW1GY" />
	<?php wp_head(); ?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T8R2D53');</script>
<!-- End Google Tag Manager -->     
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-101649819-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T8R2D53"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php
$mashhead_one_img = get_field('mast_head_one_image', 'option');
$mashhead_one_url = get_field('mast_head_one_url', 'option');

$mashhead_two_img = get_field('mast_head_two_image', 'option');
$mashhead_two_url = get_field('mast_head_two_url', 'option');

$mainmenu_one_img = get_field('main_menu_one_image', 'option');
$mainmenu_one_url = get_field('main_menu_one_url', 'option');

$masthead_scrolling = get_field('mast_head_three_scrolling_ads', 'option');

$special_ads_img = get_field('special_ad_one_image', 'option');
$special_ads_url = get_field('special_ad_one_image', 'option');

$bisehs_ads_img = get_field('bishesh_ad_image', 'option');
$bisehs_ads_url = get_field('bishesh_ad_url', 'option');

?>

<header id="masthead" class="site-header" role="banner">
      <div class="container nopadding">

        <div class="banner-add">
          <?php if ($mashhead_one_img) { ?><a target="_blank" href="<?php echo esc_url($mashhead_one_url); ?>"><img class="aligncenter img-responsive ads_banner" src="<?php echo esc_url($mashhead_one_img); ?>" alt=""></a><?php } ?>
        </div>

        <div class="banner-add">
          <div class="col-md-9 col-sm-8 col-xs-12 no-gutter-mobile advertise-1">
                <?php if ($mashhead_two_img) { ?><a target="_blank" href="<?php echo esc_url($mashhead_two_url); ?>"><img style="margin-top:17px;" class="alignright img-responsive ads_banner" src="<?php echo esc_url($mashhead_two_img); ?>" alt=""></a><?php } ?>
            <div id="logo">
                <div class="site-branding">
                      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-home-final.jpeg" alt="Setopati"></a>
                </div><!-- .site-branding -->
            </div>
          </div>
          <div class="col-md-3 col-sm-4 col-xs-12 ads_banner" style="overflow:hidden;">
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
				              <center><a target="_blank" href="<?php echo esc_url($adurl); ?>"><img src="<?php echo esc_url($adimage); ?>" class="img-responsive aligncenter ads_banner" alt=""></a></center>
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
        <div class="social-icons">
            <a target="_blank" href="http://facebook.com/setopati"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a target="_blank" href="https://twitter.com/setopati"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a target="_blank" href="https://www.youtube.com/user/setopati"><i class="fa fa-youtube" aria-hidden="true"></i></a>
        </div>
      </div>
  </div>
      <div class="clearfix"></div>
    <div id="header">
        <div class="container mob-nav nopadding">
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
  </header>
      <div class="clearfix"></div>
      <div class="container nopadding">
		<center>
<?php if ($mainmenu_one_img) { ?><a style="margin:0px 0px 27px 0px; display:block;" class="withpadding" target="_blank" href="<?php echo esc_url($mainmenu_one_url); ?>"><img class="aligncenter img-responsive ads_banner" src="<?php echo esc_url($mainmenu_one_img); ?>" alt=""></a><?php } ?>
        </center>
        </div>
