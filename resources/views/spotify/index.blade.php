<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <title>Spotify</title>
</head>

<style>
    body {
        padding: 2% 10%;
    }
</style>

<body>

    <h1>Spotify Playlist</h1>

    <form>
        <div class="row">
            <div class="col-md-7">
                <input class="form-control" type="text" name="track" value="{{old('track', $track)}}" placeholder="Search Tracks">
            </div>
            <div class="col-md-2">
                <button class="btn btn-outline-primary">Search</button>
            </div>
        </div>
    </form>
    <br>
    <br>

    @if ($spotifyCollectionArtists->count() > 0)
        
    <div class="row">
        @foreach ($spotifyCollectionArtists as $spotifys)
            @foreach ($spotifys as $spotify)
            <div class="col-md-3 mb-3">
                <div class="card bg-info">
                    <div class="card-body">
                        <h5>Artist Name : </h5>
                        <h4 class="text-white">{{ $spotify["name"] }}</h4>
                        <hr>
                        <h5 class="text-white">{{ $spotify["song_name"] }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        @endforeach
    </div>
    @else

    No Record Found.

    @endif



</body>

</html>