@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">new MENU</div>
                    <form class="card-body" action="{{route('m_s')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="input-group input-group-sm \ mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Menu name</span>
                            <input type="text" class="form-control" aria-label="Sizing example input"
                                   aria-describedby="inputGroup-sizing-sm" name="name">
                        </div>

                        <label>What restaurant ?</label>
                        <select class="form-control" name="restaurant_id">
                            <option value="0">please select restourant</option>
                            @foreach($restaurants as $restaurant)
                                <option value="{{$restaurant->id}}"
                                        >{{$restaurant->name}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-outline-primary btn-sm mt-2">save NEW menu</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
