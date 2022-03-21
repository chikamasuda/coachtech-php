<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    /**
     * トップページの表示
     *
     * @return void
     */
    public function index()
    {
        $todos = Todo::all();
        return view('index', ['todos' => $todos]);
    }

    /**
     * タスクの作成
     *
     * @param Request $request
     * @return void
     */
    public function create(TodoRequest $request)
    {
        $form = $request->all();
        Todo::create($form);
        return redirect('/');
    }

    /**
     * タスクの更新
     *
     * @param Request $request
     * @return void
     */
    public function update(TodoRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Todo::where('id', $request->id)->update($form);
        return redirect('/');
    }

    /**
     * タスクの削除
     *
     * @param Request $request
     * @return void
     */
    public function delete(Request $request)
    {
        Todo::where('id', $request->id)->delete();
        return redirect('/');
    }
}
