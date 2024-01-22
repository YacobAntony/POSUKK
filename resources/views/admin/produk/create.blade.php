<div class="row p-2">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
            <h5><b>{{$title}}</b></h5>

            @isset($produk)
             <form action="/admin/produk/{{$produk->id}}" method="POST">
                @method ('put')
             @else
             <form action="/admin/produk" method="POST">
             @endisset
               <hr>       
                    @csrf

                    <label for="">Nama Kategori</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Kategori" value="{{ isset($produk) ? $produk->nama : old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedbeck">
                            {{ $message }}
                        </div>
                    @enderror


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
                               

                    <label for="">Harga</label>
                    <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="Harga" value="{{ isset($produk) ? $produk->harga : old('harga') }}">
                    @error('harga')
                        <div class="invalid-feedbeck">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="">Stok</label>
                    <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" placeholder="Stok" value="{{ isset($produk) ? $produk->stok : old('stok') }}">
                    @error('stok')
                        <div class="invalid-feedbeck">
                            {{ $message }}
                        </div>
                    @enderror
                              

                    <a href="{{ URL::previous() }}" class="btn btn-secondary mt-2" ><i class="fas fa-arrow-left"></i></a>
                <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>