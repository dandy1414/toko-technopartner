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
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Gambar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @forelse ($images as $image)
                                <th scope="row"> 1</th>
                                <td>
                                    {{ $image->product->name }}
                                </td>
                                <td>
                                    <img src="{{ $image->image_link }}" alt="">
                                </td>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center p-5">
                                        Data tidak tersedia
                                    </td>
                                </tr>
                                @endforelse
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
