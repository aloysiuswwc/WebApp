<!--
 * File : logout.php
 * Developer : Agney Patel
 * Website : www.agney.vishwasetu.com
 * Copyright © Agney Patel 2016
 -->

<?php
session_start();
if(session_destroy()) {
    echo "<script>location='index.php'</script>";
}
?>