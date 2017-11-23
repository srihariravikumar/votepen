@extends('layouts.guest')


@section('content')
	<router-view></router-view>
@endsection


@section('head')
	<title>Votepen - Stay Updated</title>
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Votepen - Stay Updated" />
	<meta property="og:url" content="{{ config('app.url') }}" />
	<meta property="og:site_name" content="Votepen" />

	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@votepen" />
	<meta name="twitter:title" content="Votepen - Stay Updated" />

	<meta name="description" content="A Modern, real-time, open-source, beautiful, deadly simple and warm community."/>
	<meta property="og:description" content="A Modern, real-time, open-source, beautiful, deadly simple and warm community." />
	<meta name="twitter:description" content="A Modern, real-time, open-source, beautiful, deadly simple and warm community." />
	<meta property="og:image" content="{{ config('app.url') }}/imgs/votepen.svg">
	<meta name="twitter:image" content="{{ config('app.url') }}/imgs/votepen.svg" />

	<script type="application/ld+json">
	 {
		 "@context": "http://schema.org",
		 "@type": "WebSite",
		 "url": "https://votepen.com",
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

	<script type="application/ld+json">
	{
	  "@context":"http://schema.org",
	  "@type":"ItemList",
	  "itemListElement":[
		{
		  "@type":"SiteNavigationElement",
		  "position":1,
		  "name": "Hot",
		  "url":"https://votepen.com/?sort=hot"
		},
		{
		  "@type":"SiteNavigationElement",
		  "position":2,
		  "name": "New",
		  "url":"https://votepen.com/?sort=new"
		},
		{
		  "@type":"SiteNavigationElement",
		  "position":3,
		  "name": "Rising",
		  "url":"https://votepen.com/?sort=rising"
		},
		{
		  "@type":"SiteNavigationElement",
		  "position":4,
		  "name": "#technology",
		  "url":"https://votepen.com/c/technology"
		},
		{
		  "@type":"SiteNavigationElement",
		  "position":5,
		  "name": "#news",
		  "url":"https://votepen.com/c/news"
		},
		{
		  "@type":"SiteNavigationElement",
		  "position":6,
		  "name": "#funny",
		  "url":"https://votepen.com/c/funny"
		},
		{
		  "@type":"SiteNavigationElement",
		  "position":7,
		  "name": "#politics",
		  "url":"https://tagvote.com/c/politics"
		}
	  ]
	}
	</script>
@endsection



@section('script')
	<script>
		var preload = {
			submissions: {!! $submissions->toJson() !!}
		};
	</script>
@endsection
