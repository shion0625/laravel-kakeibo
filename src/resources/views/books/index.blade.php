@extends('layouts.app')

@section('content')

<h1>家計簿</h1>
<a href="{{route('books.create')}}"class="btn btn-success btn-lg mb-3">+登録</a>
<table class="table">
  <tr>
    <th>年月</th>
    <th>区分</th>
    <th>科目</th>
    <th>金額(次月目標)</th>
    <th>リンク</th>
  </tr>
  @php
    $sum =0;
  @endphp
  @foreach($books as $book)
  <tr>
    <td>{{$book->year}}年{{$book->month}}月</td>
    <td>{{($book->inout == 1) ? "収入" : "支出"}}</td>
    <td>{{$book->category}}</td>
    <td>{{$book->amount}}万円({{$book->next_objective}}万円)</td>
    <td>
      <a href="{{route('books.edit', $book)}}" class="btn btn-warning">編集</a>
      <a href="{{route('books.show', $book)}}" class="btn btn-info">詳細</a>
      <form method="POST" action="/books/{{$book->id}}" style="display:inline">
        @csrf
        @method("DELETE")
        <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？');">削除</button>
      </form>
    </td>
  </tr>
    @php
      if($book->inout==1){
        $sum += $book->amount;
      }else{
        $sum -= $book->amount;
      }
    @endphp
  @endforeach
  <tr>
    <td></td><td></td>
    <td>合計</td>
    <td>{{$sum}}万円</td>
    <td></td>
  </tr>
</table>
@endsection
