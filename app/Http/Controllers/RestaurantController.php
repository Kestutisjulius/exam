<?php

namespace App\Http\Controllers;

use App\Models\Restaurant as R;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{

    public function index(Request $request){
        $restaurants = match ($request->sort){
            'asc' => R::orderBy('name', 'asc')->get(),
            'desc' => R::orderBy('name', 'desc')->get(),
            default => R::orderBy('id', 'desc')->get()
        };
        return view('restaurant.index', ['restaurants' => $restaurants]);
    }

    public function create()
    {
        return view('restaurant.create');
    }

    public function store(Request $request)
    {
        $restaurant = new R;
        $restaurant->name = $request->name;
        $restaurant->address = $request->address;
        $restaurant->code = $request->code;
        $restaurant->save();

        return redirect()->route('r_i')->with('info', 'Restaurant created');
    }

    public function edit(R $restaurant)
    {
        return view('restaurant.edit', ['restaurant'=>$restaurant]);
    }


    public function update(Request $request, R $restaurant)
    {
        $restaurant->name = $request->name;
        $restaurant->address = $request->address;
        $restaurant->code = $request->code;
        $restaurant->save();

        return redirect()->route('r_i')->with('success', 'restaurant updated');
    }


    public function destroy(R $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('r_i')->with('deleted', 'Restaurant removed from list');
    }
}
