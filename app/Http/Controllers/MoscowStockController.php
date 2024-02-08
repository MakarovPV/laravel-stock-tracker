<?php

namespace App\Http\Controllers;

use App\Models\MoscowStock;
use App\Repositories\MoscowIndexRepository;
use App\Repositories\MoscowStockRepository;
use Illuminate\Http\Request;

class MoscowStockController extends Controller
{
    private MoscowStockRepository $moscowStockRepository;
    private MoscowIndexRepository $moscowIndexRepository;

    public function __construct(MoscowStockRepository $moscowStockRepository, MoscowIndexRepository $moscowIndexRepository)
    {
        $this->moscowStockRepository = $moscowStockRepository;
        $this->moscowIndexRepository = $moscowIndexRepository;
    }

    public function index(Request $request)
    {
        $data = $request->all();
        $sector = (isset($data['sector'])) ? $data['sector'] : '';
        $stocks = $this->moscowStockRepository->getStockListByIndex($sector);
        $indices = $this->moscowIndexRepository->getIndices();

        return view('stocks.moscow.index', compact('stocks', 'indices'));
    }

    public function store(array $array)
    {
        MoscowStock::insertOrIgnore($array);
    }
}
