@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">MENU List</div>
                    @foreach($menu as $mName)
                        <div class="card-body">
                            <div class="card-header d-flex justify-content-between r-txt"> {{$mName->name}}
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <div class="me-3 mt-1"><strong>on Restaurant: </strong>{{$mName->restaurant?->name ?? 'no Restaurant'}}</div>

                                    @if(Auth::user()->role >= 10)
                                        <a href="{{route('m_e', $mName->id)}}" type="button" class="btn btn-secondary">edit</a>
                                        <form type="button" class="btn btn-danger" action="{{route('m_d', $mName)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="bd">Del</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
