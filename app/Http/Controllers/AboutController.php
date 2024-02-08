<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;

class AboutController extends Controller
{
  public function index()
  {
    $data = Helper::getTexts('about');

    return view('pages.about', compact('data'));
  }
}
