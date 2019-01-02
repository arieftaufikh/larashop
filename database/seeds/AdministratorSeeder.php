<?php

use Illuminate\Database\Seeder;
use App\User;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->username = 'administrator';
        $admin->name = 'Site Administrator';
        $admin->email = 'admin@larashop.test';
        $admin->roles = json_encode(['ADMIN']);
        $admin->phone = '087822075663';
        $admin->password = Hash::make('admin');
        $admin->avatar = 'Saat ini tidak ada avatar';
        $admin->address = 'Kiaracondon, Bandung, Jawa Barat';
        
        $admin->save();

        $this->command->info('User has been succesfully registred');
    }
}
