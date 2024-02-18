@extends('layouts.app')
@section('main')

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <dic class="card mt-3 p-3"> 
                        <form method="POST" action="/products/store" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name')}}" />
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description"> {{ old('description')}}</textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control p-1" name="image" value="{{ old('image')}}"/>
                                @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </dic>
                </div>
            </div>
        </div>
@endsection
