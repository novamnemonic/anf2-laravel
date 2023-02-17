<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\news_articulo;
use Livewire\WithPagination;

class ArticulosIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public function updatingSearch(){
            $this->resetPage();
    }
    public function render()
    {
        $news_articulos = news_articulo::query()
                ->where('titulo','LIKE', '%' . $this->search . '%')
                ->orWhere('titulo_corto','LIKE', '%' . $this->search . '%')
                ->latest('id')
                ->Paginate(10);
        return view('livewire.admin.articulos-index', compact('news_articulos'));
    }
}
