@extends('layouts.app')
@section('content')
    <div class="container">

    <a href="{{ route('pages.create') }}" class="btn btn-outline-info">Add new Pet</a>
    @include('layouts._success')
        <div class="row">
        @foreach( $pets as $pet )
            <div class="col-sm-3">
                <div class="card mb-3">
                    <h3 class="card-header">{{ $pet->name }}</h3>
                    <img style="height: 200px; width: 70%; display: block;" src="storage/uploadedImages/{{ $pet->image }}" alt="Card image">
                    <div class="card-body">
                    <a href="#" class="card-link">#{{ $pet->type }}</a>
                         <!-- str_limit( <p class="card-text">{{ $pet->description }}.</p>, 20) -->
                         <!-- str_limit({{ $pet->description }}, 20); -->
                         <p>{{ str_limit( $pet->description, 20 ) }}</p>   
                    </div>
                    <div class="card-body">
                        <div class="input-group">
                            <a href="#" class="btn btn-outline-primary btn-sm">Show</a>
                            <a href="{{ route('pages.edit', $pet->id) }}" class="btn btn-outline-info btn-sm">Update</a>
                            <form action="{{ route('pages.destroy', $pet->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
