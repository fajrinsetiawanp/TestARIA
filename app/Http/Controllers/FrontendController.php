<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Artisaninweb\SoapWrapper\SoapWrapper;
use App\Soap\Request\GetConversionAmount;
use App\Soap\Response\GetConversionAmountResponse;

use Carbon\Carbon;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Hash;
use Auth;

use App\Models\TbMasterKategori;
use App\Models\TbSubKategori;
use App\Models\TbSubscribe;
use App\Models\TbArtikel;

use App\Models\TbProduk;
use App\Models\TbGambarProduk;
use App\Models\TbHargaProduk;
use App\Models\TbWarnaProduk;
use App\Models\TbMasterEcommerce;

use App\Models\TbMasterJasaKirim;
use App\Models\TbLainLain;
use App\Models\Kontak;
use App\Models\Marketplace;
use App\Models\TbBannerCarousel;
use App\Models\TbMasterManufaktur;

use App\Models\TbToko;
use App\Models\TbOrderWholesale;
use App\Models\TbOrderWholesaleDetail;

use App\Models\TbMasterProvinsi;
use App\Models\TbMasterKota;

use App\User;

// use Illuminate\Support\Facades\Request;

class FrontendController extends Controller
{
    //
    public function teacherRegistration(Request $request) {
        return view('form-teacher');
    }

    public function saveTeacherRegistration(Request $request) {
        // dd($request->all());
        $teacher = new User;
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->password = bcrypt($request->password);
        $teacher->id_cms_privileges = 8;
        $teacher->status = "Not Active";

        $teacher->phone_number = $request->phone_number;
        $teacher->address = $request->address;
        $teacher->account_number = $request->account_number;
        $teacher->bank = $request->bank;
        $teacher->location_branch = $request->location_branch;
        $teacher->timestamps = true;
        $teacher->save();

        return redirect('/frontend/teacher-registration')->with('success', 'Pendaftaran Berhasil! Tunggu informasi dari tim Doremi Group sampai akun di Approve dan mulailah lakukan transaksi! Happy Shopping!.');
    }

