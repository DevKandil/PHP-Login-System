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




?>