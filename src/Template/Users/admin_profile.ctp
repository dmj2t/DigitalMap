<!-- File: src/Template/Articles/index.ctp -->

<h1>Administrator Page</h1>
<div id="page">
<div id="content">
<ul>
                                        
<table>
    <table>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Name</th>
	<th>Role</th>	
    </tr>

    <!-- Here is where we iterate through our $users query object, printing out user info -->
 <li>
    <?php foreach ($users as $user): ?>
   
    <tr>
        <td><?= $user->id ?></td>
		<td><?= $user->username ?> </td>
                <td><?= $user->name ?> </td>
		<td><?= $user->role ?> </td>
                <td> <?= $this->Form->postLink(
                'Delete ',
                ['action' => 'delete', $user->id],
                ['confirm' => 'Please press Confirm to Delete User?'])
            ?><?=$this->Html->link('edit', ['action' => 'edit',$user->id]);?></td>
                </tr>
    <?php endforeach; ?>
    </li>
</table>
    
</table>
						
					
</ul>
</div>

<div id="sidebar-bg">
			<div id="sidebar">
				<ul>
						<h2>My Settings</h2>
						<ul>
							<li><a href="#">Change Password</a></li>
                                                        <li><a href="#">Change Email</a></li>
							
						</ul>
					</li>

				</ul>
			</div>
		</div>
</div>