<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<h2>Error, <?php echo CHtml::encode($message);  ?></h2>

<div class="error">
<?php echo $code; echo CHtml::encode($message); ?>
</div>