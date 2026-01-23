<div class="about-text-grid <?php if (get_sub_field('padding_large')): ?> about-text-grid-v1<?php endif; ?>">
  <div class="about-text-grid-wrapper">
    
    <div class="about-text-grid-left"  data-aos="fade-right" data-aos-duration="600">
      <h2>
        <?php the_sub_field('title'); ?>
      </h2>
    </div>

    <div class="about-text-grid-right"  data-aos="fade-left" data-aos-duration="600">
      <?php if ( have_rows('text_repeater') ) : ?>
        <?php while ( have_rows('text_repeater') ) : the_row(); ?>
          <div class="about-text-grid-item">
            <?php if ( get_sub_field('title') ) : ?>
              <h3 class="about-text-grid-item__title">
                <?php the_sub_field('title'); ?>
              </h3>
            <?php endif; ?>

            <?php if ( get_sub_field('text') ) : ?>
              <div class="about-text-grid-item__text">
                <?php the_sub_field('text'); ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</div>
