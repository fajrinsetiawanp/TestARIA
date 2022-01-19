<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return redirect('frontend/home');
    // return redirect('/in-development');
});

// Route::get('/admin', function () {
// 	return redirect('admin');
// });

Route::get('/in-development', function(){
	return view('maintenis');
});

Route::get('/admin/tb_order_wholesales/tanggal-kirim/{id}/{date}', 'CBHook@setTglKirim');

// solve url wholesale
Route::get('/tb_order_wholesales/doremi', function(){
	return redirect('/admin/tb_order_wholesales?label=doremi');
});
Route::get('/tb_order_wholesales/musika', function(){
	return redirect('/admin/tb_order_wholesales?label=musika');
});
Route::get('/admin/tb_order_wholesales/doremi', function(){
	return redirect('/admin/tb_order_wholesales?label=doremi');
});
Route::get('/admin/tb_order_wholesales/musika', function(){
	return redirect('/admin/tb_order_wholesales?label=musika');
});
// solve url wholesale

// Route::get('/admin/tb_dashboard', 'Controller');

Route::get('/print-so/{no_invoice}', 'CBHook@printSo');
Route::get('/print-so-enduser/{no_order}', 'CBHook@printSoUser');
Route::get('/export-so-xml/{no_invoice}', 'CBHook@exportSoXml');

Route::get('/admin/tb_artikels/set-status/aktif/{id}', 'CBHook@SetAktifArtikel');
Route::get('/admin/tb_artikels/set-status/tidak-aktif/{id}', 'CBHook@SetTidakAktifArtikel');

Route::get('/admin/tb_banner_carousels/set-status-banner/aktif/{id}', 'CBHook@SetAktifBanner');
Route::get('/admin/tb_banner_carousels/set-status-banner/tidak-aktif/{id}', 'CBHook@SetTidakAktifBanner');

Route::get('/admin/tb_produks/set-status-produk/aktif/{id}', 'CBHook@SetAktifProduk');
Route::get('/admin/tb_produks/set-status-produk/tidak-aktif/{id}', 'CBHook@SetTidakAktifProduk');

Route::get('/admin/tb_master_kupons/set-status-kupon/aktif/{id}', 'CBHook@SetAktifKupon');
Route::get('/admin/tb_master_kupons/set-status-kupon/tidak-aktif/{id}', 'CBHook@SetTidakAktifKupon');

Route::get('/admin/tb_orders/set-status-order/approve/{id}', 'CBHook@SetApproveAdmin');
Route::get('/admin/tb_orders/set-status-order/finish/{id}', 'CBHook@SetFinish');
Route::get('/admin/tb_orders/set-status-order/cancel/{id}', 'CBHook@SetCancel');

// order whoesale status
Route::get('/admin/tb_order_wholesales/set-status-order/proses/{id}', 'CBHook@SetProsesWholesale');
Route::get('/admin/tb_order_wholesales/set-status-order/hold/{id}', 'CBHook@SetHoldWholesale');
Route::get('/admin/tb_order_wholesales/set-status-order/finish/{id}', 'CBHook@SetFinishWholesale');

// order whoesale detail status
Route::get('/admin/tb_order_wholesale_details/set-status-order-detail/proses/{id}', 'CBHook@SetProsesWholesaleDetail');
Route::get('/admin/tb_order_wholesale_details/set-status-order-detail/hold/{id}', 'CBHook@SetHoldWholesaleDetail');
Route::get('/admin/tb_order_wholesale_details/set-status-order-detail/finish/{id}', 'CBHook@SetFinishWholesaleDetail');

// order teacher status
Route::get('/admin/tb_order_teachers/set-status-order/{status}/{id}', 'CBHook@SetStatusTeacher');

// akun teacher status
Route::get('/admin/cms_users55/set-status-teacher/{status}/{id}', 'CBHook@SetStatusAkunTeacher');

Route::get('/admin/tb_order_wholesales/send-mail-invoice/{id}', 'CBHook@sendMailInvoice');

Route::get('/admin/tb_gambar_produks/set-status-gambar/yes/{id}', 'CBHook@SetYesGambar');
Route::get('/admin/tb_gambar_produks/set-status-gambar/no/{id}', 'CBHook@SetNoGambar');

Route::get('/admin/print-order-teacher', 'CBHook@printOrderTeacher');

// API Raja Ongkir
// Route::get('/api-rajaongkir', 'Controller@ApiRajaOngkir');
Route::get('/api-kodepos', 'Controller@KodePos');

// Trial DOKU
Route::get('/page-doku', 'Controller@pageDoku');

Route::get('/api-rpx', 'Controller@apiRpx');

Route::get('/api-rex', 'Controller@apiRex');

