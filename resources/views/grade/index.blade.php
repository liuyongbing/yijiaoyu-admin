@extends('layouts.main')

@section('title', trans('page_titles.list', ['model' => trans('models.grade')]))

@section('content')

    <div class="col-md-12">
        <!--div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1>班级</h1>
                </div>
            </div>
        </div-->
        <!--div class="row">
            <div class="col-md-12">
                <form class="form-inline" action="{{ route('grades.index') }}">
                    <i class="glyphicon glyphicon-search"></i>
                    <button class="btn btn-sm btn-primary">
                        <b>Search</b>
                    </button>
                </form>
            </div>
        </div>
        <br /-->
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('grades.create') }}" class="btn btn-success btn-sm">
                    <i class="glyphicon glyphicon-plus glyphicon-white"></i> {{ trans('actions.add') }}
                </a>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted bootstrap-admin-box-title">{{ trans('actions.list') }}</div>
                        <div class="pull-right"><span class="badge"></span></div>
                    </div>
                    <div class="bootstrap-admin-panel-content">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{ trans('inputs.name') }}</th>
                                    <th>{{ trans('inputs.sort') }}</th>
                                    <th>{{ trans('inputs.status') }}</th>
                                    <th>{{ trans('inputs.operation') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td><a title="{{$item['title']}}" href="{{ route('grades.edit', $item['id']) }}" target="_blank">{{ $item['title'] }}</a></td>
                                        <td>{{ $item['sort'] }}</td>
                                        <td>{{ $item['status_desc'] }}</td>
                                        <td>
                                            <a href="{{ route('grades.edit', $item['id']) }}" target="_blank" class="btn btn-sm btn-primary">
                                                <i class="glyphicon glyphicon-edit glyphicon-white"></i>
                                                    {{ trans('actions.edit') }}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
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


