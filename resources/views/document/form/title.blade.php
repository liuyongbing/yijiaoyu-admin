<label class="col-md-2 control-label">标题<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="Document[title]" class="form-control" id="title" type="text" value="@if(null !== old('Document')['title']){{ old('Document')['title'] }}@else{{ $item['title'] }}@endif">
</div>