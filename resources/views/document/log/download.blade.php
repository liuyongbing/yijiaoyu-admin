插入/更新{{"\r\n"}}@forelse ($list['insert'] as $key => $log)@if($key !== 0)@endif guid:{{ $log['guid'] }}, origin_id:{{ $log['origin_id'] }}{{"\r\n"}}@empty无数据@endforelse{{"\r\n\r\n"}}删除{{"\r\n"}}@forelse ($list['delete'] as $key => $log)@if($key !== 0)@endif guid:{{ $log['guid'] }}, origin_id:{{ $log['origin_id'] }}{{"\r\n"}}@empty无数据@endforelse{{"\r\n"}}{{"\r\n"}}{{"\r\n"}}{{"\r\n"}}