    public function viewHome(Request $request) {
      	$kategoriPopuler = TbMasterKategori::inRandomOrder()->get();

          $video = TbBannerCarousel::where('jenis', 'Video')
                        ->where('status', 'Aktif')
                        ->inRandomOrder()
                        ->limit(3)
                        ->get();

        if($video) {
            $banner = TbBannerCarousel::where('jenis', 'Gambar')
                ->where('status', 'Aktif')
                ->inRandomOrder()
                ->limit(2)
                ->get();
        } else {
            $banner = TbBannerCarousel::where('jenis', 'Video')
                    ->where('status', 'Aktif')
                    ->inRandomOrder()
                    ->limit(3)
                    ->get();
        }
          
        // dd($video->judul);
        $banner_first = TbBannerCarousel::where('status', 'Aktif')
            ->orderBy('id', 'desc')
            ->first();

        $manufaktur = TbMasterManufaktur::whereNotNull('logo')->get();

        $blog = TbArtikel::where('status', 'Aktif')
            ->inRandomOrder()
            ->limit(6)
            ->get();

        $kategori = TbMasterKategori::orderBy('nama_kategori')->get();

        // produk promo
        $produkPromo = TbProduk::where('label_produk','Promo')
            ->where('status', 'Aktif')
            ->inRandomOrder()
            ->limit(20)
            ->get();

        for ($i=0; $i < sizeof($produkPromo); $i++) { 
            $gambar_promo = TbGambarProduk::where('id_produk', $produkPromo[$i]->id)->where('gambar_utama', 1)->first();
            // dd($gambar);

            if(!empty($gambar_promo)) {
                $produkPromo[$i]['gambar'] = $gambar_promo;
            } else {
                $produkPromo[$i]['gambar'] = TbGambarProduk::where('id_produk', $produkPromo[$i]->id)->inRandomOrder()->first();
            }
            // dd($gambar);

            if (Auth::check()) {
                $produkPromo[$i]['harga'] = TbHargaProduk::where('id_produk', $produkPromo[$i]->id)->where('jenis_harga', 'Wholesale')->first();
            } else {
                $produkPromo[$i]['harga'] = TbHargaProduk::where('id_produk', $produkPromo[$i]->id)->where('jenis_harga', 'Retail')->first();
            }

            $produkPromo[$i]['diskon'] = $produkPromo[$i]['harga']->harga * $produkPromo[$i]['harga']->diskon / 100;
            $produkPromo[$i]['harga_diskon'] = $produkPromo[$i]['harga']->harga - $produkPromo[$i]['diskon'];

            $produkPromo[$i]['warna'] = TbWarnaProduk::where('id_produk', $produkPromo[$i]->id)->get();

            if (str_word_count($produkPromo[$i]->judul) >= 3) {
                $explode = explode(" ", $produkPromo[$i]->judul);
                $produkPromo[$i]['judul1'] = $explode[0]." ".$explode[1]." ".$explode[2];

                unset($explode[0]);
                unset($explode[1]);
                unset($explode[2]);

                $implode = implode(" ", $explode);
                $produkPromo[$i]['judul2'] = $implode;
            } else {
                $produkPromo[$i]['judul1'] = $produkPromo[$i]->judul;
                $produkPromo[$i]['judul2'] = "";
            }
        }
        // produk promo

        // produk baru
        $produkBaru = TbProduk::where('label_produk','Baru')
            ->where('status', 'Aktif')
            ->inRandomOrder()
            ->limit(20)
            ->get();

        for ($i=0; $i < sizeof($produkBaru); $i++) { 
            $gambar_baru = TbGambarProduk::where('id_produk', $produkBaru[$i]->id)->where('gambar_utama', 1)->first();

            if(!empty($gambar_baru)) {
                $produkBaru[$i]['gambar'] = $gambar_baru;
            } else {
                $produkBaru[$i]['gambar'] = TbGambarProduk::where('id_produk', $produkBaru[$i]->id)->inRandomOrder()->first();
            }

            if (Auth::check()) {
                $produkBaru[$i]['harga'] = TbHargaProduk::where('id_produk', $produkBaru[$i]->id)->where('jenis_harga', 'Wholesale')->first();
            } else {
                $produkBaru[$i]['harga'] = TbHargaProduk::where('id_produk', $produkBaru[$i]->id)->where('jenis_harga', 'Retail')->first();
            }

            $produkBaru[$i]['diskon'] = $produkBaru[$i]['harga']->harga * $produkBaru[$i]['harga']->diskon / 100;
            $produkBaru[$i]['harga_diskon'] = $produkBaru[$i]['harga']->harga - $produkBaru[$i]['diskon'];

            $produkBaru[$i]['warna'] = TbWarnaProduk::where('id_produk', $produkBaru[$i]->id)->get();

            if (str_word_count($produkBaru[$i]->judul) >= 3) {
                $explode = explode(" ", $produkBaru[$i]->judul);
                $produkBaru[$i]['judul1'] = $explode[0]." ".$explode[1]." ".$explode[2];

                unset($explode[0]);
                unset($explode[1]);
                unset($explode[2]);

                $implode = implode(" ", $explode);
                $produkBaru[$i]['judul2'] = $implode;
            } else {
                $produkBaru[$i]['judul1'] = $produkBaru[$i]->judul;
                $produkBaru[$i]['judul2'] = "";
            }
        }
        // produk baru

        // produk harga terbaik (pilihan)
        $produkHargaTerbaik = TbProduk::where('label_produk','Harga Terbaik')
            ->where('status', 'Aktif')
            ->inRandomOrder()
            ->limit(20)
            ->get();

        for ($i=0; $i < sizeof($produkHargaTerbaik); $i++) { 
            $gambar_harga_terbaik = TbGambarProduk::where('id_produk', $produkHargaTerbaik[$i]->id)->where('gambar_utama', 1)->first();

            if(!empty($gambar_harga_terbaik)) {
                $produkHargaTerbaik[$i]['gambar'] = $gambar_harga_terbaik;
            } else {
                $produkHargaTerbaik[$i]['gambar'] = TbGambarProduk::where('id_produk', $produkHargaTerbaik[$i]->id)->inRandomOrder()->first();
            }

            if (Auth::check()) {
                $produkHargaTerbaik[$i]['harga'] = TbHargaProduk::where('id_produk', $produkHargaTerbaik[$i]->id)->where('jenis_harga', 'Wholesale')->first();
            } else {
                $produkHargaTerbaik[$i]['harga'] = TbHargaProduk::where('id_produk', $produkHargaTerbaik[$i]->id)->where('jenis_harga', 'Retail')->first();
            }

            $produkHargaTerbaik[$i]['diskon'] = $produkHargaTerbaik[$i]['harga']->harga * $produkHargaTerbaik[$i]['harga']->diskon / 100;
            $produkHargaTerbaik[$i]['harga_diskon'] = $produkHargaTerbaik[$i]['harga']->harga - $produkHargaTerbaik[$i]['diskon'];

            $produkHargaTerbaik[$i]['warna'] = TbWarnaProduk::where('id_produk', $produkHargaTerbaik[$i]->id)->get();

            if (str_word_count($produkHargaTerbaik[$i]->judul) >= 3) {
                $explode = explode(" ", $produkHargaTerbaik[$i]->judul);
                $produkHargaTerbaik[$i]['judul1'] = $explode[0]." ".$explode[1]." ".$explode[2];

                unset($explode[0]);
                unset($explode[1]);
                unset($explode[2]);

                $implode = implode(" ", $explode);
                $produkHargaTerbaik[$i]['judul2'] = $implode;
            } else {
                $produkHargaTerbaik[$i]['judul1'] = $produkHargaTerbaik[$i]->judul;
                $produkHargaTerbaik[$i]['judul2'] = "";
            }
        }
        // produk harga terbaik

        // produk preorder
        $produkTrending = TbProduk::where('label_produk','Pre Order')
            ->where('status', 'Aktif')
            ->inRandomOrder()
            ->limit(10)
            ->get();

        for ($i=0; $i < sizeof($produkTrending); $i++) { 
            $gambar_trending = TbGambarProduk::where('id_produk', $produkTrending[$i]->id)->where('gambar_utama', 1)->first();

            if(!empty($gambar_trending)) {
                $produkTrending[$i]['gambar'] = $gambar_trending;
            } else {
                $produkTrending[$i]['gambar'] = TbGambarProduk::where('id_produk', $produkTrending[$i]->id)->inRandomOrder()->first();
            }

            if (Auth::check()) {
                $produkTrending[$i]['harga'] = TbHargaProduk::where('id_produk', $produkTrending[$i]->id)->where('jenis_harga', 'Wholesale')->first();
            } else {
                $produkTrending[$i]['harga'] = TbHargaProduk::where('id_produk', $produkTrending[$i]->id)->where('jenis_harga', 'Retail')->first();
            }

            $produkTrending[$i]['diskon'] = $produkTrending[$i]['harga']->harga * $produkTrending[$i]['harga']->diskon / 100;
            $produkTrending[$i]['harga_diskon'] = $produkTrending[$i]['harga']->harga - $produkTrending[$i]['diskon'];

            $produkTrending[$i]['warna'] = TbWarnaProduk::where('id_produk', $produkTrending[$i]->id)->get();

            if (str_word_count($produkTrending[$i]->judul) >= 3) {
                $explode = explode(" ", $produkTrending[$i]->judul);
                $produkTrending[$i]['judul1'] = $explode[0]." ".$explode[1]." ".$explode[2];

                unset($explode[0]);
                unset($explode[1]);
                unset($explode[2]);

                $implode = implode(" ", $explode);
                $produkTrending[$i]['judul2'] = $implode;
            } else {
                $produkTrending[$i]['judul1'] = $produkTrending[$i]->judul;
                $produkTrending[$i]['judul2'] = "";
            }
        }
        // produk trending
        
    	return view('frontend.home')
            ->with('kategori', $kategori)
    		->with('kategoriPopuler', $kategoriPopuler)
            ->with('banner', $banner)
            ->with('video', $video)
            ->with('banner_first', $banner_first)
            ->with('manufaktur', $manufaktur)
            ->with('blog', $blog)
            ->with('produkPromo', $produkPromo)
            ->with('produkBaru', $produkBaru)
            ->with('produkHargaTerbaik', $produkHargaTerbaik)
            ->with('produkTrending', $produkTrending);
    }

