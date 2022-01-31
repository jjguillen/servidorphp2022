<?php

//AUTOLOAD
function autocarga($clase){ 
    $ruta = "./$clase.php"; 
    if (file_exists($ruta)){ 
        include_once $ruta; 
    }
} 
spl_autoload_register("autocarga");


class Server {

    public function serve() {
      
        //Mis rutas van a ser /api/critoc/...
        
        //Para que funcione .htaccess hay que activar el módulo mod_rewrite con:
        //a2enmod rewrite
        //Luego reiniciamos Apache
        
        $uri = $_SERVER['REQUEST_URI'];     
        $method = $_SERVER['REQUEST_METHOD']; //GET, POST, PUT, DELETE
        $paths = explode('/', $this->paths($uri));
    
        array_shift($paths); // Lo que hay antes
        //array_shift($paths); // Quito "tema8"
        //array_shift($paths); // Quito la parte de 'apiphpcripto'
        array_shift($paths); // Quito "api"

        // Nos quedamos con /criptoc/.....
        $resource = array_shift($paths);

        if ($resource == 'criptoc') {
            
            //Lo que venga después de /criptoc
            $idt = array_shift($paths);
	
            if (empty($idt)) {
                $this->manejarRaiz($method);
            } else {                
                if ($idt == "id") {
                    $id = array_shift($paths);
                    $this->manejarId($method, $id);
                } else if ($idt == "topvalue") {
                    //Quitamos de la url /id/
                    array_shift($paths);

                    //Comprobamos que sea el verbo GET para GET /api/criptoc/topvalue
                    $this->mostrarTopValue();
                } else if ( ($idt == "up") || ($idt == "down") ) {
                    //Quitamos de la url /up o /down
                    array_shift($paths);

                    //Comprobamos que el verbo sea PUT
                    $id = array_shift($paths);                   
                    $this->modificarPrecio($method, $idt, $id);
                } else {
                    //header('HTTP/1.1 404 Not Found');
                    echo "No reconocida acción";
                }
            }
          
        } else {
            //header('HTTP/1.1 404 Not Found');
            echo "Fallo";
        } 
    }
        
    private function paths($url) {
        $uri = parse_url($url);
        return $uri['path'];
    }

    private function manejarRaiz($method) {
        switch($method) {
        case 'GET':
            //GET /criptoc
            header('Content-type:application/json;charset=utf-8');
            echo CriptoDB::getCriptos();
            break;
        case 'POST':
            //POST /criptoc
            header('Content-type:application/json;charset=utf-8');
            echo CriptoDB::insertarCripto();
            break;
        default:
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET or POST');
            break;
        }
    }

    private function manejarId($method, $id) {
        switch($method) {
        case 'PUT':
            //PUT /api/criptoc/id/<id>
            header('Content-type:application/json;charset=utf-8');
            echo CriptoDB::updateCripto($id);
            break;

        case 'DELETE':
            //DELETE /api/criptoc/id/<id>
            header('Content-type:application/json;charset=utf-8');
            echo CriptoDB::deleteCripto($id);
            break;
      
        case 'GET':
            //GET /api/criptoc/id/<id>
            header('Content-type:application/json;charset=utf-8');
            echo CriptoDB::getCripto($id);
            break;

        default:
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET, PUT, DELETE');
            break;
        }
    }

    private function mostrarTopValue() {
        header('Content-type:application/json;charset=utf-8');
        echo CriptoDB::getTopValue();
    }

    private function modificarPrecio($method, $idt, $id) {
        header('Content-type:application/json;charset=utf-8');
        if ($idt == "up") {
            echo CriptoDB::modificarPrecio($id,1);
        } else if ($idt == "down") {
            echo CriptoDB::modificarPrecio($id,-1);
        } 
    }
    
    //-----------------------------------------------------------------------------------------
  }

$server = new Server;
$server->serve();

?>