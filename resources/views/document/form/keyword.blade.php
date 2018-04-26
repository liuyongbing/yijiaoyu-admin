<label class="col-md-2 control-label">关键词</label>
<div class="col-md-10">
    <input name="Document[keyword]" class="form-control" id="keyword" type="text" value="@if(null !== old('Document')['keyword']){{ old('Document')['keyword'] }}@else{{ isset($item['Document']['keyword']) ? $item['Document']['keyword'] : '' }}@endif">
</div>