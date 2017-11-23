@extends('layouts.guest')


@section('head')
    <title>Help Center - Votepen</title>
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Help Center - Votepen" />
    <meta property="og:url" content="{{ config('app.url') }}/help" />
    <meta property="og:site_name" content="Votepen" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@votepen" />
    <meta name="twitter:title" content="Help Center - Votepen" />

    <meta name="description" content="Get instant answers for the most common questions and learn how to take the most out of Votepen."/>
    <meta property="og:description" content="Get instant answers for the most common questions and learn how to take the most out of Votepen." />
    <meta name="twitter:description" content="Get instant answers for the most common questions and learn how to take the most out of Votepen." />
    <meta property="og:image" content="/imgs/votepen.svg">
    <meta name="twitter:image" content="/imgs/votepen.svg" />
@stop


@section('content')
    <router-view></router-view>
@endsection


@section('script')
    <script>
        var preload = {
            recentQuestions: {!! $recent_questions !!},
            commonQuestions: {!! $common_questions !!}
        };
    </script>
@endsection
