/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.language = 'ko';

//	config.font_names = '맑은 고딕; 돋움; 바탕; 돋음; 궁서; Nanum Gothic Coding; Quattrocento Sans;' + CKEDITOR.config.font_names; 
	config.font_names = '굴림/굴림;Apple SD 산돌고딕 Neo/Apple SD 산돌고딕 Neo;나눔고딕/나눔고딕;나눔명조/나눔명조;Gungsuh/Gungsuh;Arial/Arial;Tahoma/Tahoma;Verdana/Verdana';



	config.toolbar = [

        ['Font', 'FontSize'],

        ['BGColor', 'TextColor' ],

        ['Bold', 'Italic', 'Strike', 'Superscript', 'Subscript', 'Underline', 'RemoveFormat'],    

        ['BidiLtr', 'BidiRtl'],

        '/',

        ['Image', 'SpecialChar', 'Smiley'],

        ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],

        ['Blockquote', 'NumberedList', 'BulletedList'],

        ['Link', 'Unlink'],

        ['Source'],

        ['Undo', 'Redo']

];

	config.filebrowserImageUploadUrl = '/_util/ckeditor/upload.php';
	config.allowedContent = true;      //class 적용됨
	CKEDITOR.dtd.$removeEmpty.span = 0;    //span 태그 적용됨
	//config.extraPlugins ='oembed';


};
