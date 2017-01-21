<?php
/* Plugin Name: Richard's Excerpts
Plugin URI:
Description: Replaces the default post excerpt function with one that retains HTML tags
Version: 1.0
Author: Richard Wein
Author URI:
Text Domain:
License: GPLv2
*/

add_filter('get_the_excerpt', 'custom_post_excerpt');

function custom_post_excerpt( $old_excerpt_not_used ) {
	
	$output = '';
	$word_count = 0;
	$tag_stack = array(); 
	$is_truncated = false;
	
	// Get the full content, and split into tags and text blocks
	$split_array1 = preg_split ('/(<[^>]+>)/', get_the_content(), -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
	
	foreach ($split_array1 as $part):
		
		// It's a closing tag 
		if (substr($part, 0, 2) == '</'):
			$output .= $part;
			// Pop the corresponding opening tag off the stack
			preg_match ('/[^>\s]+/', trim(substr($part, 2)), $matches);
			$tag_name = strtolower($matches[0]);
			do {
				$popped_name = array_pop ($tag_stack);
			} while ($popped_name <> NULL && $popped_name <> $tag_name);
		
		// It's an opening or singular tag
		elseif (substr($part, 0, 1) == '<'):
			$output .= $part;
			// Push the tag name onto the stack, unless it's a singular tag
			preg_match ('/[^>\s]+/', trim(substr($part, 1)), $matches);
			$tag_name = strtolower($matches[0]);
			switch ($tag_name):
				case 'br':
				case 'hr':
				case 'img':
				case '!--':
					break;
				default:
					array_push ($tag_stack, $tag_name);
			endswitch;
		
		// It's text 
		else :
			// Split into words (chunks ending in white space)
			$split_array2 = preg_split ('/([^\s]+[\s]+)/', $part, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
			foreach ($split_array2 as $word):
				$word_count += 1;
				if ($word_count > 55): 
					$is_truncated = true;
					break 2; // Got all the words we need for excerpt: EXIT OUTER LOOP
				endif;
				$output .= $word;
			endforeach;
		endif;
		
	endforeach;
	
	if ($is_truncated):
		// Add a '...' continuation
		$output = rtrim($output) . '...';
		// Close any tags that are still open
		$popped_name = array_pop ($tag_stack);
		while ($popped_name <> NULL):
			$output .= '</' . $popped_name . '>';
			$popped_name = array_pop ($tag_stack);
		endwhile;
		// Add a 'read more' link
		$output .= ' <a class="read-more-link" href="' . get_permalink() . '">[read more]</a>';
	endif;
	
	return $output;
}
?>