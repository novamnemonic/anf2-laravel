<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\news_etiquetas;
use Livewire\WithPagination;

class EtiquetasIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public function updatingSearch(){
            $this->resetPage();
    }
    public function render()
    {
        $etiquetas = news_etiquetas::query()
                ->where('etiqueta','LIKE', '%' . $this->search . '%')
                ->Paginate(50);
        return view('livewire.admin.etiquetas-index',compact('etiquetas'));
    }
}
