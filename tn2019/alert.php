<?php
session_start();

require("check_login.php");
if ($row["Status"] == "ADMIN") { } else { ?>
    <div style="margin: 30px; color: red;">Fail Alert !!!!!!!!!!!!!!</div>    
<?php
}
