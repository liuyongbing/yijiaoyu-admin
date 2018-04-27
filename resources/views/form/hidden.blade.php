                            @if($action == 'edit')
                            <input name="Document[_id]" type="hidden" value="{{ $item['Document']['_id'] }}" />
                            @endif
                            <input name="Document[guid]" type="hidden" value="{{ !empty($item['Document']['guid']) ? $item['Document']['guid'] : '' }}" />
                            <input name="Document[provider_id]" type="hidden" value="{{ $item['Document']['provider_id'] }}" />
