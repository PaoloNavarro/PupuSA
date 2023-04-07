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
    
    public function Acategoria()
    {
        $this->RenderView("Admin/Acategoria");
    }
    public function Ecategoria()
    {   
        $categoria = new Categoria();

        $categorias = $categoria->listarCategorias();

        $this->RenderView("Admin/Ecategoria",['categorias' => $categorias]);
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
            $idPedido = $_POST['id_pedido'];

            // llamamos al modelo Pedido y creamos una instancia
            $pedido = new Pedido();

            // llamamos al método obtenerPedidoPorId y pasamos el id del pedido como argumento
            $pedidos = $pedido->obtenerPedidoPorId($idPedido);

            // llamamos al modelo DetallePedido y creamos una instancia
            $detallePedido = new DetallePedido();

            // llamamos al método obtenerDetallesPedido y pasamos el id del pedido como argumento
            $detallesPedido = $detallePedido->obtenerDetallesPedido($idPedido);

            // enviamos los resultados a la vista del detalle del pedido
            $this->RenderView("Admin/DetallePedido", ['pedidos' => $pedidos, 'detallesPedido' => $detallesPedido]);
        }


     public function agregarproducto()
     {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $categoria = $_POST['categoria'];
        $image_url = $_POST['image_url'];
        $estado = $_POST['estado'];
        
        $producto = new Producto();
        
        $resultado = $producto->agregarProducto($nombre, $precio, $descripcion, $categoria, $image_url,$estado);
       
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
             $estado = $_POST['estado'];
          
     
             Producto::actualizarProducto($id_producto, $nombre, $precio, $descripcion, $categoria, $imagen, $estado);
     
             // Redirigir al usuario a la página de listado de productos
             header('Location: ' . URL . 'Admin/ProductoE');
             exit;
         }
     }
     
    public function cambiarEstadoProducto(){
        $id_producto = $_POST['id_producto'];
        $estado_actual = $_POST['estado'];
        $nuevo_estado = ($estado_actual == 1) ? 2 : 1;
         // llamar al método actualizarEstado del modelo Producto
         $producto = new Producto();
        $producto->actualizarEstado($id_producto, $nuevo_estado);

        // redirigir al listado de productos
         header('Location: ' . URL . 'Admin/productoe');


    }

    //metodo de categoria
    public function agregarCategoria()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $descripcion = $_POST['descripcion'];
            $estado = $_POST['estado'];
            var_dump($descripcion);
            var_dump($estado);
            Categoria::agregarCategoria($descripcion, $estado);
           

            header('Location: ' . URL . 'Admin/');
            exit();
        }

    }

    public function cambiarEstadoCategoria(){
        $id_categoria = $_POST['id_categoria'];
        $estado_actual = $_POST['estado'];
        $nuevo_estado = ($estado_actual == 1) ? 2 : 1;
        var_dump($nuevo_estado);

         // llamar al método actualizarEstado del modelo Producto
        $categoria = new Categoria();
        $categoria->actualizarEstado($id_categoria, $nuevo_estado);
        // redirigir al listado de productos
         header('Location: ' . URL . 'Admin/Ecategoria');


    }

    
    public function editarcategoria()
    {    
        $id_categoria = $_POST['id_categoria'];
        $categoria = Categoria::editarCategoria($id_categoria);
        
    
        $this->renderView("Admin/actualizarCategoria",['categorias' => $categoria]);
    }

    public function actualizarcategoria()
     {
         // Comprobar si el formulario se ha enviado
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             // Recoger los datos del formulario
             $id_producto = $_POST['id'];
            
             $descripcion = $_POST['descripcion'];
          
             $estado = $_POST['estado'];
          
     
             Categoria::modificarCategoria($id_producto, $descripcion, $estado);
     
             // Redirigir al usuario a la página de listado de productos
             header('Location: ' . URL . 'Admin/Ecategoria');
             exit;
         }
     }



     

}