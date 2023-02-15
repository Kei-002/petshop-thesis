<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Customer;
use App\Models\User;
// use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class CustomerImport implements ToCollection, WithHeadingRow
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
	        	$user = User::where('name',$row['name'])->firstOrFail();
            }
            catch (ModelNotFoundException $ex) {
	        	$user = new User();
				$user->name = $row['name'];
                $user->email = $row['email'];
                $user->password = Hash::make($row['password']);
                // $user->is_admin = $row['is_admin'];
                // $user->role = $row['role'];
		        $user->save();
            }

                try {
                    // $artist = Artist::where('artist_name',$row['artist'])->first();
                    $customer = Customer::where('customer_name',$row['name'])->firstOrFail();
                }
                catch (ModelNotFoundException $ex) {
                    // dd($ex);
                    $customer = new Customer();
                    $customer->customer_name = $row['name'];
                    $customer->addressline = $row['addressline'];
                    $customer->phone = $row['phone'];
                    // $customer->addressline = $row['genre'];
                }

                $customer->user()->associate($user);
                $customer->save();

        }
    }
}
