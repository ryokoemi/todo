<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;
//TodoRequestを追加したけど、バリデーションを実装しないものもあるので、Illuminateのも残しておいていい。

class TodoController extends Controller
{
      public function index()
  {
    $todos = Todo::with('category')->get();
    $categories = Category::all();

    return view('index', compact('todos', 'categories'));
    }

        public function search(Request $request)
    {
        $todos = Todo::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->get();
        $categories = Category::all();

        return view('index', compact('todos', 'categories'));
    }

    public function store(TodoRequest $request)
    {
        $todo = $request->only(['category_id', 'content']);
        Todo::create($todo);

        return redirect('/')->with('message', 'ToDoを作成しました');
    }

    public function update(TodoRequest $request)
    {Route::delete('/todos/{todo_id}', [TodoController::class, 'destroy']);V
        $todo = $request->only(['content']);
        Todo::find($request->id)->update($todo);

        return redirect('/')->with('message', 'Todoを更新しました');
    }

    public function destroy(Request $request)
    {
        Todo::find($request->id)->delete();
        //テキスト最終ページでは、上記「id」はtodo_idとなっているが、いったんidのままにしておく
        return redirect('/')->with('message', 'Todoを削除しました');
    }

}