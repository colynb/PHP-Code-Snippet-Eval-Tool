<?php
$code = '';
if (!empty($_POST)) {
    if (isset($_POST['code'])) {
        $code = $_POST['code'];

        ob_start();
        $return = eval($code);
        echo $return;
        $output = ob_get_contents();
        ob_end_clean();
    }
}
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript" src="jquery.textarea.js"></script>
<style type="text/css">
    body { font-family: arial; }
</style>
<script type="text/javascript">
    $(document).ready(function(){
        $("textarea").tabby();
        $('a#save_code').click(function(){
            if ($('textarea[name="code"]').val()) {
                $.ajax({
                    url: 'save.php',
                    type: "POST",
                    data: ({content : $('textarea[name="code"]').val()}),
                    success: function(data) {
                        alert('Saved as ' + data);
                    }
                });
            }
    });
});
</script>
<table cellpadding="10">
    <tr>
        <td valign="top">
            <form action="/" method="POST">
                <textarea style="width: 800px; height: 500px; border: solid 3px #C00; padding: 10px;" name="code"><?= $code?></textarea><br />
                <input type="submit" value="      Eval      " style="background-color:#C00; color:#FFF; font-size: 18px; font-weight: bold; padding: 5px;" />
                &nbsp;
                &nbsp;
                <a href="javascript:void(0);" id="save_code">Save code</a>
            </form>
        </td>
        <?php if (isset($output)):?><td valign="top"><strong>Output</strong><div style="margin: 15px; padding: 15px; border: solid 1px #CCC;"><?= $output?></div></td><?php endif;?>
        </tr>
    </table>



<?php

            function debug($mixed)
            {
                echo '<pre>' . print_r($mixed, 1) . '</pre>';
            }
?>