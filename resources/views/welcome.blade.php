@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-sm-4">
                @include('users.card', ['user' => Auth::user()])
            </aside>
            <div class="col-sm-8">
                @if (Auth::id() == $user->id)
                    {!! Form::open(['route' => 'microposts.store']) !!}
                        <div class="form-group">
                            {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                            {!! Form::submit('Post', ['class' => 'btn btn-info btn-block']) !!}
                        </div>
                    {!! Form::close() !!}
                @endif
                @if (count($microposts) > 0)
                    @include('microposts.microposts', ['microposts' => $microposts])
                @endif
            </div>
        </div>
    @else
    <div class="center jumbotron">　 <!-- トップ見出し -->
        <div class="text-center">
            <h1>Welcome to the Microposts</h1>
            {!! link_to_route('signup.get', 'Sign up now!', [], 
            ['class' => 'btn btn-success']) !!} <!-- web.phpでつけた名前をURLに指定（signup.get）。これは、signup.postとの違いを区別している（どちらもURL自体は'login'） -->
        </div>
    </div>
    @endif
@endsection