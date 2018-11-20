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
        'slug' => 'usuarios.index',
        'description' => 'Listar usuarios'
      ]);
      Permission::create([
        'name' => 'Crear usuario',
        'slug' => 'usuario.create',
        'description' => 'Crear usuario'
      ]);
      Permission::create([
        'name' => 'Editar usuario',
        'slug' => 'usuario.edit',
        'description' => 'Editar usuario'
      ]);
      Permission::create([
        'name' => 'Eliminar usuario',
        'slug' => 'usuario.destroy',
        'description' => 'Eliminar usuario'
      ]);

      // roles
      Permission::create([
        'name' => 'Navegar roles',
        'slug' => 'roles.index',
        'description' => 'Listar roles'
      ]);
      Permission::create([
        'name' => 'Crear rol',
        'slug' => 'rol.create',
        'description' => 'Crear rol'
      ]);
      Permission::create([
        'name' => 'Editar rol',
        'slug' => 'rol.edit',
        'description' => 'Editar rol'
      ]);
      Permission::create([
        'name' => 'Eliminar rol',
        'slug' => 'rol.destroy',
        'description' => 'Eliminar rol'
      ]);

      // proveedores
      Permission::create([
        'name' => 'Navegar proveedores',
        'slug' => 'proveedores.index',
        'description' => 'Listar proveedores'
      ]);
      Permission::create([
        'name' => 'Crear proveedores',
        'slug' => 'proveedor.create',
        'description' => 'Crear proveedor'
      ]);
      Permission::create([
        'name' => 'Editar proveedor',
        'slug' => 'proveedor.edit',
        'description' => 'Editar proveedor'
      ]);
      Permission::create([
        'name' => 'Eliminar proveedor',
        'slug' => 'proveedor.destroy',
        'description' => 'Eliminar proveedor'
      ]);

      // clientes
      Permission::create([
        'name' => 'Navegar clientes',
        'slug' => 'clientes.index',
        'description' => 'Listar clientes'
      ]);
      Permission::create([
        'name' => 'Crear cliente',
        'slug' => 'cliente.create',
        'description' => 'Crear cliente'
      ]);
      Permission::create([
        'name' => 'Editar cliente',
        'slug' => 'cliente.edit',
        'description' => 'Editar cliente'
      ]);
      Permission::create([
        'name' => 'Eliminar cliente',
        'slug' => 'cliente.destroy',
        'description' => 'Eliminar cliente'
      ]);

      // categorias
      Permission::create([
        'name' => 'Navegar categorias',
        'slug' => 'categorias.index',
        'description' => 'Listar los tipos de productos'
      ]);
      Permission::create([
        'name' => 'Crear categoria',
        'slug' => 'categoria.create',
        'description' => 'Crear tipo de producto'
      ]);
      Permission::create([
        'name' => 'Eliminar categoria',
        'slug' => 'categoria.destroy',
        'description' => 'Eliminar tipo de producto'
      ]);

      // catalago
      Permission::create([
        'name' => 'Navegar catalogo',
        'slug' => 'catalogos.index',
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
        'slug' => 'inventarios.index',
        'description' => 'Listar productos'
      ]);
      Permission::create([
        'name' => 'Crear producto',
        'slug' => 'inventario.create',
        'description' => 'Crear producto'
      ]);
      Permission::create([
        'name' => 'Ver producto',
        'slug' => 'inventario.show',
        'description' => 'Ver producto'
      ]);
      Permission::create([
        'name' => 'Editar producto',
        'slug' => 'inventario.edit',
        'description' => 'Editar producto'
      ]);
      Permission::create([
        'name' => 'Eliminar producto',
        'slug' => 'inventario.destroy',
        'description' => 'Eliminar producto'
      ]);

      // salidas
      Permission::create([
        'name' => 'Navegar salidas',
        'slug' => 'salidas.index',
        'description' => 'Listar salidas'
      ]);
      Permission::create([
        'name' => 'Ver salida',
        'slug' => 'salida.show',
        'description' => 'Ver salida'
      ]);
      Permission::create([
        'name' => 'Crear salida',
        'slug' => 'salida.create',
        'description' => 'Crear salida'
      ]);
      Permission::create([
        'name' => 'Editar salida',
        'slug' => 'salida.edit',
        'description' => 'Editar salida'
      ]);
      Permission::create([
        'name' => 'Eliminar salida',
        'slug' => 'salida.destroy',
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
        'slug' => 'factura.show',
        'description' => 'Ver reporte'
      ]);

      // cotizacion
      Permission::create([
        'name' => 'Navegar cotizaciones',
        'slug' => 'cotizaciones.index',
        'description' => 'Listar cotizaciones'
      ]);
      Permission::create([
        'name' => 'Ver cotizacion',
        'slug' => 'cotizaciones.show',
        'description' => 'Ver cotizaciones'
      ]);
      Permission::create([
        'name' => 'Crear cotizacion',
        'slug' => 'cotizacion.create',
        'description' => 'Crear cotizacion'
      ]);
      Permission::create([
        'name' => 'Editar cotizacion',
        'slug' => 'cotizacion.edit',
        'description' => 'Editar cotizacion'
      ]);
      Permission::create([
        'name' => 'Eliminar cotizacion',
        'slug' => 'cotizacion.destroy',
        'description' => 'Eliminar cotizacion'
      ]);

      // correos
      Permission::create([
        'name' => 'Navegar correos',
        'slug' => 'correos.index',
        'description' => 'Listar correos'
      ]);
      Permission::create([
        'name' => 'Editar correos',
        'slug' => 'correo.edit',
        'description' => 'Editar correo'
      ]);
      Permission::create([
        'name' => 'Eliminar correo',
        'slug' => 'correo.destroy',
        'description' => 'Eliminar correo'
      ]);
    }
}
