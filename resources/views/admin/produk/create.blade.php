<main role="main" class="main-content">
<div class="card shadow mb-4">
    <div class="card-header">
        <strong class="card-title">{{$title}}</strong>
    </div>
    <div class="card-body">
            @isset($produk)
             <form action="/admin/produk/{{$produk->id}}" method="POST">
                @method ('put')
             @else
             <form action="/admin/produk" method="POST">
             @endisset
           
                    @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                            <label for=""><b>Nama Produk</b></label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                            placeholder="Nama produk" value="{{ isset($produk) ? $produk->nama : old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    Produk Sudah Ada
                                </div>
                            @enderror
                        </div>

                    <div class="form-group mb-3">
                    <label for="">Kategori</label>
                          <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" id="">
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategori as $item)
                        <option value="{{ $item->id }}" {{ isset($produk) ? $item->id == $produk->kategori_id ? 'selected' : '' : '' }}>{{ $item->nama }}</option>
                        @endforeach
                         </select>
                         @error('kategori_id')
                        <div class="invalid-feedbeck">
                            {{ $message }}
                         </div>
                         @enderror
                               
                    </div>
                    <div class="form-group mb-3">
                    <label for="">Harga</label>
                    <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="Harga" value="{{ isset($produk) ? $produk->harga : old('harga') }}">
                    @error('harga')
                        <div class="invalid-feedbeck">
                            {{ $message }}
                        </div>
                    @enderror

                    </div>
                    <div class="form-group mb-3">
                    <label for="">Stok</label>
                    <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" placeholder="Stok" value="{{ isset($produk) ? $produk->stok : old('stok') }}" min="0">
                    @error('stok')
                        <div class="invalid-feedbeck">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                </div> <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                    <label for="">Diskon</label>
                    <input type="number" name="diskon" class="form-control @error('Diskon') is-invalid @enderror" placeholder="Diskon" value="{{ isset($produk) ? $produk->diskon : old('diskon') }}">
                    @error('diskon')
                        <div class="invalid-feedbeck">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="form-group mb-3">
                        <a href="{{ URL::previous() }}" class="btn btn-secondary mt-2"><i class="fe fe-arrow-left"></i></a>
                        <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
