
<div class="row p-2">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
            <h5><b>{{$title}}</b></h5>
                <a href="/admin/produk/create" class="btn btn-primary mb-2"><i class="fas fa-plus"></i>Tambah</a>
                 <table class="table mt-2">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($produk as $bak)
                   
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $bak->nama }}</td>
                        <td>
                        <div class="d-flex">
                    <a href="/admin/produk/{{$bak->id}}/edit" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>

                    <!-- iki delete -->
                    <form action="/admin/produk/{{$bak->id}}" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" class ="btn btn-danger btn-sm ml-1"><i class = "fas fa-trash"></i></button>
                    </form>
                    <!-- endelet -->
                    </div></td>
                    </tr>
                    @endforeach
                 </table>

                 <div class="d-flex justify-content-center"> {{$produk->links ()}}</div>
                
            </div>
        </div>
    </div>
</div>