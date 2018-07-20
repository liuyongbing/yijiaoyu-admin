@extends('layouts.main')

@section('title', trans('page_titles.list', ['model' => trans('models.' . $route)]))

@section('content')

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route($route . '.create', ['course_id' => $courseId]) }}" class="btn btn-success btn-sm">
                    <i class="glyphicon glyphicon-plus glyphicon-white"></i> {{ trans('actions.add') }}
                </a>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted bootstrap-admin-box-title">{{ trans('models.' . $route) }}{{ trans('actions.list') }}</div>
                        <div class="pull-right"><span class="badge"></span></div>
                    </div>
                    <div class="bootstrap-admin-panel-content">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{ trans('inputs.course') }}</th>
                                    <th>{{ trans('inputs.class_number') }}</th>
                                    <th>{{ trans('inputs.status') }}</th>
                                    <th>{{ trans('inputs.operation') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if (!empty($items))
                                @foreach($items as $key => $item)
                                    <tr>
                                        <td>{{ $item['course_name'] }}</td>
                                        <td>{{ $item['class_number'] }}</td>
                                        <td>{{ $item['status_desc'] }}</td>
                                        <td>
                                            <a href="{{ route($route . '.edit', $item['id']) }}" target="_blank" class="btn btn-sm btn-primary">
                                                <i class="glyphicon glyphicon-edit glyphicon-white"></i>
                                                {{ trans('actions.edit') }}
                                            </a>
                                            <button class="btn btn-delete btn-danger" data-id="{{ $item['id'] }}">
                                                <i class="glyphicon glyphicon-delete glyphicon-white"></i>
                                                {{ trans('actions.delete') }}
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                @include('include.no_data')
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.pagination', [
            'route' => $pagination['route'],
            'total' => $pagination['total'],
            'page' => $pagination['page'],
            'size' => $pagination['size'],
            'filters' => $filters
        ])
    </div>
@endsection


@section('style')
<link href="{{ asset(elixir('third/jquery-confirm/jquery-confirm.min.css')) }}{{ $STATIC_VERSION }}" rel="stylesheet">
@endsection

@section('script')
<script type="text/javascript" src="{{ asset(elixir('third/jquery-confirm/jquery-confirm.min.js')) }}{{ $STATIC_VERSION }}"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.btn-delete').click(function() {
        var item_id = $(this).attr('data-id');
        $.confirm({
            title: '系统提示',
            content: '确认要删除吗？',
            type:'red',
            icon:'glyphicon glyphicon-question-sign',
            buttons: {
                ok: {
                    text: '确认',
                    btnClass: 'btn-primary',
                    action: function(){
                        $.ajax({
                            method: "DELETE",
                            url: 'teachings/' + item_id,
                            data: { 
                                '_token' : '{{ csrf_token() }}',
                                'id' : item_id,
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.message == 'OK') {
                                    $.alert({
                                        type:'green',
                                        title: '系统提示',
                                        content: '删除成功',
                                        icon:'glyphicon glyphicon-info-sign'
                                    });
                                }
                                
                                window.location.reload();
                            },
                            error: function (XMLHttpRequest, textStatus, errorThrown)
                            {
                                showNotice('服务器错误');
                            }
                        })
                    }
                },
                cancel: {
                    text: '取消',
                    btnClass: 'btn-primary',
                    action: function(){
                        // button action.
                    }
                },
            }
        });
    });
});
</script>
@endsection
