<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
Use \Carbon\Carbon;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'Ehab', 
            'last_name' => 'Saeed',
            'email' => 'admin@gmail.com',
            'email_verified_at' =>Carbon::now(),
            'password' => '123456'
        ]);
    
        $role = Role::create(['name' => 'admin']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}
