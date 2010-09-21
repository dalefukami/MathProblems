<?php

//CLEANUP: move repeated code to bootstrap/load file
$generatorPath = 'generators';
$directoryHandle = @opendir($generatorPath) or die("Unable to find question generators at path: $generatorPath.");

while( $file = readdir($directoryHandle) ) {
    if( preg_match( '/\.php$/', $file ) ) {
        require_once("$generatorPath/$file");
    }
}
closedir($directoryHandle);




$generatorsToIgnore = array('Generator', 'CompoundGenerator');
$generators = array();
foreach( get_declared_classes() as $class ) {
    if( preg_match('/Generator$/', $class) && !in_array($class, $generatorsToIgnore)) {
        $generators[] = new $class();
    }
}

?>

<html>
<head>
    <title>Math Questions</title>
    <style type="text/css" media="all">
        @import url("math.css");
    </style>
</head>
<body>
    <form action="math.php" method=GET>
        <?php
            foreach( $generators as $generator ) {
                echo "<INPUT TYPE=CHECKBOX NAME='".get_class($generator)."'>{$generator->getShortName()}</INPUT>";
                echo "<br/>";
                $info_divs[] = $generator->getAdditionalInfoBlock();
            }

            echo implode("\n", $info_divs);
        ?>
        <input type=submit name=submit value="Create questions">
    </FORM>
</body>
</html>
