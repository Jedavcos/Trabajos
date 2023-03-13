<?php 

// Sintaxis para verlo en el navegador: index.php?page=Nw2023-Yo
//localhost/MVC_negociosWeb/index.php?page=Nw2023-Yo

namespace Controllers\Nw2023;

use Controllers\PublicController;
use Views\Renderer;
use Dao\Clases\Demo;

class Yo extends PublicController{
    
    public function run() :void
    {
        $viewData = array();
        $responseDao = Demo::getAResponse()["Response"];
        $viewData['response'] = $responseDao;
        Renderer::render('Nw2023/Yo', $viewData);
    }
}

?>