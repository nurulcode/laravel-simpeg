<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $permissions = [
           'superuser',

           'master-list',
           'master-create',
           'master-edit',
           'master-delete',

           'pegawai-list',
           'pegawai-create',
           'pegawai-edit',
           'pegawai-delete',

           'history-list',
           'history-create',
           'history-edit',
           'history-delete',

           'kepegawaian-list',
           'kepegawaian-create',
           'kepegawaian-edit',
           'kepegawaian-delete',

           'laporan-list',
           'laporan-create',
           'laporan-edit',
           'laporan-delete',

           'system-list',
           'system-create',
           'system-edit',
           'system-delete',
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
