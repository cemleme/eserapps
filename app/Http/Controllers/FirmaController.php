<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Firma;

class FirmaController extends Controller
{
	public function index()
	{
		$firmalar = Firma::orderBy('f_ad','asc')->get();
        return $firmalar;
		return view('CMIcraView::listfirmalar')->with('firmalar', $firmalar);
	}
}