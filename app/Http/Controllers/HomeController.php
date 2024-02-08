<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $data = Helper::getTexts('home');
    $data['products'] = Product::select(
      'id',
      'title',
      'slug',
      'img',
      'release_form_id',
      'prescription',
      'description',
      'view_rate',
    )
      ->orderBy('view_rate', 'desc')
      ->take(4)
      ->get();

    return view('pages.home', compact('data'));
  }
}
