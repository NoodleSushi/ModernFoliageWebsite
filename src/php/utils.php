<?php
// $type: https://www.php.net/manual/en/function.gettype.php
function parse_param(string $type, string $param, bool &$success, bool $isOptional = false, $default = null)
{
    $out = $_REQUEST[$param];
    switch ($type) {
        case "i":
        case "int":
            $type = "integer";
            break;
        case "d":
        case "f":
        case "float":
            $type = "double";
            break;
        case "s":
        case "str":
            $type = "string";
            break;
    }
    if ($type == "integer" && is_numeric($out))
        return intval($out);
    else if ($type == "double" && is_numeric($out))
        return floatval($out);
    else if (gettype($type) == $type)
        return $out;
    if ($isOptional)
        return $default;
    else
        $success = false;
    return null;
}
