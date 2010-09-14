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
    $generator = new CompoundGenerator();
    foreach( $_GET as $generatorName => $params ) {
        if( $generatorName == 'questions' ) {
            continue;
        }

        $className = $generatorName.'Generator';
        $generator->add(new $className($params));
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
