﻿CKEDITOR.editorConfig = function( config )
{
// Define changes to default configuration here. For example:
	 // config.language = 'fr';
	 // config.uiColor = '#AADC6E';
	
	 // added code for ckfinder ------>
	 config.filebrowserBrowseUrl = '../../../assets/grocery_crud/texteditor/ckfinder/ckfinder.html';
	 config.filebrowserImageBrowseUrl = '../../../assets/grocery_crud/texteditor/ckfinder/ckfinder.html?type=Images';
	 config.filebrowserFlashBrowseUrl = '../../../assets/grocery_crud/texteditor/ckfinder/ckfinder.html?type=Flash';
	 config.filebrowserUploadUrl = '../../../assets/grocery_crud/texteditor/ckfinder/core/connector /php/connector.php?command=QuickUpload&type=Files';
	 config.filebrowserImageUploadUrl = '../../../assets/grocery_crud/texteditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	 config.filebrowserFlashUploadUrl = '../../../assets/grocery_crud/texteditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
// end: code for ckfinder ------>
};