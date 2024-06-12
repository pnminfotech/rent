   <head>
   <style>
   .th_police{
       text-align:center;
       color: black;
       border: 1px solid black !important;
   }
    .tr_police td{
       text-align:center;
       align-item:center;
       color: black;
       border: 1px solid black !important;
   }
   .table-bordered {
    border: 1px solid #ddd;
}
   </style>
   </head>
   <div id="view-modal-police" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  	<div class="modal-dialog modal-lg"> 
     <div class="modal-content modal-lg">  
   
        <div class="modal-header"> 
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button> 
            <h4 class="modal-title">
              Police Verification Form
           </h4> 
        </div> 
            
        <div class="modal-body" id="modalbodypolice">
        <div style="text-align: center;"><h4>प्रपत्र  - १</h4>
        <h2><b>भाडेकरू माहितीचा फॉर्म </b></h2>
        </div>             



<div style="float: right;margin-right: 40px;">
<label>फॉर्म क्रमांक : </label>
<div style="width: 100px;height: 100px;border: 1px solid black;padding: 25px;text-align: center;"> भाडेकरूचा फोटो  </div>
</div>    
<div style="    margin-left: 40px;">
<label>पोलीस स्टेशन : चाकण</label>
<div style="width: 100px;height: 100px;border: 1px solid black; padding: 25px;text-align: center;"> मालकाचा फोटो  </div>
</div> <br>
    <?php   
    include 'dbConfig.php';
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
$building_name=$_REQUEST['building_name'];
$id=$_REQUEST['b_id'];
$wing=$_REQUEST['wing'];
$flat_no=$_REQUEST['flat_no'];
$sql = "select a.*,b.owner_name,b.phone as owner_phone,b.age as owner_age,b.address as owner_address from flat_rental a,flat_details b where  a.flat_no='$flat_no' and a.building_name='$building_name' and a.wing='$wing' and a.flat_no=b.flat_no and a.building_name=b.building_name and a.wing=b.wing";
//$sql = "select a.*,b.building FROM building b,flat_details a where a.flat_no='$flat_no' and a.building_name='$building_name' and a.b_id=$id and a.wing='$wing' and a.building_name=b.building_name";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $output='';
    $output .= '
      <div class="table-responsive ">
         <table class="table" border="1"  cellspacing="0" cellpadding="10" >
                <thead>
                    <th class="th_police">अ.क्र.   </th>
                    <th class="th_police">विवरण </th>
                    <th class="th_police" colspan="3">माहिती </th>              
                </thead>