    public function viewToko(Request $request, $query) {

        if ($query == 'all') {
            $produk = TbProduk::where('status', 'Aktif')->inRandomOrder()->paginate(12);
            // dd($produk);
        } elseif ($query == 'pec') {
            $produk = TbProduk::where('id_kategori', 14)->where('status', 'Aktif')->inRandomOrder()->paginate(12);

        } elseif ($request->path() == 'frontend/toko/sub-kategori/'.$query) {
            // dd('kategori');
            $produk = TbProduk::where('id_sub_kategori', $query)->where('status', 'Aktif')->inRandomOrder()->paginate(12);
            // dd($produk);
            // if (count($produk) > 0) {
            //     $produk['id_sub'] = $query;
            // }
        } elseif ($request->path() == 'frontend/toko/manufaktur/'.$query) {
            // dd('manufaktur');
            $produk = TbProduk::where('id_manufaktur', $query)->where('status', 'Aktif')->inRandomOrder()->paginate(12);
        } elseif ($query == 'search') {
            $query = $_GET['q'];
            // dd($query);

            if (Auth::user()->id_cms_privileges == 8) {
                $produk = TbProduk::where('judul', 'LIKE', '%'.$query.'%')
                    // ->orWhere('kode_sku', 'LIKE', '%'.$query.'%')
                    // ->orWhere('deskripsi_singkat', 'LIKE', '%'.$query.'%')
                    // ->orWhere('manufaktur', 'LIKE', '%'.$query.'%')
                    ->where('id_kategori', 14)
                    ->where('status', 'Aktif')
                    ->paginate(12);
            } else {
                $produk = TbProduk::where('judul', 'LIKE', '%'.$query.'%')
                    ->where('kode_sku', 'LIKE', '%'.$query.'%')
                    // ->orWhere('deskripsi_singkat', 'LIKE', '%'.$query.'%')
                    // ->orWhere('manufaktur', 'LIKE', '%'.$query.'%')
                    // ->orWhere('kategori', 'LIKE', '%'.$query.'%')
                    ->where('status', 'Aktif')
                    ->paginate(12);
            }
        } elseif ($request->path() == 'frontend/toko/sort-by/'.$query) {
            // dd('true');
            //$produk = TbProduk::inRandomOrder()->paginate(12);
            $produk = TbProduk::all();
        } elseif ($request->path() == 'frontend/toko/sub-kategori/type-by/'.$query) {
            // dd('true');
            //$produk = TbProduk::inRandomOrder()->paginate(12);
            $produk = TbProduk::where('id_tipe_kategori', $query)->where('status', 'Aktif')->inRandomOrder()->paginate(12);
        }
        


            for ($i=0; $i < sizeof($produk); $i++) {
                $gambar = TbGambarProduk::where('id_produk', $produk[$i]->id)->where('gambar_utama', 1)->get();
                // dd($gambar);
                if(count($gambar) > 0) {
                    $produk[$i]['gambar'] = $gambar;
                } else {
                    $produk[$i]['gambar'] = TbGambarProduk::where('id_produk', $produk[$i]->id)->inRandomOrder()->first();
                }

                $produk[$i]['gambar_detail'] = TbGambarProduk::where('id_produk', $produk[$i]->id)->inRandomOrder()->limit(5)->get();

                if (Auth::check()) {
                    // if ($request->path() == 'frontend/toko/sort-by/'.$query) {
                    //     // dd('trur');
                    //     $produk[$i]['harga'] = TbHargaProduk::where('id_produk', $produk[$i]->id)->where('jenis_harga', 'Wholesale')->first();
                    //     $produk[$i]['x'] = $produk[$i]['harga']->harga;
                        
                    // } else {
                        $produk[$i]['harga'] = TbHargaProduk::where('id_produk', $produk[$i]->id)->where('jenis_harga', 'Wholesale')->first();
                        // $produk = $produk['harga']['harga']->sortBy('harga', $query);
                    // }
                    
                } else {
                    // if ($request->path() == 'frontend/toko/sort-by/'.$query) {
                    //     $produk[$i]['harga'] = TbHargaProduk::where('id_produk', $produk[$i]->id)->where('jenis_harga', 'Retail')
                    //     ->first();
                    //     $sorted = $produk->sort();

                        // $produk = $produk->sortBy($produk['harga']->harga, $query);
                        // $produk = $produk->sortBy('harga', $query);
                        
                    // } else {
                        $produk[$i]['harga'] = TbHargaProduk::where('id_produk', $produk[$i]->id)->where('jenis_harga', 'Retail')->first();
                    // }
                }
                // dd($produk);
                
                $produk[$i]['diskon'] = $produk[$i]['harga']->harga * $produk[$i]['harga']->diskon / 100;
                $produk[$i]['harga_diskon'] = $produk[$i]['harga']->harga - $produk[$i]['diskon'];

                $produk[$i]['warna'] = TbWarnaProduk::where('id_produk', $produk[$i]->id)->get();

                if (str_word_count($produk[$i]->judul) >= 3) {
                    $explode = explode(" ", $produk[$i]->judul);
                    $produk[$i]['judul1'] = $explode[0]." ".$explode[1]." ".$explode[2];

                    unset($explode[0]);
                    unset($explode[1]);
                    unset($explode[2]);

                    $implode = implode(" ", $explode);
                    $produk[$i]['judul2'] = $implode;
                } else {
                    $produk[$i]['judul1'] = $produk[$i]->judul;
                    $produk[$i]['judul2'] = "";
                }
            }

        $manufaktur = TbMasterManufaktur::all();
        // dd($produk['harga']->harga);
        if ($request->path() == 'frontend/toko/sort-by/'.$query) {
            if ($query == 'asc') {
                $produk = $produk->sortBy('harga_diskon');
            } else {
                $produk = $produk->sortByDesc('harga_diskon');
            }
        }
        // dd($produk);

        return view('frontend.shop')
            ->with('manufaktur', $manufaktur)
            ->with('query', $query)
            ->with('produk', $produk);
    }

