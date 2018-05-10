<label class="col-md-2 control-label">{{ trans('inputs.category') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <select name="Record[category_id]" class="form-control" >
        <option value="">请选择</option>
        @foreach($categories as $cate)
        <option value="{{ $cate['id'] }}" @if(!empty($item['category_id']) && $cate['id'] == $item['category_id'])) selected="selected" @endif>{{ $cate['title'] }}</option>
        @endforeach
    </select>
</div>