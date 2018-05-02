<label class="col-md-2 control-label">{{ trans('inputs.course') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <select name="Record[course_id]" class="form-control" >
        <option value="">请选择</option>
        @foreach($grades as $grade)
        <option value="{{ $grade['id'] }}" @if(!empty($item['course_id']) && $grade['id'] == $item['course_id'])) selected="selected" @endif>{{ $grade['title'] }}</option>
        @endforeach
    </select>
</div>