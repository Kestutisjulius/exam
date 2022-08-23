@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="color: darkred">fix delicious dish</div>
                    <form action="{{route('d_u', $dish)}}" method="post" class="p-3" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="input-group mb-3">
                            <span class="input-group-text">...& delicious story</span>
                            <input type="text" class="form-control" aria-label="name" name="about" value="{{$dish->about}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">name: </span>
                            <input type="text" class="form-control" aria-label="name" name="name" value="{{$dish->name}}">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupFile01">Upload photo</label>
                            <input type="file" class="form-control" id="inputGroupFile01" name="file">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">are in menu ...</label>
                            <select class="form-select" id="inputGroupSelect01" name="menu_id">

                                @foreach($menus as $menu)
                                    <option value="{{$menu->id}}" @if($dish->menu_id == $menu->id) selected @endif>{{$menu->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <button class="btn btn-primary" type="submit">save</button>
                    </form>

                    @if($dish->photo)
                        <form action="{{route('d_p', $dish)}}" method="post" class="d-flex justify-content-center mb-4">
                            @csrf
                            @method('put')
                            <button class="btn btn-outline-danger me-3" type="submit">remove picture</button>
                            <img src="{{$dish->photo}}" alt="foto" class="e-img ms-3">
                        </form>
                    @endif





                </div>
            </div>
        </div>
    </div>
@endsection

