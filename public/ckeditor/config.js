/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	//var base_url = window.location.origin;
	///public/assets/vendors
	config.removeDialogTabs = 'image:advanced;link:advanced';
	config.filebrowserBrowseUrl = public_path+'/kcfinder/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = public_path+'/kcfinder/browse.php?opener=ckeditor&type=images';
    config.filebrowserFlashBrowseUrl = public_path+'/kcfinder/browse.php?opener=ckeditor&type=flash';
    config.filebrowserUploadUrl = public_path+'/kcfinder/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = public_path+'/kcfinder/upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = public_path+'/kcfinder/upload.php?opener=ckeditor&type=flash';

    config.removeButtons = 'Source,Save,Templates,NewPage,Preview,Print,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Replace,Find,SelectAll,Scayt,Form,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,CopyFormatting,RemoveFormat,NumberedList,BulletedList,Outdent,Indent,Blockquote,CreateDiv,JustifyCenter,JustifyLeft,JustifyRight,JustifyBlock,Language,BidiLtr,BidiRtl,Anchor,EasyImageUpload,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,TextColor,Maximize,About,ShowBlocks,BGColor,Format,Font,FontSize,Checkbox';

	config.height = '350px';

};
