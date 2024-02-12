<?php
/**
 * Simple PHP script example to showcase hwo HTML content
 * can be re-used across multiple HTML files
 * 
 * @author: w.delamare
 * @date: Dec. 2023
 */

    function include_header() {
        ?>
        <header>
            <img src="media/brandLogo.png" alt="Brand Logo" height="75" title="Artxiboa"></a>
            <h1>Artxiboa</h1>
        </header>
        <?php
    }


    function include_footer() {
        ?>
        <footer>
            Copyright!©️TAI <a href="mailto:">Contact</a>
        </footer>
        <?php
    }


    function include_error_message($message) {
        echo "<p class='error_message'>" . $message . "</p>";
    }


?>