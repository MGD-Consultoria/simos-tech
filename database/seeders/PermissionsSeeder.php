<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list atribuicoes']);
        Permission::create(['name' => 'view atribuicoes']);
        Permission::create(['name' => 'create atribuicoes']);
        Permission::create(['name' => 'update atribuicoes']);
        Permission::create(['name' => 'delete atribuicoes']);

        Permission::create(['name' => 'list centrocustos']);
        Permission::create(['name' => 'view centrocustos']);
        Permission::create(['name' => 'create centrocustos']);
        Permission::create(['name' => 'update centrocustos']);
        Permission::create(['name' => 'delete centrocustos']);

        Permission::create(['name' => 'list centrocustoempresas']);
        Permission::create(['name' => 'view centrocustoempresas']);
        Permission::create(['name' => 'create centrocustoempresas']);
        Permission::create(['name' => 'update centrocustoempresas']);
        Permission::create(['name' => 'delete centrocustoempresas']);

        Permission::create(['name' => 'list cidades']);
        Permission::create(['name' => 'view cidades']);
        Permission::create(['name' => 'create cidades']);
        Permission::create(['name' => 'update cidades']);
        Permission::create(['name' => 'delete cidades']);

        Permission::create(['name' => 'list departamentos']);
        Permission::create(['name' => 'view departamentos']);
        Permission::create(['name' => 'create departamentos']);
        Permission::create(['name' => 'update departamentos']);
        Permission::create(['name' => 'delete departamentos']);

        Permission::create(['name' => 'list empresas']);
        Permission::create(['name' => 'view empresas']);
        Permission::create(['name' => 'create empresas']);
        Permission::create(['name' => 'update empresas']);
        Permission::create(['name' => 'delete empresas']);

        Permission::create(['name' => 'list empresaanexos']);
        Permission::create(['name' => 'view empresaanexos']);
        Permission::create(['name' => 'create empresaanexos']);
        Permission::create(['name' => 'update empresaanexos']);
        Permission::create(['name' => 'delete empresaanexos']);

        Permission::create(['name' => 'list equipamentos']);
        Permission::create(['name' => 'view equipamentos']);
        Permission::create(['name' => 'create equipamentos']);
        Permission::create(['name' => 'update equipamentos']);
        Permission::create(['name' => 'delete equipamentos']);

        Permission::create(['name' => 'list estados']);
        Permission::create(['name' => 'view estados']);
        Permission::create(['name' => 'create estados']);
        Permission::create(['name' => 'update estados']);
        Permission::create(['name' => 'delete estados']);

        Permission::create(['name' => 'list filhos']);
        Permission::create(['name' => 'view filhos']);
        Permission::create(['name' => 'create filhos']);
        Permission::create(['name' => 'update filhos']);
        Permission::create(['name' => 'delete filhos']);

        Permission::create(['name' => 'list fornecedores']);
        Permission::create(['name' => 'view fornecedores']);
        Permission::create(['name' => 'create fornecedores']);
        Permission::create(['name' => 'update fornecedores']);
        Permission::create(['name' => 'delete fornecedores']);

        Permission::create(['name' => 'list funcionarios']);
        Permission::create(['name' => 'view funcionarios']);
        Permission::create(['name' => 'create funcionarios']);
        Permission::create(['name' => 'update funcionarios']);
        Permission::create(['name' => 'delete funcionarios']);

        Permission::create(['name' => 'list funcionarioanexos']);
        Permission::create(['name' => 'view funcionarioanexos']);
        Permission::create(['name' => 'create funcionarioanexos']);
        Permission::create(['name' => 'update funcionarioanexos']);
        Permission::create(['name' => 'delete funcionarioanexos']);

        Permission::create(['name' => 'list manutencoes']);
        Permission::create(['name' => 'view manutencoes']);
        Permission::create(['name' => 'create manutencoes']);
        Permission::create(['name' => 'update manutencoes']);
        Permission::create(['name' => 'delete manutencoes']);

        Permission::create(['name' => 'list normas']);
        Permission::create(['name' => 'view normas']);
        Permission::create(['name' => 'create normas']);
        Permission::create(['name' => 'update normas']);
        Permission::create(['name' => 'delete normas']);

        Permission::create(['name' => 'list parametros']);
        Permission::create(['name' => 'view parametros']);
        Permission::create(['name' => 'create parametros']);
        Permission::create(['name' => 'update parametros']);
        Permission::create(['name' => 'delete parametros']);

        Permission::create(['name' => 'list sensores']);
        Permission::create(['name' => 'view sensores']);
        Permission::create(['name' => 'create sensores']);
        Permission::create(['name' => 'update sensores']);
        Permission::create(['name' => 'delete sensores']);

        Permission::create(['name' => 'list tipocolaboradores']);
        Permission::create(['name' => 'view tipocolaboradores']);
        Permission::create(['name' => 'create tipocolaboradores']);
        Permission::create(['name' => 'update tipocolaboradores']);
        Permission::create(['name' => 'delete tipocolaboradores']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

    }
}
