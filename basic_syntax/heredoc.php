<?php
$str = <<<DEMO
This is a
demo message
with heredoc.
DEMO;

echo $str;
?>
</br>
<?php
$str = <<<'DEMO'
This is a
demo message
with heredoc.
DEMO;

echo $str;
?>