    // public function search(Request $request) {
    //     $query = $request->q;
        
    //         $produk = TbProduk::where('judul', 'LIKE', '%'.$query.'%')->orWhere('kode_sku', 'LIKE', '%'.$query.'%')->orWhere('deskripsi_singkat', 'LIKE', '%'.$query.'%')->orWhere('manufaktur', 'LIKE', '%'.$query.'%')->orWhere('kategori', 'LIKE', '%'.$query.'%')->paginate(20);

    //             for ($i=0; $i < sizeof($produk); $i++) {
    //                 $gambar = TbGambarProduk::where('id_produk', $produk[$i]->id)->where('gambar_utama', 1)->first();

    //                 if(count($gambar) > 0) {
    //                     $produk[$i]['gambar'] = $gambar;
    //                 } else {
    //                     $produk[$i]['gambar'] = TbGambarProduk::where('id_produk', $produk[$i]->id)->inRandomOrder()->first();
    //                 }

    //                 if (Auth::check()) {
    //                     $produk[$i]['harga'] = TbHargaProduk::where('id_produk', $produk[$i]->id)->where('jenis_harga', 'Wholesale')->first();
    //                 } else {
    //                     $produk[$i]['harga'] = TbHargaProduk::where('id_produk', $produk[$i]->id)->where('jenis_harga', 'Retail')->first();
    //                 }

