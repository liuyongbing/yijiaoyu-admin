<label class="col-md-2 control-label">{{ trans('inputs.class_number') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <select name="Record[class_number]" class="form-control" >
        <option value="">请选择</option>
        @for($num = 1; $num <= $course['class_total']; $num++)
        <option value="{{ $num }}" @if(!empty($item['class_number']) && $num == $item['class_number'])) selected="selected" @endif>{{ $num }}</option>
        @endfor
    </select>
</div>