@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">NEW delicious dish</div>
                    <form action="{{route('d_s')}}" method="post" class="p-3" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="name of dishes" aria-label="name" name="name">
                            <span class="input-group-text">& delicious story</span>
                            <input type="text" class="form-control" name="about">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupFile01">Upload photo</label>
                            <input type="file" class="form-control" id="inputGroupFile01" name="file">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">select ADD to menu...</label>
                            <select class="form-select" id="inputGroupSelect01" name="menu_id">
                                <option selected>Choose...</option>
                                @foreach($menus as $menu)
                                    <option value="{{$menu->id}}">{{$menu->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-primary" type="submit">save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

