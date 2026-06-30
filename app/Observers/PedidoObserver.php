<?php

namespace App\Observers;

use App\Models\Pedido;
use Illuminate\Support\Facades\Cache;

class PedidoObserver
{

    // Lógica a ser executada quando um pedido é criado
    public function createdin(Pedido $pedido)
    {
        // Limpar o cache de pedidos
        Cache::forget('pedidos_all');
    }

    /**
     * Handle the Pedido "created" event.
     */
    public function created(Pedido $pedido): void
    {
        //
    }

    /**
     * Handle the Pedido "updated" event.
     */
    public function updated(Pedido $pedido): void
    {
        //
    }

    /**
     * Handle the Pedido "deleted" event.
     */
    public function deleted(Pedido $pedido): void
    {
        //
    }

    /**
     * Handle the Pedido "restored" event.
     */
    public function restored(Pedido $pedido): void
    {
        //
    }

    /**
     * Handle the Pedido "force deleted" event.
     */
    public function forceDeleted(Pedido $pedido): void
    {
        //
    }
}
