@extends('layouts.app')

@section('content')
    <div class="center jumbotron">　 <!-- トップ見出し -->
        <div class="text-center">
            <h1>Welcome to the Microposts</h1>
            {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-success']) !!}
        </div>
    </div>
@endsection