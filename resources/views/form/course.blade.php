<label class="col-md-2 control-label">{{ trans('inputs.course') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="course_title" class="form-control" id="course_title" type="text" value="{{ isset($course['title']) ? $course['title'] : '' }}" readonly="readonly" />
    <input name="Record[course_id]" class="form-control" id="course_id" type="hidden" value="@if(null !== old('Record')['course_id']){{ old('Record')['course_id'] }}@else{{ isset($item['course_id']) ? $item['course_id'] : '' }}@endif">
</div>