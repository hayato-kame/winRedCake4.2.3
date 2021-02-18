<h1>Databaseサンプル</h1>

<?=$this->Form->create($entity, ['url' => ['action' => 'delRecord']]) ?>

<fieldset>
<?=$this->Form->text("name") ?>
</fieldset>

<?=$this->Form->button("送信") ?>
<?=$this->Form->end() ?>

<p>COUNT:
<?= $count ?>
</p>


<hr>

<table>

	<tr>
		<th>ID</th>
		<th>NAME</th>
		<th>TITLE</th>
		<th>CONTENT</th>
	</tr>

<?php


for($i = 0; $i < count($data); $i++) {
    echo $this->Html->tableCells(
        $data[$i]->toArray(),
        ['style' => 'background-color: #f0f0f0'],
        ['style' => 'font-weight:bold'], true
    );
}
?>
</table>