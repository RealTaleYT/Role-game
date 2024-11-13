<?php
require_once('utils/SessionUtils.php');
if(SessionUtils::loggedIn())
{
    // User has already been logged
    header("Location: app/private/views/index.php");
}
else
{
    // Not logged yet, anonimous access
    header("Location: app/public/views/index.php");
}
?>