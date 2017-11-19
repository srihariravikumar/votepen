@extends('layouts.guest')


@section('content')
	<router-view></router-view>
@endsection


@section('head')
	<title>Tagvote - Social Bookmarking</title>
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Tagvote - Social Bookmarking" />
	<meta property="og:url" content="{{ config('app.url') }}" />
	<meta property="og:site_name" content="Tagvote" />

	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@tagvote" />
	<meta name="twitter:title" content="Tagvote - Social Bookmarking" />

	<meta name="description" content="A Modern, real-time, open-source, beautiful, deadly simple and warm community."/>
	<meta property="og:description" content="A Modern, real-time, open-source, beautiful, deadly simple and warm community." />
	<meta name="twitter:description" content="A Modern, real-time, open-source, beautiful, deadly simple and warm community." />
	<meta property="og:image" content="{{ config('app.url') }}/imgs/tagvote.svg">
	<meta name="twitter:image" content="{{ config('app.url') }}/imgs/tagvote.svg" />

	<script type="application/ld+json">
	 {
		 "@context": "http://schema.org",
		 "@type": "WebSite",
		 "url": "https://tagvote.com",
		 "name": "Tagvote",
			"publisher": {
			 "@type": "Organization",
		  "logo": {
			  "@type": "ImageObject",
				 "url": "https://tagvote.com/imgs/tagvote.svg",
				 "name": "Tagvote",
				 "height": "457",
				 "width": "457"
				}
			},
		 "sameAs": [
			 "https://www.facebook.com/tagvote/",
			 "https://twitter.com/tagvote"
		 ],
		 "potentialAction": {
			"@type": "SearchAction",
			"target": "https://tagvote.com/?search={search_term_string}",
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
		  "url":"https://tagvote.com/?sort=hot"
		},
		{
		  "@type":"SiteNavigationElement",
		  "position":2,
		  "name": "New",
		  "url":"https://tagvote.com/?sort=new"
		},
		{
		  "@type":"SiteNavigationElement",
		  "position":3,
		  "name": "Rising",
		  "url":"https://tagvote.com/?sort=rising"
		},
		{
		  "@type":"SiteNavigationElement",
		  "position":4,
		  "name": "#technology",
		  "url":"https://tagvote.com/c/technology"
		},
		{
		  "@type":"SiteNavigationElement",
		  "position":5,
		  "name": "#news",
		  "url":"https://tagvote.com/c/news"
		},
		{
		  "@type":"SiteNavigationElement",
		  "position":6,
		  "name": "#funny",
		  "url":"https://tagvote.com/c/funny"
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
