
<a class="button" href="<?php echo url_for('assetgroup/new?c=' . $collectionID) ?>">Create Asset Group</a>
<div id="search-box">
    <form>
        <div class="search-input">
<!--            <div class="token">Token One<span> <a href="#">X</a></span></div>
          <div class="token">Token One<span> <a href="#">X</a></span></div>-->
            <input type="search" placeholder="Search all records"/>
            <div class="container">
                <a class="search-triangle" href="#"></a>
                <!--              <a class="search-close" href="#"></a>-->
            </div>
            <input class="button" type="submit" value="" />
            <!--            <div class="dropdown-container">
                          <div class="dropdown clearfix Xhidden">  toggle class "hidden" to show/hide 
                            <ul class="left-column">
                              <li><h1>Format</h1></li>
                              <li><a href="#">Format One</a></li>
                              <li><a href="#">Format Two</a></li>
                              <li><a href="#">Format Three</a></li>
                              <li><a href="#">Format Four</a></li>
                            </ul>
                            <ul class="right-column">
                              <li><h1>Type</h1></li>
                              <li><a href="#">Unit</a></li>
                              <li><a href="#">Collection</a></li>
                              <li><a href="#">Asset Group</a></li>
                            </ul>
                          </div>
                        </div>-->
        </div>
    </form>
</div>
<div id="filter-container">
    <div id="filter" class="Xhidden" style="display:none;"> <!-- toggle class "hidden" to show/hide -->
        <div class="title">Filter by:</div>
        <form>
            <strong>Text:</strong> <input type="text" class="text" />
            <strong>Date:</strong>
            <div class="filter-date">
                <select>
                    <option value="date-type">Created On</option>
                    <option value="date-type">Updated On</option>
                </select>
                <input type="text" />
                to
                <input type="text" />
            </div>
            <strong>Status:</strong>
            <select>
                <option value="date-type">Created On</option>
                <option value="date-type">Updated On</option>
            </select>
        </form>
        <div class="reset"><a href="#"><span>R</span> Reset</a></div>
    </div>
</div> 
<div class="show-hide-filter"><a href="javascript:void(0)" onclick="filterToggle();" id="filter_text">Show Filter</a></div> 
<div class="breadcrumb small"><a href="<?php echo url_for('unit/index') ?>">All Units</a>&nbsp;&gt;&nbsp;<a href="<?php echo url_for('collection/index?u=' . $unitID) ?>"><?php echo $unitName ?></a>&nbsp;&gt;&nbsp;<?php echo $collectionName ?></div>

<table>
    <thead>
        <tr>
            <th>Asset Groups</th>
            <th>Created</th>
            <th>Created By</th>
            <th>Updated On</th>
            <th>Updated By</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php /* print_r($persons)->toArray() */ ?>
        <?php foreach ($asset_groups as $asset_group): ?>
            <tr>
                <td><a href="<?php echo url_for('assetgroup/edit?id=' . $asset_group->getId() . '&c=' . $collectionID) ?>"><?php echo $asset_group->getName() ?></a></td>
                <td><?php echo $asset_group->getCreatedAt() ?></td>
                <td><?php echo $asset_group->getCreator()->getName() ?></td>
                <td><?php echo $asset_group->getUpdatedAt() ?></td>
                <td><?php echo $asset_group->getEditor()->getName() ?></td>
                <td class="invisible">
                    <div class="options">
                        <a href="#fancyboxAsset" class="delete_unit"><img src="/images/wireframes/row-delete-icon.png" alt="Delete" onclick="getAssetID(<?php echo $asset_group->getId(); ?>)"/></a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<script type="text/javascript">
    $(document).ready(function() {
       
        $(".delete_unit").fancybox({
            'width': '100%',
            'height': '100%',
            'autoScale': false,
            'transitionIn': 'none',
            'transitionOut': 'none',
            'type': 'inline',
            'padding': 0,
            'showCloseButton':false
           
        });
       
    });
    var filter=1;
    var assetId=null;
    function filterToggle(){
        $('#filter').slideToggle();
        if(filter==0){
            filter=1;
            $('#filter_text').html('Show Filter');
            
        }
        else{
            $('#filter_text').html('Hide Filter');
            filter=0;
        }
            
            
    }
    function getAssetID(id){
        assetId=id;
      
    }
    function deleteAsset(collection){
        window.location.href='/assetgroup/delete?c='+collection+'&id='+assetId;
    }
</script>
<?php if (sizeof($asset_groups) > 0) { ?>
    <div style="display: none;"> 
        <div id="fancyboxAsset" style="background-color: #F4F4F4;width: 600px;" >
            <header>
                <h5  class="fancybox-heading">Warning!</h5>
            </header>
            <div style="margin: 10px;">
                <h3>Careful!</h3>
            </div>
            <div style="margin: 10px;font-size: 0.8em;">
                You are about to delete a Asset Group which will permanently erase all information associated with it.<br/>
                Are you sure you want to proceed?
            </div>
            <div style="margin: 10px;"><a class="button" href="javascript://" onclick="$.fancybox.close();">NO</a>&nbsp;&nbsp;&nbsp;<a id="deleteAsset" href="javascript:void(0);" onclick="deleteAsset(<?php echo $collectionID; ?>)">YES</a></div>
        </div>
    </div>
<?php } ?>
