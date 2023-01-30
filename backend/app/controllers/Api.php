<?php
    class Api extends Controller{
        private $header;
        private $client;

        public function __construct(){
        $this->header = new headers();
        $this->client = $this->model("Client");
        }

        public function index(){
        $this->header->init("GET");
        echo json_encode([
            "message" => "hello",
        ]);
        }

        public function createClient(){
        $this->header->init("POST");
        $data = json_decode(file_get_contents("php://input"));
        $this->client->add();
        }
    }
?>