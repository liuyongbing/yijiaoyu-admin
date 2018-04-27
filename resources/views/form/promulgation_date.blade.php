<label class="col-md-2 control-label">发文日期<span class="star-must">*</span></label>
<div class="col-md-5">
    <input name="Document[promulgation_date]" class="form-control 
    @if(!empty($item['Document']['translation_id']) && 'en' == $item['Document']['lang']) @else datepicker @endif" id="promulgation_date" type="text" value="@if(null !== old('Document')['promulgation_date']){{ old('Document')['promulgation_date'] }}@else{{ $item['Document']['promulgation_date'] }}@endif" 
    @if(!empty($item['Document']['translation_id']) && 'en' == $item['Document']['lang'])
        readonly="readonly"
    @endif />
</div>