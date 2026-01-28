<div class="quote-right <?php if (get_sub_field('none_bottom_spacing')): ?> quote-bottom-spacing-none<?php endif; ?> <?php if (get_sub_field('white_background')): ?> quote-right-white <?php endif; ?> <?php if (get_sub_field('spacing')): ?> quote-right-spacing-none<?php endif; ?>">
    <div class="quote-right-container" data-aos="fade-left" data-aos-duration="600" data-aos-delay="100" data-aos-easing="ease-out">
        <div class="quote-right-content">
            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="14" viewBox="0 0 21 14" fill="none">
                    <path opacity="0.25" d="M0 13.0883V9.34353C0 8.26661 0.247854 7.14685 0.743562 5.98427C1.25429 4.80944 1.94528 3.70192 2.81652 2.66171C3.70279 1.60927 4.69421 0.722029 5.79077 0L9.57618 2.00087C8.68991 3.09003 7.94635 4.22815 7.34549 5.41521C6.75966 6.59004 6.47425 7.88724 6.48927 9.30682V13.0883H0ZM11.4238 13.0883V9.34353C11.4238 8.26661 11.6717 7.14685 12.1674 5.98427C12.6781 4.80944 13.3691 3.70192 14.2403 2.66171C15.1266 1.60927 16.118 0.722029 17.2146 0L21 2.00087C20.1137 3.09003 19.3702 4.22815 18.7693 5.41521C18.1835 6.59004 17.8981 7.88724 17.9131 9.30682V13.0883H11.4238Z" fill="#221F1C" />
                </svg>
            <div class="quote-right-title">
                    <?php
                    $item1_text = get_sub_field('quote_title');
                    if ($item1_text) {
                        echo apply_filters('the_content', $item1_text);
                    }
                    ?>
            </div>
            <div class="quote-right-text">
                 <?php
                    $item2_text = get_sub_field('quote_text');
                    if ($item2_text) {
                        echo apply_filters('the_content', $item2_text);
                    }
                    ?>
            </div>
        </div>
    </div>
</div>