    //                 $produk[$i]['diskon'] = $produk[$i]['harga']->harga * $produk[$i]['harga']->diskon / 100;
    //                 $produk[$i]['harga_diskon'] = $produk[$i]['harga']->harga - $produk[$i]['diskon'];

    //                 $produk[$i]['warna'] = TbWarnaProduk::where('id_produk', $produk[$i]->id)->get();

    //                 if (str_word_count($produk[$i]->judul) >= 3) {
    //                     $explode = explode(" ", $produk[$i]->judul);
    //                     $produk[$i]['judul1'] = $explode[0]." ".$explode[1]." ".$explode[2];

    //                     unset($explode[0]);
    //                     unset($explode[1]);
    //                     unset($explode[2]);

    //                     $implode = implode(" ", $explode);
    //                     $produk[$i]['judul2'] = $implode;
    //                 } else {
    //                     $produk[$i]['judul1'] = $produk[$i]->judul;
    //                     $produk[$i]['judul2'] = "";
    //                 }
    //             }

    //         $manufaktur = TbMasterManufaktur::all();

    //         return view('frontend.shop')
    //             ->with('kategori', $query)
    //             ->with('manufaktur', $manufaktur)
    //             ->with('produk', $produk);
    // }

    public function notFound(Request $request) {

        return view('frontend.notFound');
    }

