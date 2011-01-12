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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="en"> 
<head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <title>Math Questions</title> 
  <link rel="stylesheet" href="stylesheets/base.css" type="text/css" media="screen" /> 
  <link rel="stylesheet" id="current-theme" href="stylesheets/themes/drastic-dark/style.css" type="text/css" media="screen" /> 
</head> 
<body> 
  <div id="container"> 
    <div id="header"> 
      <h1><a href="index.html">Math Questions</a></h1> 
      <div id="main-navigation"> 
        <ul class="wat-cf"> 
          <li class="active"><a>Problem selection</a></li> 
        </ul> 
      </div> 
    </div> 
    <div id="wrapper" class="wat-cf"> 
      <div id="main"> 
 
        <div class="block" id="block-text"> 
          <div class="content"> 
            <div class="inner"> 
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
                </form>
            </div> 
          </div> 
        </div> 
 
        <div id="footer"> 
          <div class="block"> 
            <p>Copyright &copy; 2011 Dale Fukami.</p> 
          </div> 
        </div> 
      </div> 
    </div> 
  </div> 
</body> 
</html> 
