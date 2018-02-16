@extends('...layouts.app')

<!-- copied from create listing -->

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">

                <div class="card-header">{{$bookmark->name}}</div>

                <div class="card-body">

                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <ul class="list-group-item"> name: {{$bookmark->name}}</ul>

                    <ul class="list-group-item"> urle: {{$bookmark->url}}</ul>


                    <hr>
                    Bio:
                    <div class="well">
                        {{$bookmark->description}}
                    </div>



                </div>
            </div>
        </div>
    </div>

@endsection