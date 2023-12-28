tinymce.init({
  selector: ".textarea",
  plugins: 'advlist autolink lists advlist link image charmap  preview  anchor pagebreak  table  emoticons importcss insertdatetime media quickbars searchreplace',
  toolbar: 'undo redo | styleselect formatselect fontselect fontsizeselect | bold italic underline strikethrough | forecolor backcolor |  alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | link image | Table  | emoticons | insertdatetime  | quickimage | searchreplace | quicktable',
  image_advtab: true,
  link_context_toolbar: true,
  images_upload_url: 'postAcceptor.php',
  importcss_append: true,
  advlist_bullet_styles: 'square circle',
  advlist_number_styles: 'default lower-alpha lower-roman upper-alpha upper-roman',
  autoresize_bottom_margin: 16,
  quickbars_insert_toolbar: false,

  // file_picker_types: 'image',
  file_picker_types: 'media',

  file_picker_callback: function (callback, value, meta) {
    // Your file picker logic here
    if (meta.filetype == 'file') {
      callback('mypage.html', {text: 'My text'});
    }
    // Provide image and alt text for the image dialog
    if (meta.filetype == 'image') {
      callback('myimage.jpg', {alt: 'My alt text'});
    }

    // Provide alternative source and posted for the media dialog
    if (meta.filetype == 'media') {
      callback('movie.mp4', {source2: 'alt.ogg', poster: 'image.jpg'});
    }
  },
  // Add other configuration options as needed
});



