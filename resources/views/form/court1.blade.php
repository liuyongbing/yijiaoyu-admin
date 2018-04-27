<label class="col-md-2 control-label">一审法院</label>
<div class="col-md-10">
    <input name="Document[court1]" class="form-control" id="court1" type="text" value="@if(null !== old('Document')['court1']){{ old('Document')['court1'] }}@else{{ $item['Document']['court1'] }}@endif">
</div>