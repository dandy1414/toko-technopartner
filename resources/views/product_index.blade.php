@extends('layouts.app')

@section('title', 'List Produk')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">List Produk</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('product.create') }}" class="btn btn-primary">Tambah</a>
                    <a href="{{ route('image.index') }}" class="btn btn-info">List Gambar</a>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-2">
                    <h5>Filter : </h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    @foreach ($categories as $category)
                    <a href="{{ route('product.create', $category->id) }}" class="btn btn-success">{{ $category->category }}</a>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <form class="form-inline float-right">
                        <input class="form-control mr-sm-2" type="search" placeholder="Cari.." aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
                      </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-2">
                    <table class="table table-striped">
                        <thead class="thead thead-dark">
                            <tr>
                                <th scope="col" style="text-align: center">No</th>
                                <th scope="col" style="text-align: center">Nama</th>
                                <th scope="col" style="text-align: center">Kategori</th>
                                <th scope="col" style="width: 180px; text-align: center">Deskripsi</th>
                                <th scope="col" style="text-align: center">Warna</th>
                                <th scope="col" style="text-align: center">Ukuran</th>
                                <th scope="col" style="text-align: center">Harga</th>
                                <th scope="col" style="width: 195px; text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <th scope="row" style="text-align: center">{{ $loop->iteration }}</th>
                                <td>{{ $product->name }}</td>
                                <td>
                                    {{ $product->category->category }}
                                </td>
                                <td>{{ $product->description }}</td>
                                <td>
                                    @foreach ($product->colors as $value)
                                        {{ $value }} <br>
                                    @endforeach
                                </td>
                                <td style="text-align: center; width: 50px" >
                                    @foreach ($product->variant as $value)
                                    {{ $value->size }} <br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($product->variant as $value)
                                    @currency($value->price) <br>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('product.show', $product->id) }}" class="btn btn-info btn-sm">
                                        Details
                                    </a>
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-sm">
                                        Edit
                                    </a>
                                    <a href="{{ route('product.destroy', $product->id) }}" class="btn btn-danger btn-sm">
                                        Delete
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
