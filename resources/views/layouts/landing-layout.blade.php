<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('title')
    @yield('head')

    <meta property="og:locale" content="en_US" />
    <meta property="og:site_name" content="votepen.com" />

    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,700" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/votepen-cdn@2.0.0/js/socket.io.min.js"></script>

    <link href="/icons/css/fontello.7.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            'env' => config('app.env')
        ]); ?>
    </script>

    <link rel="shortcut icon" href="/imgs/favicon.png">
</head>
<body>
@include('google-analytics')
	<div id="landing">


		<div class="header user-select">
			<div class="logo">
				<a href="/">
					<img src="/imgs/votepen-logo.png" alt="votepen.com">
					Votepen
				</a>
			</div>

			<div class="right-menu">
				<a href="https://medium.com/votepen" target="_blank" class="item desktop-only">
					<i class="v-icon v-blog go-yellow"></i>
					Blog
				</a>
				<a href="mailto:support@votepen.com" class="item desktop-only">
					<i class="v-icon v-letter go-green"></i>
					Contact
				</a>
				<a href="mailto:press@votepen.com" class="item desktop-only">
					<i class="v-icon v-press go-red"></i>
					Press
				</a>
				<a href="/credits" class="item desktop-only">
					<i class="v-icon v-credits go-primary"></i>
					Credits
				</a>

				@if(Auth::check())
					<a href="/" class="v-button v-button--primary">
			            {{ Auth::user()->username }}
			        </a>
				@else
					<a href="/login" class="v-button v-button--primary">
			            Sign in
			        </a>
				@endif

			</div>

		</div>


		@yield('content')


		<footer class="user-select">
			<div class="flex1">
				<h3 class="go-primary">Votepen 	&#10084;</h3>
				<ul>
					<li><a href="/about">About</a></li>

					@if(Auth::check())
						<li><a href="/logout">Sign out</a></li>
					@else
						<li><a href="/register">Sign Up</a></li>
					@endif

					<li><a href="/tos">Terms of Service</a></li>
					<li><a href="/privacy-policy">Privacy Policy</a></li>
				</ul>
			</div>
			<div class="flex1">
				<h3 class="go-red">Get to know Votepen </h3>
				<ul>
					<li><a href="/credits">Credits</a></li>
					<li><a href="/help">Help Center</a></li>
				</ul>
			</div>
			<div class="flex1">
				<h3 class="go-green">Follow Votepen</h3>
				<ul>
					<li><a href="https://medium.com/votepen" target="_blank">Blog</a></li>
					<li><a href="https://github.com/votepen/votepen" target="_blank">Github</a></li>
					<li><a href="https://twitter.com/votepen/" target="_blank">Twitter</a></li>
					<li><a href="https://facebook.com/votepen.com/" target="_blank">Facebook</a></li>
				</ul>
			</div>
		</footer>
    </div>

	<script src="{{ mix('/js/manifest.js') }}"></script>
	<script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('js/landing.js') }}"></script>
    @yield('script')
</body>
</html>
