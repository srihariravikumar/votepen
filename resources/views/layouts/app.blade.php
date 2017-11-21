<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('head')
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <script src="assets/socket.io.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.7/lib/js/emojione.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.7/assets/css/emojione.min.css"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        window.Laravel = @json([
            'csrfToken' => csrf_token(),
            'env' => config('app.env'),
            'pusherKey' => config('broadcasting.connections.pusher.key'),
            'pusherCluster' => config('broadcasting.connections.pusher.options.cluster'),
        ])
    </script>

    <link rel="shortcut icon" href="/imgs/favicon.png">
    @include('user.user-style')
</head>

<body>
@include('google-analytics')

<div id="tagvote-app" :class="{ 'background-white': Store.contentRouter != 'content' }">
    @include('app-header')

    <div class="v-content-wrapper">
		<div class="v-side {{ settings('sidebar_color') }}" v-show="sidebar">
		    <sidebar></sidebar>
		</div>

		<notifications v-show="Store.contentRouter == 'notifications'"></notifications>
		<messages v-show="Store.contentRouter == 'messages'" :sidebar="sidebar"></messages>
		<search-modal v-if="Store.contentRouter == 'search'" :sidebar="sidebar"></search-modal>

        <div class="v-content" id="v-content" v-show="Store.contentRouter == 'content'" @scroll="scrolled">
            <transition name="fade">
                <report-submission v-if="modalRouter == 'report-submission'" :submission="reportSubmissionId" :category="reportCategory" :sidebar="sidebar"></report-submission>
                <report-comment v-if="modalRouter == 'report-comment'" :comment="reportCommentId" :category="reportCategory" :sidebar="sidebar"></report-comment>
                <rules v-if="modalRouter == 'rules'" :sidebar="sidebar"></rules>
                <moderators v-if="modalRouter == 'moderators'" :sidebar="sidebar"></moderators>
                <keyboard-shortcuts-guide v-if="modalRouter == 'keyboard-shortcuts-guide'" :sidebar="sidebar"></keyboard-shortcuts-guide>
                <markdown-guide v-if="modalRouter == 'markdown-guide'" :sidebar="sidebar"></markdown-guide>
            </transition>
            <crop-modal v-if="modalRouter == 'crop-user'" :sidebar="sidebar" :type="'user'"></crop-modal>
            <crop-modal v-if="modalRouter == 'crop-category'" :sidebar="sidebar" :type="'category'"></crop-modal>

            <div :class="{ 'v-blur-blackandwhite': smallModal }">
                @yield('content')
            </div>
        </div>
    </div>

    <scroll-button></scroll-button>
</div>

@include('php-to-js-data')

@yield('script')
	<script src="{{ mix('/js/manifest.js') }}"></script>
	<script src="{{ mix('/js/vendor.js') }}"></script>
	<script src="{{ mix('/js/app.js') }}"></script>
@yield('footer')

</body>
</html>
