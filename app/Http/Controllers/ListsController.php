<?php

namespace App\Http\Controllers;

use App\Entities\Menu;
use Illuminate\Http\Request;
use App\Models\Lists;
use App\Models\Categories;
use App\Http\Requests;

class ListsController extends Controller
{
    public function index(Lists $listsModel, Categories $categoriesModel){
        $lists = $listsModel->getShopLists();
        $categories = $categoriesModel->getCategories();
        $active = 'lists';
        $menu = Menu::getAll();
        return view('buylist.index', ['lists' => $lists, 'categories' => $categories, 'editItemId' => false, 'active' => $active, 'menu' => $menu]);
    }
    public function newCategory(Categories $categoriesModel, Request $request){

    }

    public function newBuy(Lists $listsModel, Request $request){

        $listsModel->create($request->all());
        return redirect()->route('lists');
    }

    public function check(Lists $listsModel, Request $request){
        $id = $request->input('id');
        $listsModel->replaceItem($id);
        return redirect()->route('lists');
    }

    public function deleteItem(Lists $listsModel, Request $request){
        $id = $request->input('id');
        $listsModel->deleteItem($id);
        return redirect()->route('lists');
    }

    public function editItem(Lists $listsModel, Request $request, $id, Categories $categoriesModel){
        $lists = $listsModel->getShopLists();
        $categories = $categoriesModel->getCategories();
        return view('buylist.index', ['lists' => $lists, 'categories' => $categories, 'editItemId' => $id]);
    }

    public function editBuy(Lists $listsModel, Request $request, $id, Categories $categoriesModel){
        $name = $request->input('name');
        $category = $request->input('category');
        $price = $request->input('price');
        $listsModel->editBuy($id, $name, $category, $price);
        return redirect()->route('lists');
    }


}
