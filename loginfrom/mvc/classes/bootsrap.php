<?php
    class Bootsrap{
        private $controller;
        private $action;
        private $request;
        public function  __construct($request)
        {
            $this->request = $request;
            if($this->request['controller'] == ""){
                $this->controller = 'home';
            }
            else{
                $this->controller = $this->request['controller'];
            }
            if($this->request['action'] == ""){
                $this -> action = 'index';
            }
            else{
                $this->action = $this->request['controller'];
            }
        }
        public function createController(){
            if(class_exists($this->controller)){
                $parents = class_parents($this->controller);
                if(in_array("Controllar",$parents)){
                    if(method_exists($this->controller,$this->action)){
                        return new $this->controller($this->action,$this->request);
                    }
                    else{
                        echo "<h1>Method doesn\'t exist<h1>";
                        return;
                    }
                }
                else{
                    echo "<h1>Base controller not found <h1>";
                    return;
                }
            }else{
                echo "<h1>Crontroller class doesn\'t exist<h1>";
                return;
            }
        }
    }

?>