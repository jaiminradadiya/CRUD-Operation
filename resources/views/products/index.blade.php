@extends('layouts.app')

@section('main')

<div class="container">
  <div class="text-right">
    <a href="products/create" class="btn btn-dark mt-2">New Product</a>
  </div>

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>Sr.No</th>
        <th>Name</th>
        <th>Description</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <td>{{ $loop->index+1 }}</td>
        <td><a href="products/{{ $product->id}}/show" class="text-dark">{{ $product->name}}</a></td>
        <td>{{ $product->description}}</td>
        <td><img src="images/{{ $product->image}}" class="rounded-circle" while="40" height="40" /></td>
        <td><a href="products/{{ $product->id }}/edit" class="btn btn-dark btn-sm">Edit</a>
        <form  method="post" class="d-inline" action="products/{{ $product->id }}/delete">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm mt-2" >Delete</button>
        </form>
      </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>

@endsection