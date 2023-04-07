<?php
require_once 'models/pedido.php';
require_once 'models/detallepedido.php';
require_once 'models/categoria.php';
require_once 'models/producto.php';





class AdminController extends Controller
{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function Index()
    {

        $this->RenderView("Admin/Index");
    }
    //metodo de renderizado
    public function Register()
    {
        $this->RenderView("Layout/Registro");
    }

    //metodo para renderizar vista de agregar promociones

    public function PromocionesA()
    {
        $this->RenderView("Admin/Promocionesa");
    }
    
    //metodo para renderizar vista de editar promociones

    public function PromocionesE()
    {
        $this->RenderView("Admin/Promocionese");
    }

    //metodo para renderizar vista de agregar producto
    public function ProductoA()
    {
        // llamamos al modelo categoria y creamos una instancia
        $categoria = new Categoria();
          
        // llamamos al método listarPedidos y pasamos la fecha como argumento
        $categorias  = $categoria->listarCategorias();


        $this->RenderView("Admin/Productoa",['categorias' => $categorias]);
    }
    //metodo para renderizar vista de editar producto
    public function ProductoE()
    {
        $productos = Producto::listarProductos();

        $this->RenderView("Admin/Productoe",["productos" => $productos]);
    }

    //metodos con funcionalidades
    
     //metodo para ver mis pedidos y filtrarlos por fechas.
     public function Pedidos()
     {  
         $fechaActual = date('Y-m-d');
         $fecha = isset($_POST['fecha_pedido']) ? $_POST['fecha_pedido'] : $fechaActual; 
         
         // llamamos al modelo Pedido y creamos una instancia
         $pedido = new Pedido();
         // llamamos al método listarPedidos y pasamos la fecha como argumento
         $pedidos = $pedido->listarPedidos($fecha);

         // enviamos los resultados a la vista
         $this->RenderView("Admin/Pedidos", ['pedidos' => $pedidos]);
     }
 
     public function DetallePedido()
     {
         //if (!isset($_GET['id_pedido'])) {
             // Si no se pasó, redirigimos al listado de pedidos
           //  header('Location: ' . URL . 'Admin/Pedidos');
             //exit();
         //}
 
         $idPedido=isset($_POST['id_pedido']);
         // llamamos al modelo DetallePedido y creamos una instancia
         $detallePedido = new DetallePedido();
     
         // llamamos al método obtenerDetallePedido y pasamos el id del pedido como argumento
         $detallesPedido = $detallePedido->obtenerPedido($idPedido);
         
         // enviamos los resultados a la vista del detalle del pedido
         $this->RenderView("Admin/DetallePedido", ['detallesPedido' => $detallesPedido]);
     }

     public function agregarproducto()
     {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $categoria = $_POST['categoria'];
        $image_url = $_POST['image_url'];
        
        $producto = new Producto();
        
        $resultado = $producto->agregarProducto($nombre, $precio, $descripcion, $categoria, $image_url);
       
            // si se agregó el producto correctamente, redirigir al listado de productos
            header('Location: ' . URL . 'Food/');
        
    
        

     }

     public function editarProducto()
     {    
        $id_producto = $_POST['id_producto'];
        $producto = Producto::editarProducto($id_producto);
        $categoria = new Categoria();
         
        $categorias = $categoria->listarCategorias();
    
        $data = [
            'producto' => $producto,
            'categorias' => $categorias
        ];
 
         $this->renderView("Admin/Actualizarproducto",$data);
     }

    public function actualizarproducto()
    {
            // Comprobar si el formulario se ha enviado
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Recoger los datos del formulario
                $id_producto = $_POST['id'];
                $nombre = $_POST['nombre'];
                $precio = $_POST['precio'];
                $descripcion = $_POST['descripcion'];
                $categoria = $_POST['categoria'];
                $imagen = $_POST['imagen'];
                $producto = Producto::actualizarProducto($id_producto, $nombre, $precio, $descripcion, $categoria, $imagen);

                
                // Redirigir al usuario a la página de listado de productos
                header('Location: ' . URL . 'Admin/ProductoE');
                exit;
            }
            
    }

     

}