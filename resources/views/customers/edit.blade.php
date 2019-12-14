@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update Data Pelanggan</h3>
                </div>
                <div class="card-body">
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                    @endif
                    <form action="{{url('/customer/'.$customer->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" name="name" id="name" value="{{$customer->name}}"
                                class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}"
                                placeholder="Masukkan nama lengkap" />

                            <div class="invalid-feedback">
                                {{$errors->first('name')}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone">No Telp</label>
                            <input type="text" name="phone" id="phone" value="{{$customer->phone}}"
                                class="form-control {{ $errors->has('phone') ? 'is-invalid':'' }}" />

                            <div class="invalid-feedback">
                                {{$errors->first('phone')}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <textarea name="address" id="address"
                                class="form-control {{ $errors->has('address') ? 'is-invalid':'' }}" cols="10"
                                rows="6">{{$customer->address}}</textarea>

                            <div class="invalid-feedback">
                                {{$errors->first('address')}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{$customer->email}}"
                                class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" readonly />

                            <div class="invalid-feedback">
                                {{$errors->first('email')}}
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-sm">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
