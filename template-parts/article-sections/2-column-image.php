<?php
$version = strtolower( trim( (string) get_sub_field('version') ) );
$allowed = ['left','right', 'center-without-icon'];
if (!in_array($version, $allowed, true)) { $version = 'center'; }

$classes = [
  'two-column-image',
  'two-column-' . $version,
];

if ( get_sub_field('padding_top') )    { $classes[] = 'padding-top-none'; }
if ( get_sub_field('padding_bottom') ) { $classes[] = 'padding-bottom-none'; }
if ( get_sub_field('padding_bottom_mobile') ) { $classes[] = 'padding-bottom-mobile'; }

?>
<div class="<?php echo esc_attr( implode(' ', $classes) ); ?> two-column-image-main">
  <div class="two-column-image-wrapper">
    <?php $image1 = get_sub_field('image1'); ?>
    <?php if ($image1): ?>
      <div class="two-column-media-wrapper two-column-media-wrapper-first" data-aos="fade-right" data-aos-duration="600" data-aos-delay="100" data-aos-easing="ease-out">
      <a class="js-lightbox" href="<?php echo esc_url($image1['url']); ?>">
        <img src="<?php echo esc_url($image1['url']); ?>" class="two-column-media-image" alt="<?php echo esc_attr($image1['alt']); ?>">
    </a>
      </div>
    <?php endif; ?>
            <svg class="scroll-fade-svg"
                    xmlns="http://www.w3.org/2000/svg"
                    width="69"
                    height="75"
                    viewBox="0 0 69 75"
                    fill="none"
                    style="opacity:0.25">
                    <g clip-path="url(#clip0_286_6944)">
                        <path d="M41.25 35.8613V72.5566L37.6006 74.999V37.9229L34.209 35.8672L30.8184 37.9229V53.9492H27.1709V35.8613L34.209 31.5918L41.25 35.8613ZM47.9443 31.6553V68.0762L44.2969 70.5195V33.7383L34.1973 27.7197L24.2529 33.4941V53.9492H20.6025V31.3867L34.2217 23.4805L47.9443 31.6553ZM54.7686 27.6523V63.5078L51.1221 65.9512V29.7383L34.2031 19.7188L17.2969 29.6191V53.9492H13.6494V27.5176L34.2148 15.4766L54.7686 27.6523ZM61.7217 23.8965V58.8535L58.0752 61.2969V26.0098L34.2061 12.2217L10.3447 25.8877V53.9492H6.69727V23.7646L34.2129 8.00391L61.7217 23.8965ZM68.418 20.0332V54.374L64.7715 56.8145V22.1318L34.2578 4.21777L3.65039 21.5693V53.9492H0V19.4375L34.2881 0L68.418 20.0332Z"
                            fill="#221F1C" />
                    </g>
                    <defs>
                        <linearGradient id="paint0_linear_286_6944" x1="34.209" y1="-32.9996" x2="34.209" y2="107.999">
                        <stop stop-color="#D9D9D9" />
                        <stop offset="1" stop-color="#737373" />
                        </linearGradient>
                        <clipPath id="clip0_286_6944">
                        <rect width="69" height="75" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
     <?php $image2 = get_sub_field('image2'); ?>
    <?php if ($image2): ?>
      <div class="two-column-media-wrapper two-column-media-wrapper-second" data-aos="fade-left" data-aos-duration="600" data-aos-delay="100" data-aos-easing="ease-out">
           <a class="js-lightbox" href="<?php echo esc_url($image2['url']); ?>">
        <img src="<?php echo esc_url($image2['url']); ?>" class="two-column-media-image" alt="<?php echo esc_attr($image2['alt']); ?>">
        </a>
      </div>
    <?php endif; ?>
  </div>
</div>
