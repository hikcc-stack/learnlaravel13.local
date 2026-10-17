<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(){
        return 'hello world';
    }
    public function all(){
        return 'all posts';
    }
    public function oldshow($id){
        $posts = [
            1 => 'Вывелся текст под номером 1',
            2 => 'Вывелся текст под номером 2',
            3 => 'Вывелся текст под номером 3',
            4 => 'Вывелся текст под номером 4',
            5 => 'Вывелся текст под номером 5',
        ];
        return $posts[$id];
    }
    public function newshow($name, $surname){
        return $surname . ' ' . $name;
    }
    public function shows($id){
        return 'post '.$id;
    }
    public function show1(){
        return 'hello world';
    }
    public function all1(){
        return 'all posts';
    }
}
