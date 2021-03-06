<?php

use newDev\article;
use newDev\customer;
use newDev\selling;

$sBasePath = dirname( __FILE__ );
define( BASE_PATH, $sBasePath );
echo "\n".$sBasePath ."\n";

function __autoload( $sClass ) {
    $sClass = str_replace( '\\', '/', $sClass );
    $sClassName = BASE_PATH . '/' . $sClass . '.php';
    require_once $sClassName;
}

$sName = 'me@myself';

$oArticle1 = new article( 'art1', 0.12, article::MARGIN_TYPE_A );
$oSelling1 = new selling( $oArticle1, 30 );

$oArticle2 = new article( 'art2', 1.28, article::MARGIN_TYPE_B);
$oSelling2 = new selling( $oArticle2, 20 );

$oArticle3 = new article( 'art3', 0.55, article::MARGIN_TYPE_C );
$oSelling3 = new selling( $oArticle3, 25 );

$oArticle4 = new article( 'art4', 0.10, article::MARGIN_TYPE_A );
$oSelling4 = new selling( $oArticle4, 10 );

$sBill = customer::getBill( $sName, array( $oSelling1, $oSelling2, $oSelling3, $oSelling4 ));

echo $sBill;

/**
 * This output is generated by this code

Bill for the customer me@myself

30 x art1 a 0.12 = 3.6
Sales discount ( 5% ): -0.18
20 x art2 a 1.28 = 25.6
Sales discount ( 10% ): -2.56
25 x art3 a 0.55 = 13.75
Sales discount ( 20% ): -2.75
10 x art4 a 0.1 = 1


Invoice total: 38.46

 */
