<html xmlns="http://www.w3.org/1999/xhtml">
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

   <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
        

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<?=$this->Flash->render();?>
<?=$this->Flash->render('auth');?>

<div id="wrapper">
	<div id="header-wrapper">
		<div id="header">
			<div id="logo">
				<h1><a href="#">Digital Map</a></h1>
				<p>Design by <a href="" rel="nofollow">DMJ2</a></p>
			</div>
                </div>
	</div>
	
	<!-- end #header -->
        <?= $this->fetch('content') ?>

</div>
<div id="footer">
	<p>2015 All rights reserved.Design by DMJ2 </p>
</div>
<!-- end #footer -->
</body>
</html>
