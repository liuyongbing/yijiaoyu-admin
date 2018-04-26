<label class="col-md-2 control-label">对应翻译文章ID</label>
<div class="col-md-7">
    <input style="width:362px;display:inline-block;" name="Document[translation_id]" class="form-control" id="translation_id" type="text" value="@if(null !== old('Document')['translation_id']){{ old('Document')['translation_id'] }}@else{{ $item['Document']['translation_id'] }}@endif" />
    @if ($item['Document']['translation_id'])
    <a href="{{ env('OCL_WEB_HOST') . '/documents/' . $item['Document']['translation_id'] . '?content_type=' . $item['Document']['content_type'] }}" target="_blank">预览翻译文章</a>
    @endif
</div>