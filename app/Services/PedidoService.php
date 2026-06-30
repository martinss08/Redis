<?php

namespace App\Services;
use App\Models\Pedido;
use App\Redis\RedisManagerService;

class PedidoService
{
    /**
     * Create a new class instance.
     */
    public function __construct( public Pedido $model, public RedisManagerService $redisManagerService)
    { }
    
    public function getAll()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        $process = $this->redisManagerService->handleIdempotency($data['key_idempotencia']);

        if(!$process) {
            return response()->json([
                'message' => 'Processamento em andamento. Tente novamente em alguns segundos.'
            ], 202);
        }

        return $this->model->create($data);
    }
}
