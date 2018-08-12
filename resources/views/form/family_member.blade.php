<label class="col-md-2 control-label">{{ trans('inputs.family_member.' . $relation) }}</label>
<div class="col-md-10">
    
    <input type="text" class="form-control" placeholder="姓名" name="Record[family_member][{{ $relation }}][name]" value="{{ isset($item['family_members'][$relation]['name']) ? $item['family_members'][$relation]['name'] : '' }}"  style="width: 228px;float:left" />
    
    <input type="text" class="form-control" placeholder="手机" name="Record[family_member][{{ $relation }}][mobile]" value="{{ isset($item['family_members'][$relation]['mobile']) ? $item['family_members'][$relation]['mobile'] : '' }}" style="width: 228px;float:left"  />
    
    <input type="text" class="form-control" placeholder="行业" name="Record[family_member][{{ $relation }}][industry]" value="{{ isset($item['family_members'][$relation]['industry']) ? $item['family_members'][$relation]['industry'] : '' }}" style="width: 228px;float:left"  />
    
    <input type="text" class="form-control" placeholder="职位" name="Record[family_member][{{ $relation }}][post]" value="{{ isset($item['family_members'][$relation]['post']) ? $item['family_members'][$relation]['post'] : '' }}" style="width: 228px"  />
    
    <input type="hidden" name="Record[family_member][{{ $relation }}][id]" value="{{ isset($item['family_members'][$relation]['id']) ? $item['family_members'][$relation]['id'] : '' }}" />
</div>