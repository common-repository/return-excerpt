<?php
/*
Plugin Name: Return Excerpt
Plugin URI: http://daily.glocalism.jp/wordpress/wordpress%E3%83%97%E3%83%A9%E3%82%B0%E3%82%A4%E3%83%B3-return-excerpt/
Description: Returns the excerpt outside the loop using return_excerpt($post_id, $attr);
Version: 0.2
Author: Yusuke Kawato
Author URI: 
*/


if(!function_exists('return_excerpt'))
{
    function return_excerpt($post_id, $attr=null)
    {
        $mypost = get_post($post_id);

        $post_excerpt = $mypost->post_content;
        $post_excerpt = strip_tags($post_excerpt);
        $excerpt_length = apply_filters('excerpt_length', 55, 100);

        if(isset($attr['num_words']))
        {
            $excerpt_length = $attr['num_words'];
            
            if(isset($attr['more']) && $attr['more']!='')
                $excerpt_more = ' <a href="'. get_permalink($post_id) . '">' . $attr['more'] . '</a>';
            else
                $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');

            $post_excerpt = wp_trim_words( $post_excerpt, $excerpt_length, $excerpt_more );    
        }
        else
        {
            if(isset($attr['length']))
            {
                $excerpt_length = $attr['length'];
                if(mb_strlen($post_excerpt) > $excerpt_length)
                    $post_excerpt = mb_substr($post_excerpt, 0, $excerpt_length).'…';

                if($attr['more']!='')
                    $excerpt_more = ' <a href="'. get_permalink($post_id) . '">' . $attr['more'] . '</a>';
                else
                    $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
                
            }
            
            $post_excerpt = $post_excerpt.$excerpt_more;//wp_trim_words( $post_excerpt, $excerpt_length, $excerpt_more );
        }

        
        return $post_excerpt;
    }
}

?>