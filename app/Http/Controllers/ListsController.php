<?php

namespace App\Http\Controllers;

use Storage;

class ListsController extends Controller
{
    public function show()
    {
        $list = explode("\n", Storage::get('list.txt'));

        return view('lists.show', [
            'list' => $list
        ]);
    }

    public function update()
    {
        $list = explode("\n", Storage::get('list.txt'));
        $index = request('index');
        $direction = request('direction');

        switch($direction) {
            case 'down':
                $tmp = $list[$index];
                $list[$index] = $list[$index + 1];
                $list[$index + 1] = $tmp;
                break;
            case 'up':
                $tmp = $list[$index];
                $list[$index] = $list[$index - 1];
                $list[$index - 1] = $tmp;
                break;
        }

        Storage::put('list.txt', implode("\n", $list));

        return redirect()->back();
    }
}
