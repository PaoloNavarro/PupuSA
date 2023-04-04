<?php
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
                $this->renderView("Pago/efectivo");
                return;
            }
        }

        // Si no se seleccionó una opción de pago válida, mostrar error
        $this->renderView("Pago/error");
    }
}

?>