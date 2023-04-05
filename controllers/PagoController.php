<?php
require_once 'models/producto.php';

class PagoController extends Controller
{
    public function pagar()
    {
        // Verificar la opción de pago seleccionada
        if (isset($_POST['pago'])) {
            $opcion_pago = $_POST['pago'];

            // Si la opción de pago es tarjeta, mostrar vista para ingresar los datos de la tarjeta
            if ($opcion_pago == 'tarjeta') {
                echo("entre en tarjeta");

                $this->renderView("pago/tarjeta");
            }

            // Si la opción de pago es efectivo, mostrar vista para realizar el pago en efectivo
            if ($opcion_pago == 'efectivo') {
                 // Obtiene los datos del carrito de la sesión
                $carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : array();
                // Renderiza la vista con el arreglo de los productos en carrito
                $this->renderView("Pago/efectivo", array('carrito' => $carrito));
                return;
            }
        }

        // Si no se seleccionó una opción de pago válida, mostrar error
        $this->renderView("Pago/error");
    }
}

?>