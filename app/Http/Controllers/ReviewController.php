<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Konsultasi;

class ReviewController extends Controller
{
    public function tambahReview(Request $request)
    {
        $request->validate([
            'konsultasi_id' => 'required|exists:konsultasi,konsultasi_id', // validasi ID konsultasi
            'rating' => 'required|string|max:20', // validasi rating antara 1 hingga 5
            'pesan' => 'required|string', // validasi review maksimal 255 karakter
        ]);

        // membuat dan menyimpan review baru
        $review = new Review();
        $review->konsultasi_id = $request->konsultasi_id;
        $review->rating = $request->rating;
        $review->pesan = $request->pesan;
        $review->save();

        // update status di tabel konsultasi menjadi 'reviewed'
        $konsultasi = Konsultasi::find($request->konsultasi_id);
        $konsultasi->status = 'reviewed';
        $konsultasi->save();

        // redirect kembali dengan pesan sukses
        return redirect()->route('pasien.dashboard')->with('success', 'Review berhasil disimpan.');
    }
}
