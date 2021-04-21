<?php

foreach($data as $note): ?>

<h1><?php echo $note['titulo']; ?></h1>
<p><?php echo $note['texto']; ?></p> <br>

<?php endforeach; ?>