@extends('webforms::default')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <h3 class="panel-title">
                            Webform Index
                        </h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($webforms as $webform)
                                <li class="list-group-item">
                                    <p>
                                        <a class="btn btn-default btn-sm pull-right" href="/webforms/{{ $webform->id }}">
                                            <i class="fa fa-eye">&nbsp;view</i>
                                        </a>
                                        <a href="/webforms/{{ $webform->id }}/edit">
                                            Webform Edit: {{ $webform->id }}
                                        </a>
                                    </p>
                                </li>
                            @endforeach
                        </ul>

                        {{ $webforms->links() }}
                    </div>
                    <div class="panel-footer">
                        <a class="btn btn-success" href="/webforms/create">Create Webform</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection