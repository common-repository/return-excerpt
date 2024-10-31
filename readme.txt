=== Plugin Name ===
Contributors: ykawato
Donate link: 
Tags: excerpt
Requires at least: 3.3
Tested up to: 3.3
Stable tag: trunk

Returns the excerpt outside the loop. 

== Description ==

Returns the excerpt outside the loop.
Usage:
`<?php return_excerpt($post_id, $attr);?>`
where ` $attr ` is an array with any of these keys:

* num_words: number of words 
* more: replacement for [...]
* length: number of letters to display, userful for multibyte string

Example: 
`<?php echo return_excerpt($post_id, array('num_words'=>'55', 'more'=>'.. Read more'));?>`

== Installation ==

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. `return_excerpt($post_id, $attr); ` returns excerpt.

== Changelog ==


= 0.2 =
* Added description 
* Bug fixes

= 0.1 =
* First release

