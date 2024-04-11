<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Item\StoreItemRequest;
use App\Http\Requests\Item\UpdateItemRequest;
use App\Models\Category;
use App\Models\Item;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('admin.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.items.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        $form_data = $request->validated();
        $item = new Item();
        $item->user_id = 1;
        $item->fill($form_data);

        if ($request->hasFile('image')) {
            $path = Storage::put('items_images', $request->image);
            $item->image = $path;
        }

        $item->save();

        if ($request->has('tags')) {
            $item->tags()->attach($request->tags);
        }

        return redirect()->route('admin.items.show', ['item' => $item->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('admin.items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.items.edit', compact('item', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request,Item $item)
    {
        $form_data = $request->validated();


        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::delete($item->image);
            }

            $path = Storage::put('items_images', $request->image);
            $form_data['image'] = $path;
        }
        

        if ($request->has('tags')) {
            $item->tags()->sync($request->tags);
        } else {
            $item->tags()->sync([]);
        }
        

        $item->update($form_data);

        return redirect()->route('admin.items.show', ['item' => $item->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::where('id', $id)->first();

        $item->delete();
        if ($item->image) {
            Storage::delete($item->image);
        }

        return redirect()->route('admin.items.index')->with('message', 'The item "' . $item->name . '" has been deleted');
    }
}
