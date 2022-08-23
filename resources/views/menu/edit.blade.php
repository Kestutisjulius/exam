@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">update MENU</div>
                    <form class="card-body" action="{{route('m_u', $menu)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="input-group input-group-sm \ mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Menu name</span>
                            <input type="text" class="form-control" aria-label="Sizing example input"
                                   aria-describedby="inputGroup-sizing-sm" name="name" value="{{$menu->name}}">
                        </div>

                        <label>What restaurant ?</label>
                        <select class="form-control" name="restaurant_id">
                            @foreach($restaurants as $restaurant)
                                <option value="{{$restaurant->id}}"
                                        @if($restaurant->id == $menu->restaurant_id)selected @endif>{{$restaurant->name}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-outline-primary btn-sm mt-2">update menu</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
