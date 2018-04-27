<label class="col-md-2 control-label">标题<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="Record[title]" class="form-control" id="title" type="text" value="@if(null !== old('Record')['title']){{ old('Record')['title'] }}@else{{ isset($item['title']) ? $item['title'] : '' }}@endif">
</div>