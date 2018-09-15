<?php

// Dirty fix by Maarten to ensure that pretix widget code is not removed from the page.
/*
// (Not necessary anymore now that we use Visual Composer)
function override_mce_options($initArray) {
	$opts = '*[*]';
	$initArray['valid_elements'] = $opts;
	$initArray['extended_valid_elements'] = $opts;
	return $initArray;
}
add_filter('tiny_mce_before_init', 'override_mce_options');
*/
