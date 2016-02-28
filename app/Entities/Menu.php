<?php

namespace App\Entities;


class Menu
{
    static private $items = [
        [
            'href' => 'lists',
            'title' => 'List'
        ],
        [
            'href' => 'balance',
            'title' => 'Balance'
        ],
    ];

    static public function getAll(){
        return self::$items;
    }
}