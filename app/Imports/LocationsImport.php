<?php

namespace App\Imports;

use App\Models\Location;
use Maatwebsite\Excel\Concerns\ToModel;

class LocationsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if ($row[0] === null || $row[1] === null) {
            return null;
        }
        if (Location::where('location_name', $row[1])->first()) {
            return null;
        }
        return new Location([
            'banner_image'  => "iKfvCn3gAqowGGSHVmvrq4eqUdpVFyBStBd5PBTu.png",
            'pastors_image' => "iKfvCn3gAqowGGSHVmvrq4eqUdpVFyBStBd5PBTu.png",
            'pastors_name'  => $row[2],
            'pastors_level' => $row[3],
            'location_name' => $row[1],
            'address'       => $row[4],
            'description'   => $row[6].$row[7],
        ]);
    }
}
