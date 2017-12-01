<?php
    /**
     * Created by PhpStorm.
     * User: mike
     * Date: 30.09.17
     * Time: 0:31
     */
echo "error 404";
if (file_exists('debug')) {
    echo '<br>' . $e->getMessage();
}
