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
    public function prosesPesan(Request $request)
    {
        \Log::info('Form diterima');
        \Log::info($request->all());
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

        \Log::info($request->all());


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
            'jenis_kelamin.*' => 'required|string',  // Validasi setiap item dalam array
            'jenis_jamaah' => 'required|array',
        ]);

        // Update data pemesanan dengan data pemesan yang baru
        $order = OrderPaket::findOrFail($order_id);
        $order->update([
            'nama_pemesan' => $request->nama_pemesan,
            'jenis_kelamin_pemesan' => $request->jenis_kelamin_pemesan,
            'telepon_pemesan' => $request->telepon_pemesan,
            'email_pemesan' => $request->email_pemesan,
            'catatan' => $request->catatan,
        ]);

        $jamaahCount = count($request->nama_jamaah); // Jumlah jamaah

        // Menyimpan data jamaah
        for ($i = 0; $i < $jamaahCount; $i++) {
            // Pastikan `jenis_kelamin` valid atau set default jika tidak ada
            $jenis_kelamin = isset($request->jenis_kelamin[$i]) ? $request->jenis_kelamin[$i] : 'default_value';  // Default value jika tidak ada

            // Cek apakah data kamar ada dan valid
            if (isset($order->orderKamar[$i])) {
                // Save Jamaah data dengan pengecekan
                Jamaah::create([
                    'order_paket_id' => $order->id,
                    'order_kamar_id' => $order->orderKamar[$i]->id, // Pastikan ada data kamar
                    'nama' => $request->nama_jamaah[$i],
                    'jenis_kelamin' => $jenis_kelamin,
                    'jenis_jamaah' => $request->jenis_jamaah[$i],
                ]);
            } else {
                // Jika kamar tidak ada, log error atau tangani sesuai kebutuhan
                Log::error("Data kamar tidak ditemukan untuk jamaah pada indeks {$i} untuk pemesanan {$order->id}");
            }
        }

        // Redirect ke halaman sukses pemesanan
        return redirect()->route('pesananSukses');

    }
    public function pesananSukses()
    {
        return view('pages.user.pesanan_sukses'); // Sesuaikan dengan nama tampilan yang sesuai
    }


}
