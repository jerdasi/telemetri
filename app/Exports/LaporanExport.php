<?php

namespace App\Exports;

use App\Models\Laporan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanExport implements FromView
{
    public function view(): View
    {
        $list_laporan = Laporan::all();
        return view('laporan_export', compact('list_laporan'));
        // TODO: Implement view() method.
    }
}
