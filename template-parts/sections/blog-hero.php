<?php
$selected = get_sub_field('blog_post');
if (!$selected) {
  $selected = get_field('blog_post');
}

if (is_array($selected)) {
  $selected = reset($selected);
}

$post_obj = null;
if (is_numeric($selected)) {
  $post_obj = get_post((int)$selected);
} elseif ($selected instanceof WP_Post) {
  $post_obj = $selected;
}

$url = $title = $img_html = '';

if ($post_obj && $post_obj instanceof WP_Post) {
  $url   = get_permalink($post_obj);
  $title = get_the_title($post_obj);
  $subtitle = function_exists('get_field')
    ? get_field('subtitle', $post_obj->ID)
    : '';

  $thumb_id = get_post_thumbnail_id($post_obj);
  if ($thumb_id) {
    $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
    if ($alt === '') {
      $alt = $title;
    }
    $img_html = wp_get_attachment_image(
      $thumb_id,
      'large',
      false,
      ['class' => 'grid-section-image', 'alt' => esc_attr($alt), 'loading' => 'lazy', 'decoding' => 'async']
    );
  }
}
?>

<div class="blog-hero">
  <div class="blog-hero-wrapper">
    <h1 class="blog-hero-title" data-aos="fade-left">
      <?php
      $item1_text = get_sub_field('title');
      if ($item1_text) {
        echo apply_filters('the_content', $item1_text);
      }
      ?>
    </h1>
    <div class="blog-hero-item" data-aos="fade-right">
      <a href="<?php echo esc_url($url); ?>" class="grid-section-link">
        <div class="grid-section-image-wrapper blog-section-image-wrapper">
          <?php echo $img_html ? $img_html : '<div class="grid-section-image-placeholder" aria-hidden="true"></div>'; ?>
        </div>
        <div class="grid-section-text blog-grid-section-text">
          <span class="blog-grid-title">
            <?php echo esc_html($title); ?>
          </span>

          <?php if (!empty($subtitle)) : ?>
            <span class="blog-grid-subtitle">
              <?php echo esc_html($subtitle); ?>
            </span>
          <?php endif; ?>
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M12 19L12 5" stroke="#221F1C" stroke-linejoin="round" />
            <path d="M5 12L19 12" stroke="#221F1C" stroke-linejoin="round" />
          </svg>
        </div>
      </a>
    </div>
  </div>
</div>