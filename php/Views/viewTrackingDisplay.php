<?php
function viewTrackingDisplay($OrderNumber, $LineNumber){

		Head();
	}
/*************************************************
Display the Header of the Tracking and the Column Header for the INformation
**************************************************/

function viewHead($OrderNumber, $LineNumber,  $Customer, $orderDate, $orderQtty, $Item) { ?>
      <input type="hidden" name="ordernumber" id = "ordernumber" value="<?php echo $OrderNumber?>"/>
      <input type="hidden" name="linenumber" id = "linenumber" value="<?php echo $LineNumber?>"/>
      <input type="hidden" id="typeuser" name="typeuser" value="supervisor"/>
      <div class="trackingdisplay">
            <h3>Tracking Inquiry Display</h3><br>
            <label class="label-display flex">Order No.:</label>
            <input class="quantity" type="text" disabled value="<?php echo $OrderNumber."/".$LineNumber?>"><br> <!--
            <label class="label-display flex">Line Number:</label>
            <input class="quantity" type="text" disabled value="<?php echo $LineNumber?>"><br> -->
            <label class="label-display flex">Customer:</label>
            <input class="quantity"type="text" id="customer" disabled value="<?php echo  $Customer?>"><br>
            <label class="label-display flex">Order Date:</label>
            <input class="quantity"type="text" id="orderdate" disabled value="<?php echo $orderDate?>"><br>
            <label class="label-display flex">Quantity:</label>
            <input class="quantity"type="text" id="quantity" disabled value="<?php echo $orderQtty?>" ><br>
            <label class="label-display flex">Item:</label>
            <input class="quantity"type="text" id="item" disabled value="<?php echo $Item?>" ><br>
      </div>
      <div class="container row text-center">
       <div class="col-md-4">
         <div class="row">
            <div  id="machinecolumn" class="col-5"></div>
            <div id="operator" class="col-4"> </div>
            <div id="elapsedtime" class="col-3"></div>
         </div>
       </div>
       <div class="col-md-4">
         <div class="row">
            <div id="qty" class="col-2"></div>
            <div id="startdate" class="col-5"></div>
           <div id="stopdate" class="col-5"></div>
         </div>
        </div>
       <div class="col-md-4">
        <div class="row">
           <div id="override" class="col-3"></div>
           <div id="comment" class="col-9"></div>
         </div>
      </div>
    </div>
    <label></label><br><br><br>
    <?php
    Foot();?>
		    <script src="../js/inquirydisplay.js"></script>
		<?php

   }

?>