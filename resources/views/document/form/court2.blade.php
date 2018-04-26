<label class="col-md-2 control-label">二审法院</label>
<div class="col-md-10">
    <input name="Document[court2]" class="form-control" id="court2" type="text" value="@if(null !== old('Document')['court2']){{ old('Document')['court2'] }}@else{{ $item['Document']['court2'] }}@endif">
</div>