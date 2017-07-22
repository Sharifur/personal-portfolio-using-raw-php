   <script src="../view/backend/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../view/backend/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../view/backend/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../view/backend/vendor/raphael/raphael.min.js"></script>
    <script src="../view/backend/vendor/morrisjs/morris.min.js"></script>
    <script src="../view/backend/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../view/backend/dist/js/sb-admin-2.js"></script>
    <script src="../view/backend/dist/js/parsley.js"></script>
   <script type="text/javascript" src="https://tinymce.cachefly.net/4.1/tinymce.min.js"></script>
   <script type="text/javascript">

       tinymce.init({
           selector: "textarea",
           theme: "modern",
           setup: function(editor) {
               editor.on('change', function() {
                   editor.save();
               });
           },
           plugins: [
               "advlist autolink lists link image charmap print preview hr anchor pagebreak",
               "searchreplace wordcount visualblocks visualchars code fullscreen",
               "insertdatetime media nonbreaking save table contextmenu directionality",
               "emoticons template paste textcolor colorpicker textpattern"
           ],
           toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
           toolbar2: "print preview media | forecolor backcolor emoticons",
           image_advtab: true,
           templates: [
               {title: 'Test template 1', content: 'Test 1'},
               {title: 'Test template 2', content: 'Test 2'}
           ],
           image_title: true,
           convert_urls: false,
           content_css: "css/content.css"
       });
   </script>