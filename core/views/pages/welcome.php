<?php $this->layout('layout', ['title' => 'Welcome']) ?>

<?php $this->start('body') ?>
	
    <h1><?=$this->e($greet)?></h1>

<?php $this->stop() ?>