';
    while($row = $result->fetch_assoc()) {

    
            $output .= '
                <tr class="tr_police">
                      <td><label>१</label></td>
                     <td width="40%"><label>घर मालकाचे संपूर्ण नांव, वय व <br>(राज्यासह) मोबाइल न.सह <br>
                                            Name &amp; Address of owner With <br> Tel.No / Mobile No.:    </label></td>
                     <td width="60%" colspan="3"> नाव :' .$row["owner_name"].', मोबाइल : '.$row["owner_phone"].'<br>,वय :  '.$row["owner_age"].', पत्ता : '.$row["owner_address"].'</td>
                </tr>
                <tr class="tr_police">
                     <td rowspan="4"><label>२</label></td>
                     <td width="40%"><label>भाडेकरूचे संपूर्ण नाव,वय व पत्ता: <br>(राज्यासह )  <br> Name & Address Of Tenant</label></td>
                     <td width="70%" colspan="3"> नाव :'.$row["user_name"].',वय : '.$row["age"].',<br> पत्ता :'.$row["address"].'</td>

                </tr>

                <tr class="tr_police">
                  
                     <td width="40%"><label>मोबाइल न./ Mobile No.:</label></td>
                     <td width="70%" colspan="3">'.$row["phone"].' / '.$row["phone2"].'</td>
                </tr>
             <tr class="tr_police">
                  
                     <td width="40%"><label>पासपोर्ट क्रमांक/ Passport No.: </label></td>
                     <td width="70%" colspan="3"> </td>
                </tr>
                   <tr class="tr_police">
                    
                     <td width="40%"><label>पॅनकार्ड क्रमांक / Pan Card No.: <br> आधार कार्ड क्रमांक/ Adhar Card No.:</label></td>
                     <td width="70%" colspan="3"> <br>'.$row["adhar_no"].'</td>
                </tr>
                  <tr class="tr_police">
                      <td ><label>३</label></td>
                     <td width="40%"><label>भाडेकरू यापूर्वी राहत असलेल्या <br> ठिकाणचा पत्ता <br> Previous Address Of Tenant </label></td>
                     <td width="70%" colspan="3">'.$row["previous_address"].'</td>
                </tr>
                    <tr class="tr_police">
                      <td ><label>४</label></td>
                     <td width="40%"><label>भाडेकरूचा मूळ पत्ता <br> Permanent Address of Tenant<br></label></td>
                     <td width="70%" colspan="3">'.$row["address"].'</td>
                </tr>
                 <tr class="tr_police">
                      <td rowspan="2"><label>५</label></td>
                     <td rowspan="2" width="40%"><label>परिवारातील सदस्यांची  संख्या  <br> Number of family Member</label></td> 
                     <td > पुरुष <br> (Male)   </td><td>  स्रिया <br> (Female) </td><td> लहान मुले <br> (Chidrens) </td>
                      
                </tr>

                <tr class="tr_police">
                  
                    
                     <td > '.$row["male_members"].'   </td><td>   '.$row["female_members"].'</td><td> '.$row["child_members"].'</td>
                </tr>
                
           
             

                <tr class="tr_police">
                      <td ><label> ६ </label></td>
                     <td width="40%"><label>कामाचे स्वरूप  <br>Nature of Work </label></td>
                     <td width="70%" colspan="3">'.$row["natureofwork"].'</td>
                </tr>
                <tr class="tr_police">
                      <td ><label>७</label></td>
                     <td width="40%"><label>कार्यालयाचे संपूर्ण नाव,पत्ता,<br>
                              मोबाईल न.: <br> Office Address of Tenant <br> with Tel.No / Mobile No.:</label></td>
                     <td width="70%" colspan="3">'.$row["working_place"].' </td>
                </tr>
                <tr class="tr_police">
                    <td rowspan=2"><label>८</label></td>
                     <td width="40%" rowspan=2"><label>भाडेकरूस ओळखणाऱ्या दोन<br> व्यक्तींचे 
                     संपूर्ण नाव, पत्ता , वय<br> Reerences of the two persons<br> with  Name & Address of Tenant</label></td>
                     <td width="70%" colspan="3">'.$row["ref_person_one"].' </td>
                </tr>
                 <tr class="tr_police">
                   
                     <td width="70%" colspan="3">'.$row["ref_person_two"].' </td>
                </tr>
                <tr class="tr_police">
                     <td ><label>९</label></td>
                     <td width="40%"><label>एजन्टचे संपूर्ण नाव, पत्ता <br> मोबाईल न.:<br> Name of Agent & Address <br> with Tel.No. / Mobile No.:</label></td>
                     <td width="70%" colspan="3">'.$row["agent_details"].'</td>
                </tr>
                <tr class="tr_police">
                     <td ><label>१०</label></td>
                     <td width="40%"><label>करार केल्याचा दिनांक व <br>  कराराचा कालावधी  <br> Date of Period of agreement</label></td>
                     <td width="70%" colspan="3"></td>
                </tr>
            
                <tr class="tr_police">

                     <td ><label>११</label></td>
                     <td width="40%"><label>करार संपण्याचा  दिनांक <br> Date of Maturity of agreement</label></td>
                     <td width="70%" colspan="3"></td>
                </tr>
              
                ';
        }
        $output .= '</table>
                    </div>
<br><br><br><br><Br>
       <div style="float: right;margin-right: 40px;">
	     <span class="foot"> भाडेकरूची सही  <br>Signature Of Tenant </span>
        </div>  
       
        <div style="text-align:left;margin-left: 40px;width:100%;">
         <span  class="foot">घरमालकाची सही <br> Signature Of Owner</span>
        </div>

<br><br>
<p>घोषणा : वरील भरून दिलेली माहिती हि खरी असून त्यामध्ये काही खोटे आढळून आले तर मी कायदेशीर
कार्यवाहीस पात्र राहील.</p>
<p>Declaration : Whatever is stated above is true and if any information is found incorrect, I shall be liable for legal action</p>

<p>टीप  : सदर माहितीचा / फॉर्मचा उपयोग केवळ पोलिसांच्या रेकॉर्डसाठी असून अन्य कोणत्याही कारणांसाठी करता येणार नाही.</p>
<p>Note : The information / orms is exclusively for Police Record and can not be Used for other purpose.</p><br>

';
        echo $output;
                 
                            } else {
                                echo "0 results";
                            }                          
                            mysqli_close($conn);
                            ?>
        </div> 
        
       
                        
        <div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
               <input type="button" id="doPrint_police" value="print" class="btn btn-sm btn-info"/>
        </div> 
                        
    </div> 
  </div>
</div>   

 <script>
document.getElementById("doPrint_police").addEventListener("click", function() {
     var printContents = document.getElementById('modalbodypolice').innerHTML;
 		w=window.open();
        w.document.write(printContents);
        w.document.close(); // necessary for IE >= 10
        w.focus(); // necessary for IE >= 10*/
        w.print();
});
</script>