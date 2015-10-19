<table>
<tr>
        <td><?= $this->Auth->user("id") ?></td>
		<td><?= $this->Auth->user("username") ?> </td>
		<td><?= $user->role ?> </td>
                <td> <?=$this->Html->link('edit', ['action' => 'edit',$user->id]);?></td>
                </tr>
                
</table>

