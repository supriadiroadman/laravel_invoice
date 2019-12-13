@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Produk</h3>
                </div>
                <div class="card-body">

                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                    @endif

                    <form action="{{ url('/product/'.$product->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Nama Produk</label>
                            <input type="text" name="title" value="{{$product->title}}"
                                class="form-control {{ $errors->has('title') ? 'is-invalid':'' }}" id=" title"
                                placeholder="Masukkan nama produk">

                            <div class="invalid-feedback">
                                {{$errors->first('title')}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea name="description" id="description"
                                class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}" cols="10"
                                rows="6">{{$product->description}}</textarea>

                            <div class="invalid-feedback">
                                {{$errors->first('description')}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="number" name="price" value="{{$product->price}}"
                                class="form-control {{ $errors->has('price') ? 'is-invalid':'' }}">

                            <div class="invalid-feedback">
                                {{$errors->first('price')}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="stock">Stok</label>
                            <input type="number" name="stock" value="{{$product->stock}}"
                                class="form-control {{ $errors->has('stock') ? 'is-invalid':'' }}">

                            <div class="invalid-feedback">
                                {{$errors->first('stock')}}
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-sm">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
