<?php

namespace App\Services;
use App\Models\Pedido;

class PedidoService
{
    /**
     * Create a new class instance.
     */
    public function __construct( public Pedido $model)
    { }
    
    public function getAll()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }
}
