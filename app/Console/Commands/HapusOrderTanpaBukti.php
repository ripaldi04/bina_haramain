<?php

namespace App\Console\Commands;

use App\Models\OrderPaket;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class HapusOrderTanpaBukti extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:hapus-order-tanpa-bukti';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Menghapus order yang tidak mengupload bukti pembayaran selama 1 jam';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $batasWaktu = Carbon::now()->subHour();

        $this->info("Batas waktu pengecekan: " . $batasWaktu);

        $orders = OrderPaket::whereNull('bukti_pembayaran')
            ->where('created_at', '<=', $batasWaktu)
            ->get();

        $this->info("Jumlah order ditemukan: " . $orders->count());

        foreach ($orders as $order) {
            $this->info("Menghapus order id: " . $order->id);
            $order->delete();
        }

        $this->info("Selesai menghapus order.");
    }
}
