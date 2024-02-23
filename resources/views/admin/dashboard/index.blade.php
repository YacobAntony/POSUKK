<main role="main" class="main-content">
<div class="row">
<div class="container-fluid mt-2">
<div class="alert alert-warning bg-brown text-white text-center">
    <img src="{{ asset('vendor/publish/logo.png') }}" class="rounded-image" width="auto" height="auto" alt="Yumewak Image">
    <p class="small text-muted mb-0">Periode: {{ $startDate->format('Y-m-d') }} - {{ $endDate->format('Y-m-d') }}</p>
</div>

            </div>
                <div class="col-md-6 col-xl-3 mb-4">
                  <div class="card shadow bg-primary text-white border-0">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-3 text-center">
                          <span class="circle circle-sm bg-primary-light">
                            <i class="fe fe-16 fe-shopping-bag text-white mb-0"></i>
                          </span>
                        </div>
                        <div class="col pr-0">
                        <p class="small text-muted mb-0">Pendapatan bulan ini</p>
                        <span class="h3 mb-0 text-white">Rp.{{ format_rupiah($totalPendapatanBulanIni) }}</span>
                    </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                  <div class="card shadow border-0">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-3 text-center">
                          <span class="circle circle-sm bg-primary">
                            <i class="fe fe-16 fe-shopping-cart text-white mb-0"></i>
                          </span>
                        </div>
                        <div class="col pr-0">
                          <p class="small text-muted mb-0">Barang dipesan Bulan Ini</p>
                          <span class="h3 mb-0">{{ $totalPesanan }}</span>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                  <div class="card shadow border-0">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-3 text-center">
                          <span class="circle circle-sm bg-primary">
                            <i class="fe fe-16 fe-filter text-white mb-0"></i>
                          </span>
                        </div>
                        <div class="col">
                          <p class="small text-muted mb-0">Total Transaksi Bulan Ini</p>
                          <div class="row align-items-center no-gutters">
                            <div class="col-auto">
                              <span class="h3 mr-2 mb-0">{{$totalTransaksiDetail}}</span>
                            </div>
                            <div class="col-md-12 col-lg">
                              <div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                  <div class="card shadow border-0">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-3 text-center">
                          <span class="circle circle-sm bg-primary">
                            <i class="fe fe-16 fe-activity text-white mb-0"></i>
                          </span>
                        </div>
                        <div class="col">
                          <p class="small text-muted mb-0">Rata rata Pemesanan</p>
                          <span class="h3 mb-0">Rp.{{ format_rupiah($averageSubtotal) }}</span>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


         <div class="row">
    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header">
                <span class="card-title">Pendapatan Hari Ini</span>
            </div>
            <div class="card-body my-n1">
                <div class="d-flex">
                    <div class="flex-fill">
                        <h4 class="mb-0">{{ format_rupiah($totalSubtotalToday) }}</h4>
                        <p class="text-muted">Waktu: {{ date('Y-m-d') }}</p>

                    </div>
                    <!-- ... Bagian lainnya ... -->
                </div>
            </div> <!-- .card-body -->
        </div> <!-- .card -->
    </div> <!-- .col -->

    <div class="col-md-6 col-xl-3 mb-4">
    <div class="card shadow mb-4">
        <div class="card-header">
            <span class="card-title">Pendapatan Kemarin</span>
        </div>
        <div class="card-body my-n1">
            <div class="d-flex">
                <div class="flex-fill">
                    <h4 class="mb-0">{{ format_rupiah($totalSubtotalYesterday) }}</h4>
                    <p class="text-muted">Waktu: {{ date('Y-m-d', strtotime('-1 day')) }}</p>
                </div>
                <!-- ... Bagian lainnya ... -->
            </div>
        </div> <!-- .card-body -->
    </div> <!-- .card -->
