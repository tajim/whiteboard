<!DOCTYPE html>
<html lang="en">
  <head>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-101649819-1', 'auto');
  ga('send', 'pageview');

</script>  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nothing Found! Setopati.com</title>
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css?ver=1.7.3" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/secondstyle.css?ver=1.7.3">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.css?ver=1.7.3">
  </head>
  <body>

    <div id="error-wrapper">
      <div class="container">
        <div class="404-logo">
                <div class="site-branding">
                      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/img/logohome.jpeg?ver=1.7.3" alt="Setopati"></a>
                </div><!-- .site-branding -->
        </div>
        <div class="404-section">
          <div class="col-md-6 text">
            <h2>Meow!</h2>
            <p>Seems like this page doesn't exist.</p>
            <p>Go to <a href="<?php echo esc_url( home_url( '/?homenew=true' ) ); ?>">Home Page</a></p>
          </div>
          <div class="col-md-6 cat-img">
            <img src="<?php echo get_template_directory_uri(); ?>/img/cat.png?ver=1.7.3" alt="">
          </div>
        </div>
      </div>
            <div class="error-footer">
        <div class="container">
          <p>&copy; 2017 Setopati Sanchar Pvt. Ltd.</p>
          <div class="social-icons">
            <ul>
              <li><a href="https://www.facebook.com/setopati"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="https://twitter.com/setopati"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="https://www.youtube.com/user/setopati"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

	<?php wp_footer(); ?>

  </body>
</html>
