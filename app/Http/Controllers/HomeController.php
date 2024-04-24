<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

  public function ae(Request $request)
  {
    Mail::send('emails.ae-send', [
      'initials' => $request->inititals,
      'age' => $request->age,
      'weight' => $request->weight,
      'hight' => $request->hight,
      'event' => $request->event,
      'suspect' => $request->suspect,
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
    ], function ($message) {
      $message->to('drugsafety@evolet.co.uk');
      $message->subject('Сообщение о жалобе на продукт');
    });

    return back();
  }
}
