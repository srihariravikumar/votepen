@extends('layouts.guest')


@section('head')
	<title>{{ $submission->title }} - Tagvote</title>
	<meta property="og:type" content="article" />
	<meta property="og:title" content="{{ $submission->title }} - Tagvote" />
	<meta property="og:url" content="{{ config('app.url') }}/c/{{ $submission->category_name }}/{{ $submission->slug }}" />
	<meta property="og:site_name" content="Tagvote" />

	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@tagvote" />
	<meta name="twitter:title" content="{{ $submission->title }} - Tagvote" />

	@if ($submission->type == "text")
		<meta name="description" content="{{ $submission->data['text'] }}"/>
		<meta property="og:description" content="{{ $submission->data['text'] }}" />
		<meta name="twitter:description" content="{{ $submission->data['text'] }}" />
		<meta property="og:image" content="/imgs/tagvote.svg">
		<meta name="twitter:image" content="/imgs/tagvote.svg" />
	@else
		<meta property="og:image" content="{{ $submission->data['thumbnail'] ?? $submission->data['path'] ?? '/imgs/tagvote.svg' }}" />
		<meta name="twitter:image" content="{{ $submission->data['thumbnail'] ?? $submission->data['path'] ?? '/imgs/tagvote.svg' }}" />
	@endif
@stop


@section('content')
	<router-view></router-view>
@endsection


@section('script')
	<script>
		var preload = {
			submission: {!! $submission !!}
		};
	</script>
@endsection
