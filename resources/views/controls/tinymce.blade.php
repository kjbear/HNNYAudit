@if($src == true)
        <script src='//cdn.tinymce.com/4/tinymce.min.js'></script> @endif
        <script>
            tinymce.init({
                menubar:false,
                statusbar: false,
                plugins: [
                    'textcolor colorpicker charmap preview emoticons autosave',
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen spellchecker',
                    'insertdatetime media table contextmenu paste code hr'
                ],
                toolbar: 'undo redo | styleselect | bold italic underline forecolor backcolor charmap | alignleft aligncenter alignright alignjustify | emoticons hr bullist numlist outdent indent | link image',
                statusbar: false,
                selector: '{{ $target }}'
            });
        </script>
