<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function todo()
    {
        $item = Item::orderBy('created_at', "DESC")->where('completed', false)->get();
        return $item;
    }

    public function completed()
    {
        $item = Item::orderBy('created_at', "DESC")->where('completed', true)->get();
        return $item;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item;
        $item->todo = $request->item['todo'];
        $item->save();

        return $item;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Item::find($id);

        if($item)
        {
            $item->todo = $request->item['todo'];
            $item->completed = $request->item['completed'];
            $item->save();

            return "Item saved";
        }

        return "Item not found";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);

        if($item)
        {
            $item->delete();

            return "Item deleted";
        }

        return "Item not found";
    }
}
