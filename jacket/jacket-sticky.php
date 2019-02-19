<?php
/**
 * Jacket Ad for Stickt Ads only
 *
 * @package setopati
 */
$sticky_image = get_field('sticky_ad_image', 'option');
$sticky_url = get_field('sticky_ad_url', 'option');
$sticky_image_mobile = get_field('mobile_sticky_ad_image', 'option');

?>


<?php if ($sticky_image_mobile) { ?>
<div class="testing-div stickyad hidden-lg hidden-md">
    <div class="testing-div2">
      <a target="_blank" href="<?php echo esc_url($sticky_url); ?>">
        <img src="<?php echo esc_url($sticky_image_mobile); ?>" alt="" class="img-responsive" style="display: block;">
      </a>
    </div>
</div>
<?php } ?>

<?php 
if ($sticky_image) { ?>
<div class="testing-div stickyad hidden-sm hidden-xs">
    <div class="testing-div2">
      <a target="_blank" href="<?php echo esc_url($sticky_url); ?>">
        <img src="<?php echo esc_url($sticky_image); ?>" alt="" class="img-responsive" style="display: block;">
      </a>
    </div>
</div>
<?php } ?>
