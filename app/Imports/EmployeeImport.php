<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Employee;
use App\Models\User;
// use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EmployeeImport implements ToCollection, WithHeadingRow
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
	        	$user = User::where('name',$row['employee'])->firstOrFail();
            }
            catch (ModelNotFoundException $ex) {
	        	$user = new User();
				$user->name = $row['employee'];
                $user->email = $row['email'];
                $user->password = Hash::make($row['password']);
                // $user->is_admin = $row['is_admin'];
                $user->role = 'employee';
		        $user->save();
            }

                try {
                    // $artist = Artist::where('artist_name',$row['artist'])->first();
                    $employee = Employee::where('employee_name',$row['employee'])->firstOrFail();
                }
                catch (ModelNotFoundException $ex) {
                    // dd($ex);
                    $employee = new Employee();
                    $employee->employee_name = $row['employee'];
                    $employee->addressline = $row['addressline'];
                    $employee->phone = $row['phone'];
                    // $customer->addressline = $row['genre'];
                }

                $employee->user()->associate($user);
                $employee->save();

        }
    }
}
