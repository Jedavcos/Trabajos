<?php 

    namespace Controllers\Nw2023;

    use Controllers\PublicController;
    use Views\Renderer;

    Class MiFicha extends PublicController{

        public function run() :void{
            $viewData = array(
                "nombre" => "José D. Castillo",
                "email" => "josedcl2002@gmail.com",
                "title" => "Estudiante Ing. Ciencias de la Computación"
            );

            Renderer::render("Nw2023/MiFicha", $viewData);
        }

    }

?>