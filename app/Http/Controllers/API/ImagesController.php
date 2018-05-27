<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImagesController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => ['required', 'image']
        ]);

        $path = $request->image->store('images', [
            'disk' => 'public'
        ]);

        return response()->json([
            'path' => $path
        ]);
    }
}
