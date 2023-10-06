<?php
# registro

class ControladorFormularios

{
    static public function ctrRegistro()
    {
        if (isset($_POST["registroNombre"])) {
            $tabla = "registro";

            $datos = array(
                "nombre" => $_POST["registroNombre"],
                "email" => $_POST["registroEmail"],
                "password" => $_POST["registroPassword"]
            );
            $respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);
            return $respuesta;
        }
    }
    static public function ctrSeleccionarRegistros()
    {
        $tabla = "registro";
        $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, null, null);
        return $respuesta;
    }
    public function ctrIngreso()
    {
        if (isset($_POST["ingresoEmail"])) {
            $tabla = "registro";
            $item = "email";
            $valor = $_POST["ingresoEmail"];
            $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

            if ($respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $_POST["ingresoPassword"]) {
                $_SESSION ["Iniciar"] = "oc" ;
                echo '<div class = "alert alert-success">Login Success</div>';
            } else {
                echo '<script>
                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                }
                </script>';
                echo '<div class="alert alert-danger">Error wrong email or password</div>';
            }
        }
    }
}
