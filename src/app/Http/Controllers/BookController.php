<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;

final class BookController extends Controller
{
    public function index(){
        #bookテーブルの全てのデータを取得
        $books=Book::all();
        #使用するviewアイテムの指定
        #compactにはビューファイルに送るデータを選択
        return view("books.index", compact("books"));
    }
    public function show(Book $book){
        return view("books.show", compact("book"));
    }
    public function create(){
        return view("books.create");
    }
    public function store(Request $request){
        $book = new Book();
        $book->year= $request->input("year");
        $book->month = $request->input("month");
        $book->inout = $request->input("inout");
        $book->category = $request->input("category");
        $book->amount = $request->input("amount");
        $book->save();
        return redirect()->route('books.show', $book);
    }
    public function edit(Book $book){
        return view("books.edit", compact("book"));
    }
    public function update(Request $request, Book $book){
        $book->year= $request->input("year");
        $book->inout = $request->input("inout");
        $book->month = $request->input("month");
        $book->category = $request->input("category");
        $book->amount = $request->input("amount");
        $book->save();
        return redirect()->route('books.show', $book);
    }
}
