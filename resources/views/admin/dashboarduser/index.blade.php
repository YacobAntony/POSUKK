<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="container-fluid mt-2">
            <div class="alert alert-warning bg-brown text-white text-center">
    <img src="{{ asset('vendor/publish/logo.png') }}" class="rounded-image" width="auto" height="auto" alt="Yumewak Image">
            </div>
            </div>
        </div>
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
</main>
