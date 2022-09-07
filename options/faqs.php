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
			'key' => 'faq_rpt',
			'name' => 'faq_rpt',
			'label' => 'List FAQs',
			'type' => 'repeater',
      		'layout' => 'block',
			'sub_fields' => [
				[
						'key' => 'faq_question',
						'name' => 'faq_question',
						'label' => 'Question',
						'type' => 'text',
				],
			    [
					'key' => 'faq_answer',
					'name' => 'faq_answer',
					'label' => 'Answers',
					'type' => 'wysiwyg',
				]
			],
		],
		[
			'key' => 'faq_heading',
			'name' => 'faq_heading',
			'label' => 'Heading',
			'type' => 'text',
			'default_value' => 'Frequently Asked Questions',
		]
	],
];
