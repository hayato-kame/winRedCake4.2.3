<h1>サンプル見出し</h1>

<pre>
<?php var_dump($result); ?>
</pre>

<?php 
echo $this->Form->create(null,
['type' => 'post', 'url' => ['action' => 'index']]);

echo $this->Form->dateTime('HelloForm.date');
echo $this->Form->submit("送信");
echo $this->Form->end();
?>

</pre>