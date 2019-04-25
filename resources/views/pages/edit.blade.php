@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
            <h3><strong>Update The Pet</strong></h3>
                <form action="{{ route('pages.update', $pets->id) }}" method="post">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $pets->name }}">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" id="" cols="30" rows="5" class="form-control">{{ $pets->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Type</label>
                        <select name="typePet"class="form-control">
                            <option value="birds">Birds</option>
                            <option value="reptiles">Reptiles</option>
                            <option value="fishs">Fishs</option>
                            <option value="mammals">Mammals</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">Update Pet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
