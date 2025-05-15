<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetailPaket;
use App\Models\Jamaah;
use App\Models\OrderPaket;
use App\Models\Paket;
use Illuminate\Http\Request;
use Log;

class OrderPaketController extends Controller
{
    public function riwayat()
    {
        // Ambil semua order milik user (bisa pakai auth jika sudah login)
        $orders = OrderPaket::where('user_id', auth()->id())->with(['paket', 'orderKamar'])->get();
        return view('pages.user.riwayat', compact('orders'));
    }

    public function prosesPesan(Request $request)
    {
        // Validasi input data dari form pemesanan
        $validated = $request->validate([
            'paket_id' => 'required|exists:paket,id',
            // 'program_hari' => 'required|string',
            // 'bandara' => 'required|string',
            'tanggal_keberangkatan' => 'required|exists:detail_paket,id',
            'jumlah_double' => 'nullable|integer|min:0|max:100',
            'jumlah_triple' => 'nullable|integer|min:0|max:100',
            'jumlah_quad' => 'nullable|integer|min:0|max:100',
        ]);

        // Mengambil paket yang dipilih
        $paket = Paket::findOrFail($request->paket_id);
        $detail_paket = DetailPaket::findOrFail($request->tanggal_keberangkatan);

        // Menghitung total harga
        $totalHarga = 0;
        $jumlahKamar = [
            'double' => $request->jumlah_double ?? 0,
            'triple' => $request->jumlah_triple ?? 0,
            'quad' => $request->jumlah_quad ?? 0,
        ];

        // foreach ($paket->tipeKamars as $tipe) {
        //     $totalHarga += $jumlahKamar[$tipe->tipe] * $tipe->harga;
        // }

        // Menyimpan data pemesanan ke database (hanya data yang tersedia di halaman pertama)
        $order = OrderPaket::create([
            'paket_id' => $paket->id,
            'detail_paket_id' => $detail_paket->id,
            'user_id' => auth()->user()->id,
            'total_harga' => $totalHarga,
        ]);

        // Redirect ke halaman untuk melanjutkan pengisian data pemesan
        // Simpan data jumlah kamar per tipe
        foreach ($paket->tipeKamars as $tipe) {
            if (isset($jumlahKamar[$tipe->tipe]) && $jumlahKamar[$tipe->tipe] > 0) {
                // Menyimpan jumlah kamar pada tabel order_kamar
                $order->orderKamar()->create([ // Pastikan Anda menggunakan relasi yang sesuai
                    'tipe_kamar_id' => $tipe->id,
                    'jumlah_kamar' => $jumlahKamar[$tipe->tipe], // Menggunakan jumlah_kamar yang tepat
                ]);
                // Tambahkan harga berdasarkan jumlah kamar
                $totalHarga += $jumlahKamar[$tipe->tipe] * $tipe->harga;
            }
        }

        // Update total harga pemesanan setelah menyimpan kamar
        $order->update([
            'total_harga' => $totalHarga,
        ]);



        // Redirect ke halaman untuk melanjutkan pengisian data pemesan
        return redirect()->route('order.transaksi', ['order_id' => $order->id]);
    }

    // Menampilkan form untuk mengisi data pemesan (halaman kedua)
    public function showTransaksiForm($order_id)
    {
        $order = OrderPaket::with('detailPaket')->findOrFail($order_id);
        return view('pages.user.transaksi', compact('order'));
    }

