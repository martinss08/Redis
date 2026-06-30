<?php

namespace App\Services;
use App\Models\Pedido;
use App\Redis\RedisManagerService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class PedidoService
{
    /**
     * Create a new class instance.
     */
    public function __construct( public Pedido $model, public RedisManagerService $redisManagerService)
    { }
    
    public function getAll()
    {
        return Cache::remember('pedidos_all', 100, function () {

            Log::info('Entrou no callback');

            return $this->model->all()->toArray();
        });
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
