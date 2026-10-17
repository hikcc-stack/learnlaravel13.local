<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
   public function show(Request $request)
   {
       // здесь работаем с $request
       echo $request->method();// вывод метода запроса
   }
    public function oldshow(Request $request){
       // если запрос имеет метод post или get - у нас выводится наименование метода
       if($request->isMethod( 'post') || $request->Ismethod(  'get')){
           echo $request->method();
           echo '<br/>';
           echo $request->path(); // 34. ПУть запроса в Laravel
           echo '<br/>';
           echo $request->url(); // 35. URL Запроса без парметров
           echo '<br/>';
           echo $request->fullUrl(); // 36. Полный URL запроса с GET-параметрами
        }
       if($request->is('oldpost/*')){ //37. Проверка пути по маске в Laravel
           dd('это нужный маршрут');
       }
    }
    public function view(){
       return view('test')
           ->with('var1' , '1')
           ->with('var2' , '2');

    }

    // 41. Структура представления
    public function example(){
       return view('post.post');
    }
}
