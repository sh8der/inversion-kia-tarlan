<?php
function sh8der_add_new_format($flatsome_styles)
{
  $styles = $flatsome_styles;
  array_push(
    $styles,
    array(
      'title' => '<li> без булета',
      'classes' => 'sh8der-li-no-bullet',
      'selector' => 'ul',
    )
  );
  return $styles;
}
add_filter('flatsome_text_formats', 'sh8der_add_new_format');
