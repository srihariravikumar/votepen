@extends('layouts.guest')


@section('head')
    <title>{{ $help->title }} - Tagvote</title>
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $help->title }} - Tagvote" />
    <meta property="og:url" content="{{ config('app.url') }}/help/{{ $help->id }}" />
    <meta property="og:site_name" content="Tagvote" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@tagvote" />
    <meta name="twitter:title" content="{{ $help->title }} - Tagvote" />

    <meta name="description" content="{{ $help->body }}"/>
    <meta property="og:description" content="{{ $help->body }}" />
    <meta name="twitter:description" content="{{ $help->body }}" />
    <meta property="og:image" content="/imgs/tagvote-circle.png">
    <meta name="twitter:image" content="/imgs/tagvote-circle.png" />
@stop


@section('content')
    <router-view></router-view>
@endsection


@section('script')
    <script>
        var preload = {
            help: {!! $help !!}
        };
    </script>
@endsection
