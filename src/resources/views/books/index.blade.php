@extends('layouts.layouts')

@section('content')
<h1>家計簿</h1>
<table class="table">
  <tr>
    <th>年月</th>
    <th>区分</th>
    <th>科目</th>
    <th>金額</th>
    <th>リンク</th>
  </tr>
  @foreach($books as $book)
  <tr>
    <td>{{$book->year}}年{{$book->month}}月</td>
    <td>{{$book->inout}}</td>
    <td>{{$book->category}}</td>
    <td>{{$book->amount}}万円</td>
    <td><a href="{{route('books.show', $book)}}" class="btn btn-info">詳細</a></td>
  </tr>
  @endforeach
</table>
@endsection
