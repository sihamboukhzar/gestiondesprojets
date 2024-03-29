<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'project-list',
           'project-create',
           'project-edit',
           'project-delete',
           'tache-list',
           'tache-create',
           'tache-edit',
           'tache-delete',
           'material-list',
           'material-create',
           'material-edit',
           'material-delete',
           'equipe-list',
           'equipe-create',
           'equipe-edit',
           'equipe-delete',
        ];
      
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}