<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;

class MemoController extends Controller
{
    function  add(Request $request){

        $content = $request->content;
        \DB::table('memo')->insert([
            'content' => $content,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return self::show();
    }

    function show(){
        $contents = \DB::table('memo')->orderBy('id', 'DESC')->get();

        return view('index')->with('contents', $contents);
    }

    function delete(Request $request){
        $id = $request->id;
        $query = new Memo;
        $query->where('id', $id)->delete();

        return self::show();
    }

    function edit($id){
        $query = new Memo;
        $content = $query->where('id', $id)->first();

        return self::showEditPage($id, $content);
    }

    function showEditPage($id, $content){
        return view('edit')->with('id', $id)->with('content', $content);
    }

    function update(Request $request){
        $id = $request->id;
        $content = $request->content;
        $query = new Memo;
        $targetContent = $query->where('id', $id)->first();
        $targetContent->content = $content;
        $targetContent->save();

        return self::show();
    }
}
