<?php foreach($posts as $post): ?>
<div class="post" id="c<?php echo $post->id; ?>">

	<?php echo CHtml::link("{$post->title}", $post->getUrl($post), array(
		'class'=>'cid',
		'title'=>'Permalink to this post',
	)); ?>
	<div class="content">
		"<?php echo nl2br(CHtml::encode($post->content)); ?>"
	</div>

	<div class="tagline">
		by <?php echo $post->author_id; ?> on <?php echo date('F j, Y',$post->create_time); ?>
	</div>

</div><!-- post -->
<?php endforeach; ?>