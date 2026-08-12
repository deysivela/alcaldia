<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;

class CulturaPermissionsSeeder extends Seeder
{
    public function run()
    {
        $items = [
            [
                'name' => 'Navegar Cultura',
                'slug' => 'cultura.index',
                'description' => 'Lista cronogramas y actividades de Cultura',
            ],
            [
                'name' => 'Crear Cultura',
                'slug' => 'cultura.create',
                'description' => 'Sube cronogramas y actividades de Cultura',
            ],
            [
                'name' => 'Ver detalle Cultura',
                'slug' => 'cultura.show',
                'description' => 'Ve el detalle de un documento de Cultura',
            ],
            [
                'name' => 'Editar Cultura',
                'slug' => 'cultura.edit',
                'description' => 'Edita y publica cronogramas/actividades de Cultura',
            ],
            [
                'name' => 'Eliminar Cultura',
                'slug' => 'cultura.destroy',
                'description' => 'Elimina documentos de Cultura',
            ],
        ];

        $permissionIds = [];
        foreach ($items as $item) {
            $permission = Permission::firstOrCreate(
                ['slug' => $item['slug']],
                [
                    'name' => $item['name'],
                    'description' => $item['description'],
                ]
            );
            $permissionIds[] = $permission->id;
        }

        $role = Role::firstOrCreate(
            ['slug' => 'editor-cultura'],
            [
                'name' => 'Editor Cultura',
                'description' => 'Solo puede administrar cronogramas y actividades de Cultura (Virgen de la Asunción, etc.)',
                'special' => null,
            ]
        );

        $role->permissions()->sync($permissionIds);
    }
}
