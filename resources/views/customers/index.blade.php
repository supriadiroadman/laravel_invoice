@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title">Manajemen Data Pelanggan</h3>
                        </div>
                        <div class="col-md-6">
                            <a href="{{url('/customer/create')}}" class="btn btn-primary btn-sm float-right">Tambah
                                Data</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {!!session('success')!!}
                    </div>
                    @endif

                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>No Telp</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($customers as $customer)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->phone}}</td>
                                <td>{{str_limit($customer->address,50)}}</td>
                                <td><a href="mailto:{{$customer->email}}">{{$customer->email}}</a></td>
                                <td>
                                    <form action="{{url('/customer/'.$customer->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ url('/customer/'.$customer->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah anda yakin ?');">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="6">
                                    <h3>Tidak ada data</h3>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="float-right">
                        {{$customers->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
