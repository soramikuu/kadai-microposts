@extends('layouts.app')

@section('content')
    @include('users.users', ['users' => $users]) <!-- 第一引数はコンテンツ挿入先のフォルダ.ファイル。第二引数で読み込み先で利用する変数を渡せる -->
@endsection