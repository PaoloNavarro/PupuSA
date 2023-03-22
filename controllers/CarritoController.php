<?php

require_once 'models/producto.php';

class CarritoController extends Controller{
  private $carrito = array();

  public function __construct()
    {
        parent::__construct();
        // Se inicializa el carrito a partir de la sesión
        if (isset($_SESSION['carrito'])) {
            $this->carrito = $_SESSION['carrito'];
        }
  }
  public function agregarProducto() {

    // Verificar si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Obtener los datos del formulario
      $id_producto = $_POST['id_producto'];
      $cantidad = $_POST['cantidad'];
      var_dump($id_producto);
      var_dump( $cantidad);
      // Obtener el producto de la base de datos
      $producto = Producto::buscarPorId($id_producto);
      
      // Verificar si el producto existe
      if ($producto) {
        // Obtener el carrito actual
        $carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : array();
        var_dump($carrito);
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
        //var_dump($_SESSION['carrito']);
        //exit();
      }
    }
  }
  
  public function VerCarrito()
  {
        // Obtiene los datos del carrito de la sesión
        $carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : array();
        // Renderiza la vista del carrito con los datos del carrito
        $this->RenderView('Home/carrito', array('carrito' => $carrito));
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
    $this->RenderView('Home/carrito', array('carrito' => $carrito));
    //exit();
  }
 
  
}

?>
