@extends('layouts.guest')


@section('head')
    <title>{{ $help->title }} - Votepen</title>
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $help->title }} - Votepen" />
    <meta property="og:url" content="{{ config('app.url') }}/help/{{ $help->id }}" />
    <meta property="og:site_name" content="Votepen" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@votepen" />
    <meta name="twitter:title" content="{{ $help->title }} - Votepen" />

    <meta name="description" content="{{ $help->body }}"/>
    <meta property="og:description" content="{{ $help->body }}" />
    <meta name="twitter:description" content="{{ $help->body }}" />
    <meta property="og:image" content="/imgs/votepen.svg">
    <meta name="twitter:image" content="/imgs/votepen.svg" />
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