</div> <!-- .col -->

    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header">
                <span class="card-title">Transaksi Hari Ini</span>
            </div>
            <div class="card-body my-n1">
                <div class="d-flex">
                    <div class="flex-fill">
                    <h4 class="mb-0">{{ $totalTransaksiDetailToday }}</h4>
                    <p class="text-muted">Waktu: {{ date('Y-m-d') }}</p>

                    </div>
                    <!-- ... Bagian lainnya ... -->
                </div>
            </div> <!-- .card-body -->
        </div> <!-- .card -->
    </div> <!-- .col -->
    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header">
                <span class="card-title">Produk</span>
            </div>
            <div class="card-body my-n1">
                <div class="d-flex">
                    <div class="flex-fill">
                    <h4 class="mb-0">{{ $totalProduk }}</h4>
                    <p class="text-muted">Unit</p>
                    </div>
                    <!-- ... Bagian lainnya ... -->
                </div>
            </div> <!-- .card-body -->
        </div> <!-- .card -->
    </div> <!-- .col -->
</div>


<div class="row">
                <!-- Recent Activity -->
                <div class="col-md-12 col-lg-4 mb-4">
                  <div class="card timeline shadow">
                    <div class="card-header">
                      <strong class="card-title">Barang terlaris</strong>
                    </div>
                    <div class="card-body" data-simplebar="init" style="height:355px; overflow-y: auto; overflow-x: hidden;"><div class="simplebar-wrapper" style="margin: -20px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 20px;">
                      <div>
                      @foreach($bestSellingProduct as $product)
                    <div class="list-group-item">
                        <div class="row">
                            <div class="col-auto">
                            <small><strong>{{ $loop->iteration }}.</strong></small>
                            </div>
                            <div class="col">

                                <small><strong>{{ $product->produk_name }}</strong></small>
                                <div class="my-0 text-muted small">Terjual Sebanyak {{ $product->total_qty }}</div>
                          
                            </div>
                        </div>
                    </div>
                @endforeach
                      </div>
                      <div class="">                 
</div>
                      <div class="">
                        <div class="pl-5">
                         
                          </p>
                        </div>
                      </div>
                    </div></div></div></div><div class="simplebar-placeholder" style="width: 237px; height: 1624px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 77px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div> <!-- / .card-body -->
                  </div> <!-- / .card -->
                </div> <!-- / .col-md-6 -->
                <!-- Striped rows -->




                
                <div class="col-md-12 col-lg-8">
                  <div class="card shadow">
                    <div class="card-header">
                      <strong class="card-title">Produk Baru</strong>
                      <a class="float-right small text-muted" href="/admin/produk">View all</a>
                    </div>
                    <div class="card-body my-n2">
                      <table class="table table-striped table-hover table-borderless">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Produk</th>
                            <th>Kategori</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                          @foreach($produkData as $bak)
                            <td>{{$loop->iteration}}</td>
                            <th>{{ $bak->created_at->format('H:i M d, Y') }}</th>
                            <th scope="col">{{$bak->nama}}</th>
                            
                            <td>{{ $bak->kategori->nama }}</td>
                            <td></td>
                          </tr>
                          
                         @endforeach
                         
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div> <!-- Striped rows -->
                
             
              
    <div class="col-md-12 mb-4">
    <div class="card shadow">
        <div class="card-header">
            <strong class="card-title">Transaksi Terakhir</strong>
            <a class="float-right small text-muted" href="/admin/transaksi">View all</a>
        </div>
        <div class="card-body">
            <div class="list-group list-group-flush my-n3">
                @foreach ($transaksiData as $transaksi)
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span>{{ $loop->iteration }}<i class="fe fe-shield-off fe-16 text-white"></i></span>
                            </div>
                            <div class="col">
                                <small><strong>{{ $transaksi->created_at->format('H:i M d, Y') }}</strong></small>
                                <div class="mb-2 text-muted small"><strong>{{ $transaksi->kasir_name }}</strong>Mendapat uang dari transaksi sebseasr <strong>{{$transaksi->total}}</strong></div>
                                <!-- <span class="badge badge-pill badge-warning">Selesai</span> -->
                            </div>
                           
                        </div> <!-- / .row -->
                    </div><!-- / .list-group-item -->
                @endforeach
            </div> <!-- / .list-group -->
        </div> <!-- / .card-body -->
    </div> <!-- / .card -->
</div>
<button onclick="printPage()" class="btn btn-primary">Cetak Halaman</button>

</div>
<script>
    // Fungsi untuk mencetak halaman
    function printPage() {
        window.print();
    }
</script>