<?php
/* config.php */
function dbcon()
{
    @mysql_connect("mysql.hostinger.com.br", "u220304474_intra", "aA4WzQKePjMk") or die(mysql_error());
    @mysql_select_db("u220304474_intra") or die(mysql_error());
}
?>