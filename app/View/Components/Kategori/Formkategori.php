<?php

namespace App\View\Components\Kategori;

namespace App\View\Components\Kategori;

use App\Models\Kategori;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Formkategori extends Component
{
    public $id, $nama_kategori, $deskripsi;

    public function __construct($id = null)
    {
        if ($id) {
            $kategori = Kategori::find($id);
            $this->id = $kategori->id;
            $this->nama_kategori = $kategori->nama_kategori;
            $this->deskripsi = $kategori->deskripsi;
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.kategori.formkategori');
    }
}
