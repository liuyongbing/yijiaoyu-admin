@if(isset($errors) && count($errors->all()) > 0)
    <div class="row">
        <div class="col-lg-12">
            <div class="alert
                @if(isset($alertSuccess) && $alertSuccess)
                    alert-success
                @else
                    alert-warning
                @endif
            ">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h4>
                    @foreach($errors->all() as $e)
                        <span class="help-block">{{ $e }}</span>
                    @endforeach
                </h4>
            </div>
        </div>
    </div>
@elseif(isset($item['Document']['has_translation_process']) && (true === $item['Document']['has_translation_process']))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert
                @if(isset($alertSuccess) && $alertSuccess)
                    alert-success
                @else
                    alert-warning
                @endif
            ">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h4>
                    @foreach($item['Document']['notice_messages'] as $e)
                        <span class="help-block">{{ $e }}</span>
                    @endforeach
                </h4>
            </div>
        </div>
    </div>
@endif