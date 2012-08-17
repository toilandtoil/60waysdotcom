<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mbuckl1
 * Date: 8/14/2012
 * Time: 3:54 PM
 * To change this template use File | Settings | File Templates.
 */

$slides = file('database/60ways.txt');
$products = '';
$myInt = 0;

foreach ($slides as $v) {
    /* Split the file row by the vertical lines Using preg_split to remove unnecessary spaces and tabulations */
    $data = preg_split('/\s*\|\s*/', $v);
    $products .= '

<div class="slide60ways" id="slide60ways' . $myInt . '">
<div class="slideImage60ways" id="slideImage60ways' . $myInt . '">
<img class="' . $data[1] . '" src="images/' . $data[3] . '" data-original="images/60ways/' . $data[4] . '">
</div>
</div>
';
    $myInt++;

}

?>

