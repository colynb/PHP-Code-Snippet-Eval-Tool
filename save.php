<?php

$filename = 'code_' . date('Y-m-d') . '.php';
file_put_contents($filename, '<?php '. "\n\n" . $_POST['content'] . "\n\n" . ' ?>',FILE_APPEND);

echo 'Saved as ' . $filename;

?>
