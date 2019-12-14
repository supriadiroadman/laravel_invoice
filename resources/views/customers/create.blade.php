@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data Pelanggan</h3>
                </div>
                <div class="card-body">
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                    @endif
                    <form action="{{url('/customer')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" name="name" id="name" value="{{old('name')}}"
                                class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}"
                                placeholder="Masukkan nama lengkap" />

                            <div class="invalid-feedback">
                                {{$errors->first('name')}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone">No Telp</label>
                            <input type="text" name="phone" id="phone" value="{{old('phone')}}"
                                class="form-control {{ $errors->has('phone') ? 'is-invalid':'' }}" />

                            <div class="invalid-feedback">
                                {{$errors->first('phone')}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <textarea name="address" id="address"
                                class="form-control {{ $errors->has('address') ? 'is-invalid':'' }}" cols="10"
                                rows="6">{{old('address')}}</textarea>

                            <div class="invalid-feedback">
                                {{$errors->first('address')}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{old('email')}}"
                                class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" />

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
