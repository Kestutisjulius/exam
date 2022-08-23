<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Restaurant as R;

class FrontController extends Controller
{
    public function index(Request $request)
    {
            $dishes = Dish::all();

        return view('front.index', [
            'dishes' => $dishes
        ]);
    }
}
