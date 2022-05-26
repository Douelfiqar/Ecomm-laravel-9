<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function brands(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function categories(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function subCategories(){
        return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }

    public function subSubCategories(){
        return $this->belongsTo(SubSubCategory::class,'subsubcategory_id','id');
    }

}
