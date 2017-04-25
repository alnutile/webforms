@extends('webforms::default')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Webform Create
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form action="/webforms" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            @include('webforms::_form')

                            <div class="well well-sm">
                                <button type="submit" class="btn btn-primary" name="submit" id="submit">Save</button>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                        <a class="btn btn-default" href="/webforms">Webform Index</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection