<?php
function Head()
 { ?>
   <!DOCTYPE html>
   <html lang="en">
   <head>
   <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
   <title>Inquiry System</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="//printjs-4de6.kxcdn.com/print.min.js"></script>
   <link rel="stylesheet" type="text/css" href="https://printjs-4de6.kxcdn.com/print.min.css"> 
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="../css/inquiry.css">
  
    </head>
   <body id="home">
     <!-- Main jumbotron for a  Logo Image about the Company-->
     <div class="container">
       <div class="jumbotron bg-white" id="jumbotron">
           <img class="img-responsive  img-fluid mx-auto d-block" width="60%" height="52" src="../img/flexiblematerial-bl.png"  alt="Flexible Material">
       </div> <!-- /jumbotron -->
     </div> <!-- /Container-->
<?php
}
/*************************************************
Display the Header of the Tracking and the Column Header for the INformation
**************************************************/
function TrackingDisplayHead( $OrderNumber, $LineNumber ){
  ?>
  <input type="hidden" name="ordernumber" id = "ordernumber" value="<?php echo $OrderNumber?>"/>
  <input type="hidden" name="linenumber" id = "linenumber" value="<?php echo $LineNumber?>"/>
  <h3>Tracking Inquiry Display</h3><br>
  <label class="label-display flex">Order:</label>
  <input class="quantity" type="text" disabled value="<?php echo $OrderNumber?>"><br>
  <label class="label-display flex">Line Number:</label>
  <input class="quantity" type="text" disabled value="<?php echo $LineNumber?>"><br>
  <label class="label-display flex">Customer:</label>
  <input class="quantity"type="text" id="customer" disabled><br>
  <label class="label-display flex">Order Date:</label>
  <input class="quantity"type="text" id="orderdate" disabled><br>
  <label class="label-display flex">Quantity:</label>
  <input class="quantity"type="text" id="quantity" disabled><br>
  <label class="label-display flex">Item:</label>
  <input class="quantity"type="text" id="item" disabled><br>
  <div class="container row text-center">
       <div class="col-md-4">
         <div class="row">
             <div  id="machine" class="col-6">
                 <label class="displaycolumn">Machine</label><br>
              </div>
            <div id="operator" class="col-6">
                <label class="displaycolumn">Operator</label><br>
            </div>
         </div>
       </div>
       <div class="col-md-4">
         <div class="row">
            <div id="qty" class="col-6">
                <label class="displaycolumn">Quantity</label><br>
            </div>
            <div id="startdate" class="col-6">
                 <label class="displaycolumn">Sart Date/Time</label><br>
            </div>
          </div>
        </div>
     <div class="col-md-4">
        <div class="row">
           <div id="stopdate" class="col-6">
               <label class="displaycolumn">Stop Date/Time</label><br>
           </div>
           <div id="elapsedtime" class="col-6">
               <label class="displaycolumn">Elapsed Time</label><br>
           </div>
         </div>
       </div>
 </div>
  <label></label><br>
  <div class="footer">
           <!-- Copyright -->
            &copy; 2019 Inquiry Sysemt 1.0 <a id="user-nav" href="//www.minimaxinfo.com" target="_blank"> &amp; <bold>mini-MAX Information Systems, Inc.</bold></a>
           <!-- Copyright -->
      </footer>
  <script src="../js/inquirydisplay.js"></script>
</body>
</html>
 <?php
}
/******************************************************
Display all info using the Variable:
$BarCode, $OrderCode, $LineNumber
*******************************************************/
function TrackingDisplay($OrderNumber, $LineNumber) {
    Head();
    TrackingDisplayHead($OrderNumber, $LineNumber);

} //TrackingDisplay

/**************************************
Display the Tracking Information
***************************************/
function TrackingInformation ($OrderNumber, $LineNumber, $Machine, $Operator) {
   Head();
   ?>
   <div class="trackinginformation">
      <form name="trackinginformation"  action="inquiry.php" method="post" autocomplete="on">
        <input type="hidden" name="inquiry" value="TrackingInformation"/>
        <input type="hidden" name="ordernumber" id = "ordernumber" value="<?php echo $OrderNumber?>"/>
        <input type="hidden" name="linenumber" id = "linenumber" value="<?php echo $LineNumber?>"/>
        <h3>Tracking Information</h3><br>
        <label class="label-information flex">Order/Line Number:</label>
        <input class="quantity" type="text" disabled value="<?php echo $OrderNumber, " / ", $LineNumber?>"><br>
        <label class="label-information flex">Machine:</label>
        <input class="quantity"type="text" disabled value="<?php echo $Machine ?>"><br>
        <label class="label-information flex">Operator:</label>
        <input class="quantity" type="text" disabled value="<?php echo $Operator?>"><br>
        <label class="label-information flex">Customer:</label>
        <input class="quantity" type="text" id="input-customer" disabled><br>
        <label class="label-information flex">Order date:</label>
        <input class="quantity" type="text" id="input-orderdate" disabled><br>
        <div class="datecolumn">
            <label class="label-information flex">Order Qty:</label>
            <input class="quantity" type="text" id="input-orderqty" disabled>
        </div>
        <div class="datecolumn">
             <label class="label-information flex" for="input-ordercmpted" >Qty Completed:</label>
            <input class="quantity" type="text" id="input-ordercmpted" disabled>
        </div>
        <div class="datecolumn">
            <label class="label-information flex">Qty Needed:</label>
            <input class="quantity" type="text" id="input-orderneeded" disabled>
        </div>
        <br>
        <label class="label-information flex">Item:</label>
        <input class="quantity" type="text" id="input-item" disabled><br>
        <label class="label-information flex">Line Item Comments:</label>
        <input class="quantity" type="text"  id="icomments" size="30" disabled><br>
        <label class="label-information flex">Order Comments:</label>
        <input class="quantity" type="text"  id="ocomments" size="30" disabled><br>
        <div  class="button-tracking " id="button-main">
             <button id="submmit"  type="button" class="btn button-info button-next">Start <br> Production</button>
             <button               type="button" class="btn button-info button-next">Enter Qty <br> Produced</button>
             <button               type="submit" class="btn button-info button-next">Display <br> Tracking</button>
             <button               type="button" class="btn button-info button-next"><a id="pdftraveler" href="" target="_blank">Display <br> Traveler</a></button>
             <button id="printpdf" type="button" class="btn button-info button-next">Print <br>Traveler</button>
        </div>
    </form>
       
    <?php
    // tiBody();
   ?>

  </div>
  <div class="footer">
           <!-- Copyright -->
            &copy; 2019 Inquiry Sysemt 1.0 <a id="user-nav" href="//www.minimaxinfo.com" target="_blank"> &amp; <bold>mini-MAX Information Systems, Inc.</bold></a>
           <!-- Copyright -->
  </footer>
   <script src="../js/inquiryinformation.js"></script>
 </body>
 </html>
  <?php
}//TrackingInformation ()

