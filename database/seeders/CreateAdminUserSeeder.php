<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
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
            'name' => '2Rushabh Patel', 
            'email' => '2admin@admin.com',
            'password' => bcrypt('12345678'),
            'phone_number' => '7990433775',
            'address' => 'B-72, Shantinagar Society, Adajan',
            'state' => 'Gujarat',
            'city' => 'Surat',
            'profile_image' => '',
            'gst_number' => 'IND123JAM123',
        ]);
       
    
        $role = Role::create(['name' => 'Admin']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}