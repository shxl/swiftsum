<?php namespace SwiftSum\Http\Controllers;

use Illuminate\Support\Collection;
use SwiftSum\Http\Requests;
use SwiftSum\Http\Controllers\Controller;
use SwiftSum\Services\AlbumService;

use Illuminate\Http\Request;
use SwiftSum\Services\BaelorAPI;

class LorumController extends Controller {

    protected $bae;

    public function __construct(BaelorAPI $bae)
    {
        $this->bae = $bae;
    }

	public function generate(Request $request)
    {
        $album = $request->album;
        $linesLyrics = new Collection();

        $apirequest = $this->bae->prepareRequest('get', 'albums/' . $album);
        $response = $this->bae->process($apirequest);

        $availableSongs = [];
        foreach($response->result->songs as $song) {
            if($song->has_lyrics === true) {
                $availableSongs[] = $song;
            }
        }

        foreach($availableSongs as $song) {
            $apirequest = $this->bae->prepareRequest('get', 'songs/' . $song->slug . '/lyrics');
            $response = $this->bae->process($apirequest);

            $lyrics = $response->result->lyrics;
            $lines = explode("\n", $lyrics);
            $lines = array_filter($lines);
            foreach($lines as $line) {
                $string = rtrim($line, ', ');
                $linesLyrics[] = $string;
            }
        }

        $paragraphCount = 6;
        $paragraphs = new Collection();
        for($i = 0;$i < $paragraphCount;$i++) {

            $randomSet = $linesLyrics->random(12);
            $paragraphSet = implode('. ', $randomSet);
            $paragraphSet .= '.';

            $paragraphs[] = $paragraphSet;
        }

        $albums = (new AlbumService(new BaelorAPI()))->get();

        return view('index', compact('albums', 'paragraphs'));
    }

}
