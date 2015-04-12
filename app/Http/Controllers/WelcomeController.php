<?php namespace SwiftSum\Http\Controllers;

use SwiftSum\Services\BaelorAPI;
use SwiftSum\Services\AlbumService;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/


	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$albums = (new AlbumService(new BaelorAPI()))->get();
		return view('index', compact('albums'));
	}
}
