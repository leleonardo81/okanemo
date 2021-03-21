<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\SubCategory;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // $expense = Category::join('sub_category', 'category.id', '=', 'sub_category.category_id')
    // ->where('type', 'expense')
    // ->get();
 
    // $income = Category::join('sub_category', 'category.id', '=', 'sub_category.category_id')
    // ->where('type', 'income')
    // ->get();
    $expense = Category:: where('type', 'expense')->get();
    $income = Category:: where('type', 'income')->get();
    $expense_data = array();

    foreach($expense as $exp) {
        $temp = SubCategory::where('categoty_id', $exp->id);
        $expense_data[] = $temp;
    }
    
    return view('welcome', ['expense' => $expense, 'income' => $income, 'expense_data' => $expense_data]);
});
