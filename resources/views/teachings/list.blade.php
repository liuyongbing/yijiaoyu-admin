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
                                    <th>{{ trans('inputs.page_number') }}</th>
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
                                        <td>{{ $item['sort'] }}</td>
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

@section('script')
<script type="text/javascript">
$(document).ready(function() {
    $('.btn-delete').click(function() {
        var confirm = confirm('确定删除吗?');
alert(confirm);
console.log(confirm);
        if (confirm)
        {
            $.ajax({
                method: "DELETE",
                url: 'teachings/' + $(this).attr('data-id'),
                data: { 
                    '_token' : '{{ csrf_token() }}',
                    'id' : $(this).attr('data-id'),
                },
                dataType: 'json',
                success: function(response) {
                    if (response.message == 'OK') {
                        alert('删除成功!');
                    }
                    
                    window.location.reload();
                },
                error: function (XMLHttpRequest, textStatus, errorThrown)
                {
                    alert('服务器错误');
                }
            })
        }
    });
});
</script>
@endsection
