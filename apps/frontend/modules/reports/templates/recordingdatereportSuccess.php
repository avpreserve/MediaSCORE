Recording Date Report

<form action="<?php echo url_for('reports/recordingdatereport') ?>" method="post">
    <?php echo $form['listUnits']->render(); ?>
    <input type="submit" value="Export" />
</form>