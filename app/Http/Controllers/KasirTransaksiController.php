<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KasirTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Ambil semua transaksi
    $transaksi = Transaksi::orderBy('created_at', 'desc')->get();
    
    // Filter transactions completed today
    $completedTransactionsToday = Transaksi::where('status', 'menunggu', )
        ->orderBy('created_at', 'desc')
        ->get();

    // Filter completed transactions that are not from today
    $completedTransactionsNotToday = Transaksi::where('status', 'selesai')
        ->orderBy('created_at', 'desc')
        ->get();

    $data = [
        'title'                        => 'Manajemen Transaksi',
        'transaksi'                    => $transaksi,
        'completedTransactionsToday'   => $completedTransactionsToday,
        'completedTransactionsNotToday' => $completedTransactionsNotToday,
        'content'                      => 'admin/transaksi/index'
    ];

    return view('admin.layouts.wrapper', $data);
}

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $data = [
            'user_id' => auth()->user()->id,
            'kasir_name' => auth()->user()->name,
            'total' => 0
        ];
        $transaksi = Transaksi::create($data);
        return redirect('/kasir/transaksi/'.$transaksi->id.'/edit');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        
        // $produk = Produk::get();
        $produk = Produk::where('stok', '>', 0)->get();
        $produk_id = request('produk_id');
        $p_detail = Produk::find($produk_id);
        $transaksi = Transaksi::find($id);
    $dibayarkan = request('dibayarkan');
    $kembalian = $dibayarkan - $transaksi->total;

    // Simpan nilai dibayarkan ke dalam database
    $transaksi->update(['dibayarkan' => $dibayarkan]);

        $transaksi_detail = TransaksiDetail::whereTransaksiId($id)->get();

        $act = request('act');
        $qty = request('qty');
        if($act == 'min'){
            if($qty <= 1){
                $qty= 1;
            }else{
                $qty = $qty - 1;
            }
        }else{
            $qty = $qty + 1;
        }
        
        $subtotal = 0;
        if($p_detail){
            $subtotal = $qty * $p_detail->harga;
        }

        $transaksi = Transaksi::find($id);

        $dibayarkan = request('dibayarkan');
        $kembalian = $dibayarkan - $transaksi->total;


        
        $data= [
            'title'   => 'Tambah Transaksi',
            'produk' => $produk,
            'p_detail' => $p_detail,
            'qty' => $qty,
            'subtotal' => $subtotal,
            'transaksi_detail' => $transaksi_detail,
            'transaksi' => $transaksi,
            'kembalian' => $kembalian,
            'content' => 'admin/transaksi/create'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        Alert::success('Sukses', 'Data berhasil dihapus!!');
        return redirect()->back();
    }

}
