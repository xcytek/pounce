<?php

use Controllers\HomeController;

/**
 * Class Application
 */
class Application
{
    /**
     * Main Function to Handle the HTTP Requests
     */
    public function main()
    {
        // Creating controller Instance
        $controller = new HomeController;

        if (isset($_GET['view'])) {
            switch ($_GET['view']) {
                case 'list' :
                    $controller->colorList();
                    break;
                case 'signin' :
                    $controller->signin();
                    break;
                case 'logout' :
                    $controller->logout();
                    break;
                case 'colors-list' :
                    $controller->getColorsList();
                    break;
                default :
                    $controller->E404();
            }
        } else {
            $controller->login();
        }
    }
}