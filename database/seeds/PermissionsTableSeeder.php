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
        'description' => 'Listar empleados'
      ]);
      Permission::create([
        'name' => 'Crear usuario',
        'slug' => 'employee.create',
        'description' => 'Crear empleado'
      ]);
      Permission::create([
        'name' => 'Editar usuario',
        'slug' => 'employee.edit',
        'description' => 'Editar empleado'
      ]);
      Permission::create([
        'name' => 'Eliminar usuario',
        'slug' => 'employee.destroy',
        'description' => 'Eliminar empleado'
      ]);

      // roles
      Permission::create([
        'name' => 'Navegar roles',
        'slug' => 'roles.index',
        'description' => 'Listar roles'
      ]);
      Permission::create([
        'name' => 'Crear rol',
        'slug' => 'roles.create',
        'description' => 'Crear rol'
      ]);
      Permission::create([
        'name' => 'Editar rol',
        'slug' => 'roles.edit',
        'description' => 'Editar rol'
      ]);
      Permission::create([
        'name' => 'Eliminar rol',
        'slug' => 'roles.destroy',
        'description' => 'Eliminar rol'
      ]);

      // proveedores
      Permission::create([
        'name' => 'Navegar proveedores',
        'slug' => 'suppliers.index',
        'description' => 'Listar proveedores'
      ]);
      Permission::create([
        'name' => 'Crear proveedores',
        'slug' => 'suppliers.create',
        'description' => 'Crear proveedor'
      ]);
      Permission::create([
        'name' => 'Editar proveedor',
        'slug' => 'suppliers.edit',
        'description' => 'Editar proveedor'
      ]);
      Permission::create([
        'name' => 'Eliminar proveedor',
        'slug' => 'suppliers.destroy',
        'description' => 'Eliminar proveedor'
      ]);

      // clientes
      Permission::create([
        'name' => 'Navegar clientes',
        'slug' => 'client.index',
        'description' => 'Listar clientes'
      ]);
      Permission::create([
        'name' => 'Crear cliente',
        'slug' => 'client.create',
        'description' => 'Crear cliente'
      ]);
      Permission::create([
        'name' => 'Editar cliente',
        'slug' => 'client.edit',
        'description' => 'Editar cliente'
      ]);
      Permission::create([
        'name' => 'Eliminar cliente',
        'slug' => 'client.destroy',
        'description' => 'Eliminar cliente'
      ]);

      // tipo de producto
      Permission::create([
        'name' => 'Navegar tipo de producto',
        'slug' => 'clasificationProduct.index',
        'description' => 'Listar los tipos de productos'
      ]);
      Permission::create([
        'name' => 'Crear tipo de producto',
        'slug' => 'clasificationProduct.create',
        'description' => 'Crear tipo de producto'
      ]);
      Permission::create([
        'name' => 'Eliminar tipo de producto',
        'slug' => 'clasificationProduct.destroy',
        'description' => 'Eliminar tipo de producto'
      ]);

      // catalago
      Permission::create([
        'name' => 'Navegar catalogo',
        'slug' => 'catalogo.index',
        'description' => 'Listar los productos del catalago'
      ]);
      Permission::create([
        'name' => 'Crear producto en el catalogo',
        'slug' => 'catalogo.create',
        'description' => 'Crear producto en el catalogo'
      ]);
      Permission::create([
        'name' => 'Editar producto del catalogo',
        'slug' => 'catalogo.edit',
        'description' => 'Editar producto del catalogo'
      ]);
      Permission::create([
        'name' => 'Eliminar producto del catalogo',
        'slug' => 'catalogo.destroy',
        'description' => 'Eliminar producto del catalogo'
      ]);

      // productos
      Permission::create([
        'name' => 'Navegar productos',
        'slug' => 'inventary.index',
        'description' => 'Listar productos'
      ]);
      Permission::create([
        'name' => 'Crear producto',
        'slug' => 'inventary.create',
        'description' => 'Crear producto'
      ]);
      Permission::create([
        'name' => 'Ver producto',
        'slug' => 'inventary.show',
        'description' => 'Ver producto'
      ]);
      Permission::create([
        'name' => 'Editar producto',
        'slug' => 'inventary.edit',
        'description' => 'Editar producto'
      ]);
      Permission::create([
        'name' => 'Eliminar producto',
        'slug' => 'inventary.destroy',
        'description' => 'Eliminar producto'
      ]);

      // salidas
      Permission::create([
        'name' => 'Navegar salidas',
        'slug' => 'product-output.index',
        'description' => 'Listar salidas'
      ]);
      Permission::create([
        'name' => 'Ver salida',
        'slug' => 'product-output.show',
        'description' => 'Ver salida'
      ]);
      Permission::create([
        'name' => 'Crear salida',
        'slug' => 'product-output.create',
        'description' => 'Crear salida'
      ]);
      Permission::create([
        'name' => 'Editar salida',
        'slug' => 'product-output.edit',
        'description' => 'Editar salida'
      ]);
      Permission::create([
        'name' => 'Eliminar salida',
        'slug' => 'product-output.destroy',
        'description' => 'Eliminar salida'
      ]);

      // facturas
      Permission::create([
        'name' => 'Navegar facturas',
        'slug' => 'facturas.index',
        'description' => 'Listar reportes de ingreso'
      ]);
      Permission::create([
        'name' => 'Eliminar reporte',
        'slug' => 'facturas.destroy',
        'description' => 'Eliminar reporte'
      ]);
      Permission::create([
        'name' => 'Ver reporte',
        'slug' => 'facturas.show',
        'description' => 'Ver reporte'
      ]);

      // cotizacion
      Permission::create([
        'name' => 'Navegar cotizaciones',
        'slug' => 'quotation.index',
        'description' => 'Listar cotizaciones'
      ]);
      Permission::create([
        'name' => 'Ver cotizacion',
        'slug' => 'quotation.show',
        'description' => 'Ver cotizaciones'
      ]);
      Permission::create([
        'name' => 'Crear cotizacion',
        'slug' => 'quotation.create',
        'description' => 'Crear cotizacion'
      ]);
      Permission::create([
        'name' => 'Editar cotizacion',
        'slug' => 'quotation.edit',
        'description' => 'Editar cotizacion'
      ]);
      Permission::create([
        'name' => 'Eliminar cotizacion',
        'slug' => 'quotation.destroy',
        'description' => 'Eliminar cotizacion'
      ]);
    }
}
