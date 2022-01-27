<?php

/*
Copyright 2010 Ludovico Fischer. All rights reserved.

Redistribution and use in source and binary forms, with or without modification,
are permitted provided that the following conditions are met:
1. Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.

2. Redistributions in binary form must reproduce the above copyright notice, this list
   of conditions and the following disclaimer in the documentation and/or other materials
   provided with the distribution.

THIS SOFTWARE IS PROVIDED ``AS IS'' AND ANY EXPRESS OR IMPLIED WARRANTIES,
INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE
FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY,
OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION)
HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY,
OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

class Server {

    public function serve() {
      
        //Mis rutas van a ser /api/critoc/...
        
        //Para que funcione .htaccess hay que activar el módulo mod_rewrite con:
        //a2enmod rewrite
        //Luego reiniciamos Apache
        
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD']; //GET, POST, PUT, DELETE
        $paths = explode('/', $this->paths($uri));
    
        //var_dump($paths);  
        
        array_shift($paths); // Quito ""
        array_shift($paths); // Quito la parte de 'api'
        $resource = array_shift($paths);
      
        if ($resource == 'criptoc') {
            
            $idt = array_shift($paths);
	
            if (empty($idt)) {
                $this->handle_base($method);
            } else {
                if ($idt == "id") {
                    //Quitamos de la url /id/
                    array_shift($paths);

                    $id = array_shift($paths);
                    $this->handle_id($method, $id);
                } else if ($idt == "topvalue") {
                    //Quitamos de la url /id/
                    array_shift($paths);

                    //Comprobamos que sea el verbo GET para GET /api/criptoc/topvalue
                    echo "Mostrando criptos por valor";
                } else if ( ($idt == "up") || ($idt == "down") ) {
                    //Quitamos de la url /up o /down
                    array_shift($paths);

                    //Comprobamos que el verbo sea PUT
                    $id = array_shift($paths);
                    //$this->handle_updown($method, $id);
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

    private function handle_base($method) {
        switch($method) {
        case 'GET':
            //GET /api/criptoc
            echo "Consultar criptomonedas";
            break;
        case 'POST':
            //POST /api/criptoc
            echo "Insertar nueva criptomoneda";
            break;
        default:
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET or POST');
            break;
        }
    }

    private function handle_id($method, $id) {
        switch($method) {
        case 'PUT':
            //PUT /api/criptoc/id/<id>
            echo "Modificar criptomoneda";
            break;

        case 'DELETE':
            //DELETE /api/criptoc/id/<id>
            echo "Borrando criptomoneda";
            break;
      
        case 'GET':
            //GET /api/criptoc/id/<id>
            echo "Detalle de criptomoneda";
            break;

        default:
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET, PUT, DELETE');
            break;
        }
    }

    
    //-----------------------------------------------------------------------------------------
    private function create_contact($name){
        if (isset($this->contacts[$name])) {
            header('HTTP/1.1 409 Conflict');
            return;
        }
        /* PUT requests need to be handled
         * by reading from standard input.
         */
        $data = json_decode(file_get_contents('php://input'));
        if (is_null($data)) {
            header('HTTP/1.1 400 Bad Request');
            $this->result();
            return;
        }
        $this->contacts[$name] = $data; 
        $this->result();
    }
    
    private function delete_contact($name) {
        if (isset($this->contacts[$name])) {
            unset($this->contacts[$name]);
            $this->result();
        } else {
            header('HTTP/1.1 404 Not Found');
        }
    }
    
    private function display_contact($name) {
        if (array_key_exists($name, $this->contacts)) {
            echo json_encode($this->contacts[$name]);
        } else {
            header('HTTP/1.1 404 Not Found');
        }
    }
    
    /**
     * Displays a list of all contacts.
     */
    private function result() {
        header('Content-type: application/json');
        echo json_encode($this->contacts);
    }

    //--------------------------------------------------------------------------------------

  }

$server = new Server;
$server->serve();

?>