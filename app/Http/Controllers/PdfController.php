<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\Kategori;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class PDFController extends Controller
{
    public function generatePDF($id)
    {
        // Fetch the transaction by ID
        $transaction = Transaksi::findOrFail($id);
    
        // Fetch transaction details related to the transaction
        $transactionDetails = TransaksiDetail::where('transaksi_id', $id)->get();
    
        // Pass both transaction and transaction details data to the PDF view
        $data = [
            'transaction' => $transaction,
            'transactionDetail' => $transactionDetails,
        ];
    
        // Load the PDF view
        $pdf = Pdf::loadView('admin.pdf.user-lists', $data);
    
        // Return the PDF content for showing in the browser
        return $pdf->stream('transaction-receipt.pdf');
    }
    


            public function lapor(Request $request)
            {
                // Validasi input tanggal
                $request->validate([
                    'start_date' => 'required|date',
                    'end_date' => 'required|date|after_or_equal:start_date',
                ]);
            
                // Cek apakah tanggal awal kurang dari atau sama dengan tanggal akhir
                $start_date = Carbon::parse($request->start_date);
                $end_date = Carbon::parse($request->end_date);
            
                if ($start_date->gt($end_date)) {
                    // Tampilkan alert jika tanggal tidak valid
                    return redirect()->back();
                    Alert::error('Kesalahan', 'Tanggal awal tidak boleh lebih besar dari tanggal akhir.');

                }
            
                // Ambil data transaksi detail berdasarkan rentang tanggal
                $transaksiDetails = TransaksiDetail::whereBetween('created_at', [
                    $start_date,
                    $end_date->endOfDay(),
                ])->get();
            
                // Pass the transaction details data to the PDF view
                $data = [
                    'transaksiDetails' => $transaksiDetails,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                ];
            
                // Load the PDF view
                $pdf = Pdf::loadView('admin.pdf.laporan', $data);

                // Return the PDF content for showing in the browser
                return $pdf->stream('laporan-transaksi.pdf');
            }
    
}
