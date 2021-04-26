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
                        <div class="form-group">
                            <label for="name">Nama produk :</label>
                            <input type="text" class="form-control  {{ $errors->first('name') ? "is-invalid": "" }}" placeholder="Nama.." name="name" value="{{ old('name') }}">
                            @if ($errors->first('name'))
                            <div class="invalid-feedback" style="display: block">
                                {{ $errors->first('name') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="category">Kategori</label>
                            <select class="form-control {{ $errors->first('categories_id') ? "is-invalid": "" }}" id="categories_id" name="categories_id">
                                <option selected disabled>Silahkan pilih salah satu</option>
                                @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('categories_id') == $cat->id ? "selected" : "" }}>
                                    {{ $cat->category }}</option>
                                @endforeach
                            </select>
                            @if ($errors->first('category'))
                            <div class="invalid-feedback" style="display: block">
                                {{ $errors->first('categories_id') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Warna : </label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Merah" name="colors[]" {{ old('colors[]') == 'Merah' ? "checked" : "" }}>
                                <label class="form-check-label">
                                    Merah
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Biru" name="colors[]" {{ old('colors[]') == 'Biru' ? "checked" : "" }}>
                                <label class="form-check-label">
                                    Biru
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Hitam" name="colors[]" {{ old('colors[]') == 'Hitam' ? "checked" : "" }}>
                                <label class="form-check-label">
                                    Hitam
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Abu-abu" name="colors[]" {{ old('colors[]') == 'Abu-abu' ? "checked" : "" }}>
                                <label class="form-check-label">
                                    Abu-abu
                                </label>
                            </div>
                            @if ($errors->first('colors'))
                            <div class="invalid-feedback" style="display: block">
                                {{ $errors->first('colors') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->first('variant') ? "has-error": "" }}">
                            <label>Varian : </label>
                            @foreach ($variants as $variant)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $variant->id }}" name="variant[]"
                                {{ old('variant[]') == $variant->id ? "checked" : "" }}>
                                <label class="form-check-label">
                                    {{ $variant->size }} - @currency($variant->price)
                                </label>
                            </div>
                            @endforeach
                            @if ($errors->first('variant'))
                            <div class="invalid-feedback" style="display: block">
                                {{ $errors->first('variant') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi : </label>
                            <textarea class="form-control  {{ $errors->first('description') ? "is-invalid": "" }}" id="description" rows="3" name="description"></textarea>
                            @if ($errors->first('description'))
                            <div class="invalid-feedback" style="display: block">
                                {{ $errors->first('description') }}
                            </div>
                            @endif
                        </div>

                        <input type="submit" value="Simpan" class="btn btn-success">
                        <a href="{{ route('index') }}" class="btn btn-light float-right">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
