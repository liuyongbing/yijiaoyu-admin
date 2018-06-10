<label class="col-md-2 control-label">{{ trans('inputs.page') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <select name="Record[page_id]" class="form-control" >
        <option value="">请选择</option>
        @foreach($pages as $key => $page)
        <option value="{{ $key }}" @if(!empty($item['page_id']) && $key == $item['page_id'])) selected="selected" @endif>{{ $page }}</option>
        @endforeach
    </select>
</div>