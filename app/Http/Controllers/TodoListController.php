<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListItem;

class TodoListController extends Controller
{
    //
    public function Index()
    {
        return view('welcome' ,[ 'ListItems' => ListItem::where('is_completed',0)->get()]);
    }

    public function saveItem(Request $request)
    {
       // \Log::info(json_encode($request->all())); //shows in log
        $newlistitem = new ListItem;
        $newlistitem->name = $request->ListItem;
        $newlistitem->is_completed = 0;
        $newlistitem->save();
        return redirect('/');
    }

    public function markComplete($id)
    {
        
        $newCompleted = Listitem::find($id);
        $newCompleted->is_completed = 1;
        $newCompleted->save();
        return redirect('/');
    }
}
