<?php

namespace App\View\Components\Product;

use App\Models\Kategori;
use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormProduct extends Component
{
    public $id, $nama_menu, $harga, $stok, $stok_minimal, $is_active, $kategori_id, $kategori;

    /**
     * Create a new component instance.
     */
    public function __construct($id = null)
    {
        $this->kategori = Kategori::all();

        if ($id) {
            $product = Product::find($id);

            if ($product) {
                $this->id = $product->id;
                $this->nama_menu = $product->nama_menu;
                $this->harga = $product->harga;
                $this->stok = $product->stok;
                $this->stok_minimal = $product->stok_minimal;
                $this->is_active = $product->is_active;
                $this->kategori_id = $product->kategori_id;
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product.form-product');
    }
}
