CKEDITOR.editorConfig = function( config ) {
	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] } 
	];
	config.removeDialogTabs = 'image:advanced;link:advanced';
	config.filebrowserBrowseUrl = public_path+'/kcfinder/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = public_path+'/kcfinder/browse.php?opener=ckeditor&type=images';
    config.filebrowserFlashBrowseUrl = public_path+'/kcfinder/browse.php?opener=ckeditor&type=flash';
    config.filebrowserUploadUrl = public_path+'/kcfinder/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = public_path+'/kcfinder/upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = public_path+'/kcfinder/upload.php?opener=ckeditor&type=flash';
    
	config.removeButtons = 'Image,Source,Save,Templates,NewPage,Preview,Print,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Replace,Find,SelectAll,Scayt,Form,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,CopyFormatting,RemoveFormat,NumberedList,BulletedList,Outdent,Indent,Blockquote,CreateDiv,JustifyCenter,JustifyLeft,JustifyRight,JustifyBlock,Language,BidiLtr,BidiRtl,Anchor,EasyImageUpload,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,TextColor,Maximize,About,ShowBlocks,BGColor,Format,Font,FontSize,Checkbox';

	config.height = '350px';
};