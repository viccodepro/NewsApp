<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Awesome news Aggregating website</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<style>
    #container {
        background-color: lightgrey;
        border: 1px solid #ccc;
        box-shadow: 9px 4px 6px #636ad9;
        padding: 70px
    }
</style>

<body>
    <div class="container mt-5 mb-5" id="container">
        <h1>Your awesome news aggregation site</h1>
        <a href="{{route('feeds.create')}}">Add a new feed</a>
        <h2 class="mt-5">Latest News</h2>
        @if (count($news))
            {{-- We loop all news feed items --}}
            @foreach ($news as $each)
                <h3>News from {{ $each->title }}:</h3>
                <ul>
                    {{-- for each feed item, we get and parse its feed elements --}}
                    {{-- @php
                        $feeds = Str::parse_feed($each->feed);
                    @endphp --}}
                    <?php $feeds = Str::parse_feed($each->feed); ?>
                    @if (count($feeds))
                        {{-- In a loop, we show all feed elements one by one --}}
                        @foreach ($feeds as $eachfeed)
                            <li>
                                <strong>{{ $eachfeed->title }}</strong><br />
                                <blockquote>{{ Str::limit(strip_tags($eachfeed->description), 250) }}</blockquote>
                                <strong>Date: {{ $eachfeed->pubDate }}</strong><br />
                                <strong>Source:<a
                                        href="{{ url($eachfeed->link) }}">{{ $eachfeed->link }}</a></strong><br />
                                {{-- <strong>Source:{{ HTML::link($eachfeed->link, Str::limit($eachfeed->link, 35)) }}</strong> --}}
                            </li>
                        @endforeach
                    @else
                        <li>No news found for {{ $each->title }}.</li>
                    @endif
                </ul>
            @endforeach
        @else
            <p>No News found out of check:(</p>
        @endif
        <hr />
        <h2>Latest Sports News</h2>
        @if (count($sports))
            {{-- We loop all news feed items --}}
            @foreach ($sports as $each)
                <h3>Sports News from {{ $each->title }}:</h3>
                <ul>
                    {{-- for each feed item, we get and parse its feed elements --}}
                    @php
                        $feeds = Str::parse_feed($each->feed);
                    @endphp
                    @if (count($feeds))
                        {{-- In a loop, we show all feed elements one by one --}}
                        @foreach ($feeds as $eachfeed)
                            <li>
                                <strong>{{ $eachfeed->title }}</strong><br />
                                <blockquote>{{ Str::limit(strip_tags($eachfeed->description), 250) }}</blockquote>
                                <strong>Date: {{ $eachfeed->pubDate }}</strong><br />
                                <strong>Source:<a
                                        href="{{ url($eachfeed->link) }}">{{ $eachfeed->link }}</a></strong><br />
                                {{-- <strong>Source:{{ HTML::link($eachfeed->link, Str::limit($eachfeed->link, 35)) }}</strong> --}}
                            </li>
                        @endforeach
                    @else
                        <li>No Sports News found for {{ $each->title }}.</li>
                    @endif
                </ul>
            @endforeach
        @else
            <p>No Sports News found :(</p>
        @endif
        <hr />
        <h2>Latest Technology News</h2>
        @if (count($technology))
            {{-- We loop all news feed items --}}
            @foreach ($technology as $each)
                <h3>Technology News from {{ $each->title }}:</h3>
                <ul>
                    {{-- for each feed item, we get and parse its feed 
elements --}}
                    @php
                        $feeds = Str::parse_feed($each->feed);
                    @endphp
                    @if (count($feeds))
                        {{-- In a loop, we show all feed elements one by 
one --}}
                        @foreach ($feeds as $eachfeed)
                            <li>
                                <strong>{{ $eachfeed->title }}</strong><br />
                                <blockquote>{{ Str::limit(strip_tags($eachfeed->description), 250) }}</blockquote>
                                <strong>Date: {{ $eachfeed->pubDate }}</strong><br />
                                <strong>Source:<a
                                        href="{{ url($eachfeed->link) }}">{{ $eachfeed->link }}</a></strong><br />
                                {{-- <strong>Source:{{ HTML::link($eachfeed->link, Str::limit($eachfeed->link, 35)) }}</strong> --}}
                            </li>
                        @endforeach
                    @else
                        <li>No Technology News found for {{ $each->title }}.</li>
                    @endif
                </ul>
            @endforeach
        @else
            <p>No Technology News found :(</p>
        @endif
    </div>
</body>

</html>
