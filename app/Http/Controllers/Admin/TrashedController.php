<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class TrashedController extends Controller
{
    public function index()
    {
        $items = Item::onlyTrashed()->get();
        return view('admin.items.trashed', compact('items'));
    }

    public function restore(Item $item)
    {

        $item->restore();

        return redirect()->route('admin.items.trashed');
    }

    public function delete(Item $item)
    {

        $item->forceDelete();

        return redirect()->route('admin.items.trashed');
    }
}
