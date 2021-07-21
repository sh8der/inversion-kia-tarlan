<?php
add_action('after_setup_theme', function () {
  add_action('ux_builder_setup', function () {
    remove_ux_builder_shortcode('divider');
    add_ux_builder_shortcode('divider', array(
      'name' => __('Divider'),
      'category' => __('Content'),
      'template' => file_get_contents(__DIR__ . '/divider.html'),
      'thumbnail' =>  flatsome_ux_builder_thumbnail('divider'),
      'options' => array(
        'direction'        => array(
          'type'       => 'select',
          'heading'    => __('Direction', 'flatsome'),
          'responsive' => true,
          'default'    => 'row',
          'options'    => array(
            'row' => __('Horizontal', 'flatsome'),
            'col' => __('Vertical', 'flatsome'),
          ),
        ),
        'align' => array(
          'type' => 'radio-buttons',
          'heading' => __('Align'),
          'default' => '',
          'options' => require(get_template_directory() . '/inc/builder/shortcodes/values/align-radios.php'),
        ),
        'width' => array(
          'type' => 'scrubfield',
          'heading' => __('Width'),
          'default' => '30px',
          'min' => 0,
        ),
        'height' => array(
          'type' => 'scrubfield',
          'heading' => __('Height'),
          'default' => '3px',
          'min' => 0,
        ),
        'margin' => array(
          'type' => 'scrubfield',
          'heading' => __('Margin'),
          'default' => '1.0em',
          'step' => 0.1,
        ),
        'color' => array(
          'type' => 'colorpicker',
          'heading' => __('Color'),
          'default' => '',
          'alpha' => true,
          'format' => 'rgb',
          'position' => 'bottom right',
        ),
        'advanced_options' => require(get_template_directory() . '/inc/builder/shortcodes/commons/advanced.php'),
      )
    ));
  });
});
