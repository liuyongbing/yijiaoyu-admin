                    &nbsp;<b>是否显示</b>
                    <select name="visibility" class="form-control" >
                        <option value="">全部</option>
                        <option value="1" @if($filters['visibility'] === '1') selected="selected" @endif>是</option>
                        <option value="0" @if($filters['visibility'] === '0') selected="selected" @endif>否</option>
                    </select>