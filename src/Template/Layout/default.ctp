<html xmlns="http://www.w3.org/1999/xhtml">
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

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
			 
		</div>
	</div>
         <div id="container">
    <div id="page">


</div>
            <div class="row">
                <?= $this->fetch('content') ?>
            </div>
       </div>
       
    
    </div>
         </div>
</body>
<div id="footer">
	<p>2015 All rights reserved.Design by DMJ2 </p>
</div>
<!-- end #footer -->
</body>
</html>
