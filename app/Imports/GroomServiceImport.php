<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Groomservices;
use App\Models\User;
// use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GroomServiceImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) 
        {

            try {
                // $artist = Artist::where('artist_name',$row['artist'])->first();
	        	$service = Groomservices::where('groom_name',$row['service_name'])->firstOrFail();
            }
            catch (ModelNotFoundException $ex) {
                // dd($ex);
	        	$service = new Groomservices();
                $service->groom_name = $row['service_name'];
                $service->price = $row['price'];
                $service->description = $row['description'];
                $service->save();
            }

        }
    }
}
