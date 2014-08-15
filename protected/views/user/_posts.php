<?php foreach($posts as $post): ?>
<div class="post" id="c<?php echo $post->id; ?>">

	<div class="posttitle">
		<?php echo CHtml::link("{$post->title}", $post->getUrl($post), array(
		'class'=>'cid',
		'title'=>'Permalink to this post',
	)); ?>
	</div>

	<div class="tagline">
		<?php echo date('F j, Y',$post->create_time); ?>
	</div>

	<div class="content">
		<?php echo nl2br(CHtml::encode($post->content)); ?>
	</div>

</div><!-- post -->
<?php endforeach; ?>