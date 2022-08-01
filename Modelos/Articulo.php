<?php
    class Articulo {
        public $id;
        public $codigo;
        public $nombre;
        public $desc;
        public function __construct($args) {
            $this->id = isset($args['id']) ? $args['id'] : 0;
            $this->codigo = isset($args['codigo']) ? $args['codigo'] : '';
            $this->nombre = isset($args['nombre']) ? $args['nombre'] : '';
            $this->desc = isset($args['desc']) ? $args['desc'] : '';
        }
        public function getId() {
            return $this->id;
        }
        static public function create($conn,$args) {
            $articulo = null;
            if(Articulo::validate($conn,$args) != true) {
                $response = ['status' => 400];
                $errors = [
                    'message'=> 'El codigo ' . $args['codigo'] . ' ya existe, favor de cambiar a otro codigo.',
                ];
                $response['errors'] = [ $errors ];
                echo json_encode($response);
                $conn->close();
                exit;
            }
            $stmt = $conn->prepare("INSERT INTO articulo (`codigo`,`nombre`,`desc`) VALUES (?,?,?)");
            $articulo = new Articulo($args);
            $stmt->bind_param("sss",$articulo->codigo,$articulo->nombre,$articulo->desc);
            $stmt->execute();
            $articulo->id = $stmt->insert_id;
            $stmt->close();
            return $articulo;
        }
        function toJSON() {
            return json_encode(get_object_vars($this));
        }
        static public function validate($conn,$args) {
            $exists = false;
            $codigo = isset($args['codigo']) ? $args['codigo'] : '';
            if(strcmp($codigo, '') == 0)
                return $exists;
            $stmt = $conn->prepare("SELECT 1 as `exists` FROM articulo WHERE `codigo` = ? LIMIT 1;");
            $stmt->bind_param("s",$codigo);
            $stmt->execute();
            if($result = $stmt->get_result()) {
                if($result->num_rows == 0)
                    $exists = true;
                $result->free();
            }
            $stmt->close();
            return $exists;
        }
    }
?>