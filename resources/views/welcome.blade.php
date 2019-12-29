@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
    @else
    <div class="center jumbotron">　 <!-- トップ見出し -->
        <div class="text-center">
            <h1>Welcome to the Microposts</h1>
            {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-success']) !!} <!-- web.phpでつけた名前をURLに指定（signup.get）。これは、signup.postとの違いを区別している（どちらもURL自体は'login'） -->
        </div>
    </div>
    @endif
@endsection