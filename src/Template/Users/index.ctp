<!-- File: src/Template/Articles/index.ctp -->

<h1>User Details</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Password</th>
		<th>Role</th>
		<th>Created</th>
		<th>Modified</th>
		
    </tr>

    <!-- Here is where we iterate through our $users query object, printing out user info -->

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?= $user->id ?></td>
		<td><?= $user->username ?> </td>
		<td><?= $user->password ?> </td>
		<td><?= $user->role ?> </td>
     
    </tr>
    <?php endforeach; ?>
</table>