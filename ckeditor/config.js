/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	//config.uiColor = '#00006E';
  config.enterMode = CKEDITOR.ENTER_BR;
  
  //disable ckEditor spellchecker
  config.disableNativeSpellChecker = false;
  config.removePlugins = 'contextmenu';
};
