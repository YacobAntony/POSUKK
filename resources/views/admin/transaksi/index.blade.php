<link rel="stylesheet" href="{{asset('vendor/light/css/dataTables.bootstrap4.css')}}">
    <!-- Date Range Picker CSS -->
<body>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
            <h2><b>{{ $title }}</b></h2>
            @if(auth()->user()->role != "kasir")
                    <a href="/admin/transaksi/create" class="btn btn-primary"><i class="fas fa-plus"></i>Tambah</a>
                    @endif
                    @if(auth()->user()->role != "admin")
                    <a href="/kasir/transaksi/create" class="btn btn-primary"><i class="fas fa-plus"></i>Tambah</a>
                    @endif

                    @if ($completedTransactionsToday->where('status', 'menunggu')->isNotEmpty())
                <div class="card mt-2 shadow">
                    <div class="card-body">
                    
                    <table class="table" id="mamank"> 
                    <thead>           
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Nama Kasir</th>
                            <th>Aksi</th>
                        </tr>
                     </thead>    
                        @foreach ($completedTransactionsToday as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->created_at->timezone('Asia/Jakarta') }}</td>
                            <td>{{ $item->status }}</td>
                            <td> Rp.{{ format_rupiah($item->total) }}</td>
                            <td>{{ $item->kasir_name}}</td>

                            <td>
                    <div class="d-flex">
                    @if ($item->status == 'menunggu')
                    <!-- Tampilkan tombol Edit dan Hapus hanya jika status pending dan bukan kasir -->
                        <a href="/kasir/transaksi/{{ $item->id }}/edit" class="btn btn-info btn-sm"><i class="fe fe-edit"></i></a>
                        <form action="/kasir/transaksi/{{ $item->id }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm ml-1"><i class="fe fe-trash"></i></button>
                        </form>
                    @endif
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
        @endif
    </div>
 

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
       
                <div class="card mt-2 shadow">
                    <div class="card-body">
                    <table class="table" id="mamank2"> 
                    <thead>           
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Nama Kasir</th>
                            <th>Aksi</th>
                        </tr>
                     </thead>    
                        @foreach ($completedTransactionsNotToday as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->created_at->timezone('Asia/Jakarta') }}</td>
                            <td>{{ $item->status }}</td>
                            <td> Rp.{{ format_rupiah($item->total) }}</td>
                            <td>{{ $item->kasir_name}}</td>

                            <td>
                    <div class="d-flex">
                    @if ($item->status == 'menunggu')
                    <!-- Tampilkan tombol Edit dan Hapus hanya jika status pending dan bukan kasir -->
                    @if (auth()->user()->role != "kasir")
                        <a href="/admin/transaksi/{{ $item->id }}/edit" class="btn btn-info btn-sm"><i class="fe fe-edit"></i></a>
                        <form action="/admin/transaksi/{{ $item->id }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm ml-1"><i class="fe fe-trash"></i></button>
                        </form>
                    @endif
                @elseif ($item->status == 'selesai')
                    <!-- Tampilkan tombol Print hanya jika status selesai -->
                    <a href="/kasir/{{ $item->id }}/generate-pdf" class="btn btn-success btn-block"><i class="fe fe-file-plus"></i></a>
                @endif
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

<script>

$('#mamank2     ').DataTable(
{
  autoWidth: true,
  "lengthMenu": [
    [16, 32, 64, -1],
    [16, 32, 64, "All"]
  ]
});
</script>
