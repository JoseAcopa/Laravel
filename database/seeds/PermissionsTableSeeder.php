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
      // usuarios
      Permission::create([
        'name' => 'Navegar usuarios',
        'slug' => 'employee.index',
        'description' => 'Lista y navega todos los usuarios del sistema'
      ]);
      Permission::create([
        'name' => 'Creacion de usuarios',
        'slug' => 'employee.create',
        'description' => 'Crear usuarios del sistema'
      ]);
      Permission::create([
        'name' => 'Edicion de usuarios',
        'slug' => 'employee.update',
        'description' => 'Editar cualquier dato de un usuario del sistema'
      ]);
      Permission::create([
        'name' => 'Eliminar usuario',
        'slug' => 'employee.destroy',
        'description' => 'Eliminar cualquier dato de un usuario del sistema'
      ]);

      // roles
      Permission::create([
        'name' => 'Navegar roles',
        'slug' => 'roles.index',
        'description' => 'Lista y navega todos los roles del sistema'
      ]);
      Permission::create([
        'name' => 'Creacion de roles',
        'slug' => 'roles.create',
        'description' => 'Crear cualquier rol del sistema'
      ]);
      Permission::create([
        'name' => 'Edicion roles',
        'slug' => 'roles.edit',
        'description' => 'Editar cualquier dato de un rol del sistema'
      ]);
      Permission::create([
        'name' => 'Eliminar rol',
        'slug' => 'roles.destroy',
        'description' => 'Eliminar cualquier rol del sistema'
      ]);

      // proveedores
      Permission::create([
        'name' => 'Navegar proveedores',
        'slug' => 'suppliers.index',
        'description' => 'Lista y navega todos los proveedores del sistema'
      ]);
      Permission::create([
        'name' => 'Creacion de proveedores',
        'slug' => 'suppliers.destroy.create',
        'description' => 'Crear cualquier proveedor del sistema'
      ]);
      Permission::create([
        'name' => 'Edicion proveedores',
        'slug' => 'suppliers.edit',
        'description' => 'Editar cualquier dato de un proveedor del sistema'
      ]);
      Permission::create([
        'name' => 'Eliminar rol',
        'slug' => 'suppliers.destroy',
        'description' => 'Eliminar cualquier proveedor del sistema'
      ]);

      // clientes
      Permission::create([
        'name' => 'Navegar clientes',
        'slug' => 'client.index',
        'description' => 'Lista y navega todos los proveedores del sistema'
      ]);
      Permission::create([
        'name' => 'Creacion de clientes',
        'slug' => 'client.create',
        'description' => 'Crear cualquier cliente del sistema'
      ]);
      Permission::create([
        'name' => 'Edicion clientes',
        'slug' => 'client.edit',
        'description' => 'Editar cualquier dato de un proveedor del sistema'
      ]);
      Permission::create([
        'name' => 'Eliminar cliente',
        'slug' => 'client.destroy',
        'description' => 'Eliminar cualquier cliente del sistema'
      ]);

      // tipo de producto
      Permission::create([
        'name' => 'Navegar tipo de producto',
        'slug' => 'clasificationProduct.index',
        'description' => 'Lista y navega todos los tipos de productos del sistema'
      ]);
      Permission::create([
        'name' => 'Creacion de tipo de producto',
        'slug' => 'clasificationProduct.create',
        'description' => 'Crear cualquier tipo de producto del sistema'
      ]);
      Permission::create([
        'name' => 'Eliminar tipo de producto',
        'slug' => 'clasificationProduct.destroy',
        'description' => 'Eliminar cualquier tipo de producto del sistema'
      ]);

      // catalago
      Permission::create([
        'name' => 'Navegar catalogos',
        'slug' => 'catalogo.index',
        'description' => 'Lista y navega todos los productos en el catalogo del sistema'
      ]);
      Permission::create([
        'name' => 'Creacion de productos en catalogo',
        'slug' => 'catalogo.create',
        'description' => 'Crear cualquier producto en el catalogo del sistema'
      ]);
      Permission::create([
        'name' => 'Edicion de productos en catalogo',
        'slug' => 'catalogo.edit',
        'description' => 'Editar cualquier dato de un producto en catalogo del sistema'
      ]);
      Permission::create([
        'name' => 'Eliminar producto en catalogo',
        'slug' => 'catalogo.destroy',
        'description' => 'Eliminar cualquier producto en catalogo del sistema'
      ]);

      // productos
      Permission::create([
        'name' => 'Navegar productos',
        'slug' => 'inventary.index',
        'description' => 'Lista y navega todos los productos del sistema'
      ]);
      Permission::create([
        'name' => 'Creacion de productos',
        'slug' => 'inventary.create',
        'description' => 'Crear cualquier producto del sistema'
      ]);
      Permission::create([
        'name' => 'Ver productos',
        'slug' => 'inventary.show',
        'description' => 'Ver cualquier producto del sistema'
      ]);
      Permission::create([
        'name' => 'Edicion de productos',
        'slug' => 'inventary.edit',
        'description' => 'Editar cualquier dato de un producto del sistema'
      ]);
      Permission::create([
        'name' => 'Eliminar producto',
        'slug' => 'inventary.destroy',
        'description' => 'Eliminar cualquier producto del sistema'
      ]);

      // salidas
      Permission::create([
        'name' => 'Navegar salidas',
        'slug' => 'product-output.index',
        'description' => 'Lista y navega todos los productos de salida del sistema'
      ]);
      Permission::create([
        'name' => 'Ver salidas',
        'slug' => 'product-output.show',
        'description' => 'Ver cualquier salida del sistema'
      ]);
      Permission::create([
        'name' => 'Creacion de salidas',
        'slug' => 'product-output.create',
        'description' => 'Crear cualquier producto en salida del sistema'
      ]);
      Permission::create([
        'name' => 'Edicion de salida',
        'slug' => 'product-output.edit',
        'description' => 'Editar cualquier dato de un producto en salida del sistema'
      ]);
      Permission::create([
        'name' => 'Eliminar salida',
        'slug' => 'product-output.destroy',
        'description' => 'Eliminar cualquier producto de salida del sistema'
      ]);

      // facturas
      Permission::create([
        'name' => 'Navegar facturas',
        'slug' => 'facturas.index',
        'description' => 'Lista y navega todas las facturas del sistema'
      ]);
      Permission::create([
        'name' => 'Eliminar factura',
        'slug' => 'facturas.destroy',
        'description' => 'Eliminar cualquier factura del sistema'
      ]);

      // cotizacion
      Permission::create([
        'name' => 'Navegar cotizaciones',
        'slug' => 'quotation.index',
        'description' => 'Lista y navega todos las cotizaciones del sistema'
      ]);
      Permission::create([
        'name' => 'Ver cotizacion',
        'slug' => 'quotation.show',
        'description' => 'Ver cualquier cotizacion del sistema'
      ]);
      Permission::create([
        'name' => 'Creacion de cotizaciones',
        'slug' => 'quotation.create',
        'description' => 'Crear cualquier cotizacion del sistema'
      ]);
      Permission::create([
        'name' => 'Edicion de cotizacion',
        'slug' => 'quotation.edit',
        'description' => 'Editar cualquier dato de cotizacion del sistema'
      ]);
      Permission::create([
        'name' => 'Eliminar cotizacion',
        'slug' => 'quotation.destroy',
        'description' => 'Eliminar cualquier cotizacion del sistema'
      ]);
    }
}
