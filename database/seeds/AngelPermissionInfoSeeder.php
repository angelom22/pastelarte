<?php

use Illuminate\Database\Seeder;
use App\User;
use App\RolesPermisos\Models\Role;
use App\RolesPermisos\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AngelPermissionInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate tablas
        DB::statement('SET foreign_key_checks=0');
            DB::table('role_user')->truncate();
            DB::table('permission_role')->truncate();
            Permission::truncate();
            Role::truncate();
        DB::statement('SET foreign_key_checks=1');

        //User Admin
        $useradmin = User::where('email','admin@admin.com')->first();

        if ($useradmin) {
            $useradmin->delete();
        }

        $useradmin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            // 'password' => Hash::make('admin123'),
            'password' => 'admin123',
            'avatar' => 'perfil/perfil.png',
            'status' => true
        ]);
        
        // Rol Admin
        $roladmin= Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Usuario Administrador',
            'full_access' => 'yes'
        ]);

        // Rol Estudiante
        $roluser= Role::create([
            'name' => 'Estudiante',
            'slug' => 'estudiante',
            'description' => 'Usuario estudiante',
            'full_access' => 'no'
        ]);
        // Rol Cliente
        $roluser= Role::create([
            'name' => 'Autor',
            'slug' => 'autor',
            'description' => 'Usuario autor',
            'full_access' => 'no'
        ]);

        // Rol Registro Usuario
        // $roluser= Role::create([
        //     'name' => 'Registro Usuario',
        //     'slug' => 'registro-usuario',
        //     'description' => 'Usuario Registrador',
        //     'full_access' => 'no'
        // ]);




    // relación table role_user
    $useradmin->roles()->sync([$roladmin->id]);


        // Permisos
        $permission_all = [];

    // ----------------Permiso Para los Roles------------------- //
        // Permisos Roles
        $permission = Permission::create([
            'name' => 'Lista role',
            'slug' => 'role.index',
            'description' => 'El usuario puede listar los roles',
        ]);

        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Show role',
            'slug' => 'role.show',
            'description' => 'El usuario puede ver los roles',
        ]);

        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Create role',
            'slug' => 'role.create',
            'description' => 'El usuario puede crear los roles',
        ]);

        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Edit role',
            'slug' => 'role.edit',
            'description' => 'El usuario puede editar los roles',
        ]);

        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Destroy role',
            'slug' => 'role.destroy',
            'description' => 'El usuario puede eliminar los roles',
        ]);

        $permission_all[] = $permission->id;
    
    // ----------------Permiso Para Usuarios------------------- //

        // Permisos users
        $permission = Permission::create([
            'name' => 'Administracion',
            'slug' => 'dashboard.admin',
            'description' => 'El usuario puede ver las estadisticas de ganacia de la aplicación',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Lista user',
            'slug' => 'user.index',
            'description' => 'El usuario puede listar los users',
        ]);

        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Show user',
            'slug' => 'user.show',
            'description' => 'El usuario puede ver los users',
        ]);

        $permission_all[] = $permission->id;
        
        
        $permission = Permission::create([
            'name' => 'Edit user',
            'slug' => 'user.edit',
            'description' => 'El usuario puede editar los users',
        ]);

        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Destroy user',
            'slug' => 'user.destroy',
            'description' => 'El usuario puede eliminar los users',
        ]);

        $permission_all[] = $permission->id;

        // ---------------------------NEW--------------------------
        $permission = Permission::create([
            'name' => 'Ver perfil propio',
            'slug' => 'userown.show',
            'description' => 'El usuario puede ver su perfil',
        ]);

        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Editar perfil propio',
            'slug' => 'userown.edit',
            'description' => 'El usuario puede editar su perfil',
        ]);

        $permission_all[] = $permission->id;

        
        /*
        $permission = Permission::create([
            'name' => 'Create user',
            'slug' => 'user.create',
            'description' => 'El usuario puede crear los users',
        ]);

        $permission_all[] = $permission->id;
        */
        

    // ----------------Permiso Para Las lecciones------------------- //

        // Permisos lecciones
        $permission = Permission::create([
            'name' => 'Administrador las lecciones',
            'slug' => 'lesson.admin',
            'description' => 'El usuario puede administrar las lecciones',
        ]);

        $permission = Permission::create([
            'name' => 'Lista leccion',
            'slug' => 'lesson.index',
            'description' => 'El usuario puede listar las lecciones',
        ]);

        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Show leccion',
            'slug' => 'lesson.show',
            'description' => 'El usuario puede ver las lecciones',
        ]);

        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Create leccion',
            'slug' => 'lesson.create',
            'description' => 'El usuario puede crear las lecciones',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Edit leccion',
            'slug' => 'lesson.edit',
            'description' => 'El usuario puede editar las lecciones',
        ]);

        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Destroy leccion',
            'slug' => 'lesson.destroy',
            'description' => 'El usuario puede eliminar las laecciones',
        ]);

        $permission_all[] = $permission->id;


    // ----------------Permiso Para Categorias------------------- //

        // Permisos categorys
        $permission = Permission::create([
            'name' => 'Lista category',
            'slug' => 'category.index',
            'description' => 'El usuario puede listar las categorias',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Show category',
            'slug' => 'category.show',
            'description' => 'El usuario puede ver las categorias',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Create category',
            'slug' => 'category.create',
            'description' => 'El usuario puede crear las categorias',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Edit category',
            'slug' => 'category.edit',
            'description' => 'El usuario puede editar las categorias',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Destroy category',
            'slug' => 'category.destroy',
            'description' => 'El usuario puede eliminar las categorias',
        ]);

        $permission_all[] = $permission->id;

    // ----------------Permiso Para Etiquetas------------------- //
        

        // Permisos tags
        $permission = Permission::create([
            'name' => 'Lista etiqueta',
            'slug' => 'tag.index',
            'description' => 'El usuario puede listar las etiquetas',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Show etiqueta',
            'slug' => 'tag.show',
            'description' => 'El usuario puede ver las etiquetas',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Create etiqueta',
            'slug' => 'tag.create',
            'description' => 'El usuario puede crear las etiquetas',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Edit etiqueta',
            'slug' => 'tag.edit',
            'description' => 'El usuario puede editar las etiquetas',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Destroy etiqueta',
            'slug' => 'tag.destroy',
            'description' => 'El usuario puede eliminar las etiquetas',
        ]);

        $permission_all[] = $permission->id;

    // ----------------Permiso Para Cursos------------------- //

        // Permisos courses
        $permission = Permission::create([
            'name' => 'Administrador de los cursos',
            'slug' => 'course.admin',
            'description' => 'El usuario puede administrar los articulos',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Lista cursos',
            'slug' => 'course.index',
            'description' => 'El usuario puede listar los cursos',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Show curso',
            'slug' => 'course.show',
            'description' => 'El usuario puede ver los cursos',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Create curso',
            'slug' => 'course.create',
            'description' => 'El usuario puede crear los cursos',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Edit curso',
            'slug' => 'course.edit',
            'description' => 'El usuario puede editar los cursos',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Destroy curso',
            'slug' => 'course.destroy',
            'description' => 'El usuario puede eliminar los cursos',
        ]);

        $permission_all[] = $permission->id;

    // ----------------Permiso Para Carreras------------------- //

        // Permisos carreras
        $permission = Permission::create([
            'name' => 'Administrador de las carreras',
            'slug' => 'career.admin',
            'description' => 'El usuario puede administrar las carreras',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Lista carrera',
            'slug' => 'career.index',
            'description' => 'El usuario puede listar las carreras',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Show carrera',
            'slug' => 'career.show',
            'description' => 'El usuario puede ver  las carreras',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Create carrera',
            'slug' => 'career.create',
            'description' => 'El usuario puede crear las carreras',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Edit carrera',
            'slug' => 'career.edit',
            'description' => 'El usuario puede editar  las carreras',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Destroy carrera',
            'slug' => 'career.destroy',
            'description' => 'El usuario puede eliminar  las carreras',
        ]);

        $permission_all[] = $permission->id;


    // ----------------Permiso Para Blogs------------------- //

        // Permisos blogs
        $permission = Permission::create([
            'name' => 'Administrador del blog',
            'slug' => 'blog.admin',
            'description' => 'El usuario puede administrar los articulos',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Lista blog',
            'slug' => 'blog.index',
            'description' => 'El usuario puede listar los articulos',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Show blog',
            'slug' => 'blog.show',
            'description' => 'El usuario puede ver  los articulos',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Create blog',
            'slug' => 'blog.create',
            'description' => 'El usuario puede crear los articulos',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Edit blog',
            'slug' => 'blog.edit',
            'description' => 'El usuario puede editar  los articulos',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Destroy blog',
            'slug' => 'blog.destroy',
            'description' => 'El usuario puede eliminar  los articulos',
        ]);

        $permission_all[] = $permission->id;

        // ----------------Permiso Para eventos------------------- //

        // Permisos events
        $permission = Permission::create([
            'name' => 'Administrador de eventos',
            'slug' => 'event.admin',
            'description' => 'El usuario puede adminitrar los eventos',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Lista evento',
            'slug' => 'event.index',
            'description' => 'El usuario puede listar los eventos',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Show evento',
            'slug' => 'event.show',
            'description' => 'El usuario puede ver  los eventos',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Create evento',
            'slug' => 'event.create',
            'description' => 'El usuario puede crear los eventos',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Edit event',
            'slug' => 'event.edit',
            'description' => 'El usuario puede editar  los eventos',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Destroy event',
            'slug' => 'event.destroy',
            'description' => 'El usuario puede eliminar  los eventos',
        ]);

        $permission_all[] = $permission->id;


    // relación table permission_role
    // $roladmin->permissions()->sync($permission_all);
    
    }
}
