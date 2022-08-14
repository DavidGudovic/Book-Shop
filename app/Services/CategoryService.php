<?php
namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection as Eloquent;
/*
. Services for Models/Category.php
*/
class CategoryService
{
  /*
  Returns a collection of all Categories
  filter in [null, 'fiction', 'nonFiction']
  */
  public function getAll($filter = null) : Eloquent{

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
  /*
  returns an associative array [CategoryID, Boolean]
  used for filters in Product page
  */
  public function getFilters($categories = []) : array{
    $all_categories = $this->getAll();
    $filters = [];

    foreach($all_categories as $category){
      $filters[$category->id] = in_array($category->id, $categories) ? true : false;
    }

    return $filters;
  }
}
