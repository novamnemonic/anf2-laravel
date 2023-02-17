<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\news_secciones;
use Livewire\WithPagination;

class SeccionesIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public function updatingSearch(){
            $this->resetPage();
    }

    public function render()
    {
        $secciones = news_secciones::query()
                ->where('nombre','LIKE', '%' . $this->search . '%')
                ->orWhere('nombre_corto','LIKE', '%' . $this->search . '%')
                ->orWhere('padre','LIKE', '%' . $this->search . '%')
                ->Paginate();

        return view('livewire.admin.secciones-index', compact('secciones'));
    }
}
