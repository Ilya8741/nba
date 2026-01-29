<?php $image3 = get_sub_field('item3_image'); ?>

<div class="grid-section <?php if (!$image3): ?> grid-section-duo <?php endif; ?>">
    <div class="grid-section-wrapper">
        <div class="grid-section-wrapper-top <?php if (!$image3): ?> grid-section-wrapper-top-duo <?php endif; ?>">
            <!-- Item 1 -->
            <div class="grid-section-item grid-section-item-1" data-aos="fade-right" data-aos-duration="1000"
                data-aos-delay="100"
                data-aos-easing="ease-out">
                <a href="<?php the_sub_field('item1_link'); ?>" class="grid-section-link">
                    <div class="grid-section-image-wrapper">
                        <?php $image1 = get_sub_field('item1_image'); ?>
                        <?php if ($image1): ?>
                            <img src="<?php echo esc_url($image1['url']); ?>" alt="<?php echo esc_attr($image1['alt']); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="grid-section-text">
                        <?php if (!$image3): ?> 
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 19L12 5" stroke="#221F1C" stroke-linejoin="round" />
                            <path d="M5 12L19 12" stroke="#221F1C" stroke-linejoin="round" />
                        </svg>
                        <?php endif; ?>
                        <?php
                        $item1_text = get_sub_field('item1_text');
                        if ($item1_text) {
                            echo apply_filters('the_content', $item1_text);
                        }
                        ?>
                       <?php if ($image3): ?> 
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 19L12 5" stroke="#221F1C" stroke-linejoin="round" />
                            <path d="M5 12L19 12" stroke="#221F1C" stroke-linejoin="round" />
                        </svg>
                        <?php endif; ?>
                    </div>
                </a>
            </div>
            <?php if ($image3): ?>
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
             <?php endif; ?>

            <!-- Item 2 -->
             <?php if (!$image3): ?><div class="grid-section-item-wrap"><?php endif; ?>
                 <?php if (!$image3): ?><div></div><?php endif; ?>
                <div class="grid-section-item grid-section-item-2" data-aos="fade-left" data-aos-duration="1000"
                    data-aos-delay="100"
                    data-aos-easing="ease-out">
                    <a href="<?php the_sub_field('item2_link'); ?>" class="grid-section-link">
                        <div class="grid-section-image-wrapper">
                            <?php $image2 = get_sub_field('item2_image'); ?>
                            <?php if ($image2): ?>
                                <img src="<?php echo esc_url($image2['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="grid-section-text <?php if (!$image3): ?>grid-section-text-right<?php endif; ?>">
                            <?php
                            $item2_text = get_sub_field('item2_text');
                            if ($item2_text) {
                                echo apply_filters('the_content', $item2_text);
                            }
                            ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M12 19L12 5" stroke="#221F1C" stroke-linejoin="round" />
                                <path d="M5 12L19 12" stroke="#221F1C" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </a>
                </div>
                <?php if (!$image3): ?>
                     <?php
                        $link = get_sub_field('link');
                        if ($link && is_array($link)) :
                        $url    = $link['url'] ?? '';
                        $title  = $link['title'] ?? '';
                        $target = $link['target'] ?? '_self';

                        if ($url) :
                        ?>
                        <div data-aos="fade-left" data-aos-duration="1000"
                                data-aos-delay="100"
                                data-aos-easing="ease-out">
                            <a href="<?php echo esc_url($url); ?>"
                                class="main-button grid-section-button"
                                target="<?php echo esc_attr($target); ?>">
                                <span><?php echo esc_html($title); ?></span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M12 19L12 5" stroke="#221F1C" stroke-linejoin="round"/>
                                    <path d="M5 12L19 12" stroke="#221F1C" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                       
                        <?php
                        endif;
                        endif;
                    ?>
                <?php endif; ?>
             <?php if (!$image3): ?></div><?php endif; ?>
            
        </div>

        <!-- Item 3 -->
           
                    <?php if ($image3): ?>
        <div class="grid-section-item grid-section-item-3" data-aos="fade-up" data-aos-duration="1000"
            data-aos-delay="100"
            data-aos-easing="ease-out">
            <a href="<?php the_sub_field('item3_link'); ?>" class="grid-section-link">
                <div class="grid-section-image-wrapper">
                  
                        <img src="<?php echo esc_url($image3['url']); ?>" alt="<?php echo esc_attr($image3['alt']); ?>">
                    
                </div>
                <div class="grid-section-text">
                    <?php
                    $item3_text = get_sub_field('item3_text'); 
                    if ($item3_text) {
                        echo apply_filters('the_content', $item3_text);
                    }
                    ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M12 19L12 5" stroke="#221F1C" stroke-linejoin="round" />
                        <path d="M5 12L19 12" stroke="#221F1C" stroke-linejoin="round" />
                    </svg>
                </div>

            </a>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php if ($image3): ?>
<script>
(function () {
  const MIN = 0.25;
  const MAX = 1;

  const svgs = document.querySelectorAll('.scroll-fade-svg');
  if (!svgs.length) return;

  const clamp = (v, min, max) => Math.min(max, Math.max(min, v));

  function update() {
    const vh = window.innerHeight;

    svgs.forEach(svg => {
      const rect = svg.getBoundingClientRect();

      const start = vh * 0.9;
      const end   = vh * 0.1;

      let progress = (start - rect.top) / (start - end);
      progress = clamp(progress, 0, 1);

      const peak = 1 - Math.abs(progress * 2 - 1);

      const opacity = MIN + (MAX - MIN) * peak;
      svg.style.opacity = opacity.toFixed(3);
    });
  }

  let ticking = false;
  window.addEventListener('scroll', () => {
    if (!ticking) {
      requestAnimationFrame(() => {
        update();
        ticking = false;
      });
      ticking = true;
    }
  }, { passive: true });

  window.addEventListener('resize', update);
  update();
})();
</script>
<?php endif; ?>