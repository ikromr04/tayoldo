<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\ActiveSubstance;
use App\Models\Category;
use App\Models\Impact;
use App\Models\Prescription;
use App\Models\Product;
use App\Models\ReleaseForm;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index()
  {
    $data = Helper::getTexts('products');

    $data['release_forms'] = ReleaseForm::get();
    $data['categories'] = Category::get();

    $data['prescription'] = request('prescription');
    $data['release_form_id'] = request('release_form_id');
    $data['category_id'] = request('category_id');

    $data['products'] = Product::select(
      'id',
      'title',
      'slug',
      'img',
      'prescription',
      'category_id',
      'release_form_id',
      'description',
      'view_rate',
    );

    if ($data['prescription']) {
      $data['products'] = $data['products']->where('prescription', $data['prescription']);
    }
    if ($data['release_form_id']) {
      $data['products'] = $data['products']->where('release_form_id', $data['release_form_id']);
    }
    if ($data['category_id']) {
      $data['products'] = $data['products']->where('category_id', $data['category_id']);
    }

    $data['products'] = $data['products']->orderBy('view_rate', 'desc')->paginate(8);

    return view('pages.products.index', compact('data'));
  }

  public function show($slug)
  {
    $data = Helper::getTexts('products.show');

    $data['product'] = Product::where('slug', $slug)->first();

    $data['product']->view_rate++;
    $data['product']->update();

    $data['similar-products'] = Product::where('category_id', $data['product']->category_id)
      ->take(3)
      ->get();

    return view('pages.products.show', compact('data'));
  }

  public function download(Request $request)
  {
    $product = Product::select(
      'id',
      'instruction'
    )
      ->find($request->id);

    if (!$product->instruction) {
      return back();
    }

    $file = public_path('files/products/files/' . $product->instruction);

    $extension = pathinfo($file, PATHINFO_EXTENSION);

    $headers = array(
      'Content-Type: application/' . $extension,
    );

    return response()->download($file, $product->instruction, $headers);
  }

  public function search(Request $request)
  {
    $data['products'] = Product::select('id', 'title')
      ->where('title', 'like', '%' . $request->keyword . '%')
      ->get();

    return view('dashboard.pages.products.index', compact('data'));
  }
}
