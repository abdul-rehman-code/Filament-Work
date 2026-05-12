@php
    $editorId = str_replace('.', '-', $getId()) . '-editor';
    $statePath = $getStatePath();
    $state = $getState();
@endphp

<div wire:ignore>
    <div id="{{ $editorId }}"></div>
</div>

<script>
    (function() {
        var editorId = '{{ $editorId }}';
        var fieldPath = '{{ $statePath }}';
        var initialValue = @json($state ?? '');
        var uploadUrl = '{{ route('admin.upload.image') }}';
        var csrfToken = '{{ csrf_token() }}';

        function initSummernote() {
            if (typeof $ === 'undefined' || !$.fn.summernote) {
                setTimeout(initSummernote, 200);
                return;
            }

            var el = document.getElementById(editorId);
            if (!el) {
                setTimeout(initSummernote, 200);
                return;
            }

            $('#' + editorId).summernote({
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture']],
                    ['view', ['codeview']],
                ],
                callbacks: {
                    onChange: function(contents) {
                        @this.set(fieldPath, contents);
                    },
                    onImageUpload: function(files) {
                        var formData = new FormData();
                        formData.append('file', files[0]);
                        formData.append('_token', csrfToken);

                        fetch(uploadUrl, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json',
                            },
                            body: formData,
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.url) {
                                $('#' + editorId).summernote('insertImage', data.url);
                            } else {
                                console.error('Upload error:', data.error);
                            }
                        })
                        .catch(err => {
                            console.error('Image upload failed:', err);
                        });
                    }
                }
            });

            if (initialValue) {
                $('#' + editorId).summernote('code', initialValue);
            }
        }

        initSummernote();
    })();
</script>
