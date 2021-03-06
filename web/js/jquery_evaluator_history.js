timeInMin = null;


function htmlInclusive(elem) { 
    return $('<div />').append($(elem).clone()).html(); 
}

/*
 * Assign new desgin for Assets Score Text Field
 **/
function changeAssetView(){
    var ElementId = $('input[id*="asset_score"]').attr('id');
    if(ElementId != undefined && ElementId !='' && ElementId){
        $("#"+ElementId).show();
        $("#"+ElementId).closest(".section").attr('style','overflow:hidden;');
        var inputFieldhtml = htmlInclusive($("#"+ElementId));
        var thisTr = $("#"+ElementId).closest('tr');
        if(thisTr != undefined && thisTr !='' && thisTr){
            var table  = $('#'+ElementId).closest("table");
            if(table != undefined && table !='' && table){
                var TableId = $(table).attr('id');
                if(TableId == undefined){
                    TableId = 'custom_table_assetG';
                    $(table).attr('id',TableId);
                }
                if(TableId != undefined && TableId !='' && TableId){ 
                    var lastTr = $("#"+TableId+' tr:last-child');
                    if(lastTr != undefined && lastTr !='' && lastTr){
                        var isthisTheOne = $(lastTr).find('#'+ElementId);
                        if($(isthisTheOne).attr('id') == undefined || $(isthisTheOne).attr('id') =='' || $(isthisTheOne).attr('id') == null  ){
                            $(thisTr).remove();
                            $(lastTr).after('<tr><td colspan=2><div style="position:relative">' +
                                '<div style="margin: 0px; top: 0px; border-top: 11px solid rgb(255, 255, 255); padding: 0px; position: relative; left: -10px; width: 102.2%;">' +
                                '<h3 style="margin: 8px;">Asset Score</h3>' +
                                '<div class="left-column-container">' +

                                '<div class="row clearfix">' +
                                '<div class="left-column" style="width: 215px;margin: 8px;"><b><span class="required">*</span>Asset Group Score: </b></div>'+
                                '<div class="right-column">'+inputFieldhtml  + '</div>' +
                                '<div class="error_list" id="format_error" style="display: none; float: left; margin-top: 8px;">Required.Please select the format type.</div>'+
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</td></tr>');
                        }else{
                            lastTr = $(thisTr).prev();
                            $(thisTr).remove();
                            $(lastTr).after('<tr><td colspan=2><div style="position:relative">' +
                                '<div style="margin: 0px; top: 0px; border-top: 11px solid rgb(255, 255, 255); padding: 0px; position: relative; left: -10px; width: 102.2%;">' +
                                '<h3 style="margin: 8px;">Asset Score</h3>' +
                                '<div class="left-column-container">' +

                                '<div class="row clearfix">' +
                                '<div class="left-column" style="width: 215px;margin: 8px;"><b><span class="required">*</span>Asset Group Score: </b></div>' +
                                '<div class="right-column">' + inputFieldhtml + '</div>' +
                                '<div class="error_list" id="format_error" style="display: none; float: left; margin-top: 8px;">Required.Please select the format type.</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>'  +
                                '</td></tr>');
                        }
                    }
                }
            }
        }
    }
}



function makeTime() {
    timeInMin = ($('#format_type_duration').val()); // validates input
    if (!isNaN(timeInMin)) {
        $('#duration_error').hide();
        timetoSec = parseFloat(timeInMin * 60);
        var hr = Math.floor(timetoSec / 3600);
        var min = Math.floor((timetoSec - (hr * 3600)) / 60);
        var sec = timetoSec - (hr * 3600) - (min * 60);

        while (min.length < 2) {
            min = '0' + min;
        }
        while (sec.length < 2) {
            sec = '0' + min;
        }
        if (hr < 9)
            hr = '0' + hr;
        if (min < 9)
            min = '0' + min;
        if (sec < 9)
            sec = '0' + sec;
        $('#format_type_duration').val(hr + ':' + min + ':' + sec);
    }
    else {
        $('#duration_error').show();
    }
}
function convertToMinutues() {
    $('#format_type_duration').val(timeInMin);
}
function getRelatedForm() {
    if ($('#format-type-model-name').val() != '') {
        urlSuffix = '/new';
        if ($('#asset_group_format_id').val() != '')
            $('#format_error').hide();
        $('#format_specific').empty();
        $.ajax({
            type: 'POST',
            url: appBaseURL + $('#format-type-model-name').val() + urlSuffix,
            success: function(data, textStatus) {
                $('#format_specific').html('');

                $('#format_specific').append(data);
                $("input,textarea,select").keypress(function() {
                    changes = true;
                });
                $("select").click(function() {
                    changes = true;
                });
                changeAssetView();
            }

        });
    }
    else {
        $('#format_specific').empty();
    }
}
function getCollectionAndLocation() {
    $.ajax({
        type: 'POST',
        url: appBaseURL + 'collection' + '/getCollectionsForUnit',
        data: {
            id: $('#unit-multiple-select').val()
        },
        success: function(data, textStatus) {
            $('#collection-multiple-select').html('');
            if (data != undefined && data.length > 0) {
                for (collection in data) {
                    if (collection == 0)
                        selected = 'selected="selected"';
                    else
                        selected = '';
                    $('#collection-multiple-select').append('<option value="' + data[collection].id + '" ' + selected + '>' + data[collection].name + '</option>');
                }
            //                getStorageLocation($('#collection-multiple-select').val(),1);
            }
            else {
                $('#collection-multiple-select').append('<option value="">No Collection</option>');

            }
            getStorageLocation($('#unit-multiple-select').val(), 0);

        },
        error: function(data, textStatus, errorThrown) {
            alert('Error: ' + errorThrown + "\n" + 'Details: ' + textStatus);
            $('body').html(data['responseText']);
        }
    });
}
function getStorageLocation(id, type) {
    if (type == 0) {
        urlParameter = 'u=' + id;
        $('#asset_group_parent_node_id').val();
    }
    else if (type == 1) {
        urlParameter = 'c=' + id;
        $('#asset_group_parent_node_id').val(id);
    }
    $.ajax({
        type: 'POST',
        url: appBaseURL + 'storagelocation/index?' + urlParameter,
        success: function(data, textStatus) {
            locationVal = $('#asset_group_resident_structure_description').val();
            $('#asset_group_resident_structure_description').html('');
            if (data != undefined && data.length > 0) {
                for (cnt = 0; cnt < data.length; cnt++) {
                    if (data[cnt].id == locationVal)
                        $('#asset_group_resident_structure_description').append('<option value="' + data[cnt].id + '" selected="selected">' + data[cnt].name + '</option>');
                    else
                        $('#asset_group_resident_structure_description').append('<option value="' + data[cnt].id + '">' + data[cnt].name + '</option>');
                }
            }
            else {
                $('#asset_group_resident_structure_description').append('<option value="">No Storage Location</option>');
            }
        },
        error: function(data, textStatus, errorThrown) {
            alert('Error: ' + errorThrown + "\n" + 'Details: ' + textStatus);
            $('body').html(data['responseText']);
        }
    });
}
var changes = false;
$('document').ready(function() {
    // Debugging

    debugAJAXRequest = function(url, requestType, requestData) {
        console.log('Debugging...');

        $.ajax(url,
        {
            type: requestType,
            data: requestData,
            success: function(data) {
                console.log('Success');
                for (attrib in data)
                    console.log(data[attrib]);
            },
            error: function(data) {
                for (attrib in data)
                    console.log(data[attrib]);
            }
        });
    }

    $("input,textarea,select").keypress(function() {
        changes = true;
    });
    $("select").click(function() {
        changes = true;
    });

    window.onbeforeunload = function() {
        if (changes)
        {
            return 'You have entered new data on this page.  If you navigate away from this page without first saving your data, the changes will be lost.';
        }
    }
    appBaseURL = '/frontend_dev.php/';
    assetGroupID = $('#asset_group_id').val();
    if ($('#collection-multiple-select').val() != '')
        getStorageLocation($('#collection-multiple-select').val(), 1);
    else
        getStorageLocation($('#unit-multiple-select').val(), 0);


    $('#asset-group-save').click(function(event) {
        event.preventDefault();
        changes = false;
        $.blockUI({
            css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#fff'
            }
        });
        $('#format_type_duration').val(timeInMin);
        actionName = $('#asset_group_format_id').val() ? 'update' : 'create';
        urlSuffix = '';
        moduleName = $('#format-type-model-name').val();
        if ($('#format-type-model-name').val() == '') {
            moduleName = 'formattype';
            $('#format_error').show();
            $.unblockUI();
            return false;
        }
        if (actionName == 'update') {

            urlSuffix = '/id/' + $('#format-type-container input[id$="_id"]').val();
            $.ajax({
                type: 'POST',
                url: appBaseURL + 'formattype' + '/' + actionName + urlSuffix,
                data: $('#format-type-container').children('form').serialize(),
                success: function(data, textStatus) {
                    var numericExpression = /^[0-9]+$/;
                    if (data.match(numericExpression)) {
                        //                        
                        if ($('#format-type-model-name').val() != '') {
                            $.ajax({
                                type: 'POST',
                                url: appBaseURL + moduleName + '/' + actionName + urlSuffix,
                                data: $('#format_specific').children('form').serialize(),
                                success: function(data, textStatus) {
                                    if (data.match(numericExpression)) {
                                        $('#asset-group-form').submit();
                                    }
                                    else {

                                        $.unblockUI();
                                        $('#format_specific').html(data);
                                        changeAssetView();
                                    }

                                }
                            });
                        }
                        else {
                            $('#asset-group-form').submit();
                        }

                    }
                    else {

                        $.unblockUI();
                        $('#format-type-container').html(data);
                    }

                },
                error: function(data, textStatus, errorThrown) {
                    $.unblockUI();
                    alert('Error: ' + errorThrown + "\n" + 'Details: ' + textStatus);
                    $('body').html(data['responseText']);
                }
            });

        } else {

            $.ajax({
                type: 'POST',
                url: appBaseURL + 'formattype' + '/' + actionName + urlSuffix,
                data: $('#format-type-container').children('form').serialize(),
                success: function(data, textStatus) {
                    var numericExpression = /^[0-9]+$/;
                    if (data.match(numericExpression)) {
                        $('#asset_group_format_id').val(data);

                        if ($('#format-type-model-name').val() != '') {
                            $.ajax({
                                type: 'POST',
                                url: appBaseURL + moduleName + '/update/id/' + data,
                                data: $('#format_specific').children('form').serialize(),
                                success: function(data, textStatus) {
                                    $('#asset-group-form').submit();
                                }
                            });
                        }
                        else {
                            $('#asset-group-form').submit();
                        }
                    }
                    else {

                        $.unblockUI();
                        $('#format-type-container').html(data);
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    $.unblockUI();
                    alert('Error: ' + errorThrown + "\n" + 'Details: ' + textStatus);
                    $('body').html(data['responseText']);
                }
            });
        }
    });

    // For the FormatType Models //
    //if(!$('#asset_group_format_id').val())
    $('#format-type-model-name').prop('selectedIndex', 0);
    serializedFormatTypeID = $('#asset_group_format_id').val();
    serializedFormatTypeModelName = '';

    getFormatTypeForm = function() {

        formatTypeID = $('#asset_group_format_id').val();
        getAddFormatTypeForm = function() {

            formatTypeName = $('#format-type-model-name').val();
            if (formatTypeName) {
                $('#format-type-container').load(
                    appBaseURL + formatTypeName + '/new',
                    {},
                    function() {
                        $('#asset_group_format_id').val('');
                                        
                    });
            }
            else {
                $.ajax({
                    type: 'POST',
                    url: appBaseURL + 'formattype/newform',
                    dataType: 'html',
                    success: function(data, textStatus) {

                        $('#format-type-container').append(data);
                        timeInMin = $('#format_type_duration').val();
                        makeTime();
                        $("input,textarea,select").keypress(function() {
                            changes = true;
                        });
                        $("select").click(function() {
                            changes = true;
                        });
                    }

                });

            }
        }

        if (formatTypeID) {
            // Check for match
            // Execute /new for mismatch
            //
            //console.log('selected index: '+$('#format-type-model-name').prop('selectedIndex'));
            if (serializedFormatTypeModelName != '' && serializedFormatTypeModelName != $('#format-type-model-name').val()) {
                getAddFormatTypeForm();
            } else {


                $.getJSON(
                    appBaseURL + 'formattype/getModelName',
                    {
                        id: formatTypeID
                    },
                    function(modelName) {
                        
                        modelName = modelName.toLowerCase();
                        if (modelName != 'formattype') {
                            if ($('#format-type-model-name').prop('selectedIndex') == 0 || modelName == serializedFormatTypeModelName) {
                                if ($('#format-type-model-name').prop('selectedIndex') == 0) {
                                    $('#format-type-model-name').val(modelName);
                                    serializedFormatTypeModelName = modelName;
                                }                                
                                $('#format_specific').load(
                                    appBaseURL + modelName + '/edit',
                                    {
                                        id: formatTypeID
                                    },
                                    function() {
                                        
                                        if (userType == 3)
                                            $("input,select,textarea").attr('disabled', true);
                                        changeAssetView();                        
                                    }
                                    );
                            } else
                                getAddFormatTypeForm();
                        }
                    });
            }
        } else if (serializedFormatTypeModelName) {
            $('#format-type-container').load(
                appBaseURL + serializedFormatTypeModelName + '/edit',
                {
                    id: serializedFormatTypeID
                },
                function() {
                    $('#asset_group_format_id').val(serializedFormatTypeID);
                }
                );
        } else {
            getAddFormatTypeForm();
        }
    } // Format Type

    // Need to check if Format Type exists...

    //    $('#format-type-model-name').click(function () {
    //        alert(1);
    ////        getFormatTypeForm();
    //    });
    if ($('#asset_group_format_id').val() != '') {
        $.ajax({
            type: 'POST',
            url: appBaseURL + 'formattype/edit/id/' + $('#asset_group_format_id').val(),
            success: function(data, textStatus) {


                $('#format-type-container').html(data);
                timeInMin = $('#format_type_duration').val();
                makeTime();
                $("input,textarea,select").keypress(function() {
                    changes = true;
                });
                $("select").click(function() {
                    changes = true;
                });
                if (userType == 3)
                    $("input,select,textarea").attr('disabled', true);

            },
            error: function(data, textStatus, errorThrown) {
                alert('Error: ' + errorThrown + "\n" + 'Details: ' + textStatus);
                $('body').html(data['responseText']);
            }
        });
    }

    getFormatTypeForm(); // When the DOM is loaded.

    // For the EvaluatorHistory Models //
    //



    refreshElementHandlers = function() {

        // Populate the EvaluatorHistory values
        $.get(
            appBaseURL + 'person/getPersonsForAssetGroup',
            {
                //                ag:assetGroupID
                u: $('#unit-multiple-select').val()
            },
            function(persons) {
                if (persons.list.length > 0) {
                    selectedPersons = $('#evaluator_history_consulted_personnel_list').val();

                    $('#evaluator_history_consulted_personnel_list').html('');
                    for (i in persons.list) {
                        $('#evaluator_history_consulted_personnel_list').append('<option value="' + persons.list[i].id + '" id="person_' + persons.list[i].id + '">' + persons.list[i].first_name + ' ' + persons.list[i].last_name + '</option>');
                    }
                    if (selectedPersons != undefined && selectedPersons != null) {
                        for (person in selectedPersons) {
                            $('#person_' + selectedPersons[person]).attr('selected', 'selected');
                        }
                    }

                }
                else {
                    $('#evaluator_history_consulted_personnel_list').html('<option value="">No Personnel</option>');

                }
            });

        /*
		 $.get(
		 appBaseURL+'collection/getCollectionsForUnit',
		 {id:unitID},
		 function (collections) {
		 populateCollections( $('#collection-multiple-select'),collections );
		 
		 }
		 );
		 
		 */

        //console.log( $('#evaluator_history_updated_at').prop('tagName') );
        //$('<input id="evaluator-history-updated-datepicker"></div>')
        //.insertBefore( '#evaluator_history_updated_at' )
        $('#evaluator_history_updated_at')
        //$('#evaluator_history_updated_at').datepicker({ 'dateFormat': 'yy-mm-dd',
        .datepicker({
            'dateFormat': 'yy-mm-dd',
            'altField': '#evaluator_history_updated_at',
            'showButtonPanel': true,
            'onSelect': function(dateText, inst) {
                console.log(inst.input[0]);

            }
        });

        // If a "delete" hyperlink is clicked...
        $('.evaluator-history-delete').click(function(e) {
            e.preventDefault();

            $('#evaluator-history-edit-container').load(
                appBaseURL + 'evaluatorhistory/delete?id=' + $(this).attr('id'),
                function(data) {
                    location.reload();
                });
        });

        // If an "edit" hyperlink is clicked...
        $('.evaluator-history-edit').click(function(e) {
            e.preventDefault();
            // ...load the Evaluator History Edit View through an AJAX call...
            $('#evaluator-history-edit-container').load(
                appBaseURL + 'evaluatorhistory/edit?id=' + $(this).attr('id'),
                //'/symfony/mediascore1.0a/frontend_dev.php/'+$(this).attr('href'),
                // ...specifying the Evaluator History ID as a parameter value in the GET request
                //{ id : $(this).attr('target') },
                function(data) {

                    refreshElementHandlers();
                    // Hide the "+ ADD NEW" input element
                    $('#evaluator-history-new').hide();
                    //alert(data);
                    // If the "cancel" hyperlink is clicked...
                    $('#evaluator-history-cancel').click(function() {
                        $('#evaluator-history-edit-container').empty();
                        $('#evaluator-history-new').show();
                    });
                });
        });

        // If the "save" hyperlink is clicked...
        $('#evaluator-history-save').click(function(e) {
            // ...load the Evaluator History Edit View through an AJAX call...
            e.preventDefault();
            if ($('#evaluator_history_id').val())
                saveURL = appBaseURL + 'evaluatorhistory/update/id/' + $('#evaluator_history_id').val();
            else
                saveURL = appBaseURL + 'evaluatorhistory/create';

            $.post(
                saveURL,
                $('#evaluator-history-form').serialize(),
                function(data, textStatus) {

                    //alert('trace');

                    $('#evaluator-history-container').load(
                        appBaseURL + 'evaluatorhistory/index',
                        {
                            id: $('input[name="asset_group[id]"]').val()
                        },
                        refreshElementHandlers);

                });
        });

        // If the "+ ADD NEW" input element is clicked...
        $('#evaluator-history-new').click(function() {
            // ...load the Evaluator History New View through an AJAX call...
            $('#evaluator-history-edit-container').load(
                appBaseURL + 'evaluatorhistory/new',
                function() {

                    refreshElementHandlers();
                    // Hide the "+ ADD NEW" input element
                    $('#evaluator-history-new').hide();

                    // Load the current date and time
                    //console.log( $('#asset_group_created_at_month').prop('tagName') );
                    now = new Date();

                    // Link this new EvaluatorHistory and AssetGroup objects
                    //$('#evaluator_history_asset_group_id').val( $('input[name="asset_group[id]"]').val() );
                    $('#evaluator_history_asset_group_id').val($('#asset_group_id').val());
                    $('#evaluator_history_created_at_year').prop('selectedIndex', now.getFullYear() - 2006);
                    $('#evaluator_history_created_at_month').prop('selectedIndex', now.getMonth() + 1);
                    $('#evaluator_history_created_at_day').prop('selectedIndex', now.getDate());
                    $('#evaluator_history_created_at_hour').prop('selectedIndex', now.getHours() + 1);
                    $('#evaluator_history_created_at_minute').prop('selectedIndex', now.getMinutes() + 1);
                });
        });

        $('#evaluator-history-cancel').click(function() {
            $('#evaluator-history-edit-container').empty();
            $('#evaluator-history-new').show();
        });

    }



    $('#evaluator-history-container').load(
        appBaseURL + 'evaluatorhistory/index',
        // ...specifying the Asset Group's ID as a parameter value in the GET request.
        {
            id: $('input[name="asset_group[id]"]').val()
        },
        refreshElementHandlers);

});

