<label class="col-md-2 control-label">{{ trans('inputs.gender') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <select name="Record[gender]" class="form-control" >
        <option value="">请选择</option>
        @foreach($gender as $key => $val)
        <option value="{{ $val }}" @if(!empty($item['gender']) && $val == $item['gender'])) selected="selected" @endif>{{ $val }}</option>
        @endforeach
    </select>
</div>