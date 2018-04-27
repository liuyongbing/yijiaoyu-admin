<label class="col-md-2 control-label">文号</label>
<div class="col-md-10">
    <input name="Document[issue_no]" class="form-control" id="issue_no" type="text" value="@if(null !== old('Document')['issue_no']){{ old('Document')['issue_no'] }}@else{{ $item['Document']['issue_no'] }}@endif">
</div>