@extends('layouts.guest')


@section('head')
    <title>Help Center - Tagvote</title>
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Help Center - Tagvote" />
    <meta property="og:url" content="{{ config('app.url') }}/help" />
    <meta property="og:site_name" content="Tagvote" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@tagvote" />
    <meta name="twitter:title" content="Help Center - Tagvote" />

    <meta name="description" content="Get instant answers for the most common questions and learn how to take the most out of Tagvote."/>
    <meta property="og:description" content="Get instant answers for the most common questions and learn how to take the most out of Tagvote." />
    <meta name="twitter:description" content="Get instant answers for the most common questions and learn how to take the most out of Tagvote." />
    <meta property="og:image" content="/imgs/tagvote-circle.png">
    <meta name="twitter:image" content="/imgs/tagvote-circle.png" />
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
