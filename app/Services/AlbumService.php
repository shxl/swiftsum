<?php namespace SwiftSum\Services;

use Illuminate\Support\Collection;
use SwiftSum\Album;

class AlbumService
{

    protected $bae;

    public function __construct(BaelorAPI $bae)
    {
        $this->bae = $bae;
    }

    public function get()
    {
        $request = $this->bae->prepareRequest('get', 'albums');
        $response = $this->bae->process($request);

        $albums = $this->processFromAPI($response);
        return $albums;
    }

    private function processFromAPI($response)
    {
        $albums = new Collection();
        foreach($response->result as $album) {
            $albums[] = Album::createFromAPI($album);
        }

        return $albums;
    }
}