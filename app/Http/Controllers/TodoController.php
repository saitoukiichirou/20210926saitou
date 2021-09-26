<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Content;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $items = Content::get();
        return view('index', ['items' => $items]);
    }

    public function create(TodoRequest $request)
    {
        $form = $request->all();
        Content::create($form);
        return redirect('/');
    }

    public function update(TodoRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Content::where('id', $request->id)->update($form);
        return redirect('/');
    }

    public function remove(Request $request)
    {
        Content::find($request->id)->delete();
        return redirect('/');
    }
}
