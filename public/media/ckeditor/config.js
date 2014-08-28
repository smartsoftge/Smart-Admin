/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// KCfINDER
	   config.filebrowserBrowseUrl = 'public/media/kcfinder/browse.php?type=files&langCode=ru';
	   config.filebrowserImageBrowseUrl = 'public/media/kcfinder/browse.php?type=files&langCode=ru';
	   config.filebrowserFlashBrowseUrl = 'public/media/kcfinder/browse.php?type=files&langCode=ru';
	   config.filebrowserUploadUrl = 'public/media/kcfinder/browse.php?type=files&langCode=ru';
	   config.filebrowserImageUploadUrl = 'public/media/kcfinder/upload.php?type=images';
	   config.filebrowserFlashUploadUrl = 'public/media/kcfinder/browse.php?type=files&langCode=ru';
	// Define changes to default configuration here.
	// For the complete reference:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];

	// Remove some buttons, provided by the standard plugins, which we don't
	// need to have in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Se the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Make dialogs simpler.
	config.removeDialogTabs = 'image:advanced;link:advanced';
};
