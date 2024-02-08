<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
  public function index()
  {
    $data = Helper::getTexts('contacts');

    return view('pages.contacts', compact('data'));
  }
}
