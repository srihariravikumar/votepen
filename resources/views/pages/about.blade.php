@extends('layouts.landing-layout')


@section('head')
	<title>About | Votepen</title>
	<meta property="og:type" content="article" />
	<meta property="og:title" content="About | Votepen" />
	<meta property="og:url" content="{{ config('app.url') }}/about" />
	<meta property="og:site_name" content="Votepen" />

	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@votepen" />
	<meta name="twitter:title" content="About | Votepen" />

	<meta name="description" content="We are a small team of developers risen from the world of open-source. We believe in an open and modern Internet. Votepen's mission is to give people the power to share their content with not just their friends but the world and interact in real-time."/>
	<meta property="og:description" content="We are a small team of developers risen from the world of open-source. We believe in an open and modern Internet. Votepen's mission is to give people the power to share their content with not just their friends but the world and interact in real-time." />
	<meta name="twitter:description" content="We are a small team of developers risen from the world of open-source. We believe in an open and modern Internet. Votepen's mission is to give people the power to share their content with not just their friends but the world and interact in real-time." />
	<meta property="og:image" content="{{ config('app.url') }}/imgs/votepen.svg">
	<meta name="twitter:image" content="{{ config('app.url') }}/imgs/votepen.svg" />

	<script type="application/ld+json">
	 {
		 "@context": "http://schema.org",
		 "@type": "WebSite",
		 "url": "https://votepen.co",
		 "name": "Votepen",
			"publisher": {
			 "@type": "Organization",
		  "logo": {
			  "@type": "ImageObject",
				 "url": "https://votepen.com/imgs/votepen.svg",
				 "name": "Votepen",
				 "height": "457",
				 "width": "457"
				}
			},
		 "sameAs": [
			 "https://www.facebook.com/votepen/",
			 "https://twitter.com/votepen"
		 ],
		 "potentialAction": {
			"@type": "SearchAction",
			"target": "https://votepen.com/?search={search_term_string}",
			"query-input": "required name=search_term_string"
		 }
	 }
	 </script>
@endsection


@section('content')
	<div class="about-wrapper mobile-padding">
		<div class="align-center">
			<img src="{{ config('app.url') }}/imgs/votepen.svg" alt="Votepen" class="about-logo margin-bottom-1">

			<h1 class="title">
				Social Bookmarking to Stay Updated
			</h1>
		</div>


		<p>
			We are a small team of developers risen from the world of open-source. We believe in an open and modern Internet.
Votepen's mission is to give people the power to share their content with not just their friends but the world and interact in real-time.
		</p>

		<br>
		<h2 class="title">Users are voters</h2>
		<p>
			On Votepen users are in charge. They get to decide what deserves more attention by voting. After all the word "Votepen" means "vote" in German and Spanish.
		</p>

		<br>
		<h2 class="title">Designed for Stay Updated</h2>
		<p>
			Thanks to the power of open-source community, Votepen has become the most modern social bookmarking platform on the Internet. It's been developed from scratch to work with latest web technologies such as WebSockets. Voters have full control over their browsing experience. Votepen's UI is highly customizable yet deadly simple.
		</p>

		<br>
		<h2 class="title">An open-source project</h2>
		<p>
			 It gets even better: Votepen is 100% <a href="https://github.com/votepen/votepen" target="_blank">open-source!</a> Yes, we've got nothing to hide. We also like the idea of giving back something to the open-source community. We also have awesome developer users who directly contribute in Votepen's development.
		</p>
	</div>


@endsection
