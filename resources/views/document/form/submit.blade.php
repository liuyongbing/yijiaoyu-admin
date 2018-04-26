<div class="col-md-2">
</div>
@if (isset($item['Document']['has_translation_process']) && true !== $item['Document']['has_translation_process'])
<div class="col-md-10">
    <button type="submit" class="btn btn-primary">确定</button>&nbsp;
    <a href="{{ route($route) }}"><button type="button" class="btn btn-default">取消</button></a>
</div>
@endif