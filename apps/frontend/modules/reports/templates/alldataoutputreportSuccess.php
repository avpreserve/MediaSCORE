
<h1>All Data Output Report </h1>
<hr/>
<?php
echo $NoRecordFound = get_slot('my_slot');
?>

<form action="<?php echo url_for('reports/alldataoutputreport') ?>" method="post">
    <table>

		<tfoot>
            <tr>
                <td colspan="2">
					<input type="submit" value="Export" />&nbsp;<span>or</span>&nbsp;<a href="<?php echo url_for('reports/index') ?>">Cancel</a>
                </td>
            </tr>
        </tfoot>
		<tbody>
			<tr> 
                <th>
					<?php echo $form->renderHiddenFields(); ?>
					<?php echo $form['listReports']->renderLabel(); ?>
                </th>
                <td>
					<?php echo $form['listReports']->render(); ?>
					<?php echo $form['listReports']->renderError(); ?>
                </td>
            </tr>
			<tr> 
                <th>

					<?php echo $form['ExportType']->renderLabel(); ?>
                </th>
                <td>
					<?php echo $form['ExportType']->render(); ?>
					<?php echo $form['ExportType']->renderError(); ?>
                </td>
            </tr>
		</tbody>
	</table>



</form>

<script type="text/javascript">
	$('#reports_listUnits_RRD').multiselect({
		'height': 'auto',
		'multiple': true,
		'height':200
	});
	$('#reports_listCollection_RRD').multiselect({
		'height': 'auto',
		'multiple': true,
		'height':200

	});

	$('#reports_collectionStatus').multiselect({
		'height': 'auto',
		'multiple': true,
		'height':200
	});

</script>