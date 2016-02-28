<?php

namespace App\Http\Controllers;
use App\Entities\Menu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Lists;
use App\Models\Categories;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BalanceController extends Controller
{
    public function index(Lists $listsModel, Request $request, Categories $categoriesModel){

        if(!empty($request->input('month'))){
            $dt = Carbon::now();
            $month = $request->input('month');
            $startdate = $dt->setDate(2016, $month, 01)->toDateTimeString();
            $enddate = $dt->setDate(2016, $month, 31)->toDateTimeString();
        }else{
            $dt = Carbon::now();
            $startdate = $dt->setDate(2016, 01, 01)->toDateTimeString();
            $enddate = $dt->setDate(2016, 12, 31)->toDateTimeString();
        }
        $lists = $listsModel->getBoughtItems($startdate, $enddate);
        $categories = $categoriesModel->getCategories();
        $priceCategories = $listsModel->getPriceCategories($startdate, $enddate);
        $active = 'balance';
        $menu = Menu::getAll();
        return view('buylist.balance', ['lists' => $lists, 'priceCategories' => $priceCategories, 'active' => $active, 'menu' => $menu]);


    }

}
