(function($){
	tinymce.init({
		selector: '#mytextarea',
		height: '225',
		toolbar2: ['undo redo | styleselect | bold italic | code | link image','image', 'alignleft aligncenter alignright'],
		plugins: 'image imagetools image code',
		image_title: true,
		automatic_uploads: true,
		file_picker_types: 'image',
		file_picker_callback: function(cb, value, meta) {
		var input = document.createElement('input');
		input.setAttribute('type', 'file');
		input.setAttribute('accept', 'image/*');
		
		// Note: In modern browsers input[type="file"] is functional without 
		// even adding it to the DOM, but that might not be the case in some older
		// or quirky browsers like IE, so you might want to add it to the DOM
		// just in case, and visually hide it. And do not forget do remove it
		// once you do not need it anymore.

		input.onchange = function() {
		  var file = this.files[0];
		  
		  var reader = new FileReader();
		  reader.readAsDataURL(file);
		  reader.onload = function () {
			// Note: Now we need to register the blob in TinyMCEs image blob
			// registry. In the next release this part hopefully won't be
			// necessary, as we are looking to handle it internally.
			var id = 'blobid' + (new Date()).getTime();
			var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
			var base64 = reader.result.split(',')[1];
			var blobInfo = blobCache.create(id, file, base64);
			blobCache.add(blobInfo);

			// call the callback and populate the Title field with the file name
			cb(blobInfo.blobUri(), { title: file.name });
		  };
		};
		
		input.click();
	  }
	});
	tinymce.activeEditor.uploadImages(function(success) {
		$.post('ajax/post.php', tinymce.activeEditor.getContent()).done(function() {
			console.log("Uploaded images and posted content as an ajax request.");
		});
	});
	/*tinymce.activeEditor.uploadImages(function(success) {
	   document.forms[0].submit();
	});
	{ location : '/uploaded/image/path/image.png' }*/
}) ( jQuery );
