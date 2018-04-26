<label class="col-md-2 control-label">内容来源</label>
<div class="col-md-5">
    <input name="Document[source]" class="form-control" id="source" type="text" value="@if(null !== old('Document')['source']){{ old('Document')['source'] }}@else{{ $item['Document']['source'] }}@endif">
</div>