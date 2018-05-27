<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function create()
    {
        return view('images.create');
    }

    public function show(Request $request)
    {
        $this->validate($request, [
            'image' => ['required', 'image']
        ]);

        $path = $request->image->store('images', [
            'disk' => 'public'
        ]);

        return view('images.show', [
            'path' => $path
        ]);
    }
}
