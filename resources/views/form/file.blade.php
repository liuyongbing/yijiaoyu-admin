<div class="form-group">
    <label class="col-md-2 control-label">
        {{ trans('inputs.image') }}
        <span class="star-must">*</span>
    </label>
    <div class="col-md-10">
        <input type="file" name="upload_file" class="" />
        <input type="hidden" name="Record[image]" value="{{ isset($item['image']) ? $item['image'] : '' }}" />
    </div>
</div>

@if(!empty($item['image_url']))
<div class="form-group">  
    <label class="col-md-2 control-label">
        {{ trans('inputs.image_view') }}
    </label>
    <div id="images_viewer" class="col-md-10">
    @if (isset($show_images_viewer))
        <img src="{{ $item['image_url'] }}" alt="{{ $item['title'] }}" width="200" height="100" />
        <a href="javascript:;" class="btn btn-primary btn-sm" id="btn_images_viewer">
            <i class="glyphicon glyphicon-view glyphicon-white"></i> {{ trans('actions.view_image') }}
        </a>
    @else
        <img src="{{ $item['image_url'] }}" />
    @endif
    </div>
</div>
@endif

@section('style')
<link href="{{ asset(elixir('third/dist/viewer.min.css')) }}{{ $STATIC_VERSION }}" rel="stylesheet">
@endsection

@section('script')
<script type="text/javascript" src="{{ asset(elixir('third/dist/viewer.min.js')) }}{{ $STATIC_VERSION }}"></script>
<script type="text/javascript">
var viewer = new Viewer(document.getElementById('images_viewer'));
$(function() {
    $('#btn_images_viewer').click(function() {
        viewer.show();
    })
})
</script>
@endsection