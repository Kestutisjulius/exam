<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restaurant as R;
use Illuminate\Http\Request;


class MenuController extends Controller
{

    public function index()
    {
        $menu = Menu::orderBy('id', 'desc')->get();
        return view('menu.index', ['menu'=>$menu]);
    }


    public function create()
    {
        return view('menu.create', ['restaurants' => R::all()]);
    }

    public function store(Request $request)
    {
        $menu = new Menu;
        $menu->name = $request->name;
        $menu->restaurant_id = $request->restaurant_id;
        $menu->save();
        return redirect()->route('m_i')->with('info', 'Menu created');
    }


    public function edit(int $menuId)
    {
        $menu = Menu::where('id', $menuId)->first();
        return view('menu.edit', ['menu'=>$menu, 'restaurants' =>R::all()]);
    }


    public function update(Request $request, Menu $menu)
    {
        $menu->name =$request->name;
        $menu->restaurant_id = $request->restaurant_id;
        $menu->save();
        return redirect()->route('m_i')->with('success', 'menu UPDATED successfully');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->back()->with('deleted', 'menu deleted!!');
    }
}
