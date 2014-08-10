<?php foreach($posts as $post): ?>
<div class="post" id="c<?php echo $post->id; ?>">

	<?php echo CHtml::link("#{$post->id}", $post->getUrl($post), array(
		'class'=>'cid',
		'title'=>'Permalink to this post',
	)); ?>

	<div class="author">
		<?php echo $post->authorLink; ?> says:
	</div>

	<div class="time">
		<?php echo date('F j, Y \a\t h:i a',$post->create_time); ?>
	</div>

	<div class="content">
		<?php echo nl2br(CHtml::encode($post->content)); ?>
	</div>

</div><!-- post -->
<?php endforeach; ?>