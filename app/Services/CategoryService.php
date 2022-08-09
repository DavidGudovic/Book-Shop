<?php
namespace App\Services;

use App\Models\Category;

/*
. Services for Models/Category.php
*/
class CategoryService
{
  /*
   Returns a collection of all Categories
   filter in [null, 'fiction', 'nonFiction']
   */
  public function getAll($filter = null){

    if(empty($filter)){
      return Category::all();
    }

    if($filter === 'fiction'){
      return Category::fiction()->get();
    }

    if($filter === 'nonFiction'){
      return Category::nonFiction()->get();
    }

  }
}
