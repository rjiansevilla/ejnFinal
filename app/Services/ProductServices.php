<?php
namespace App\Services;

use App\Traits\Cachable;
use Auth;

// Models
use App\Models\Stations;

class ProductServices extends Service
{
    use Cachable;

    /**
     * Get all stations
     * 
     * @return arrray
     */
    public function getStations()
    {
        $stations = Stations::get();

        return $stations;
    }

    /**
     * Get the list of products.
     * 
     * @return array
     */
    public function getProducts()
    {
        $data = $this->getDataList();

        return $data;
    }
}