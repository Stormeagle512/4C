<?php
# registro

class ControladorFormularios

{
    static public function ctrRegistro()
    {
        if (isset($_POST["registroNombre"])) {
            if (
                preg_match('/^[a-zA-ZáéíóúñÑ\s]+$/', $_POST["registroNombre"]) &&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',
                    $_POST["registroEmail"]
                ) && preg_match('/^[0-9a-zA-Z]+$/', $_POST["registroPassword"])
            ) {

                $tabla = "registro";

                $token = md5($_POST["registroNombre"] . "+" . $_POST["registroEmail"]);

                $encriptarPassword = crypt($_POST["registroPassword"], '$2a$07$jointhedarksidejvdh4cw$');

                $datos = array(
                    "token" => $token,
                    "nombre" => $_POST["registroNombre"],
                    "email" => $_POST["registroEmail"],
                    "password" => $encriptarPassword
                );
                $respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);
                return $respuesta;
            } else {
                $respuesta = "error";
                return $respuesta;
            }
        }
    }
    static public function ctrSeleccionarRegistros($item, $valor)
    {
        $tabla = "registro";
        $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
        return $respuesta;
    }
    public function ctrIngreso()
    {
        if (isset($_POST["ingresoEmail"])) {
            $tabla = "registro";
            $item = "email";
            $valor = $_POST["ingresoEmail"];

            $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

            $encriptarPassword = crypt($_POST["ingresoPassword"], '$2a$07$jointhedarksidejvdh4cw$');

            if(is_array($respuesta)){
            if ($respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $encriptarPassword) {
                 ModeloFormularios:: mdlActualizarIntentosFallidos($tabla, 0,  $respuesta["token"]);

                $_SESSION["Iniciar"] = "oc";
                echo '<div class = "alert alert-success">Login Success</div>';
            } else {
                if($respuesta["intentos_fallidos"] < 3){
                    $tabla = "registro";
                    $intentos_fallidos = $respuesta["intentos_fallidos"] + 1;
    
                    $actualizarIntentosFallidos = ModeloFormularios:: mdlActualizarIntentosFallidos($tabla, 
                    $intentos_fallidos,  $respuesta["token"]);
                    //echo '<pre>'; print_r($intentos_fallidos); echo '</pre>';
                } else {
                   echo '<div class="alert alert-warning">RECAPTCHA! Debes validar que no eres un robot</div>';
                }
                echo '<script>
                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                }
                </script>';  echo '<div class="alert alert-danger">Error wrong email or password</div>';
            }
        }  else {
            echo '<script>
            if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
            }
            </script>';  echo '<div class="alert alert-danger">Error wrong email or password</div>';
        }
    }
}

    static public function ctrActualizarRegistro()
    {
        if (isset($_POST["actualizarNombre"])) {

            if (
                preg_match('/^[a-zA-ZáéíóúñÑ\s]+$/', $_POST["actualizarNombre"]) &&
                preg_match(
                    '/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',
                    $_POST["actualizarEmail"])){

                $usuario = ModeloFormularios::mdlSeleccionarRegistros("registro","token", $_POST["tokenUsuario"] );
                $comparToken = md5($usuario["nombre"] . "+" . $usuario["email"]);

                if ($comparToken == $_POST["tokenUsuario"]) {

                    if ($_POST["actualizarPassword"] !="") {
                        if(preg_match('/^[0-9a-zA-Z]+$/', $_POST["actualizarPassword"])){
                            $password = crypt($_POST["actualizarPassword"], '$2a$07$jointhedarksidejvdh4cw$');
                        }
                    } else {
                        $password = $_POST["passwordActual"];
                    }

                    // Actualizar Token
                    if($_POST["nombreActual"] != $_POST["actualizarNombre"] || $_POST["emailActual"] 
                    != $_POST["actualizarEmail"] ){
                        $nuevoToken = md5($_POST["actualizarNombre"] . "+" . $_POST["actualizarEmail"] );
                    } else{
                        $nuevoToken = null;
                    }

                    $tabla = "registro";
                    $datos = array(
                        "token" => $_POST["tokenUsuario"],
                        "nuevoToken" => $nuevoToken,
                        "nombre" => $_POST["actualizarNombre"],
                        "email" => $_POST["actualizarEmail"],
                        "password" => $password
                    );
                    $respuesta = ModeloFormularios::mdlActualizarRegistros($tabla, $datos);
                    return $respuesta;
                    
                } else {
                    $respuesta = "error";
                    return $respuesta;
                }
            } else {
                $respuesta = "error";
                return $respuesta;
            }
        }
    }
    public function ctrEliminarRegistro()
    {
        if (isset($_POST["eliminarRegistro"])) {

            $usuario = ModeloFormularios::mdlSeleccionarRegistros(
                "registro",
                "token",
                $_POST["eliminarRegistro"]
            );
            $comparToken = md5($usuario["nombre"] . "+" . $usuario["email"]);

            if ($comparToken == $_POST["eliminarRegistro"]) {
                $tabla = "registro";
                $valor = $_POST["eliminarRegistro"];

                $respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);
                if ($respuesta == "ok") {
                    echo '<script>
                    if(window.history.replaceState){
                        window.history.replaceState(null, null, window.location.href);
                    }
                    window.location = "index.php?Inicio=admin";
                        </script>';
                }
            }
        }
    }
}
