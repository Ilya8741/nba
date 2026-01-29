<?php
$post_type   = get_sub_field('post_type') ?: 'post';
$orderby     = get_sub_field('orderby') ?: 'date';

$raw_exclude = get_sub_field('exclude_posts') ?: [];
$exclude_ids = [];
foreach ((array)$raw_exclude as $item) {
  $exclude_ids[] = is_object($item) ? (int)$item->ID : (int)$item;
}
$exclude_ids = array_filter(array_unique($exclude_ids));

$manual_raw = get_sub_field('manual_posts') ?: [];
$manual_ids = [];
foreach ((array)$manual_raw as $p) {
  $manual_ids[] = is_object($p) ? (int)$p->ID : (int)$p;
}
$manual_ids = array_values(array_filter(array_unique($manual_ids)));

if (!empty($manual_ids)) {
  $args = [
    'post_type'           => $post_type,
    'post_status'         => 'publish',
    'posts_per_page'      => count($manual_ids),
    'post__in'            => $manual_ids,
    'orderby'             => 'post__in',
    'ignore_sticky_posts' => true,
  ];
} else {
  $args = [
    'post_type'           => $post_type,
    'post_status'         => 'publish',
    'posts_per_page'      => -1,
    'orderby'             => $orderby,
    'order'               => 'DESC',
    'ignore_sticky_posts' => true,
  ];
  if (!empty($exclude_ids)) {
    $args['post__not_in'] = $exclude_ids;
  }
}

$q = new WP_Query($args);

function pl_get_img_alt($attachment_id)
{
  $alt = trim(get_post_meta($attachment_id, '_wp_attachment_image_alt', true));
  if ($alt !== '') return $alt;
  $img_post = get_post($attachment_id);
  return $img_post ? $img_post->post_title : '';
}
?>


<section class="section-posts-grid">
  <?php if ($q->have_posts()) : ?>
    <div class=" section-posts-grid-items ">
      <?php while ($q->have_posts()) : $q->the_post();
        $pid   = get_the_ID();
        $url   = get_permalink($pid);
        $title = get_the_title($pid);
        $subtitle = function_exists('get_field') ? get_field('subtitle', $pid) : '';
        $excerpt = get_the_excerpt($pid);
        $img_html = '';
        if (has_post_thumbnail($pid)) {
          $thumb_id = get_post_thumbnail_id($pid);
          $src      = get_the_post_thumbnail_url($pid, 'large');
          $alt      = pl_get_img_alt($thumb_id);
          $img_html = '<img src="' . esc_url($src) . '" alt="' . esc_attr($alt) . '" loading="lazy" decoding="async">';
        }
      ?>
        <div class="grid-section-item blog-grid-item" data-aos="fade-up">
          <a href="<?php echo esc_url($url); ?>" class="grid-section-link">
            <div class="grid-section-image-wrapper">
              <?php echo $img_html ? $img_html : '<div class="grid-section-image-placeholder" aria-hidden="true"></div>'; ?>
              <span class="grid-section-icon blog-grid-section-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true" focusable="false">
                  <path d="M0.771484 1H17.2286V17" stroke="white" stroke-width="1.10345" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M0.771484 17L17.2286 1" stroke="white" stroke-width="1.10345" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </span>
            </div>
            <div class="grid-section-text blog-grid-section-text">
              <span class="blog-grid-section-title__main"><?php echo esc_html($title); ?></span>
              <?php if (!empty($subtitle)) : ?>
                <span class="blog-grid-section-title__sub"><?php echo esc_html($subtitle); ?></span>
              <?php endif; ?>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M12 19L12 5" stroke="#221F1C" stroke-linejoin="round" />
                <path d="M5 12L19 12" stroke="#221F1C" stroke-linejoin="round" />
              </svg>
            </div>
          </a>
        </div>
      <?php endwhile;
      wp_reset_postdata(); ?>
    </div>
  <?php else : ?>
    <p class="grid-section-empty">No posts found.</p>
  <?php endif; ?>
</section>