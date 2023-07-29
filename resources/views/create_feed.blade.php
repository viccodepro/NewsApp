<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Save a new Feed to Database</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h1>Save a new feed to Database</h1>
                <a href="{{route('home')}}">View Feeds</a>
                @if (Session::has('message'))
                    <h2 class="alert text-danger">{{Session::get('message')}}</h2>
                @endif
            </div>
            <div class="card-body">
                <div>
                    <form action="{{route('feeds.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="category"><h3>Category</h3></label>
                            <select name="category" id="category" class="form-control">
                                <option value="News"{{ old('category') == 'News' ? ' selected' : ''}}>News</option>
                                <option value="Sports" {{ old('category') == 'Sports' ? ' selected' : ''}}>Sports</option>
                                <option value="Technology" {{ old('category') == 'Technology' ? ' selected' : ''}}>Technology</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="feed">Feed Url</label>
                            <input type="text" name="feed" value="{{old('feed') ?? ''}}" id="feed" class="form-control">
                        </div>
                        <div class="form-group">
                            <h3>Show on site?</h3>
                            <select name="active" id="active">
                                <option value="1" {{old('active') == 1 ? ' selected' : ''}}>Yes</option>
                                <option value="0" {{old('active') == 0 ? ' selected' : ''}}>No</option>
                            </select>
                        </div><br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>