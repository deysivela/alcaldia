<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users
        Permission::create([
            'name'=>'Crear Usuarios',
            'slug'=>'users.create',
            'description'=>'Crea Usuarios para la administracion del sistema',
        ]);
        Permission::create([
        	'name'=>'Navegar Usuarios',
        	'slug'=>'users.index',
        	'description'=>'Lista y navega por todos los usuarios del sistema',
        ]);
        Permission::create([
        	'name'=>'Ver detalle de usuarios',
        	'slug'=>'users.show',
        	'description'=>'muestra en detalle cada usuario del sistema',
        ]);
        Permission::create([
            'name'=>'Editar usuarios',
            'slug'=>'users.edit',
            'description'=>'Edita cualquier dato de un usuario del sistema',
        ]);
        Permission::create([
        	'name'=>'Elimina usuario',
        	'slug'=>'users.destroy',
        	'description'=>'Eliminina cualquier usuario de sistema',
        ]);


        //Roles
        Permission::create([
            'name'=>'Crear Roles',
            'slug'=>'roles.create',
            'description'=>'Crea un rol del sistema',
        ]);
        Permission::create([
            'name'=>'Navegar Roles',
            'slug'=>'roles.index',
            'description'=>'Lista y navega por todos los roles del sistema',
        ]);
        Permission::create([
            'name'=>'Ver detalle de Roles',
            'slug'=>'roles.show',
            'description'=>'muestra en detalle cada rol del sistema',
        ]);
        Permission::create([
            'name'=>'Editar Roles',
            'slug'=>'roles.edit',
            'description'=>'Edita cualquier dato de un rol del sistema',
        ]);
        Permission::create([
            'name'=>'Elimina Roles',
            'slug'=>'roles.destroy',
            'description'=>'Eliminina cualquier rol de sistema',
        ]);

        
        //Document
        Permission::create([
            'name'=>'Crear Documentos',
            'slug'=>'doc.create',
            'description'=>'Crea un document del sistema',
        ]);
        Permission::create([
            'name'=>'Navegar Documents',
            'slug'=>'doc.index',
            'description'=>'Lista y navega por todos los documents del sistema',
        ]);
        Permission::create([
            'name'=>'Ver detalle de Documents',
            'slug'=>'doc.show',
            'description'=>'muestra en detalle cada document del sistema',
        ]);
        Permission::create([
            'name'=>'Editar Documents',
            'slug'=>'doc.edit',
            'description'=>'Edita cualquier dato de un document del sistema',
        ]);
        Permission::create([
            'name'=>'Elimina Documents',
            'slug'=>'doc.destroy',
            'description'=>'Eliminina cualquier document de sistema',
        ]);


        //Role Añadir
        // Permission::create([
        //     'name'=>'Asociar Administrador',
        //     'slug'=>'admins.edit',
        //     'description'=>'Asocia un empleado con el usuario por Defaaul del sistema',
        // ]);

        //Employees
        Permission::create([
            'name'=>'Crear Empleados',
            'slug'=>'employees.create',
            'description'=>'Crea un Empleados del sistema',
        ]);
        Permission::create([
            'name'=>'Navegar Empleados',
            'slug'=>'employees.index',
            'description'=>'Lista y navega por todos los Empleados del sistema',
        ]);
        Permission::create([
            'name'=>'Ver detalle de Empleados',
            'slug'=>'employees.show',
            'description'=>'muestra en detalle cada Empleados del sistema',
        ]);
        Permission::create([
            'name'=>'Editar Empleados',
            'slug'=>'employees.edit',
            'description'=>'Edita cualquier dato de un Empleados del sistema',
        ]);
        Permission::create([
            'name'=>'Elimina Empleados',
            'slug'=>'employees.destroy',
            'description'=>'Eliminina cualquier Empleados de sistema',
        ]);

        //charges
        // Permission::create([
        //     'name'=>'Crear Cargos',
        //     'slug'=>'charges.create',
        //     'description'=>'Crea un Cargos del sistema',
        // ]);
        // Permission::create([
        //     'name'=>'Navegar Cargos',
        //     'slug'=>'charges.index',
        //     'description'=>'Lista y navega por todos los Cargos del sistema',
        // ]);
        // Permission::create([
        //     'name'=>'Ver detalle de Cargos',
        //     'slug'=>'charges.show',
        //     'description'=>'muestra en detalle cada Cargos del sistema',
        // ]);
        // Permission::create([
        //     'name'=>'Editar Cargos',
        //     'slug'=>'charges.edit',
        //     'description'=>'Edita cualquier dato de un Cargos del sistema',
        // ]);
        // Permission::create([
        //     'name'=>'Elimina Cargos',
        //     'slug'=>'charges.destroy',
        //     'description'=>'Eliminina cualquier Cargos de sistema',
        // ]);

        //levels
        // Permission::create([
        //     'name'=>'Navegar Niveles',
        //     'slug'=>'levels.index',
        //     'description'=>'Lista y navega por todos los Niveles del sistema',
        // ]);
        // Permission::create([
        //     'name'=>'Ver detalle de Niveles',
        //     'slug'=>'levels.show',
        //     'description'=>'muestra en detalle cada Niveles del sistema',
        // ]);
        // Permission::create([
        //     'name'=>'Crear Niveles',
        //     'slug'=>'levels.create',
        //     'description'=>'Crea un Niveles del sistema',
        // ]);
        // Permission::create([
        //     'name'=>'Editar Niveles',
        //     'slug'=>'levels.edit',
        //     'description'=>'Edita cualquier dato de un Niveles del sistema',
        // ]);
        // Permission::create([
        //     'name'=>'Elimina Niveles',
        //     'slug'=>'levels.destroy',
        //     'description'=>'Eliminina cualquier Niveles de sistema',
        // ]);

        //Salaries
        Permission::create([
            'name'=>'Crear Salarios',
            'slug'=>'salaries.create',
            'description'=>'Crea un Salarios del sistema',
        ]);
        Permission::create([
            'name'=>'Navegar Salarios',
            'slug'=>'salaries.index',
            'description'=>'Lista y navega por todos los Salarios del sistema',
        ]);
        Permission::create([
            'name'=>'Ver detalle de Salarios',
            'slug'=>'salaries.show',
            'description'=>'muestra en detalle cada Salarios del sistema',
        ]);
        Permission::create([
            'name'=>'Editar Salarios',
            'slug'=>'salaries.edit',
            'description'=>'Edita cualquier dato de un Salarios del sistema',
        ]);
        Permission::create([
            'name'=>'Elimina Salarios',
            'slug'=>'salaries.destroy',
            'description'=>'Eliminina cualquier Salarios de sistema',
        ]);

        //clases
        // Permission::create([
        //     'name'=>'Navegar clases',
        //     'slug'=>'clases.index',
        //     'description'=>'Lista y navega por todos los clases del sistema',
        // ]);
        // Permission::create([
        //     'name'=>'Ver detalle de clases',
        //     'slug'=>'clases.show',
        //     'description'=>'muestra en detalle cada clases del sistema',
        // ]);
        // Permission::create([
        //     'name'=>'Crear clases',
        //     'slug'=>'clases.create',
        //     'description'=>'Crea un clases del sistema',
        // ]);
        // Permission::create([
        //     'name'=>'Editar clases',
        //     'slug'=>'clases.edit',
        //     'description'=>'Edita cualquier dato de un clases del sistema',
        // ]);
        // Permission::create([
        //     'name'=>'Elimina clases',
        //     'slug'=>'clases.destroy',
        //     'description'=>'Eliminina cualquier clases de sistema',
        // ]);

        //Salcats
        // Permission::create([
        //     'name'=>'Navegar Salcats',
        //     'slug'=>'salcats.index',
        //     'description'=>'Lista y navega por todos los Salcats del sistema',
        // ]);
        // Permission::create([
        //     'name'=>'Ver detalle de Salcats',
        //     'slug'=>'salcats.show',
        //     'description'=>'muestra en detalle cada Salcats del sistema',
        // ]);
        // Permission::create([
        //     'name'=>'Crear Salcats',
        //     'slug'=>'salcats.create',
        //     'description'=>'Crea un Salcats del sistema',
        // ]);
        // Permission::create([
        //     'name'=>'Editar Salcats',
        //     'slug'=>'salcats.edit',
        //     'description'=>'Edita cualquier dato de un Salcats del sistema',
        // ]);
        // Permission::create([
        //     'name'=>'Elimina Salcats',
        //     'slug'=>'salcats.destroy',
        //     'description'=>'Eliminina cualquier Salcats de sistema',
        // ]);

        //Cultura
        Permission::create([
            'name'=>'Navegar Cultura',
            'slug'=>'cultura.index',
            'description'=>'Lista cronogramas y actividades de Cultura',
        ]);
        Permission::create([
            'name'=>'Crear Cultura',
            'slug'=>'cultura.create',
            'description'=>'Sube cronogramas y actividades de Cultura',
        ]);
        Permission::create([
            'name'=>'Ver detalle Cultura',
            'slug'=>'cultura.show',
            'description'=>'Ve el detalle de un documento de Cultura',
        ]);
        Permission::create([
            'name'=>'Editar Cultura',
            'slug'=>'cultura.edit',
            'description'=>'Edita y publica cronogramas/actividades de Cultura',
        ]);
        Permission::create([
            'name'=>'Eliminar Cultura',
            'slug'=>'cultura.destroy',
            'description'=>'Elimina documentos de Cultura',
        ]);

        //Newpage
        Permission::create([
            'name'=>'Crear Noticias',
            'slug'=>'newpages.create',
            'description'=>'Crea un Noticias del sistema',
        ]);
        Permission::create([
            'name'=>'Navegar Noticias',
            'slug'=>'newpages.index',
            'description'=>'Lista y navega por todos los Noticias del sistema',
        ]);
        Permission::create([
            'name'=>'Ver detalle de Noticias',
            'slug'=>'newpages.show',
            'description'=>'muestra en detalle cada Noticias del sistema',
        ]);
        Permission::create([
            'name'=>'Editar Noticias',
            'slug'=>'newpages.edit',
            'description'=>'Edita cualquier dato de un Noticias del sistema',
        ]);
        Permission::create([
            'name'=>'Elimina Noticias',
            'slug'=>'newpages.destroy',
            'description'=>'Eliminina cualquier Noticias de sistema',
        ]);

        //Projects
        Permission::create([
            'name'=>'Crear Proyectos',
            'slug'=>'projects.create',
            'description'=>'Crea un Niveles del sistema',
        ]);
        Permission::create([
            'name'=>'Navegar Proyectos',
            'slug'=>'projects.index',
            'description'=>'Lista y navega por todos los Niveles del sistema',
        ]);
        Permission::create([
            'name'=>'Ver detalle de Proyectos',
            'slug'=>'projects.show',
            'description'=>'muestra en detalle cada Niveles del sistema',
        ]);
        Permission::create([
            'name'=>'Editar Proyectos',
            'slug'=>'projects.edit',
            'description'=>'Edita cualquier dato de un Niveles del sistema',
        ]);
        Permission::create([
            'name'=>'Elimina Proyectos',
            'slug'=>'projects.destroy',
            'description'=>'Eliminina cualquier Niveles de sistema',
        ]);

    }
}
