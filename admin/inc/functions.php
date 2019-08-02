<?php

/** Function [ 1 ]
 * Get Page Title Function
 * Title Function That Echo The Page Title In Case The Page
 * Has The Variable $pageTitle And Echo Default Title For Other Pages
 */

Function getTitle() {

    global $pageTitle;

    if (isset($pageTitle)) {

        echo $pageTitle;

    } else {

        echo 'Default';
    }
}

/* Function [ 2 ]
 * Redirect To Function
 * redirectTo($theMsg, $url = null, $seconds = 3)
 */

function redirectTo($theMsg, $url = null, $seconds = 3) {

    if ($url === null) {
        $url = 'index.php';
    } else {
        if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '' ) {
            $url = $_SERVER['HTTP_REFERER'];
        } else {
            $url = 'index.php';
        }
    }
    echo '<div class="container">';
    echo $theMsg;
    echo "<div class='alert alert-info'>Redirect After  $seconds  Seconds</div>";
    echo '</div>';
    header("refresh:$seconds;url=$url");

    exit();
}

/* Function [ 3 ]
 * Check Items Function
 * The function is used to check if item is in database
 * checkItem($select, $from, $value)
 */

function checkItem($select, $from, $value){

    global $con;

    $statement = $con->prepare("SELECT $select FROM $from WHERE $select = ?");

    $statement->execute(array($value));

    $count = $statement->rowCount();

    return $count;
}


