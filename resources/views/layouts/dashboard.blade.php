@extends('adminlte::layout')
@push('styles')
    <!-- include summernote css/js -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
    <script>
        $(document).ready(function () {
            $('.editor').summernote({
                height: 300,
                callbacks: {
                    onImageUpload: function (files, editor, welEditable) {
                        sendFile(files[0], this);
                    }
                }
            });

            function sendFile(file, editor) {
                data = new FormData();
                data.append("file", file);
                data.append("_token", '{{ csrf_token() }}');
                url = "{{ route('dashboard.media.upload') }}";
                $.ajax({
                    data: data,
                    type: "POST",
                    url: url,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (url) {
                        var image = $('<img>').attr('src', url);
                        $(editor).summernote("insertNode", image[0]);
                    }
                });
            }
        });
    </script>
@endpush
