<?php

require_once 'models/Producto.php';

class CarritoController {
  
  public function agregarProducto() {
    // Verificar si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Obtener los datos del formulario
      $id_producto = $_POST['id_producto'];
      $cantidad = $_POST['cantidad'];
      
      // Obtener el producto de la base de datos
      $producto = Producto::buscarPorId($id_producto);
      
      // Verificar si el producto existe
      if ($producto) {
        // Obtener el carrito actual
        $carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : array();
        
        // Verificar si el producto ya está en el carrito
        if (isset($carrito[$id_producto])) {
          // Actualizar la cantidad del producto en el carrito
          $carrito[$id_producto]['cantidad'] += $cantidad;
        } else {
          // Agregar el producto al carrito
          $carrito[$id_producto] = array(
            'producto' => $producto,
            'cantidad' => $cantidad
          );
        }
        
        // Actualizar el carrito en la sesión
        $_SESSION['carrito'] = $carrito;
        
        // Redirigir al listado de productos
        header('Location: ' . URL . 'Food');

        exit();
      }
    }
  }
  
  public function verCarrito() {
    // Obtener el carrito actual
    $carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : array();
    
    // Mostrar la vista del carrito
    require_once 'views/carrito/ver.php';
  }
  
  public function eliminarProducto() {
    // Verificar si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Obtener el ID del producto a eliminar
      $id_producto = $_POST['id_producto'];
      
      // Obtener el carrito actual
      $carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : array();
      
      // Verificar si el producto está en el carrito
      if (isset($carrito[$id_producto])) {
        // Eliminar el producto del carrito
        unset($carrito[$id_producto]);
        
        // Actualizar el carrito en la sesión
        $_SESSION['carrito'] = $carrito;
      }
    }
    
    // Redirigir al carrito
    header('Location: index.php?controller=carrito&action=ver');
    exit();
  }
  
}

?>
