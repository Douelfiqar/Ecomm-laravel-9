<?php

namespace App\Models;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubSubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'sub_category_id',
        'category_id',
        'SubCategory_name_en',
        'SubCategory_name_fr',
        'SubCategory_slug_en',
        'SubCategory_slug_fr',
        'SubCategory_image'];
    
        public function subCategories(){
            return $this->belongsTo(SubCategory::class,'sub_category_id','id');
        }

        public function categories(){
            return $this->belongsTo(Category::class,'category_id','id');
        }
}

