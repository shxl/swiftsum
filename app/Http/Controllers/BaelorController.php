<?php namespace SwiftSum\Http\Controllers;

use SwiftSum\Http\Requests;
use SwiftSum\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SwiftSum\Services\BaelorAPI;

class BaelorController extends Controller {

    protected $bae;

    public function __construct(BaelorAPI $bae)
    {
        $this->bae = $bae;
    }

    public function test()
    {
        return $this->bae->setupKey();
    }

	public function handle($method)
    {
        return $this->{$method}();
    }



}
