$(document).ready(function(){

  /*********************************************************************************
         Write in the DOM the Content of the Tracking
               FUNCTION TrackingInformation()().
  *********************************************************************************/
  function TrackingInformation(){
     nameTraveler = document.getElementById("ordernumber").value;
     document.getElementById("pdftraveler").href = "../pdf/"+nameTraveler+".pdf";
  } // \FUNCTION TrackingInformation()

   /***********************************************
       Print the PDF to the default Printer
   ************************************************/
  $('#printpdf').click(function () {
     var pdfName = document.getElementById("ordernumber").value+'.pdf';
     printJS({printable:'jctc/pdf/'+pdfName, type:'pdf', showModal:true})
  })// /('#printpdf').click(function())

  /************************************************************************
  Main Block
***********************************************************************/

TrackingInformation();
//Asign the physical URL of the specific pdf Traveler to the Button
var pdfNameLink = '../pdf/'+document.getElementById("ordernumber").value+'.pdf';
document.getElementById("pdftraveler").href = pdfNameLink;
}); // End ready
