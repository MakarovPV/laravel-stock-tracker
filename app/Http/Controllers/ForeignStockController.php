<?php

namespace App\Http\Controllers;

use App\Models\ForeignStock;
use App\Repositories\ForeignStockInfoRepository;
use App\Repositories\ForeignStockRepository;
use Illuminate\Http\Request;

class ForeignStockController extends Controller
{
    private ForeignStockRepository $foreignStockRepository;
    private ForeignStockInfoRepository $foreignStockInfoRepository;

    public function __construct(ForeignStockRepository $foreignStockRepository, ForeignStockInfoRepository $foreignStockInfoRepository)
    {
        $this->foreignStockRepository = $foreignStockRepository;
        $this->foreignStockInfoRepository = $foreignStockInfoRepository;
    }

    public function index(Request $request)
    {
        $data = $request->all();
        $sector = (isset($data['sector'])) ? $data['sector'] : '';
        $stocks = $this->foreignStockRepository->getStockListBySector($sector);
        $sectors = $this->foreignStockRepository->getSectors();

        return view('stocks.foreign.index', compact('stocks', 'sectors'));
    }

    public function show(int $id)
    {
        $info = $this->foreignStockInfoRepository->getInfo($id);

        return view('stocks.foreign.show', compact('info'));
    }

    public function store(array $array)
    {
        ForeignStock::insertOrIgnore($array);
    }
}
