<?php
    class BasePage
    {
        function render($path){
            if ($path == "/") {
                $path = "/index";
            }
            if ($path[0] != "/") {
                $path = "/" . $path;
            }

            $path = APPROOT . "View" . $path . ".php";
            
            if (file_exists($path)) {
                require_once APPROOT . "View/components/header.php";
                require_once $path;
                require_once APPROOT . "View/components/footer.php";
            } else {
                http_response_code(404);
                echo "404 Not Found";
            }
        }
    }