<?php

namespace App\Http\Controllers\API;

use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListsController extends Controller
{
    public function update(Request $request)
    {
        $list = $request->list;

        Storage::put('list.txt', implode("\n", $list));

        return response()->json([
            'list' => $list
        ]);
    }
}