    // Menyimpan data pemesan pada halaman kedua
    public function prosesTransaksi(Request $request, $order_id)
    {
        // Validasi input data pemesan
        $validated = $request->validate([
            'nama_pemesan' => 'required|string',
            'jenis_kelamin_pemesan' => 'required|string',
            'telepon_pemesan' => 'required|string',
            'email_pemesan' => 'required|email',
            'catatan' => 'nullable|string',
            'nama_jamaah' => 'required|array',
            'jenis_kelamin_jamaah' => 'required|array',
            'jenis_kelamin_jamaah.*' => 'required|string',  // Validasi setiap item dalam array
            'jenis_jamaah' => 'required|array',
        ]);

        // Update data pemesanan dengan data pemesan yang baru
        $order = OrderPaket::findOrFail($order_id);
        $jenis = $request->jenis_pembayaran;
        $jumlah = 0;

        switch ($jenis) {
            case 'booking':
                $jumlah = $order->total_harga * 0.5;
                break;
            case 'dp':
                $jumlah = $order->total_harga * 0.12;
                break;
            case 'cash':
                $jumlah = $order->total_harga;
                break;
        }
        $order->update([
            'nama_pemesan' => $request->nama_pemesan,
            'jenis_kelamin_pemesan' => $request->jenis_kelamin_pemesan,
            'telepon_pemesan' => $request->telepon_pemesan,
            'email_pemesan' => $request->email_pemesan,
            'jenis_pembayaran' => $jenis,
            'jumlah_dibayar' => $jumlah,
            'catatan' => $request->catatan,
        ]);

        // Menyimpan data jamaah
        $jamaahIndex = 0;

        foreach ($order->orderKamar as $orderKamar) {
            for ($j = 0; $j < $orderKamar->jumlah_kamar; $j++) {
                $jenis_kelamin = isset($request->jenis_kelamin_jamaah[$jamaahIndex])
                    ? $request->jenis_kelamin_jamaah[$jamaahIndex]
                    : 'Laki-Laki'; // Atau default lain sesuai kebutuhan

                Jamaah::create([
                    'order_paket_id' => $order->id,
                    'order_kamar_id' => $orderKamar->id,
                    'nama' => $request->nama_jamaah[$jamaahIndex],
                    'jenis_kelamin' => $jenis_kelamin,
                    'jenis_jamaah' => $request->jenis_jamaah[$jamaahIndex],
                ]);

                $jamaahIndex++;
            }
        }

        $order = OrderPaket::with(['paket', 'orderKamar.tipeKamar', 'detailPaket'])->findOrFail($order_id);

        // Redirect ke halaman sukses pemesanan
        return redirect()->route('payment', ['order_id' => $order->id]);

    }
    public function uploadBukti(Request $request, $order_id)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $order = OrderPaket::findOrFail($order_id);

        if ($request->hasFile('bukti_pembayaran')) {
            // Simpan file ke storage/app/public/bukti
            $path = $request->file('bukti_pembayaran')->store('bukti', 'public');
            $order->bukti_pembayaran = $path;
            $order->status = 'pending'; // ⬅️ Set status pending saat upload bukti
            $order->save();
        }

        return back()->with('success', 'Bukti pembayaran berhasil diunggah.');
    }
    public function payment($order_id)
    {
        $order = OrderPaket::with(['paket', 'orderKamar.tipeKamar', 'detailPaket'])->findOrFail($order_id);
        return view('pages.user.payment', compact('order')); // Sesuaikan dengan nama tampilan yang sesuai
    }
    public function update(Request $request, $id)
    {
        $order = OrderPaket::findOrFail($id);

        $request->validate([
            'name' => 'nullable|string',
            'email' => 'nullable|email',
            'telepon_pemesan' => 'required|string',
            'jenis_pembayaran' => 'required|string',
            'jamaah.*.nama' => 'nullable|string',  // Validasi untuk nama jamaah
            'status' => 'required|string|in:pending,diterima,ditolak',
            'bukti_pembayaran' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update user (jika relasi user ada)
        if ($order->user) {
            $order->user->name = $request->name;
            $order->user->email = $request->email;
            $order->user->save();
        }
        foreach ($request->jamaah as $jamaah_id => $jamaah_data) {
            $jamaah = Jamaah::find($jamaah_id); // Pastikan model Jamaah ada
            if ($jamaah) {
                $jamaah->nama = $jamaah_data['nama'];
                $jamaah->save();
            }
        }

        // Update order
        $order->telepon_pemesan = $request->telepon_pemesan;
        $order->jenis_pembayaran = $request->jenis_pembayaran;
        $order->status = $request->status;

        // Upload bukti jika diinput
        if ($request->hasFile('bukti_pembayaran')) {
            $path = $request->file('bukti_pembayaran')->store('bukti', 'public');
            $order->bukti_pembayaran = $path;
        }

        $saved = $order->save();

        if ($request->ajax() || $request->wantsJson()) {
            if ($saved) {
                return response()->json([
                    'success' => true,
                    'message' => 'Pesanan berhasil diperbarui!'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal memperbarui Pesanan.'
                ]);
            }
        }

        // Kalau bukan AJAX, redirect biasa
        return redirect()->route('admin.pemesan')
            ->with('success', 'Pesanan berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $order = OrderPaket::findOrFail($id);
        $order->delete();

        return response()->json(['success' => true]);
    }



}
