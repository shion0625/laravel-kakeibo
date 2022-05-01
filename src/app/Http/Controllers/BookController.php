<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;

final class BookController extends Controller
{
    function index(){
        #bookテーブルの全てのデータを取得￥
        $books=Book::all();
        #使用するviewアイテムの指定
        #compactにはビューファイルに送るデータを選択
        return view("books.index", compact("books"));
    }
    function show(Book $book){
        return view("books.show", compact("book"));
    }
}
