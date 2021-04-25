@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Edit Produk</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mt-2">
                    <form action="{{ route('store') }}" method="Post">
                        @csrf
                        <div class="form-group {{ $errors->first('name') ? "has-error": "" }}">
                            <label for="name">Nama produk :</label>
                            <input type="text" class="form-control" placeholder="Nama.." value="{{ $product->name }}">
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        </div>

                        <div class="form-group {{ $errors->first('category') ? "has-error": "" }}">
                            <label for="category">Kategori</label>
                            <select class="form-control" id="categories">
                                <option selected disabled>Silahkan pilih salah satu</option>
                                @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ $product->id == $cat->id ? "selected" : "" }}>
                                    {{ $cat->category }}</option>
                                @endforeach
                            </select>
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        </div>

                        <div class="form-group {{ $errors->first('color') ? "has-error": "" }}">
                            <label>Warna : </label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Merah" name="color[]">
                                <label class="form-check-label">
                                  Merah
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Biru" name="color[]">
                                <label class="form-check-label">
                                    Biru
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Hitam" name="color[]">
                                <label class="form-check-label">
                                    Hitam
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Abu-abu" name="color[]">
                                <label class="form-check-label">
                                    Abu-abu
                                </label>
                              </div>
                              <span class="help-block">{{ $errors->first('color') }}</span>
                        </div>

                        <div class="form-group {{ $errors->first('variant') ? "has-error": "" }}">
                            <label for="category">Varian : </label>
                            <select class="form-control" id="variant">
                                <option selected disabled>Silahkan pilih salah satu</option>
                                @foreach ($variants as $variant)
                                <option value="{{ $variant->id }}" {{ $product->variant->id == $variant->id ? "selected" : "" }}>
                                    {{ $variant->size }} - {{ $variant->price }}</option>
                                @endforeach
                            </select>
                            <span class="help-block">{{ $errors->first('variant') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi : </label>
                            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
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
