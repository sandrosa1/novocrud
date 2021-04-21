<?php

foreach($data as $note): ?>

<h1><a href="/notes/ver/<?php echo $note['id']; ?>"><h1><?php echo $note['titulo']; ?></a></h1>
</h1>
<p><?php echo $note['texto']; ?></p> <br>

<?php endforeach; ?>