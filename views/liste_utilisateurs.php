<table>
<?php
/* Debut de la zone qui nous interesse */
foreach($users as $user): ?>
<tr>
<td><?=$user->getUsername();?></td>
<td><?=$user->getEmail();?></td>
<td><?=$user->getAge();?></td>
</tr>
<?php endforeach; ?>
</table>