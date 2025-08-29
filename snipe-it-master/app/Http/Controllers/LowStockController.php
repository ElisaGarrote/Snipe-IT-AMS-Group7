<?php

namespace App\Http\Controllers;

use App\Models\Consumable;
use App\Models\Accessory;
use App\Models\Component;
use App\Models\Asset;
use App\Helpers\Helper;
use Illuminate\Http\Request;

class LowStockController extends Controller
{
public function list(Request $request)
    {
        // Fetch low stock items using the Helper
        $lowStockItems = Helper::checkLowInventory();

        // Add URLs to each item
        $lowStockItems = collect($lowStockItems)->map(function ($item) {
            $item['url'] = route($item['type'] . '.show', $item['id']);
            return $item;
        });

        return response()->json($lowStockItems);
    }

    public function fullPage()
    {
        return view('lowstock.fullpage');
    }
}