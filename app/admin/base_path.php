    <?php
    define('BASE_PATH', __DIR__);

    define('CONTROLLER_PATH', BASE_PATH . '/controller/');
    define('VIEW_PATH', BASE_PATH . '/view/');
    define('MODEL_PATH', BASE_PATH . '/modal/');
    define('ASSETS_PATH', BASE_PATH . '/assets/');

    function loadFile($path)
    {
        if (file_exists($path)) {
            require_once $path;
        } else {
            die("File không tồn tại: $path");
        }
    }
    ?>