/*
 * SimpleModal Basic Modal Dialog
 * http://www.ericmmartin.com/projects/simplemodal/
 * http://code.google.com/p/simplemodal/
 *
 * Copyright (c) 2010 Eric Martin - http://ericmmartin.com
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Revision: $Id: basic.js 254 2010-07-23 05:14:44Z emartin24 $
 */

jQuery(function ($) {
	// Load dialog on page load
	//$('#basic-modal-content').modal();

	// Load dialog on click
	$('#body-sub-menu-right .submenu_pat_add').click(function (e) {
		$('#pat_add').modal();

		return false;
	});
});
jQuery(function ($) {
	// Load dialog on page load
	//$('#basic-modal-content').modal();

	// Load dialog on click
	$('#body-sub-menu-right .submenu_pat_edit').click(function (e) {
		$('#pat_edit').modal();

		return false;
	});
});
jQuery(function ($) {
	// Load dialog on page load
	//$('#basic-modal-content').modal();

	// Load dialog on click
	$('#body-sub-menu-right .submenu_sub_add').click(function (e) {
		$('#pre_add').modal();

		return false;
	});
});
jQuery(function ($) {
	// Load dialog on page load
	//$('#basic-modal-content').modal();

	// Load dialog on click
	$('#body-sub-menu-right .submenu_sub_edit').click(function (e) {
		$('#pre_edit').modal();

		return false;
	});
});
jQuery(function ($) {
	// Load dialog on page load
	//$('#basic-modal-content').modal();

	// Load dialog on click
	$('#body-sub-menu-right .submenu_add_pill').click(function (e) {
		$('#pill_add').modal();

		return false;
	});
});
jQuery(function ($) {
	// Load dialog on page load
	//$('#basic-modal-content').modal();

	// Load dialog on click
	$('#body-sub-menu-right .submenu_disp_add').click(function (e) {
		$('#disp_add').modal();

		return false;
	});
});