@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Tambah Produk</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mt-2">
                    <form action="{{ route('product.store') }}" method="Post">
                        @csrf
                        <div class="form-group {{ $errors->first('name') ? "has-error": "" }}">
                            <label for="name">Nama produk :</label>
                            <input type="text" class="form-control" placeholder="Nama.." name="name">
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        </div>

                        <div class="form-group {{ $errors->first('categories_id') ? "has-error": "" }}">
                            <label for="category">Kategori</label>
                            <select class="form-control" id="categories_id" name="categories_id">
                                <option selected disabled>Silahkan pilih salah satu</option>
                                @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('categories_id') == $cat->id ? "selected" : "" }}>
                                    {{ $cat->category }}</option>
                                @endforeach
                            </select>
                            <span class="help-block">{{ $errors->first('categories_id') }}</span>
                        </div>

                        <div class="form-group {{ $errors->first('colors') ? "has-error": "" }}">
                            <label>Warna : </label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Merah" name="colors[]">
                                <label class="form-check-label">
                                    Merah
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Biru" name="colors[]">
                                <label class="form-check-label">
                                    Biru
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Hitam" name="colors[]">
                                <label class="form-check-label">
                                    Hitam
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Abu-abu" name="colors[]">
                                <label class="form-check-label">
                                    Abu-abu
                                </label>
                            </div>
                            <span class="help-block">{{ $errors->first('color') }}</span>
                        </div>

                        <div class="form-group {{ $errors->first('variant') ? "has-error": "" }}">
                            <label>Harga : </label>
                            @foreach ($variants as $variant)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $variant->id }}" name="variant[]">
                                <label class="form-check-label">
                                    {{ $variant->size }} - @currency($variant->price)
                                </label>
                            </div>
                            @endforeach
                            <span class="help-block">{{ $errors->first('color') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi : </label>
                            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                        </div>
                        <span class="help-block">{{ $errors->first('description') }}</span>
                        <input type="submit" value="Simpan" class="btn btn-success">
                        <a href="{{ route('index') }}" class="btn btn-light float-right">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
