<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory, Sluggable;

  protected $guarded = [];

  public function sluggable()
  {
    return [
      'slug' => [
        'source' => 'title',
      ],
    ];
  }

  public function category()
  {
    return $this->belongsTo(Category::class, 'category_id');
  }

  public function release_form()
  {
    return $this->belongsTo(ReleaseForm::class, 'release_form_id');
  }
}