    public function produkDetail(Request $request, $kode_sku) {
        $new_kode_sku = utf8_decode(urldecode($kode_sku));
        // dd(preg_replace('/[^A-Za-z0-9\-]/', '', $new_kode_sku));
        $produk = TbProduk::where('kode_sku', $new_kode_sku)->first();
        // dd($produk);
        $produk['gambar'] = TbGambarProduk::where('id_produk', $produk->id)->orderBy('gambar_utama', 'desc')->limit(5)->get();

        $produk['ecommerce'] = TbMasterEcommerce::where('id_produk', $produk->id)->get();

        if (Auth::check()) {
            $produk['harga'] = TbHargaProduk::where('id_produk', $produk->id)->where('jenis_harga', 'Wholesale')->first();
        } else {
            $produk['harga'] = TbHargaProduk::where('id_produk', $produk->id)->where('jenis_harga', 'Retail')->first();
        }

        $produk['diskon'] = $produk['harga']->harga * $produk['harga']->diskon / 100;
        $produk['harga_diskon'] = $produk['harga']->harga - $produk['diskon'];
        // dd($produk);
        // $produk[$i]['warna'] = TbWarnaProduk::where('id_produk', $produk->id)->get();

        if (str_word_count($produk->judul) >= 3) {
            $explode = explode(" ", $produk->judul);
            $produk['judul1'] = $explode[0]." ".$explode[1]." ".$explode[2];

            unset($explode[0]);
            unset($explode[1]);
            unset($explode[2]);

            $implode = implode(" ", $explode);
                $produk['judul2'] = $implode;
        } else {
            $produk['judul1'] = $produk->judul;
            $produk['judul2'] = "";
        }

        // dd($produk);
        $related = TbProduk::where('kategori', $produk->kategori)->where('kode_sku', '!=', $produk->kode_sku)->inRandomOrder()->limit(6)->get();

        for ($i=0; $i < sizeof($related); $i++) {
            $gambar_related = TbGambarProduk::where('id_produk', $related[$i]->id)->where('gambar_utama', 1)->get();

                if(count($gambar_related) > 0) {
                    $related[$i]['gambar'] = $gambar_related;
                } else {
                    $related[$i]['gambar'] = TbGambarProduk::where('id_produk', $related[$i]->id)->inRandomOrder()->first();
                }

            if (Auth::check()) {
                $related[$i]['harga'] = TbHargaProduk::where('id_produk', $related[$i]->id)->where('jenis_harga', 'Wholesale')->first();
            } else {
                $related[$i]['harga'] = TbHargaProduk::where('id_produk', $related[$i]->id)->where('jenis_harga', 'Retail')->first();
            }

            $related[$i]['diskon'] = $related[$i]['harga']->harga * $related[$i]['harga']->diskon / 100;
            $related[$i]['harga_diskon'] = $related[$i]['harga']->harga - $related[$i]['diskon'];

            $related[$i]['warna'] = TbWarnaProduk::where('id_produk', $related[$i]->id)->get();

            if (str_word_count($related[$i]->judul) >= 3) {
                $explode = explode(" ", $related[$i]->judul);
                $related[$i]['judul1'] = $explode[0]." ".$explode[1]." ".$explode[2];

                unset($explode[0]);
                unset($explode[1]);
                unset($explode[2]);

                $implode = implode(" ", $explode);
                $related[$i]['judul2'] = $implode;
            } else {
                $related[$i]['judul1'] = $related[$i]->judul;
                $related[$i]['judul2'] = "";
            }
        }
        // dd($related);

        return view('frontend.produkdetail')
            ->with('produk', $produk)
            ->with('related', $related);
    }

