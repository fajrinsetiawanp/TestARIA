<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Cart as Cart;
use Validator;
use App\Models\TbProduk;
use App\Models\TbHargaProduk;
use Auth;

class CartController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	// dd($request->all());
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if (!$duplicates->isEmpty()) {
            return redirect('/frontend/cart')->withSuccessMessage('Produk sudah ada di keranjang kamu!');
        }

        $produk = TbProduk::where('kode_sku', $request->kode_sku)->first();

        if (Auth::check()) {
            // if ($produk->label_owner == 'DOREMI') {
                $harga = TbHargaProduk::where('id_produk', $produk->id)->where('jenis_harga', 'Wholesale')->where('qty', 1)->first();
                // dd($harga);
                if ($harga) {
                    // $diskon = $harga->harga * $harga->diskon / 100;
                    // Cart::add($request->kode_sku, $request->judul, $harga->qty, $harga->harga - $diskon);
                    Cart::add($request->kode_sku, $request->judul, 1, $request->harga);
                } else {
                    Cart::add($request->kode_sku, $request->judul, 1, $request->harga);
                }
            // } elseif ($produk->label_owner == 'MUSIKA') {
            //     Cart::add($request->kode_sku, $request->judul, 1, $request->harga);
            // }
        } else {
            Cart::add($request->kode_sku, $request->judul, 1, $request->harga);
        }
        return redirect('/frontend/cart')->withSuccessMessage('Produk telah di tambahkan ke keranjang!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // Validation on max quantity
        // $validator = Validator::make($request->all(), [
        //     'quantity' => 'required|numeric|between:1,5'
        // ]);

         // if ($validator->fails()) {
         //    session()->flash('error_message', 'Quantity must be between 1 and 5.');
         //    return response()->json(['success' => false]);
         // }
        $produk = TbProduk::where('kode_sku', $request->kode_sku)->first();

        // OKE
        // if (Auth::check()) {
        //     // if ($produk->label_owner == 'DOREMI') {
        //         $harga = TbHargaProduk::where('id_produk', $produk->id)->where('jenis_harga', 'Wholesale')->where('qty',$request->quantity)->first();
        //         if (!empty($harga)) {
        //             $diskon = $harga->harga * $harga->diskon / 100;
        //             Cart::update($id, $request->quantity);
        //             Cart::update($id, ['price' => $harga->harga - $diskon]);
        //             session()->flash('success_message', 'Quantity berhasil di update!');
        //             return response()->json(['data' => 'ada','success' => true]);
        //         } else {
        //             $harga_nonqty = TbHargaProduk::where('id_produk', $produk->id)->where('jenis_harga', 'Wholesale')->where('qty', '<=',$request->quantity)->latest()->first();
        //             $diskon_nonqty = $harga_nonqty->harga * $harga_nonqty->diskon / 100;
        //             Cart::update($id, $request->quantity);
        //             Cart::update($id, ['price' => $harga_nonqty->harga - $diskon_nonqty]);
        //             session()->flash('success_message', 'Quantity berhasil di update!');
        //             return response()->json(['data' => 'tidak ada','success' => true]);
        //         }
        // OKE

            // } elseif ($produk->label_owner == 'MUSIKA') {
            //     $harga = TbHargaProduk::where('id_produk', $produk->id)->where('jenis_harga', 'Wholesale')->where('qty', '>',$request->quantity)->first();
            //     if (!empty($harga)) {
            //         $diskon = $harga->harga * $harga->diskon / 100;
            //         Cart::update($id, $request->quantity);
            //         Cart::update($id, ['price' => $harga->harga - $diskon]);
            //         session()->flash('success_message', 'Quantity berhasil di update!');
            //         return response()->json(['data' => 'ada','success' => true]);
            //     } else {
            //         $harga_nonqty = TbHargaProduk::where('id_produk', $produk->id)->where('jenis_harga', 'Wholesale')->where('qty', 1)->first();
            //         $diskon = $harga_nonqty->harga * $harga_nonqty->diskon / 100;
            //         Cart::update($id, $request->quantity);
            //         Cart::update($id, ['price' => $harga_nonqty->harga - $diskon]);
            //         session()->flash('success_message', 'Quantity berhasil di update!');
            //         return response()->json(['data' => 'tidak ada','success' => true]);
            //     }
            // }
        // OKE
        // } else {
            Cart::update($id, $request->quantity);
            session()->flash('success_message', 'Quantity berhasil di update!');
            return response()->json(['data' => 'ada','success' => true]);
        // }
        // OKE

    }

    public function updateQty(Request $request) {
    	if (!empty($request->Qty)) {
    		$rowId = $request->rowId;
    		$qty = $request->Qty;
			// dd($qty);

    		for ($i=0; $i < sizeof($rowId); $i++) {
    			// dd($qty[$i]);
    			Cart::update($rowId[$i], $qty[$i]);
    		}

		    return redirect('/frontend/cart')->withSuccessMessage('Quantity berhasil di update!');
    	} else {
    		return redirect()->back();
    	}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return redirect('/frontend/cart')->withSuccessMessage('Produk berhasil dihapus dari keranjang!');
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function emptyCart()
    {
        Cart::destroy();
        return redirect('/frontend/cart')->withSuccessMessage('Keranjang berhasil di kosongkan!');
    }

    /**
     * Switch item from shopping cart to wishlist.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToWishlist($id)
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $duplicates = Cart::instance('wishlist')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if (!$duplicates->isEmpty()) {
            return redirect('/frontend/cart')->withSuccessMessage('Produk sudah ada di favorit!');
        }

        Cart::instance('wishlist')->add($item->id, $item->name, 1, $item->price);

        return redirect('/frontend/cart')->withSuccessMessage('Produk telah dipindahkan ke favorit!');

    }
}
