<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label for="title" class="col-md-2 control-label">
                Title
            </label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="title" autofocus
                       id="title" value="{{ $title }}">
            </div>
        </div>
        <div class="form-group">
            <label for="subtitle" class="col-md-2 control-label">
                Subtitle
            </label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="subtitle"
                       id="subtitle" value="{{ $subtitle }}">
            </div>
        </div>
        <div class="form-group">
            <label for="page_image" class="col-md-2 control-label">
                Page Image
            </label>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="page_image"
                               id="page_image" onchange="handle_image_change()"
                               alt="Image thumbnail" value="{{ $page_image }}">
                    </div>
                    <script>
                        function handle_image_change() {
                            $("#page-image-preview").attr("src", function () {
                                var value = $("#page_image").val();
                                if ( ! value) {
                                    value = {!! json_encode(config('blog.page_image')) !!};
                                    if (value == null) {
                                        value = '';
                                    }
                                }
                                if (value.substr(0, 4) != 'http' &&
                                        value.substr(0, 1) != '/') {
                                    value = {!! json_encode(config('blog.uploads.webpath')) !!}
                        + '/' + value;
                                }
                                return value;
                            });
                        }
                    </script>
                    <div class="visible-sm space-10"></div>
                    <div class="col-md-4 text-right">
                        <img src="{{ page_image($page_image) }}" class="img img_responsive"
                             id="page-image-preview" style="max-height:40px">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="content_raw" class="col-md-2 control-label">
                Content
            </label>
            <div class="col-md-10">
        <textarea class="form-control" name="content_raw" rows="14"
                  id="content_raw">{{ $content_raw }}</textarea>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="published_at" class="col-md-3 control-label">
                Pub Date
            </label>
            <div class="col-md-8">
                <input class="form-control" name="published_at" id="published_at"
                       type="text" value="{{ $published_at }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8 col-md-offset-3">
                <div class="checkbox">
                    <label>
                        <input {{ checked($is_draft) }} type="checkbox" name="is_draft">
                        Draft?
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="layout" class="col-md-3 control-label">
                Layout
            </label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="layout"
                       id="layout" value="{{ $layout }}">
            </div>
        </div>
        <div class="form-group">
            <label for="meta_description" class="col-md-3 control-label">
                Meta
            </label>
            <div class="col-md-8">
        <textarea class="form-control" name="meta_description"
                  id="meta_description"
                  rows="6">{{ $meta_description }}</textarea>
            </div>
        </div>

    </div>
</div>