<?php

error_reporting(0);

echo "<?php\n";

$carr = [
    'Application',
    'Bootstrap',
    'Config',
    'Controller',
    'Dispatcher',
    'Request',
    'Response',
    'Router',
    'RouterRule',
    'View'
];

echo <<<PHP
namespace linger\\framework;

PHP;

foreach ($carr as $name) {
    try {
        $c = "linger\\framework\\" . $name;
        $clazz = new ReflectionClass($c);
        $m = implode(" ", Reflection::getModifierNames($clazz->getModifiers()));
        if (!empty($m)) echo $m . " ";
        if ($clazz->isTrait()) {
            echo "trait ";
        } elseif ($clazz->isInterface()) {
            echo "interface ";
        } else {
            echo "class ";
        }
        echo $name;

        $inters = $clazz->getInterfaces();
        if (!empty($inters)) {
            $str =  " implements ";
            foreach ($inters as $inter) {
                $str .= '\\' . $inter->getName() . ",";
            }
            echo rtrim($str, ',');
        }

        echo "\n";
        echo "{\n";

        foreach ($clazz->getConstants() as $constant => $value) {
            echo "\tconst " . $constant . " = " . $value . ";\n";
        }
        foreach ($clazz->getProperties() as $property) {
            echo "\t" . implode(" ",
                    Reflection::getModifierNames($property->getModifiers())) . " $" . $property->getName();
            $property->setAccessible(true);
            if (!is_null($property->getValue())) {
                echo " = " . $property->getValue() . ";\n";
            } else {
                echo ";\n";
            }
        }
        //ReflectionClass::export($c);
        foreach ($clazz->getMethods() as $method) {
            $modi = implode(" ", Reflection::getModifierNames($method->getModifiers()));
            echo "\t";
            if ($clazz->isInterface()) {
                echo str_replace("abstract ", "", $modi);
            } else {
                echo $modi;
            }
            echo ' function ' . $method->getName();
            if ($clazz->isInterface()) {
                echo '();' . PHP_EOL;
            } else {
                echo '() { }' . PHP_EOL;
            }
        }

        echo "}\n";
    } catch (ReflectionException $e) {
//        echo $e->getMessage();
    }
}

