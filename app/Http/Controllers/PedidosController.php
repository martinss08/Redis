<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedidoRequest;
use App\Services\PedidoService;
use App\Traits\ApiResponse;

class PedidosController extends Controller
{

    use ApiResponse;

    public function __construct(public PedidoService $pedidoService)
    { }
    
    public function index()
    {
        $pedidos = $this->pedidoService->getAll();

        if (empty($pedidos)) {
            return $this->notFound(404, 'Nenhum pedido encontrado');
        }

        return $this->sucesso($pedidos, 200, "Pedidos listados com sucesso");
    }

    public function store(PedidoRequest $request)
    {
        $data = $request->validated();

        $pedidos = $this->pedidoService->create($data);

        return $this->sucesso($pedidos, 201, "Pedido criado com sucesso");
    }
}
