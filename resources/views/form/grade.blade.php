<label class="col-md-2 control-label">{{ trans('inputs.grade') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="grade_title" class="form-control" id="grade_title" type="text" value="{{ isset($grade['title']) ? $grade['title'] : '' }}" readonly="readonly" />
    <input name="Record[grade_id]" class="form-control" id="grade_id" type="hidden" value="@if(null !== old('Record')['grade_id']){{ old('Record')['grade_id'] }}@else{{ isset($item['grade_id']) ? $item['grade_id'] : '' }}@endif">
</div>