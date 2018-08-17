<label class="col-md-2 control-label">{{ trans('inputs.id_number') }}</label>
<div class="col-md-10">
    <input name="Record[id_number]" class="form-control" id="id_number" type="text" value="@if(null !== old('Record')['id_number']){{ old('Record')['id_number'] }}@else{{ isset($item['id_number']) ? $item['id_number'] : '' }}@endif">
</div>