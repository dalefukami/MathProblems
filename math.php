<?php

$generatorPath = 'generators';
$directoryHandle = @opendir($generatorPath) or die("Unable to find question generators at path: $generatorPath.");
while( $file = readdir($directoryHandle) ) {
    if( preg_match( '/\.php$/', $file ) ) {
        require_once("$generatorPath/$file");
    }
}
closedir($directoryHandle);

$numberOfQuestions = isset($_GET['questions']) ? $_GET['questions'] : 90;
?>

<html>
<head>
    <title>Math Questions</title>
    <style type="text/css" media="all">
        @import url("math.css");
    </style>
</head>
<body>
<?php
    $generators = array();
    foreach( $_GET as $parameterName => $value ) {
        if( $value == 'on' ) {
            $generators[$parameterName] = array();
        }
    }

    foreach( $_GET as $parameterName => $value ) {
        if( preg_match('/_param_/', $parameterName) ) {
            $vals = explode("_param_", $parameterName);
            if( isset($generators[$vals[0]]) ) {
                $generators[$vals[0]][$vals[1]] = $value;
            }
        }
    }

    $generator = new CompoundGenerator();
    foreach( $generators as $generatorName => $params ) {
        $generator->add(new $generatorName($params));
    }

    for( $i = 0; $i < $numberOfQuestions; $i++ ) {
        $html = array();
        $html[] = "<div class='outer'>";
        $html[] = $generator->newQuestion();
        $html[] = "</div>";
        echo implode("\n", $html);
    }
?>
</body>
</html>
