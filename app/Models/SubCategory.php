<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
    'category_id',
    'SubCategory_name_en',
    'SubCategory_name_fr',
    'SubCategory_slug_en',
    'SubCategory_slug_fr',
    'SubCategory_image'];

    public function categories(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
