<label class="col-md-2 control-label">{{ trans('inputs.grade') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <select name="Record[grade_id]" class="form-control" >
        <option value="">请选择</option>
        @foreach($grades as $grade)
        <option value="{{ $grade['id'] }}" @if(!empty($item['grade_id']) && $grade['id'] == $item['grade_id'])) selected="selected" @endif>{{ $grade['title'] }}</option>
        @endforeach
    </select>
</div>