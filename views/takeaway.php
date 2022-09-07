<?php

/**
 * Key takeaway
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
$block_classes = 'block-take_away';
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
}
