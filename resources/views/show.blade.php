@extends('webforms::default')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <h3 class="panel-title">
                            Webform
                        </h3>
                    </div>
                    <div class="panel-body">
                        @foreach($webforms->data as $webform_key => $webform)

                            @if($webform['show_element'])

                                <h2>{{ $webform['title'] }}</h2>

                                <p>
                                    @if($webform['field_element'] == 'multiple_select' || $webform['field_element'] == 'select')
                                        {{ $webform['values'][$webform['default_value']] }}
                                    @else
                                        {{ $webform['default_value'] }}
                                    @endif
                                </p>
                            @endif

                        @endforeach
                    </div>
                    <div class="panel-footer">
                        <a class="btn btn-success" href="/webforms">Webform Index</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection