@extends('...layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>
                        bookmarks
                        <hr>
                        <br>

                        @if(count($bookmarks))
                            <ul class="list-group">


                            @foreach($bookmarks as $bookmark)
                                <li class="list-group-item">

                                <!--will go to show function-->
                                <a href="/bookmarks/{{$bookmark->id}}">
                                    {{$bookmark->name}}
                                    <br>
                                    {{$bookmark->url}}
                                </a>

                                </li>
                            @endforeach
                            </ul>
                        @endif

                    </h3>


                </div>
            </div>
        </div>
    </div>

@endsection