// frontend
Route::group(['middleware' => ['web'], 'prefix' => 'frontend'], function () {
	Route::get('/teacher-registration', 'FrontendController@teacherRegistration');
	Route::post('/save-teacher-registration', 'FrontendController@saveTeacherRegistration');

	Route::get('/home', 'FrontendController@viewHome');

	Route::get('/toko/{query}', 'FrontendController@viewToko');
	Route::post('/toko/{query}', 'FrontendController@viewToko');
	Route::get('/toko/sub-kategori/{query}', 'FrontendController@viewToko');
	Route::get('/toko/manufaktur/{query}', 'FrontendController@viewToko');

	Route::get('/toko/sort-by/{query}', 'FrontendController@viewToko');
	Route::get('/toko/sub-kategori/type-by/{query}', 'FrontendController@viewToko');

	Route::get('/produk-detail/{kode_sku}', 'FrontendController@produkDetail');

	// Route::post('/search', 'FrontendController@search');
	// Route::get('/search', 'FrontendController@search');
	// Route::get('/not-found', 'FrontendController@notFound');



	Route::get('/tentang-kami', 'FrontendController@tentangKami');
	Route::get('/terms', 'FrontendController@terms');
	Route::get('/contact', 'FrontendController@contact');
	Route::get('/marketplace', 'FrontendController@marketplace');


	Route::get('/kontak', 'FrontendController@kontak');
	Route::post('/submit-kontak', 'FrontendController@submitKontak');

	// Login
	Route::get('/login', 'FrontendController@login');
	Route::post('/prosesLogin', 'FrontendController@prosesLogin');
	Route::get('/logout', 'FrontendController@prosesLogout');

	// akun toko
	Route::get('/account', 'FrontendController@account');

	// user
	Route::post('/review', 'PaymentController@reviewPayment');
	Route::post('/payment', 'PaymentController@paymentGateways');

	// toko
	Route::get('/review-payment-toko', 'PaymentController@reviewPaymentToko');
	Route::post('/payment-toko', 'PaymentController@paymentGatewayToko');

	Route::get('/lacak-pesanan', 'FrontendController@lacakPesanan');
	Route::get('/cek-pesanan/{jasa_kirim}/{no_resi}', 'FrontendController@cekPesanan');

	Route::resource('cart', 'CartController');
	Route::get('remove-cart/{id}', 'CartController@destroy');
	Route::get('empty-cart', 'CartController@emptyCart');
	Route::post('cart/update-qty', 'CartController@updateQty');
	Route::post('switchToWishlist/{id}', 'CartController@switchToWishlist');

	Route::resource('wishlist', 'WishlistController');
	Route::delete('emptyWishlist', 'WishlistController@emptyWishlist');
	Route::post('switchToCart/{id}', 'WishlistController@switchToCart');

	// user
	Route::get('/checkout', 'PaymentController@checkout');
	Route::get('/invoices/{no_invoice}', 'PaymentController@invoices');
	// toko
	Route::post('/checkouts', 'PaymentController@checkoutToko');
	Route::get('/invoice/{random_invoice}', 'PaymentController@invoice');

	Route::get('/invoice-bank/{no_invoice}/{label}', 'PaymentController@invoiceBank');

	Route::get('/thanks-cicilan', 'PaymentController@thanksCicilan');

	Route::get('/konfirmasi', 'PaymentController@konfirmasi');
	Route::post('/submit-konfirmasi', 'PaymentController@SubmitKonfirmasi');

	Route::post('/subscribe', 'FrontendController@subscribe');

	// api
	Route::get('/api/kota/{id_provinsi}', 'PaymentController@apiKota');
	Route::get('/api/kodepos/{id_kota}', 'PaymentController@apiKodePos');
	Route::get('/api/jasa-kirim/{origin}/{destination}/{weight}/{courier}', 'PaymentController@apiJenisKirim');
	Route::get('/api/kupon/{kode_kupon}', 'PaymentController@apiKupon');
	Route::get('/api/metode_kirim/{metode_kirim}', 'PaymentController@apiMetodeKirim');
	Route::post('/api/submit-order', 'PaymentController@submitOrder');
	Route::post('/api/submit-order-toko', 'PaymentController@submitOrderToko');
	// Route::get('/api/submit-order', 'PaymentController@submitOrder');
	Route::post('/review-payment', 'PaymentController@paymentGateway');

	// rpx
	Route::get('/api/indomart/{kodepos}', 'PaymentController@apiIndomart');
	Route::get('/api/toko/{kodetoko}', 'PaymentController@apiToko');

	// kredivo
	Route::get('/api/payment-type-cicilan', 'PaymentController@paymentTypeCicilan');

	// Veritrans
	Route::get('/snap', 'SnapController@snap');
	Route::get('/snaptoken', 'SnapController@token');
	Route::post('/snapfinish', 'SnapController@finish');

	// Login
	Route::get('/login', 'FrontendController@login');

	// edit contact
	Route::post('/edit-contact', 'FrontendController@editAccount');

	// Route::resource('admin', 'AdminController');
});