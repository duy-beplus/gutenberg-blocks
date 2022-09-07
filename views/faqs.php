<?php

/**
 * FAQs
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
 // Create id attribute allowing for custom "anchor" value.

$block_id = $block['id'];
if( !empty($block['anchor']) ) {
    $block_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$block_classes = 'block-faqs-box';
if( !empty($block['className']) ) {
    $block_classes .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $block_classes .= ' align' . $block['align'];
}

/**
* Back-end preview
*/
if ( $is_preview && isset($block['data']['image'])) {
   echo $block['data']['image'];
   return;
} else {
  // $heading = $block['data']['faq_heading'] ? $block['data']['faq_heading'] : 'Frequently Asked Questions';
  ?>
  <div id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($block_classes); ?>">
    <div class="block-faqs-content">
      <h2><?php echo get_field('faq_heading') ?></h2>
      <?php if(have_rows('faq_rpt')) { ?>
        <?php while ( have_rows('faq_rpt') ) { the_row('faq_rpt'); ?>
          <div class="_faqs-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <div class="_question">
              <h4 class="_title" itemprop="name"><?php the_sub_field('faq_question');?></h4>
            </div>
             <div class="_answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
               <div class="_content-answer" itemprop="text">
                 <?php the_sub_field('faq_answer');?>
               </div>
             </div>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
  </div>
  <?php
}
