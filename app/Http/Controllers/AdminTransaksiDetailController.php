<?php

namespace App\Http\Controllers;

use App\Models\TransaksiDetail;
use App\Models\Transaksi;
use App\Models\Produk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
  

class AdminTransaksiDetailController extends Controller
{

    public function index()
    {
        $totalPesanan = TransaksiDetail::sum('qty'); // atau gunakan logika lain sesuai kebutuhan
        $data = [
            'title'      => 'Manajemen Transaksi',
            'td' => TransaksiDetail::get(),
            'totalPesanan' => $totalPesanan,
            'content'    => 'admin/transaksidetail/index'
        ];
    
        return view('admin.layouts.wrapper', $data);
    }


  

    function create(Request $request)
    {
        $produk_id = $request->produk_id;
        $transaksi_id = $request->transaksi_id;
    
        // Update stock
        $produk = Produk::find($produk_id);
    
        // Validasi agar qty tidak melebihi stok yang tersedia
        if ($request->qty > $produk->stok) {
            Alert::error('Error', 'Qty melebihi stok yang tersedia. Stok tersedia: ' . $produk->stok)->showConfirmButton('OK');
            return redirect()->back();
        }
    
        $newStock = $produk->stok - $request->qty;
        $produk->update(['stok' => $newStock]);
    
        $td = TransaksiDetail::whereProdukId($produk_id)->whereTransaksiId($transaksi_id)->first();
    
        $transaksi = Transaksi::find($transaksi_id);
    
        $diskonPersen = $produk->diskon;
        if ($td == null) {
            $subtotal = ($request->subtotal - ($request->subtotal * $diskonPersen / 100));
            $data = [
                'produk_id'    => $produk_id,
                'produk_name'  => $request->produk_name,
                'transaksi_id' => $transaksi_id,
                'qty'          => $request->qty,
                'subtotal'     => $subtotal,
            ];
    
            TransaksiDetail::create($data);
            $dt = [
                'total' => $subtotal + $transaksi->total,
            ];
            $transaksi->update($dt);
        } else {
            $subtotal = ($request->subtotal - ($request->subtotal * $diskonPersen / 100));
            $data = [
                'qty'      => $td->qty + $request->qty,
                'subtotal' => $td->subtotal + $subtotal,
            ];
            $td->update($data);
            $dt = [
                'total' => $transaksi->total + $subtotal,
            ];
            $transaksi->update($dt);
        }
    
        return redirect('/admin/transaksi/' . $transaksi_id . '/edit');
    }
    
    

    function delete(){
    $id = request('id');
    $td = TransaksiDetail::find($id);
    $transaksi = Transaksi::find($td->transaksi_id);

    // Update stock
    $produk = Produk::find($td->produk_id);
    $newStock = $produk->stok + $td->qty;
    $produk->update(['stok' => $newStock]);

    $data = [
    'total' => $transaksi->total - $td->subtotal,
    ];
    $transaksi->update($data);
    $td->delete();
    return redirect()->back();
    }

    function done($id)
    {
        $transaksi = Transaksi::find($id);
        $data = [
            'status' => 'selesai'
        ];
        $transaksi->update($data);
        return redirect('/admin/transaksi');
    }

    
////dasbot/////////////////////////////////////
    

    public function getTotalPendapatanBulanIni()
    {
    $totalPendapatan = TransaksiDetail::whereMonth('created_at', now()->month)
        ->sum('subtotal');

    return $totalPendapatan;
     }
 
     public function getAverageSubtotal()
     {
         return TransaksiDetail::avg('subtotal');
     }
     
     public function getTotalPesanan()
    {
    return TransaksiDetail::whereMonth('created_at', now()->month)
    ->sum('qty');
    }
     
     public function getTotalSubtotalToday()
        {
            $totalSubtotalToday = TransaksiDetail::whereDate('created_at', Carbon::today())->sum('subtotal');
            return $totalSubtotalToday;
        }

        public function getTotalSubtotalYesterday()
        {
            $totalSubtotalYesterday = TransaksiDetail::whereDate('created_at', Carbon::yesterday())->sum('subtotal');
            return $totalSubtotalYesterday;
        }

        public function getTotalTransaksiDetail()
    
            {
                $startDate = now()->startOfMonth(); // Awal bulan ini
                $endDate = now(); // Saat ini
                 $totalTransaksiDetail = TransaksiDetail::whereBetween('created_at', [$startDate, $endDate])->count();
                return $totalTransaksiDetail;
            }

            // Di dalam AdminTransaksiDetailController

        public function getBestSellingProduct()
        {
            $bestSellingProducts = TransaksiDetail::select('produk_name', \DB::raw('SUM(qty) as total_qty'))
                ->groupBy('produk_name')
                ->orderByDesc('total_qty')
                ->take(5) // Ambil lima produk terlaris
                ->get();

            return $bestSellingProducts;
       }

            public function getTotalTransaksiDetailToday()
            {
                $todayStart = Carbon::now()->startOfDay();
                $todayEnd = Carbon::now()->endOfDay();
                $totalTransaksiDetailToday = TransaksiDetail::whereBetween('created_at', [$todayStart, $todayEnd])->count();
                return $totalTransaksiDetailToday;
            }
            public function getTotalProduk()

                {
                    $totalProduk = Produk::count();

                    return $totalProduk;
                }
                public function getProdukData()
                {
                    $produkData = Produk::latest()->limit(6)->get();
                    return $produkData;
                }

                public function getTransaksiData()
                {
                    $transaksiData = Transaksi::latest()->limit(6)->get();
                    return $transaksiData;
                }

}