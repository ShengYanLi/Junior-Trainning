<?php
// cli-config.php
require_once 'database.php';

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