/*******************************************************
Get this Variable  $BarCode, $Machine, $Operator from Operator to be use
********************************************************/
function TrackingInquiry( $BarCode, $Machine, $Operator){
  Head();
  ?>
  <form name="trackinginquiry"  action="inquiry.php" method="post" autocomplete="on">
        <input type="hidden" name="inquiry" value="TrackingInquiry"/>
        <input type="hidden" name="machine" id = "machine" value="<?php echo $Machine?>"/>
        <input type="hidden" name="operator" id = "operator" value="<?php echo $Operator?>"/>
        <div class="tracking">
          <h3>Tracking Inquiry</h3><br>
          <label class="label-inquiry" for="ordernumber">Order Number:</label>
          <input class="input-tracking" type="text" name= "ordernumber"  id="ordernumber" placeholder="Enter Order Number" autofocus><br>
          <label class="label-inquiry" for="linenumber">Line Number:</label>
          <input class="input-tracking" type="number" name = "linenumber" id="linenumber"  placeholder="Enter Line Number" required><br>
          <div class="button-tracking row">
             <div class ="col">
                <button type="submit" class="btn button-next">Next</button>
             </div>
              <div class ="col">
                <button type="reset" class="btn button-reset">Reset</button>
              </div>
          </div>
        </div>
  </form> 
  <div class="footer">
       <!-- Copyright -->
      &copy; 2019 Inquiry Sysemt 1.0 <a id="user-nav" href="//www.minimaxinfo.com" target="_blank"> &amp; <bold>mini-MAX Information Systems, Inc.</bold></a>
      <!-- Copyright -->
  </footer>

  <script src="../js/inquiry.js"></script>
</body>
</html>
<?php
}
function Tracking($UserName) {
  Head();
  ?>
  <form name="tracking"  action="inquiry.php" method="post" autocomplete="on">
        <input type="hidden" name="inquiry" value="Tracking"/>
        <div class="tracking">
          <h5 class="showuser">User: <?php echo $UserName?></h5><br>
          <h3>Tracking</h3><br>
          <label class="label-tracking" for="barcode">Scan Bar Code:</label>
          <input class="input-tracking" type="text" name= "barcode"  id="barcode" size = "15" placeholder="Bar Code" autofocus><br>
          <label class="label-tracking" for="machine">Machine:</label>
          <select name="machine" id="machine" required>
          </select><br> 
          <label class="label-tracking" for="operator">Operator:</label>
          <input class="input-tracking" type="text" name = "operator" id="operator" size ="15" placeholder="Operator" required><br>
          <div class="row button-tracking">
            <div class="col">
                <button type="submit" class="btn button-next">Next</button>
            </div>
            <div class="col">
              <button type="reset" class="btn button-reset">Reset</button>
            </div>
          </div>
        </div>
  </form>
  <div class="footer">
           <!-- Copyright -->
            &copy; 2019 Inquiry Sysemt 1.0 <a id="user-nav" href="//www.minimaxinfo.com" target="_blank"> &amp; <bold>mini-MAX Information Systems, Inc.</bold></a>
           <!-- Copyright -->
      </footer>
  <script src="../js/inquiry.js"></script>
</body>
</html>
  <?php
}
function InquiryControl() {
  ?>
  <div class="inquiry">
  <form  action="php/inquiry.php" method="post" autocomplete="on">
    <input type="hidden" name="formname" value="tracking"/>
    <select name="inquiry" >
        <option value="tracking">Tracking</option>
        <option value="tracking-inquiry">Tracking Inquiry</option>
        <option value="tracking-display">Tracking Inquiry Display</option>
    </select>
    <div class="row button-inquiry">
        <div class="col">
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
  </form>
</div>
  <?php
}

if (isset($_POST['inquiry'])) {
  switch($_POST['inquiry']){
    case 'Login': tracking($_POST['username']);
                  break;
    case 'Tracking': TrackingInquiry($_POST['barcode'], $_POST['machine'],$_POST['operator']);
                     break;
    case 'TrackingInquiry': if(isset($_POST['ordernumber']) and isset($_POST['linenumber'])){
                              $OrderNumber = $_POST['ordernumber'];
                              $LineNumber = $_POST['linenumber'];
                              $Machine = $_POST['machine'];
                              $Operator = $_POST['operator'];
                              TrackingInformation( $OrderNumber,$LineNumber, $Machine, $Operator);
                              //TrackingDisplay( $OrderNumber,$LineNumber);
                            }
                            break;
    case 'TrackingInformation':if(isset($_POST['ordernumber']) and isset($_POST['linenumber'])){
                              $OrderNumber = $_POST['ordernumber'];
                              $LineNumber = $_POST['linenumber'];
                              TrackingDisplay( $OrderNumber,$LineNumber);
                             }
                            break;
  }
}

?>
