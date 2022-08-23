@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="card">
                    <div class="card-header">Dishes List</div>

                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @forelse($dishes as $dish)
                            <div class="col">
                                <div class="card h-100">

                                    <img src="{{$dish->photo}}" class="card-img-top" alt="photo here">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$dish->name}}</h5>
                                        <p>Price: {{$dish->about}}</p>
                                        <small>Have:
                                            <strong>{{$dish->menu->restaurant->name ?? 'still not Have restorante'}}</strong></small>
                                    </div>
                                    @if(Auth::user()?->role > 0 ?? 0)
                                        <div class="btn-group" role="group">
                                            <form class="btn btn-warning btn-sm " action="{{route('order', Auth::user()->id)}}" method="post">
                                                @csrf
                                                @method('post')
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="count">
                                                    <button class="btn btn-outline-secondary btn-sm text-black"
                                                            type="submit">purchase
                                                    </button>
                                                    <input type="hidden" name="dish_id" value="{{$dish->id}}">
                                                </div>
                                            </form>
                                        </div>


                                    @endif
                                    <div class="card-footer">
                                        <small class="text-muted d-block">Last updated: </small>
                                        <small class="text-center">{{$dish->time ?? 'not updated'}}</small>
                                    </div>
                                </div>

                            </div>
                        @empty
                            <h5 class="card-title">no dishes - no business</h5>
                    </div>
                    @endforelse


                </div>
            </div>
        </div>
    </div>

@endsection

