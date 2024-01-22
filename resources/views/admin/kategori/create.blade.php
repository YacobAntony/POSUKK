<div class="row p-2">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
            <h5><b>{{$title}}</b></h5>

            @isset($kategori)
             <form action="/admin/kategori/{{$kategori->id}}" method="POST">
                @method ('put')
             @else
             <form action="/admin/kategori" method="POST">
             @endisset

               <hr>
                           
                    @csrf
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror "
                    placeholder="Nama Kategori" value="{{ isset($kategori) ? $kategori->nama : old ( 'nama') }} ">
                    @error('nama')
                                <div class="invalid-feedback">
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