<?php
    function my_mce_before_init_insert_formats($init_array) {
        $style_formats = array(
            array(
                'title' => 'Oferta de material',
                'block' => 'div',
                'classes' => 'offer-cta',
                'wrapper' => true
            )
        );
        $init_array['style_formats'] = json_encode($style_formats);
        return $init_array;
    }
    add_filter('tiny_mce_before_init', 'my_mce_before_init_insert_formats');

    function custom_mce_buttons($buttons) {
        array_unshift($buttons, 'styleselect');
        return $buttons;
    }
    add_filter('mce_buttons', 'custom_mce_buttons');

    function searchFilter($query) {
    	if ($query->is_search) {
            $query->set('post_type', 'post');
    	}
    	return $query;
    }
    add_filter('pre_get_posts', 'searchFilter');

    function my_custom_scp_number_format($total) {
        if ($total > 1000000) {
            return round( $total / 1000000, 0 ) . 'M';
        }
        elseif ( $total > 1000 ) {
            return round($total / 1000, 0) . 'K';
        }
        return $total;
    }
    add_filter('social_count_plus_number_format', 'my_custom_scp_number_format');

    function bootstrap_responsive($html, $url, $attr, $post_ID) {
      if ( false !== stripos( $html, '<iframe ' ) && false !== stripos( $html, '.youtube.com/embed' ) ) {
        $html = sprintf('<div class="embed-responsive embed-responsive-16by9">%s</div>', $html );
      }
      return $html;
    }
    add_filter('embed_oembed_html', 'bootstrap_responsive', 10, 4);

    function custom_contact_info($fields) {
        unset($fields['aim']);
        unset($fields['yim']);
        unset($fields['jabber']);
        $fields['linkedin'] = __('LinkedIn');
    	$fields['snapchat'] = __('Snapchat');
        return $fields;
    }
    add_filter('user_contactmethods', 'custom_contact_info');
