<?php

namespace App\Http\Controllers;

use Aerni\Spotify\Spotify as Spotify;
use Illuminate\Http\Request;

class SpotifyController extends Controller
{
    public function index(Request $request)
    {
        $track = $request->track ? $request->track : null;
        $spotifyArtists = [];
        $newArtists = [];

        if ($track) {
            $spotifyItems = $this->getSong($track)["items"];

            foreach ($spotifyItems as $item) {
                $artists = $item["artists"];
                $songName = $item["name"];

                foreach($artists as $artist){
                    $artist["song_name"] = $songName;
                    array_push($newArtists, $artist);
                }
                array_push($spotifyArtists, $newArtists);
            }
        }
        $spotifyCollectionArtists = collect($spotifyArtists);

        return view('spotify.index', compact('spotifyCollectionArtists', 'track'));
    } 

    public function getSong($tracks = null)
    {
        $dKey = [
            'country' => null,
            'locale' => null,
            'market' => null,
        ];
        $spotify = (new Spotify($dKey))->searchTracks($tracks)->get('tracks');

        return $spotify;
    }
}
