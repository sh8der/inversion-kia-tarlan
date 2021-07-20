<?php
// [follow]
function sh8der_flatsome_follow($atts, $content = null) {

	extract(shortcode_atts(array(
		'title' => '',
		'class' => '',
		'visibility' => '',
		'style' => 'outline',
		'align' => '',
		'scale' => '',
		'twitter' => '',
		'facebook' => '',
		'pinterest' => '',
		'email' => '',
		'phone' => '',
		'instagram' => '',
		'tiktok' => '',
		'rss' => '',
		'linkedin' => '',
		'youtube' => '',
		'flickr' => '',
		'vkontakte' => '',
		'odnoklassniki' => '',
		'px500' => '',
		'snapchat' => '',

		// Depricated
		'size' => '',

	), $atts));
	ob_start();


	$wrapper_class = array('social-icons','follow-icons', 'sh8der-follow');
	if( $class ) $wrapper_class[] = $class;
	if( $visibility ) $wrapper_class[] = $visibility;
	if( $align ) {
		$wrapper_class[] = 'full-width';
		$wrapper_class[] = 'text-'.$align;
	}

	// Use global follow links if non is set individually.
	$has_custom_link = $twitter || $facebook || $instagram || $tiktok || $snapchat || $youtube || $pinterest || $linkedin || $px500 || $vkontakte || $flickr || $email || $phone || $rss;

	if ( ! $has_custom_link ) {
		$twitter   = get_theme_mod( 'follow_twitter' );
		$facebook  = get_theme_mod( 'follow_facebook' );
		$instagram = get_theme_mod( 'follow_instagram' );
		$tiktok    = get_theme_mod( 'follow_tiktok' );
		$snapchat  = get_theme_mod( 'follow_snapchat' );
		$youtube   = get_theme_mod( 'follow_youtube' );
		$pinterest = get_theme_mod( 'follow_pinterest' );
		$linkedin  = get_theme_mod( 'follow_linkedin' );
		$px500     = get_theme_mod( 'follow_500px' );
		$vkontakte = get_theme_mod( 'follow_vk' );
		$flickr    = get_theme_mod( 'follow_flickr' );
		$email     = get_theme_mod( 'follow_email' );
		$phone     = get_theme_mod( 'follow_phone' );
		$rss       = get_theme_mod( 'follow_rss' );
	}

	if($size == 'small') $style = 'small';
	$style = get_flatsome_icon_class($style);

	// Scale
	if($scale) $scale = 'style="font-size:'.$scale.'%"';


	?>
    <div class="<?php echo implode(' ', $wrapper_class); ?>" <?php echo $scale;?>>
    	<?php if($title){?>
    	<span><?php echo $title; ?></span>
		<?php }?>
    	<?php if($facebook){?>
    	<a href="<?php echo $facebook; ?>" target="_blank" data-label="Facebook"  rel="noopener noreferrer nofollow" class="<?php echo $style; ?> facebook tooltip" title="<?php _e('Follow on Facebook','flatsome') ?>"><?php echo get_flatsome_icon('icon-facebook'); ?>
    	</a>
		<?php }?>
		<?php if($instagram){?>
		    <a href="<?php echo $instagram; ?>" target="_blank" rel="noopener noreferrer nofollow" data-label="Instagram" class="<?php echo $style; ?>  instagram tooltip" title="<?php _e('Follow on Instagram','flatsome')?>"><?php echo get_flatsome_icon('icon-instagram'); ?>
		   </a>
		<?php }?>
	    <?php if ( $tiktok ) { ?>
		    <a href="<?php echo $tiktok; ?>" target="_blank" rel="noopener noreferrer nofollow" data-label="TikTok" class="<?php echo $style; ?> tiktok tooltip" title="<?php _e( 'Follow on TikTok', 'flatsome' ) ?>"><?php echo get_flatsome_icon( 'icon-tiktok' ); ?>
		    </a>
	    <?php } ?>
		<?php if($snapchat){?>
		    <a href="#" data-open="#follow-snapchat-lightbox" data-color="dark" data-pos="center" target="_blank" rel="noopener noreferrer nofollow" data-label="SnapChat" class="<?php echo $style; ?> snapchat tooltip" title="<?php _e('Follow on SnapChat','flatsome')?>"><?php echo get_flatsome_icon('icon-snapchat'); ?>
		   </a>
		   <div id="follow-snapchat-lightbox" class="mfp-hide">
		   		<div class="text-center">
			   		<?php echo do_shortcode(flatsome_get_image($snapchat)) ;?>
			   		<p><?php _e('Point the SnapChat camera at this to add us to SnapChat.','flatsome'); ?></p>
		   		</div>
		   </div>
		<?php }?>
		<?php if($twitter){?>
	       <a href="<?php echo $twitter; ?>" target="_blank"  data-label="Twitter"  rel="noopener noreferrer nofollow" class="<?php echo $style; ?>  twitter tooltip" title="<?php _e('Follow on Twitter','flatsome') ?>"><?php echo get_flatsome_icon('icon-twitter'); ?>
	       </a>
		<?php }?>
		<?php if($email){?>
		     <a href="mailto:<?php echo $email; ?>" data-label="E-mail"  rel="nofollow" class="<?php echo $style; ?>  email tooltip" title="<?php _e('Send us an email','flatsome') ?>"><?php echo get_flatsome_icon('icon-envelop'); ?>
			</a>
		<?php }?>
	    <?php if($phone){?>
			<a href="tel:<?php echo $phone; ?>" target="_blank"  data-label="Phone"  rel="noopener noreferrer nofollow" class="<?php echo $style; ?>  phone tooltip" title="<?php _e('Call us','flatsome') ?>"><?php echo get_flatsome_icon('icon-phone'); ?>
			</a>
	    <?php }?>
		<?php if($pinterest){?>
		       <a href="<?php echo $pinterest; ?>" target="_blank" rel="noopener noreferrer nofollow"  data-label="Pinterest"  class="<?php echo $style; ?>  pinterest tooltip" title="<?php _e('Follow on Pinterest','flatsome') ?>"><?php echo get_flatsome_icon('icon-pinterest'); ?>
		       </a>
		<?php }?>
		<?php if($rss){?>
		       <a href="<?php echo $rss; ?>" target="_blank" rel="noopener noreferrer nofollow" data-label="RSS Feed" class="<?php echo $style; ?>  rss tooltip" title="<?php _e('Subscribe to RSS','flatsome') ?>"><?php echo get_flatsome_icon('icon-feed'); ?></a>
		<?php }?>
		<?php if($linkedin){?>
		       <a href="<?php echo $linkedin; ?>" target="_blank" rel="noopener noreferrer nofollow" data-label="LinkedIn" class="<?php echo $style; ?>  linkedin tooltip" title="<?php _e('Follow on LinkedIn','flatsome') ?>"><?php echo get_flatsome_icon('icon-linkedin'); ?></a>
		<?php }?>
		<?php if($youtube){?>
		       <a href="<?php echo $youtube; ?>" target="_blank" rel="noopener noreferrer nofollow" data-label="YouTube" class="<?php echo $style; ?>  youtube tooltip" title="<?php _e('Follow on YouTube','flatsome') ?>"><?php echo get_flatsome_icon('icon-youtube'); ?>
		       </a>
		<?php }?>
		<?php if($flickr){?>
		       <a href="<?php echo $flickr; ?>" target="_blank" rel="noopener noreferrer nofollow" data-label="Flickr" class="<?php echo $style; ?>  flickr tooltip" title="<?php _e('Flickr','flatsome') ?>"><?php echo get_flatsome_icon('icon-flickr'); ?>
		       </a>
		<?php }?>
		<?php if($px500){?>
		     <a href="<?php echo $px500; ?>" target="_blank"  data-label="500px"  rel="noopener noreferrer nofollow" class="<?php echo $style; ?> px500 tooltip" title="<?php _e('Follow on 500px','flatsome') ?>"><?php echo get_flatsome_icon('icon-500px'); ?>
			</a>
		<?php }?>
		<?php if($vkontakte){?>
		       <a href="<?php echo $vkontakte; ?>" target="_blank" data-label="VKontakte" rel="noopener noreferrer nofollow" class="<?php echo $style; ?> vk tooltip" title="<?php _e('Follow on VKontakte','flatsome') ?>"><?php echo get_flatsome_icon('icon-vk'); ?>
		       </a>
		<?php }?>
		<?php if($odnoklassniki){?>
		       <a href="<?php echo $odnoklassniki; ?>" target="_blank" data-label="Одноклассники" rel="noopener noreferrer nofollow" class="<?php echo $style; ?> ok tooltip" title="<?php _e('Следите за нави в Однокссниках') ?>">
		       	<?php echo '<?xml version="1.0" encoding="iso-8859-1"?> <!-- Generator: Adobe Illustrator 16.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  --> <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"> <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"width="95.481px" height="95.481px" viewBox="0 0 95.481 95.481" style="enable-background:new 0 0 95.481 95.481;"xml:space="preserve"> <g> <g> <path d="M43.041,67.254c-7.402-0.772-14.076-2.595-19.79-7.064c-0.709-0.556-1.441-1.092-2.088-1.713 c-2.501-2.402-2.753-5.153-0.774-7.988c1.693-2.426,4.535-3.075,7.489-1.682c0.572,0.27,1.117,0.607,1.639,0.969 c10.649,7.317,25.278,7.519,35.967,0.329c1.059-0.812,2.191-1.474,3.503-1.812c2.551-0.655,4.93,0.282,6.299,2.514 c1.564,2.549,1.544,5.037-0.383,7.016c-2.956,3.034-6.511,5.229-10.461,6.761c-3.735,1.448-7.826,2.177-11.875,2.661 c0.611,0.665,0.899,0.992,1.281,1.376c5.498,5.524,11.02,11.025,16.5,16.566c1.867,1.888,2.257,4.229,1.229,6.425 c-1.124,2.4-3.64,3.979-6.107,3.81c-1.563-0.108-2.782-0.886-3.865-1.977c-4.149-4.175-8.376-8.273-12.441-12.527 c-1.183-1.237-1.752-1.003-2.796,0.071c-4.174,4.297-8.416,8.528-12.683,12.735c-1.916,1.889-4.196,2.229-6.418,1.15 c-2.362-1.145-3.865-3.556-3.749-5.979c0.08-1.639,0.886-2.891,2.011-4.014c5.441-5.433,10.867-10.88,16.295-16.322 C42.183,68.197,42.518,67.813,43.041,67.254z"/> <path d="M47.55,48.329c-13.205-0.045-24.033-10.992-23.956-24.218C23.67,10.739,34.505-0.037,47.84,0 c13.362,0.036,24.087,10.967,24.02,24.478C71.792,37.677,60.889,48.375,47.55,48.329z M59.551,24.143 c-0.023-6.567-5.253-11.795-11.807-11.801c-6.609-0.007-11.886,5.316-11.835,11.943c0.049,6.542,5.324,11.733,11.896,11.709 C54.357,35.971,59.573,30.709,59.551,24.143z"/> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>'; ?>
		       </a>
		<?php }?>
     </div>

	<?php
	$content = ob_get_contents();
	ob_end_clean();
	$content = flatsome_sanitize_whitespace_chars( $content);
	return $content;
}


add_action( 'init', function(){
	remove_shortcode("follow");
	add_shortcode("follow", "sh8der_flatsome_follow");
});