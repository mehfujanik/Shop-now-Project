<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;

protected $fillable = [
        'category_id',
        'subcategory_id',
        'subsubcategory_name',
        'subsubcategory_slug'
      
    ];


    // category 
     public function category(){
    	return $this->belongsTo(Category::class,'category_id','id');
    }

    // sub category
		public function subcategory(){
    	return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }


} // main end

