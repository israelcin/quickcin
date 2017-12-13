<?php
namespace QCheck;

require("Generator.php");
require("Quick.php");
require("Annotation.php");

/**
 * @param string $s
 * @return bool
 */
function my_function($s) {
    return is_string($s);
}

Annotation::check('my_function');