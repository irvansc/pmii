<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
            DB::beginTransaction();
        try {

            $admin = User::create(array_merge([
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'isActive' => true,
                'verified' => true
            ], $default_user_value));
            $it = User::create(array_merge([
                'name' => 'It',
                'username' => 'it',
                'email' => 'it@gmail.com',
                'isActive' => true,
                'verified' => true

            ], $default_user_value));

            $author = User::create(array_merge([
                'name' => 'Author',
                'username' => 'author',
                'email' => 'author@gmail.com',
                'isActive' => true,
                'verified' => true

            ], $default_user_value));

            $user = User::create(array_merge([
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'isActive' => true,
                'verified' => true

            ], $default_user_value));
            $alumni = User::create(array_merge([
                'name' => 'Alumni',
                'username' => 'alumni',
                'email' => 'alumni@gmail.com',
                'isActive' => true,
                'verified' => true

            ], $default_user_value));


            $role_admin = Role::create(['name' => 'admin']);
            $role_author = Role::create(['name' => 'author']);
            $role_it = Role::create(['name' => 'it']);
            $role_user = Role::create(['name' => 'user']);
            $role_alumni = Role::create(['name' => 'alumni']);


            $permission = Permission::create(['name'=>'read role']);
            $permission = Permission::create(['name'=>'read post']);
            $permission = Permission::create(['name'=>'read setting']);
            $permission = Permission::create(['name'=>'view-activity']);

            $role_it->givePermissionTo('read role');
            $role_it->givePermissionTo('read post');
            $role_it->givePermissionTo('read setting');
            $role_it->givePermissionTo('view-activity');



            $admin->assignRole('admin');
            $admin->assignRole('it');
            $it->assignRole('it');
            $author->assignRole('author');
            $user->assignRole('user');
            $alumni->assignRole('alumni');


            $admin = User::where('email', 'admin@gmail.com')->first();
        if ($admin) {
            $admin->profile()->create([
                'no_hp' => '085712345678',
                'tempat_lahir' => 'Sukabumi',
                'tanggal_lahir' => '1991-04-05',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. H. Gadung no.20, Pondok Ranji, Ciputat Timur, Tangerang Selatan, Banten',
            ]);
        }
        $it = User::where('email', 'it@gmail.com')->first();
        if ($it) {
            $it->profile()->create([
                'no_hp' => '085712345678',
                'tempat_lahir' => 'Sukabumi',
                'tanggal_lahir' => '1991-04-05',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. H. Gadung no.20, Pondok Ranji, Ciputat Timur, Tangerang Selatan, Banten',
            ]);
        }

        $author = User::where('email', 'author@gmail.com')->first();
        if ($author) {
            $author->profile()->create([
                'no_hp' => '085712345678',
                'tempat_lahir' => 'Bogor',
                'tanggal_lahir' => '1994-01-01',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jalan Bogor Raya No. 19',
            ]);
        }

        $user = User::where('email', 'user@gmail.com')->first();
        if ($user) {
            $user->profile()->create([
                'no_hp' => '08123456789',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1990-11-21',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jalan Bandung Utara No. 123',
            ]);
        }
        $alumni = User::where('email', 'alumni@gmail.com')->first();
        if ($alumni) {
            $alumni->profile()->create([
                'no_hp' => '08123456789',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1990-11-21',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jalan Bandung Utara No. 123',
            ]);
        }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }





}
