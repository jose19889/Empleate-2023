<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Access;

class AccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $objects = (object)[
            // Users - 1
            (object)[
                (object)[
                    'module_id' => 1,
                    'module' => 'users',
                    'access' => 'access',
                    'title' => 'Acceso',
                ],
                (object)[
                    'module_id' => 1,
                    'module' => 'users',
                    'access' => 'create',
                    'title' => 'Crear',
                ],
                (object)[
                    'module_id' => 1,
                    'module' => 'users',
                    'access' => 'edit',
                    'title' => 'Modificar',
                ],
                (object)[
                    'module_id' => 1,
                    'module' => 'users',
                    'access' => 'activate_deactivate',
                    'title' => 'Activar / Desactivar',
                ],
                (object)[
                    'module_id' => 1,
                    'module' => 'users',
                    'access' => 'password_reset',
                    'title' => 'Resetear contraseña',
                ],
                (object)[
                    'module_id' => 1,
                    'module' => 'users',
                    'access' => 'delete',
                    'title' => 'Eliminar',
                ],
            ],

            // Roles - 2
            (object)[
                (object)[
                    'module_id' => 2,
                    'module' => 'roles',
                    'access' => 'access',
                    'title' => 'Acceso',
                ],
                (object)[
                    'module_id' => 2,
                    'module' => 'roles',
                    'access' => 'create',
                    'title' => 'Crear',
                ],
                (object)[
                    'module_id' => 2,
                    'module' => 'roles',
                    'access' => 'edit',
                    'title' => 'Modificar',
                ],
                (object)[
                    'module_id' => 2,
                    'module' => 'roles',
                    'access' => 'delete',
                    'title' => 'Eliminar',
                ],
                (object)[
                    'module_id' => 2,
                    'module' => 'roles',
                    'access' => 'permissions',
                    'title' => 'Afectar permisos',
                ],
            ],

            // Jobs - 3
            (object)[
                (object)[
                    'module_id' => 3,
                    'module' => 'jobs',
                    'access' => 'access',
                    'title' => 'Acceso',
                ],
                (object)[
                    'module_id' => 3,
                    'module' => 'jobs',
                    'access' => 'create',
                    'title' => 'Crear',
                ],
                (object)[
                    'module_id' => 3,
                    'module' => 'jobs',
                    'access' => 'edit',
                    'title' => 'Modificar',
                ],
                (object)[
                    'module_id' => 3,
                    'module' => 'jobs',
                    'access' => 'delete',
                    'title' => 'Eliminar',
                ],
            ],
            // Categories - 4
            (object)[
                (object)[
                    'module_id' => 4,
                    'module' => 'cats',
                    'access' => 'access',
                    'title' => 'Acceso',
                ],
                (object)[
                    'module_id' => 4,
                    'module' => 'cats',
                    'access' => 'create',
                    'title' => 'Crear',
                ],
                (object)[
                    'module_id' => 4,
                    'module' => 'cats',
                    'access' => 'edit',
                    'title' => 'Modificar',
                ],
                (object)[
                    'module_id' => 4,
                    'module' => 'cats',
                    'access' => 'delete',
                    'title' => 'Eliminar',
                ],
            ],
            // Entities - 5
            (object)[
                (object)[
                    'module_id' => 5,
                    'module' => 'entities',
                    'access' => 'access',
                    'title' => 'Acceso',
                ],

                (object)[
                    'module_id' => 5,
                    'module' => 'entities',
                    'access' => 'create',
                    'title' => 'Crear',
                ],

                (object)[
                    'module_id' => 5,
                    'module' => 'entities',
                    'access' => 'edit',
                    'title' => 'Editar',
                ],

                (object)[
                    'module_id' => 5,
                    'module' => 'entities',
                    'access' => 'delete',
                    'title' => 'Eliminar',
                ],


            ],
        ];

        //
        foreach ($objects as $object) {
            foreach ($object as $element) {
                $item = new Access;
                $item->module_id = $element->module_id;
                $item->module = $element->module;
                $item->access = $element->access;
                $item->title = $element->title;
                $item->save();
            }
        }
    }
}
