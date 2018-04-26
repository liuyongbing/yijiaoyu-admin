<label class="col-md-2 control-label">地区
@if (isset($required) && true === $required)
    <span class="star-must">*</span>
@endif
</label>
<div class="col-md-10 region-parent">
    <input class="region-str" name="Document[region]" type="hidden" value="@if(null !== old('Document')['region']){{ old('Document')['region'] }}@else{{ $item['Document']['region'] }}@endif" />
    @if(!empty($item['Document']['translation_id']) && 'en' == $item['Document']['lang'])
        <input type="text" value="{{ (explode('@', $item['Document']['region']))[0] }}" class="form-control select-child" readonly="readonly" />
        @if (false !== strpos($item['Document']['region'], '@'))
        <input type="text" value="{{ (explode('@', $item['Document']['region']))[1] }}" class="form-control select-child" readonly="readonly" />
        @endif
        @if (!empty($item['Document']['region_id']))
            <input type="hidden" name="Document[region_id][]" value="{{ $item['Document']['region_id'][0] }}" />
            @if (1 < count($item['Document']['region_id']))
            <input type="hidden" name="Document[region_id][]" value="{{ $item['Document']['region_id'][1] }}" />
            @endif
        @endif
    @else
    <select name="Document[region_id][]" class="form-control select-child select-province" id="region_id">
    @foreach($regions as $region)
        <option value="{{ $region['id'] }}" 
        @if(old('Document')['region_id'] == $region['id'])
            selected="selected"
        @elseif(in_array($region['id'], $item['Document']['region_id']))
            selected="selected"
        @elseif($item['Document']['region'] == $region['title_' . $item['Document']['lang']])
            selected="selected"
        @endif>
            {{ $region['title_' . $item['Document']['lang']] }}
        </option>
    @endforeach
    </select>
    <select name="Document[region_id][]" class="form-control select-child select-city hide"></select>
    @endif
</div>