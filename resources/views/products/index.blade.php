@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title">Manajemen Produk</h3>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('/product/create') }}" class="btn btn-primary btn-sm float-right">Tambah
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
                                <th>Nama Produk</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- DIRECTIVE FORELSE SAMA DENGAN FOREACH -->
                            <!-- HANYA SAJA SUDAH FORELSE SUDAH DILENGKAPI FUNGSI UNTUK MENGECEK DATA ADA ATAU TIDAK SEHINGGA KITA TIDAK PERLU LAGI MENGGUNAKAN IF CONDITION -->
                            <!-- JIKA DATA KOSONG MAKA FUNGSI YANG BERJALAN ADALAH CODE BERADA PADA BLOCK CODE @@empty-->
                            @forelse ($products as $product)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->title}}</td>
                                <td>{{str_limit($product->description, 50)}}</td>
                                <td>{{number_format($product->price)}}</td>
                                <td>{{$product->stock}}</td>
                                <td>{{$product->created_at->format('d-m-Y')}}</td>
                                <td>
                                    <form action="{{ url('/product/'.$product->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ url('/product/'.$product->id) }}"
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
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
