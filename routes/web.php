<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminTransaksiController;
use App\Http\Controllers\KasirTransaksiController;
use App\Http\Controllers\KasirTransaksiDetailController;
use App\Http\Controllers\AdminTransaksiDetailController;
 use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


//nampilno ngab

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AdminAuthController::class, 'index'])->name('login')->middleware('guest');
Route::get('/register', [AdminAuthController::class, 'nampilnoregister'])->middleware('guest')->name('register');
Route::post('/register', [AdminAuthController::class, 'register'])->middleware('guest');
Route::post('/login/do', [AdminAuthController::class, 'doLogin'])->middleware('guest');
Route::get('/logout', [AdminAuthController::class, 'logout'])->middleware('auth');


Route::get('/forgot-password', function () {
    return view('admin.auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);

})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('admin.auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');


Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:5|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ( $user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');
// end bagian lupa pass





Route::get('/', function (Request $request) {
    $previousUrl = $request->headers->get('referer');

    // Periksa role pengguna
    if (auth()->check()) {
        $redirectUrl = '';

        if (auth()->user()->role == 'admin') {
            $redirectUrl = '/admin/dashboard';
        } elseif (auth()->user()->role == 'kasir') {
            $redirectUrl = '/kasir/dashboard';
        }

        if ($redirectUrl) {
            return redirect($redirectUrl);
        }
    }

    // Jika belum login atau role tidak terdefinisi, kembalikan ke halaman login
    return redirect('/login');
})->middleware('auth');


    Route::prefix('/admin')->middleware(['auth', 'cekrole:admin'])->group(function () {
    Route::get('/dashboard', function () {
        $controller = new AdminTransaksiDetailController(); 
        $totalPesanan = $controller->getTotalPesanan(); 
        $totalPendapatanBulanIni = $controller->getTotalPendapatanBulanIni();
        $averageSubtotal = $controller->getAverageSubtotal();
        $totalSubtotalToday = $controller->getTotalSubtotalToday(); 
        $totalSubtotalYesterday = $controller->getTotalSubtotalYesterday(); 
        $totalTransaksiDetail = $controller->getTotalTransaksiDetail(); 
        $bestSellingProduct = $controller->getBestSellingProduct();
        $totalTransaksiDetailToday = $controller->getTotalTransaksiDetailToday();
        $totalProduk = $controller->getTotalProduk();
        $produkData = $controller->getProdukData(); 
        $transaksiData = $controller->getTransaksiData(); 
        $startDate = now()->startOfMonth(); // Awal bulan ini
        $endDate = now()->endOfMonth(); // Akhir bulan ini

        $data = [
            'content'                => 'admin.dashboard.index',
            'totalPesanan'           => $totalPesanan,
            'totalPendapatanBulanIni' => $totalPendapatanBulanIni,
            'averageSubtotal'        => $averageSubtotal,
            'totalSubtotalToday'     => $totalSubtotalToday, 
            'totalSubtotalYesterday' => $totalSubtotalYesterday, 
            'totalTransaksiDetail'   => $totalTransaksiDetail, 
            'bestSellingProduct'     => $bestSellingProduct,
            'totalTransaksiDetailToday' => $totalTransaksiDetailToday,
            'totalProduk' => $totalProduk,
            'produkData' => $produkData, 
            'transaksiData'   => $transaksiData,
            'startDate'              => $startDate,
            'endDate'                => $endDate,



        ];
        return view('admin.layouts.wrapper',$data);
    });

    Route::get('/transaksi/detail/selesai/{id}',[AdminTransaksiDetailController::class, 'done']);
    Route::get('/transaksi/detail/delete',[AdminTransaksiDetailController::class, 'delete']);
    Route::post('/transaksi/detail/create', [AdminTransaksiDetailController::class, 'create']);
    
    Route::resource('/transaksi', AdminTransaksiController::class);
    Route::resource('/transaksidetail', AdminTransaksiDetailController::class);
    Route::resource('/produk', AdminProdukController::class);
    Route::resource('/kategori', AdminKategoriController::class);
    Route::resource('/user', AdminUserController::class);  

    Route::get('/{id}/generate-pdf', [App\Http\Controllers\PdfController::class, 'generatePDF']);
    Route::get('/{id}/pdf/user-lists', [App\Http\Controllers\PdfController::class, 'generatePDF']);
    Route::get('/generate-pdf', [PDFController::class, 'showGeneratePDFForm'])->name('generate-pdf.form');
    Route::post('/generate-pdf', [PDFController::class, 'lapor'])->name('generate-pdf');
    
});

//------------------------------------------------------------------------------------------//


Route::prefix('/kasir')->middleware(['auth', 'cekrole:admin,kasir'])->group(function () {
    Route::get('/dashboarduser',function(){
        $controller = new AdminTransaksiDetailController(); 
        $produkData = $controller->getProdukData(); 
        $bestSellingProduct = $controller->getBestSellingProduct();
        $data = [
            'content' => 'admin.dashboarduser.index',
            'bestSellingProduct'     => $bestSellingProduct,
            'produkData' => $produkData, 
        ];
        return view('admin.layouts.wrapper', $data);
        });

    Route::get('/transaksi/detail/selesai/{id}',[KasirTransaksiDetailController::class, 'done']);
    Route::get('/transaksi/detail/delete',[KasirTransaksiDetailController::class, 'delete']);
    Route::post('/transaksi/detail/create', [KasirTransaksiDetailController::class, 'create']);
    Route::resource('/transaksi', KasirTransaksiController::class);
    Route::resource('/transaksidetail', KasirTransaksiDetailController::class);
    Route::get('/{id}/generate-pdf', [App\Http\Controllers\PdfController::class, 'generatePDF']);
    Route::get('/{id}/pdf/user-lists', [App\Http\Controllers\PdfController::class, 'generatePDF']);


});




 

