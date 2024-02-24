<?php

namespace App\Http\Controllers;

use App\Models\TransaksiDetail;
use App\Models\Transaksi;
use App\Models\Produk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class KasirTransaksiDetailController extends Controller
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
    
        return redirect('/kasir/transaksi/' . $transaksi_id . '/edit');
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
        return redirect('/kasir/transaksi');
    }

}