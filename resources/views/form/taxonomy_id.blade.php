<label class="col-md-2 control-label">法学分类<span class="star-must">*</span></label>
<div class="col-md-6">
    <span id="taxonomy_lable" class="show-data">
        @if(null !== old('taxonomy_id_str')) 
            {{ old('taxonomy_id_str') }} 
        @else
            @if (!empty($item['Document']['taxonomy']))
                @foreach($item['Document']['taxonomy'] as $taxonomy)
                    {{ implode(' / ', $taxonomy) }};
                @endforeach
            @endif
        @endif
    </span>
    <input type="hidden" name="taxonomy_id_str" class="name-str" id="taxonomy_id_str" value="
        @if(null !== old('taxonomy_id_str'))
            {{ old('taxonomy_id_str') }}
        @else
            @if (!empty($item['Document']['taxonomy']))
                @foreach($item['Document']['taxonomy'] as $taxonomy)
                    {{ implode(' / ', $taxonomy) }};
                @endforeach
            @endif
        @endif" />
    <input name="Document[taxonomy_id]" class="name-array" type="hidden" value="@if(null !== old('Document')['taxonomy_id']){{ old('Document')['taxonomy_id'] }}@else{{ $item['Document']['taxonomy_id'] }}@endif">
    <!-- Button trigger modal -->
    @if(!empty($item['Document']['translation_id']) && 'en' == $item['Document']['lang']) 
     
    @else 
    <button type="button" class="btn btn-primary trigger-btn" id="taxonomy-button" data-type="{{ $type }}">{{ $text }}</button>
    @endif
</div>