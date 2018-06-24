@extends('layouts.main')

@section('title', trans('page_titles.list', ['model' => trans('models.' . $route)]))

@section('content')

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route($route . '.create') }}" class="btn btn-success btn-sm">
                    <i class="glyphicon glyphicon-plus glyphicon-white"></i> {{ trans('actions.add') }}
                </a>
            </div>
        </div>
        <br />
        
        <div class="row">
            <div class="col-md-12">
                <form class="form-inline" action="{{ route($route . '.index') }}">
                    <i class="glyphicon glyphicon-search"></i>

                    <!--品牌-->
                    @include('form.search.brand', [ 'style' => ['left' => 0, 'width' => 211]])
                    
                    <!--团队-->
                    @include('form.search.team', [ 'style' => ['left' => 20, 'width' => 211]])
                    
                    <!--姓名-->
                    @include('form.search.username', [ 'style' => ['left' => 20, 'width' => 211]])
                    
                    <!--状态-->
                    @include('form.search.status', [ 'style' => ['left' => 20, 'width' => 211]])
                    
                    <button class="btn btn-primary">
                        <i class="glyphicon glyphicon-search glyphicon-white"></i>
                        {{ trans('actions.search') }}
                    </button>
                </form>
            </div>
        </div>
        
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
                                    <th>{{ trans('inputs.username') }}</th>
                                    <th>{{ trans('inputs.brand') }}</th>
                                    <th>{{ trans('inputs.team') }}</th>
                                    <th>{{ trans('inputs.sort') }}</th>
                                    <th>{{ trans('inputs.status') }}</th>
                                    <th>{{ trans('inputs.operation') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if (!empty($items))
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{ $item['username'] }}</td>
                                        <td>{{ $item['brand'] }}</td>
                                        <td>{{ $item['team'] }}</td>
                                        <td>{{ $item['sort'] }}</td>
                                        <td>{{ $item['status_desc'] }}</td>
                                        <td>
                                            <a href="{{ route($route . '.edit', $item['id']) }}" target="_blank" class="btn btn-sm btn-primary">
                                                <i class="glyphicon glyphicon-edit glyphicon-white"></i>
                                                {{ trans('actions.edit') }}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                @include('include.no_data', ['column' => 10])
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
