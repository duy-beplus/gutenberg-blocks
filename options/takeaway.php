<?php

/**
 * Option Box
 *
 * This block shows most common ACF block features and provides a simple template for usage.
 *
 * Styles: add into /theme/src/scss/blocks/ folder with the same name as the block e.g. example.scss
 * Scripts: add into /theme/src/js/blocks/ folder with the same name as the block e.g. example.js
 */

return [
    'fields' => [
        [
            'key' => 'takeaway_heading',
            'name' => 'takeaway_heading',
            'label' => 'Heading',
            'type' => 'Take',
        ],
        [
            'key' => 'takeaway_rpt',
            'name' => 'takeaway_rpt',
            'label' => 'Key item',
            'type' => 'repeater',
            'layout' => 'block',
            'sub_fields' => [
                [
                    'key' => 'takeaway_item',
                    'name' => 'takeaway_item',
                    'label' => 'Item',
                    'type' => 'text',
                ],
            ],
        ],
    ],
];
