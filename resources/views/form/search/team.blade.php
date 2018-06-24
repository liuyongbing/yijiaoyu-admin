<label style="margin-left: {{ isset($style['left']) ? $style['left'] : '20' }}px">
    {{ trans('inputs.team') }}
    <select name="team_type" class="form-control" style="width: {{ isset($style['width']) ? $style['width'] : '150' }}px" >
        <option value="">请选择</option>
        @foreach($teams as $key => $team)
        <option value="{{ $key }}" @if($key == (int)$filters['team_type']) selected="selected" @endif>{{ $team }}</option>
        @endforeach
    </select>
</label>