@extends('layouts.app')

@section('title', 'Tambah Gambar')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Tambah Gambar</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mt-2">
                    <form action="{{ route('image.store') }}" method="Post">
                        @csrf
                        <div class="form-group">
                            <label for="product">Pilih Produk : </label>
                            <select class="form-control {{ $errors->first('product') ? "is-invalid": "" }}" id="product" name="product">
                                <option selected disabled>Silahkan pilih salah satu</option>
                                @foreach ($products as $product)
                                <option value="{{ $product->id }}" {{ old('product') == $product->id ? "selected" : "" }}>
                                    {{ $product->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->first('pakaian'))
                            <div class="invalid-feedback" style="display: block">
                                {{ $errors->first('pakaian') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="image">Link Gambar :</label>
                            <input type="text" class="form-control  {{ $errors->first('image') ? "is-invalid": "" }}" placeholder="Link Gambar.." name="image">
                            <span class="help-block">{{ $errors->first('image') }}</span>
                            @if ($errors->first('image'))
                            <div class="invalid-feedback" style="display: block">
                                {{ $errors->first('image') }}
                            </div>
                            @endif
                        </div>

                        <input type="submit" value="Simpan" class="btn btn-success">
                        <a href="{{ route('image.index') }}" class="btn btn-light float-right">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
