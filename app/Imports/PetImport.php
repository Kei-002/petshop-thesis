<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Customer;
use App\Models\User;
use App\Models\Pet;
// use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PetImport implements ToCollection, WithHeadingRow
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
	        	$customer = Customer::where('customer_name',$row['owner_name'])->firstOrFail();
            }
            catch (ModelNotFoundException $ex) {
                dd($ex);
	        	// $user = new User();
				// $user->name = $row['name'];
                // $user->email = $row['email'];
                // $user->password = Hash::make($row['password']);
                // // $user->is_admin = $row['is_admin'];
                // // $user->role = $row['role'];
		        // $user->save();
            }

               
                // dd($ex);
                $pet = new Pet();
                $pet->pet_name = $row['pet_name'];
                $pet->age = $row['age'];
                // $customer->phone = $row['phone'];
                // $customer->addressline = $row['genre'];
               

                $pet->customer()->associate($customer);
                $pet->save();

        }
    }
}
