<main role="main" class="main-content">



<div class="card shadow mb-4">
                
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                    @isset($kategori)
                        <form action="/admin/kategori/{{ $kategori->id }}" method="POST">
                            @method('put')
                    @else
                    <form action="/admin/kategori" method="POST">
                    @endisset
                    
                        @csrf
                        <div class="form-group">
                            <label for=""><b>Nama Kategori</b></label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                            placeholder="Nama Kategori" value="{{ isset($kategori) ? $kategori->nama : old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <a href="/admin/kategori" class="btn btn-secondary"><i class="fe fe-arrow-left"></i></a>
                        <button type="submit" class="btn btn-primary"><i class="fe fe-save"></i>Simpan</button>
                    </form>
                </div>
                    </div>
                  </div>
                </div>
              </div>