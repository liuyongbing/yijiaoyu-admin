<label class="col-md-2 control-label">{{ trans('inputs.team') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <select name="Record[team_type]" class="form-control" >
        <option value="">请选择</option>
        @foreach($teams as $key => $team)
        <option value="{{ $key }}" @if(!empty($item['team_id']) && $key == $item['team_id'])) selected="selected" @endif>{{ $team }}</option>
        @endforeach
    </select>
</div>