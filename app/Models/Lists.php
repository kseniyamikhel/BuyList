<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lists extends Model
{
    protected $fillable = ['name', 'category', 'price', 'bought'];

    public function getShopLists(){
        $lists = $this->where('bought', '=', 0)->get();
        return $lists;
    }
    public function replaceItem($id){
        $this->where('id', '=', $id)->update(array('bought' => 1));
    }
    public function deleteItem($id){
        $this->where('id', '=', $id)->delete();
    }
    public function editBuy($id, $name, $category, $price){
        $this->where('id', '=', $id)->update(array('name' => $name, 'category' => $category, 'price' =>$price));
    }
    public function getBoughtItems($startdate, $enddate){
        $lists = $this->where('bought', '=', 1)->whereBetween('created_at', [$startdate, $enddate])->orderBy('category')->get();
        return $lists;
    }
    public function getPriceCategories($startdate, $enddate){
        $priceCategories =  $this->where('bought', '=', 1)->whereBetween('created_at', [$startdate, $enddate])->select('*', DB::raw('SUM(price) as totalPrice'))->groupBy('category')->get();
        return $priceCategories;
    }
}
