@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">NEW Restaurant</div>
                    <form action="{{route('r_s')}}" method="post" class="p-3">
                        @csrf
                        @method('post')
                        <div class="input-group input-group-sm \ mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">beautiful restaurant name</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="name">
                        </div>
                        <div class="input-group input-group-sm \ mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">beautiful restaurant address</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="address">
                        </div>
                        <div class="input-group input-group-sm \ mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Restaurant CODE: </span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="code">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

