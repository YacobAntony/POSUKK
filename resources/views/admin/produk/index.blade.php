<link rel="stylesheet" href="{{asset('vendor/light/css/dataTables.bootstrap4.css')}}">
    <!-- Date Range Picker CSS -->
    <body>
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title"><b>{{$title}}</b></h2>
                    <a href="/admin/produk/create" class="btn btn-primary"><i class="fas fa-plus"></i>Tambah</a>
                    <div class="card mt-2 shadow">
                        <div class="card-body">
                            <table class="table" id="mamank">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($produk->where('stok', '>', 0) as $bak)
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $bak->nama }}</td>
                                        <td>{{ optional($bak->kategori)->nama }}</td>
                                        <td>{{ $bak->stok }}</td>
                                        <td>
                                            <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="/admin/produk/{{ $bak->id }}/edit"><i
                                                        class="fe fe-edit"></i>Edit</a>
                                                <form action="/admin/produk/{{ $bak->id }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit"
                                                        class="dropdown-item text-danger"><i
                                                            class="fe fe-trash"></i>Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Check for products with stok 0 -->
        @php
        $produkKosong = $produk->where('stok', 0);
        @endphp

        @if ($produkKosong->isNotEmpty())
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card mt-2 shadow">
                        <div class="card-body">
                            <h2><b>Kosong</b></h2>
                            <table class="table" id="">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produkKosong as $bak)
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $bak->nama }}</td>
                                        <td>{{ $bak->stok }}</td>
                                        <td>
                                            <a href="/admin/produk/{{ $bak->id }}/edit"><i
                                                    class="fe fe-edit"></i>Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </main>

</body>

    <script src="{{asset('vendor/light/js/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/light/js/popper.min.js')}}"></script>
    <script src="{{asset('vendor/light/js/config.js')}}"></script>
    <script src="{{asset('vendor/light/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/light/js/dataTables.bootstrap4.min.js')}}"></script>
    <script>

      $('#mamank').DataTable(
      {
        autoWidth: true,
        "lengthMenu": [
          [16, 32, 64, -1],
          [16, 32, 64, "All"]
        ]
      });
    </script>