    public function subscribe(Request $request) {
    	
    	if (!empty($request->email_subscribe)) {

            $subs = TbSubscribe::where('email', $request->email_subscribe)->get();
            
            if (count($subs) == 0) {
                //tambah baru
                $subscribe = new TbSubscribe;
                $subscribe->email = $request->email_subscribe;
                $subscribe->timestamps = true;
                $subscribe->save();
                return redirect('/');
            } else {
                //sudah subscribe
                return redirect('/');
            }
	    }

    	

    }

    public function lacakPesanan(Request $request) {
        $jasa_kirim = TbMasterJasaKirim::all();

        return view('frontend.tracking')
            ->with('jasa_kirim', $jasa_kirim);
    }

    public function cekPesanan(SoapWrapper $soapWrapper, $jasa_kirim, $no_resi) {
        $soapWrapper->add('Rpx', function ($service) {
          $service
            ->wsdl('http://api.rpxholding.com/wsdl/rpxwsdl.php?wsdl')
            ->trace(true);
        });

        // Without classmap
        $response = $soapWrapper->call('Rpx.getTrackingAWB', [
            'user' => "doremi",
            'password'   => "Andrian123",
            'awb' => $no_resi,
            'format' => "JSON"
        ]);

        $data = json_decode($response, true);

        $tempList = $data['RPX'];
            
        return $tempList;
    }

    public function tentangKami(Request $request) {
        // $about = TbLainLain::where('judul', 'About')->first();
        $about = TbLainLain::where('judul', 'About')->first();
        $visi = TBLainLain::where('judul', 'Visi')->first();
        $misi = TBLainLain::where('judul', 'Misi')->first();
        
        // dd($misi);
        return view('frontend.about')
            ->with('about', $about)
            ->with('visi', $visi)
            ->with('misi', $misi);
    }

    public function terms(Request $request) {
        $terms = TbLainLain::where('judul', 'T & C')->first();
        
        // dd($misi);
        return view('frontend.terms')
            ->with('terms', $terms);
    }

    public function kontak(Request $request) {
        
        return view('frontend.contact');
    }

