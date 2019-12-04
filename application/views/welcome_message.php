<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to CodeIgniter!</h1>

	<div id="body">
		<textarea id = "txtdescription" name = "txtdescription" placeholder = "Write Here"></textarea>
	</div>

	
</div>

</body>
</html>

<script src="<?= base_url() ?>assets/js/jquery-3.4.1.js"></script>
<script src="<?= base_url() ?>assets/tinymce/tinymce.min.js"></script>

<script>
$(document).ready(function(){


	 // tiny
tinymce.init({
        selector: "#txtdescription",
        plugins: [
             "advlist autolink lists link image media charmap print preview hr anchor pagebreak",
             "searchreplace wordcount visualblocks visualchars code fullscreen",
             "insertdatetime nonbreaking save table directionality",
             "emoticons template paste textpattern responsivefilemanager"
        ],
        // plugins: [
        //      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        //      "searchreplace wordcount visualblocks visualchars code fullscreen",
        //      "insertdatetime nonbreaking save table contextmenu directionality",
        //      "emoticons template paste textcolor colorpicker textpattern"
        // ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media responsivefilemanager",

        external_filemanager_path: "<?php echo base_url();?>assets/responsivefilemanager/",
        filemanager_title: "Media Gallery",
        external_plugins: { "filemanager": "<?php echo base_url();?>assets/responsivefilemanager/plugin.min.js" },

        automatic_uploads: true,
        image_advtab: true,
        images_upload_url: "<?php echo base_url("Welcome/tinymce_upload")?>",
        file_picker_types: 'image', 
        paste_data_images:true,
        relative_urls: false,
        height : "480",
        remove_script_host: false,
          file_picker_callback: function(cb, value, meta) {
             var input = document.createElement('input');
             input.setAttribute('type', 'file');
             input.setAttribute('accept', 'image/*');
             input.onchange = function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function () {
                   var id = 'post-image-' + (new Date()).getTime();
                   var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                   var blobInfo = blobCache.create(id, file, reader.result);
                   blobCache.add(blobInfo);
                   cb(blobInfo.blobUri(), { title: file.name });
                };
             };
             input.click();
          }
   });
// tiny
});
</script>