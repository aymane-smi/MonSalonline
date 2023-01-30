<?php
    class Api extends Controller{
    private $header;
        public function __construct(){
        $this->header = new headers();
        }
        public function index(){
        $this->header->init("GET");
        echo json_encode([
            "message" => "hello",
        ]);
        }
    }
?>