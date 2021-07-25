<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Icra;

class IcraController extends Controller
{
	public function index()
	{
		$icralar = Icra::orderBy('f_id','desc')->get();
        return $icralar;
		return view('CMIcraView::listicralar')->with('icralar', $icralar);
	}
}