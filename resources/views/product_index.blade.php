@extends('layouts.app')

@section('title', 'List Produk')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">List Produk</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('create') }}" class="btn btn-primary">Tambah</a>
                    <a href="{{ route('image.index') }}" class="btn btn-info">List Gambar</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-2">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Warna</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $product->name }}</td>
                                <td>
                                    {{ $product->category->category }}
                                </td>
                                <td>
                                    {{ $product->colors }}
                                </td>
                                <td>{{ $product->description }}</td>
                                <td>
                                    @foreach ($product->variant as $value)
                                    Rp. {{ $value->price }}
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-sm">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center p-5">
                                    Data tidak tersedia
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