    public function submitKontak(Request $request) {
        $kontak = new Kontak;
        $kontak->nama = $request->nama;
        $kontak->email = $request->email;
        $kontak->no_handphone = $request->no_handphone;
        $kontak->messages = $request->messages;
        $kontak->timestamps = true;
        $kontak->save();

        return redirect('/');

    }

    public function marketplace(Request $request) {
        
        return view('frontend.marketplace');
    }

    public function login(Request $request) {
        $kategori = TbMasterKategori::all();
        
        return view('frontend.login')
            ->with('kategori', $kategori);
    }

    public function prosesLogin(Request $request) {

        $email = $request->email;
        $password = $request->password;
        // dd($email);s
        $data = User::where('email',$email)->first();

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // 
            // dd('oke');
            if (Auth::user()->id_cms_privileges == 8) {
                return redirect('frontend/toko/pec');
            } else {
                return redirect('frontend/toko/all');
            }
        } else {

            return redirect()->back()->with('alert','Mohon Periksa Kembali Email dan Password Anda!!');
        }

    }

    public function prosesLogout(Request $request) {
        Auth::logout();

        return redirect('frontend/login')->with('alert','Terima Kasih, Selamat Datang Kembali!!');
    }

    public function account(Request $request) {
        $kategori = TbMasterKategori::all();

            $data = TbToko::where('id_customer', Auth::id())->first();
            // dd($data);
            $toko_order = TbOrderWholesale::where('id_customer', $data->id)->get();

            $user_data = User::find($data->id_user);

            $provinsi = TbMasterProvinsi::all();
            $provinsi_toko = TbMasterProvinsi::where('nama', $data->provinsi)->first();

            $kota = TbMasterKota::all();

            $kota_toko = TbMasterKota::where('nama', $data->kota)->first();
            $user_kota = explode(' ', $data->kota);

            // dd($user_kota);
            // dd($user_data);
        return view('frontend/account')
            ->with('kategori', $kategori)
            ->with('data', $data)
            ->with('toko_order', $toko_order)
            ->with('user_data', $user_data)
            ->with('provinsi', $provinsi)
            ->with('provinsi_toko', $provinsi_toko)
            ->with('kota_toko', $kota_toko)
            ->with('kota', $kota);
    }

    public function editAccount(Request $request) {
        // $data = $request->all();
        // dd($data);

        $akun_update = TbToko::where('id_customer',  Auth::id());
        $provinsi = TbMasterProvinsi::where('id_provinsi', $request->provinsi)->first();
        $kota_kodepos = explode(" ", $request['kota']);
        $master_kota = TbMasterKota::where('id_kota', $kota_kodepos[0])->first();

        $data = [ 
            'nama_toko' => $request->nama_toko,
            'nama_pemilik' => $request->nama_pemilik,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'no_handphone' => $request->no_handphone,

            'provinsi' => $provinsi['nama'],
            'kota' => $master_kota['tipe']." ".$master_kota['nama'],
            'kode_pos' => $master_kota['kode_pos'],
            'alamat' => $request->alamat
        ];

        $update = Tbtoko::where('id_customer', Auth::id())->update($data);


        // $akun_update->nama_toko = $request->nama_toko;
        // $akun_update->nama_pemilik = $request->nama_pemilik;
        // $akun_update->email = $request->email;
        // $akun_update->no_telepon = $request->no_telepon;
        // $akun_update->no_handphone = $request->no_handphone;


        // $akun_update->provinsi = $provinsi['nama'];
        // $akun_update->kota = $master_kota['tipe']." ".$master_kota['nama'];
        // $akun_update->kode_pos = $master_kota['kode_pos'];
        // $akun_update->alamat = $request->alamat;
        // $akun_update->update();
        // dd($user_update);

        $user_update = User::find(Auth::id());
        $user_update->email = $request->email;
        $user_update->password = Hash::make($request->newPassword);
        $user_update->update();
        // dd($user_update);

        return redirect('frontend/account')->with('alert','Account berhasil di update');
    }

}
