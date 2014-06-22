<?php
// User menu portlet view
?>
<ul>
	<li>Posts</li>
	<li><?php echo CHtml::link('Create New Post',array('post/create')); ?></li>
	<li><?php echo CHtml::link('Manage Posts',array('post/admin')); ?></li>
	<li>Users</li>
	<li><?php echo CHtml::link('Add User',array('user/create')); ?></li>
	<li><?php echo CHtml::link('Manage Users',array('user/admin')); ?></li>
	<li>Connections</li>
	<li><?php echo CHtml::link('Add Connection',array('connection/create')); ?></li>
	<li><?php echo CHtml::link('Manage Connections',array('connection/admin')); ?></li>
	<p>
	<li><?php echo CHtml::link('Logout',array('site/logout')); ?></li>
</ul>
