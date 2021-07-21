<?php
// [divider]
function sh8der_flatsome_divider($atts, $content = null)
{
  extract(shortcode_atts(array(
    'direction' => 'row',
    'visibility' => '',
    'width' => '',
    'height' => '',
    'margin' => '',
    'align' => '',
    'color' => '',
  ), $atts));

  $align_end = '';
  $align_start = '';
  // Fallback
  if ($width == 'full') $width = '100%';

  $classes = ['is-divider', 'divider', 'clearfix'];

  if ($visibility) $classes[] = $visibility;

  $css_args = array(
    array('attribute' => 'margin-left', 'value' => ('row' === $direction) ? $margin : '0px'),
    array('attribute' => 'margin-right', 'value' => ('row' === $direction) ? $margin : '0px'),
    array('attribute' => 'margin-top', 'value' => ('col' === $direction) ? $margin : '0px'),
    array('attribute' => 'margin-bottom', 'value' => ('col' === $direction) ? $margin : '0px'),
    array('attribute' => 'max-width', 'value' => $width),
    array('attribute' => 'height', 'value' => $height),
    array('attribute' => 'background-color', 'value' => $color),
    array('attribute' => 'display', 'value' => ('row' === $direction) ? 'inline-block' : 'block'),
  );

  if ($align === 'center') {
    $align_start = '<div class="text-center">';
    $align_end = '</div>';
  }
  if ($align === 'right') {
    $align_start = '<div class="text-right">';
    $align_end = '</div>';
  }

  $classes = implode(' ', $classes);

  return $align_start . '<div class="' . $classes .  '" ' . print_r($direction, true) . ' ' . get_shortcode_inline_css($css_args) . '></div>' . $align_end;
}

add_action('init', function () {
  remove_shortcode("divider");
  add_shortcode("divider", "sh8der_flatsome_divider");
});
