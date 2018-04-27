<label class="col-md-2 control-label">案由
@if (isset($required) && true === $required)
    <span class="star-must">*</span>
@endif
</label>
<div class="col-md-6">
    <span id="case_lable" class="show-data">
        @if(null !== old('case_cause_id_str')) 
            {{ old('case_cause_id_str') }} 
        @else
            @if (!empty($item['Document']['causes']))
                @foreach($item['Document']['causes'] as $cate)
                    {{ implode(' / ', $cate) }};
                @endforeach
            @endif
        @endif
    </span>
    <input type="hidden" name="case_cause_id_str" id="case_cause_id_str" class="name-str" value="
        @if(null !== old('case_cause_id_str'))
            {{ old('case_cause_id_str') }}
        @else
            @if (!empty($item['Document']['causes']))
                @foreach($item['Document']['causes'] as $cate)
                    {{ implode(' / ', $cate) }};
                @endforeach
            @endif
        @endif" />
    <input name="Document[case_cause_id]" class="name-array" type="hidden" value="@if(null !== old('Document')['case_cause_id']){{ old('Document')['case_cause_id'] }}@else{{ $item['Document']['case_cause_id'] }}@endif" />
    <button type="button" class="btn btn-primary trigger-btn" id="taxonomy-button" data-type="{{ $type }}">{{ $text }}</button>
</div>