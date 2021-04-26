@extends('layouts.app')

@section('title', 'List Gambar')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">List Gambar</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('image.create') }}" class="btn btn-primary">Tambah</a>
                    <a href="{{ route('index') }}" class="btn btn-info">List Produk</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-2">
                    <table class="table table-striped">
                        <thead class="thead thead-dark">
                            <tr>
                                <th scope="col" style="text-align: center">No</th>
                                <th scope="col" style="text-align: center">Nama Produk</th>
                                <th scope="col" style="text-align: center">Kategori</th>
                                <th scope="col" style="text-align: center">Gambar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($images as $image)
                            <tr>
                                <th scope="row" style="text-align: center">{{ $loop->iteration }}</th>
                                <td style="text-align: center">{{ $image->product->name }}</td>
                                <td style="text-align: center">{{ $image->product->category->category }}</td>
                                <td style="text-align: center">
                                    <img src="{{ $image->image_link }}" alt="" class="img-thumbnail" style="width: 150px; height: 75px">
                                </td>
                            @empty
                            </tr>
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
