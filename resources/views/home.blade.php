@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @include('inc.messages')

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add Bookmark</button>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection



<!--modal -->
<div class="modal" tabindex="-1" role="dialog" id="addModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Bookmark</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>



      <div class="modal-body">
        <p>Modal body text goes here.</p>

        {!! Form::open(['action' => 'BookmarksController@store','method'=>'post']) !!}

        {{Form::bsText('name','',[])}}
        {{Form::bsText('url','',[])}}
        {{Form::bsTextArea('description','',[])}}

        {{Form::bsSubmit('submit me',['class'=>'btn btn-primary'])}}

        {!! Form::close() !!}

      </div>


{{--      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>--}}

    </div>
  </div>
</div>
