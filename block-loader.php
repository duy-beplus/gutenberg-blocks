<?php
/**
* Register Blocks
**/

add_filter('block_categories_all', function ($categories) {
	$testing_categories = array(
		'slug'  => 'testing-gutenberg',
		'title' => 'Testing Gutenberg',
		'icon'  => null,
	);

  array_splice( $categories, 1, 0, array($testing_categories) );

	return $categories;
});


$blocks = [
	array(
		'slug' => 'faqs',
		'name' => 'FAQs Block',
		'icon' => 'excerpt-view',
		// 'preview' => PJ_URI.'assets/admin/images/key_takeaways.png'
	),
    array(
        'slug' => 'takeaway',
        'name' => 'Key Takeaway',
        'icon' => 'admin-post',
        'preview' => PJ_URI.'assets/admin/images/key_takeaways.png'
    )
];

testing_register_blocks($blocks);

function testing_register_blocks($blocks = []) {
    // skip processing if the ACF plugin is not active.
	if (!function_exists('acf_register_block_type')) {
		return;
	}
    foreach ($blocks as $block) {
		// Load our block config file
		$filePath = PJ_DIR . "/blocks/options/{$block['slug']}.php";

		$config = array();
		if (file_exists($filePath)) {
			$config = include_once $filePath;

			$slug_block = acf_slugify($block['slug']);
			$name_block = $block['name'];
			$description = isset($block['description']) ? $block['description'] : '';
			$defaults = [
				'name' => $name_block,
				'key'  => $slug_block,
				'title' => $name_block,
				'icon' => $block['icon'],
				'category' => 'testing-gutenberg',
				'description' => $description,
				'supports' => array(
					'align' => true,
					'mode' => true,
					'multiple' => true
				),
				'location' => [
					[
						[
							'param' => 'block',
							'operator' => '==',
							'value' => "acf/{$slug_block}",
						]
					]
				],
				'mode' => 'auto',
				'example'         => array(
                    'attributes' => array(
                        'mode' => 'preview', // Important!
                        'data' => array(
                            'image' => '<img src="' . $block['preview'] . '" style="display: block; margin: 0 auto;">'
                    ),
                ),
            ),
				'render_template' => PJ_DIR . "/blocks/views/{$block['slug']}.php",
			];

			if (file_exists(PJ_DIR . "/blocks/js/{$block['slug']}.js")) {
				$defaults['enqueue_script'] = PJ_URI . "blocks/js/{$block['slug']}.js";
			}

			if (file_exists(PJ_DIR . "/blocks/css/{$block['slug']}.css")) {
			   $defaults['enqueue_style'] = PJ_URI . "blocks/css/{$block['slug']}.css";
			}

			//$config overrides defaults of course
			$block_type = array_merge($defaults, $config);

			// Add block
			acf_register_block_type($block_type);

			$config['key'] = $block_type['key'] . '-group';
			$config['name'] = $block_type['name'] . '-group';
			$config['title'] = $block_type['title'] . '-group';
			$config['location'] = $defaults['location'];

			// Add fields
			// echo '<pre>' . var_export($config, true) . '</pre>';
			acf_add_local_field_group($config);
		}
	}
}

?>
