<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Category;
use App\Models\Product;
use App\Models\ReleaseForm;
use App\Models\Text;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class DashController extends Controller
{
  public function index()
  {
    return redirect(route('home'));
  }

  public function state()
  {
    if (session()->get('isDashClosed')) {
      session()->forget('isDashClosed');
      return;
    }

    session()->put('isDashClosed', true);
    return;
  }

  public function updateText(Request $request)
  {
    $text = Text::where('slug', $request->json('slug'))
      ->first();
    $text->text = $request->json('text');
    $text->update();

    $response = ['text' => $text->text];
    return json_encode($response);
  }

  public function products(Request $request)
  {
    switch ($request->action) {
      case 'create':
        $data['product'] = null;
        $data['release_forms'] = ReleaseForm::get();
        $data['categories'] = Category::get();

        return view('dashboard.pages.products.show', compact('data'));

      case 'edit':
        $data['product'] = Product::find($request->product);
        $data['release_forms'] = ReleaseForm::get();
        $data['categories'] = Category::get();

        return view('dashboard.pages.products.show', compact('data'));

      case 'delete':
        $product = Product::find($request->product);
        if ($product->img && file_exists('files/products/img/' . $product->img)) {
          unlink('files/products/img/' . $product->img);
          unlink('files/products/img/thumbs/' . $product->img);
        }
        if ($product->instruction && file_exists('files/products/files/' . $product->instruction)) {
          unlink('files/products/files/' . $product->instruction);
        }
        $product->delete();

        return back();

      default:
        $data['products'] = Product::get();

        return view('dashboard.pages.products.index', compact('data'));
    }
  }

  public function productsPost(Request $request)
  {
    $request->validate(['title' => 'required']);

    switch ($request->action) {
      case 'store':
        $product = new Product();
        $product->title = $request->title;
        $product->slug = SlugService::createSlug(Product::class, 'slug', $request->title);

        $file = $request->file('img');
        if ($file) {
          $fileName = $product->slug . '.' . $file->extension();
          $file->move(public_path('files/products/img'), $fileName);
          $product->img = $fileName;
        }
        $product->description = $request->description;
        $product->prescription = $request->prescription;

        if ($request->release_form_id) {
          $product->release_form_id = $request->release_form_id;
        } else {
          $releaseForm = new ReleaseForm();
          $releaseForm->title = $request->release_form;
          $releaseForm->save();
          $product->release_form_id = $releaseForm->id;
        }

        if ($request->category_id) {
          $product->category_id = $request->category_id;
        } else {
          $category = new Category();
          $category->title = $request->category;
          $category->save();
          $product->category_id = $category->id;
        }

        $product->gain_url = $request->gain_url;
        $product->content = $request->content;

        $file = $request->file('instruction');
        if ($file) {
          $fileName = $product->slug . '.' . $file->extension();
          $file->move(public_path('files/products/files'), $fileName);
          $product->instruction = $fileName;
        }

        $product->save();

        return back()->with('success', 'Продукт успешно сохранен');

      case 'update':
        $product = Product::find($request->product_id);
        $product->title = $request->title;

        $file = $request->file('img');
        if ($file) {
          if ($product->img && file_exists('files/products/img/' . $product->img)) {
            unlink('files/products/img/' . $product->img);
            unlink('files/products/img/thumbs/' . $product->img);
          }
          $fileName = $product->slug . '.' . $file->extension();
          $file->move(public_path('files/products/img'), $fileName);
          $product->img = $fileName;
        }
        $product->description = $request->description;
        $product->prescription = $request->prescription;

        if ($request->release_form_id) {
          $product->release_form_id = $request->release_form_id;
        } else {
          $releaseForm = new ReleaseForm();
          $releaseForm->title = $request->release_form;
          $releaseForm->save();
          $product->release_form_id = $releaseForm->id;
        }

        if ($request->category_id) {
          $product->category_id = $request->category_id;
        } else {
          $category = new Category();
          $category->title = $request->category;
          $category->save();
          $product->category_id = $category->id;
        }

        $product->gain_url = $request->gain_url;
        $product->content = $request->content;

        $file = $request->file('instruction');
        if ($file) {
          if ($product->instruction && file_exists('files/products/files/' . $product->instruction)) {
            unlink('files/products/files/' . $product->instruction);
          }
          $fileName = $product->slug . '.' . $file->extension();
          $file->move(public_path('files/products/files'), $fileName);
          $product->instruction = $fileName;
        }

        $product->update();

        return back()->with('success', 'Продукт успешно сохранен');
    }
  }
}
