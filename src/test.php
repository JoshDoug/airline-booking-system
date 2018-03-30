<?php

echo "Hello"; ?>

<p><?= getcwd() ?></p><?php

require_once('../private/initialise.php');
?>

<p>Web Root<?= WEB_ROOT ?></p>
<p>Src Root<?= SRC_ROOT ?></p>
<p>Private Root<?= PRIVATE_PATH ?></p>