
// Once the document object is loaded...
$('document').ready(function () {

		// Debugging
		debugAJAXRequest = function (url,requestType,requestData) {
			console.log('Debugging...');

			$.ajax(url,
			{
				type: requestType,
				data: requestData,
				success: function (data) {
						alert('Success');
						for(i in data)
							for(attrib in data[i])
								alert(attrib+': '+data[attrib]);
					},
 				error: function (data) {
					for(attrib in data)
						alert(data[attrib]);
					}
			});
		}

		appBaseURL = '/frontend_dev.php/';
		assetGroupID = $('#asset_group_id').val();

		// asset_group_storage_location_id
		//
		populateStorageLocations = function() {
			collectionID=$('#collection-multiple-select').val();

			if(collectionID) {
				$.get(
					appBaseURL + 'storagelocation/index',
					{c:collectionID},
					function (storageLocations) {
						$('#asset_group_storage_location_id').empty();
						//$('body').append(storageLocations);
						for(i in storageLocations)
							$('#asset_group_storage_location_id').append('<option value="'+storageLocations[i].id+'">'+storageLocations[i].name+'</option>');
					});
			}
		}

		// Unit-Collection Multiple Selection
		populateCollections = function (element,stores) {
			element.empty();

			for(i in stores) {
				//console.log(stores[i]);
				element.append('<option class="collection-multiple-select" value="'+stores[i].id+'">'+stores[i].name+'</option>');
				if(stores[i].id == serializedCollectionID)
					$('#collection-multiple-select').prop('selectedIndex',i);
				else
					$('#collection-multiple-select').prop('selectedIndex',0);
			}
			$('#asset_group_parent_node_id').val( $('#collection-multiple-select').val() );
			//$('#collection-multiple-select').val(stores[$('#collection-multiple-select').prop('selectedIndex')]);
			populateStorageLocations();
			/*$(indexViewHTML).find('tbody tr td:nth-child(2)').each(function(i,cellElement) {
				element.append('<option>'+cellElement.innerHTML+'</option>');
				console.log(cElement.innerHTML);
				});*/
			$('.collection-multiple-select').click(function () {
				$('#asset_group_parent_node_id').val( $(this).val() );
				//console.log( 'updated: '+$('#asset_group_parent_node_id').val() );
			});
		}
		//
		getCollectionsForUnitID = function (unitID) {
			$.get(
				appBaseURL+'collection/getCollectionsForUnit',
				{id:unitID},
				function (collections) {
				populateCollections( $('#collection-multiple-select'),collections );

				}
			);
		}

		selectUnit = function (unitID) {
			$('#unit-multiple-select option').each( function(i,element) {
				//console.log( element );
				if(element.value == unitID) {
					$('#unit-multiple-select').prop('selectedIndex',i);
					getCollectionsForUnitID( $('#unit-multiple-select').val().shift() );
				}
			});
		}

		selectUnitForAssetGroupID = function (assetGroupID) {
			$.get(
				appBaseURL+'unit/getUnitForAssetGroup',
				{id:assetGroupID},
				function (unit) {
					//console.log( unit );
					//relatedUnitID=unit.id
					//$('#unit-multiple-select').prop('selectedIndex',unit.id - 1); // No
					selectUnit(unit.id);
					getCollectionsForUnitID( $('#unit-multiple-select').val().shift() );
					//console.log( $('#unit-multiple-select').val().shift() );
				}
			);
		}
		serializedCollectionID = $('#asset_group_parent_node_id').val();
		var relatedUnitID;

		getUnitForCollectionID = function () {
			$.getJSON(	appBaseURL+'unit/show',
					{collectionID: $('#asset_group_parent_node_id').val()},
					function (unit) {
						selectUnit(unit.id);
					});
		}

		$.get(
			appBaseURL+'unit/index',
			{},
			function (units) {
				console.log('trace');
				//console.log(indexViewHTML);
				$('#unit-multiple-select').empty();
				//console.log(units);

				for(i in units) {

					//console.log(units[i]);
					$('#unit-multiple-select').append('<option class="unit-multiple-select" value="'+units[i].id+'">'+units[i].name+'</option>');
				}
				//selectUnitForAssetGroupID( $('#asset_group_id').val() );
				$('#unit-multiple-select').prop('selectedIndex',0); // No
				getUnitForCollectionID();
				
				//getCollectionsForUnitID( $('#unit-multiple-select').val().shift() );
				$('.unit-multiple-select').click(function () {
					//console.log('trace');
					getCollectionsForUnitID( $('#unit-multiple-select').val().shift() );
				});
			});
		});

