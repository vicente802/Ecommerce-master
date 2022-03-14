<?php 

include("connect.php");
session_start();
function fetch_schedule(){
include("connect.php");
	$show = '';
	

  $id = $_GET['id'];
  $firstSql=mysqli_query($conn,"select * from semester where status = 'Active' "); 
  $firstRow = mysqli_fetch_array($firstSql); 

  $yrSql = mysqli_query($conn, "select * from school_year where status = 'Active' ");
  $syRow = mysqli_fetch_array($yrSql);

  $subjsql2=mysqli_query($conn,"select * FROM major where major_id = '$id' ");

	$srow=mysqli_fetch_array($subjsql2);

  $unitsQl = mysqli_query($conn, "SELECT sum(units_lec) AS total_lec FROM schedule LEFT JOIN count_students ON schedule.schedule_id=count_students.schedule_id WHERE userid = '".$_SESSION['id']."' AND count_students.sem_id='".$firstRow['sem_id']."' AND count_students.sem_id='".$firstRow['sem_id']."'AND count_students.school_yr_id='".$syRow['school_yr_id']."'   ");
    
  $totalRow = mysqli_fetch_assoc($unitsQl);

  $unitsQl1 = mysqli_query($conn, "SELECT sum(units_lab) AS total_lab FROM schedule LEFT JOIN count_students ON schedule.schedule_id=count_students.schedule_id WHERE userid = '".$_SESSION['id']."' AND count_students.sem_id='".$firstRow['sem_id']."' AND count_students.sem_id='".$firstRow['sem_id']."'AND count_students.school_yr_id='".$syRow['school_yr_id']."' ");
  $totalRow1 = mysqli_fetch_assoc($unitsQl1);

  $feesQl = mysqli_query($conn, "SELECT sum(amount) AS total_fees FROM fees");
  $feeRow = mysqli_fetch_assoc($feesQl);
                                        
  $appSql=mysqli_query($conn, "select * from app_for_admission where userid='".$_SESSION['id']."' ");
  $appRow=mysqli_fetch_array($appSql);
  
  $ngata = $feeRow['total_fees'];

  $jammo = $totalRow["total_lec"];
  $jammo1 = $totalRow1["total_lab"];

  $hays = $jammo + $jammo1;
                                        
  $k = $hays * 200;

  $datoy = $k + $ngata;
                                     

  $query=mysqli_query($conn,"select * from count_students 
    left join schedule on count_students.schedule_id=schedule.schedule_id
    left join subject on subject.subjects_id=schedule.subjects
    left join instructor on instructor.instructor_id=schedule.instructor_id 
    where userid= '$id' AND subject.sem_id='".$firstRow['sem_id']."'  ");

    while ($subjrow=mysqli_fetch_array($query)) {
$show .='
          <tbody>
            <tr>  
              <td style="text-align:center; font-family:Times New Roman">'.$subjrow['course_no'].'</td>  
              <td style="font-family:Times New Roman">'.$subjrow['descriptive_title'].'</td>
              <td style="text-align:center;font-family:Times New Roman">'.$subjrow['units_lec'].'</td>
              <td style="text-align:center;font-family:Times New Roman">'.$subjrow['time_in'].'</td>
              <td style="text-align:center;font-family:Times New Roman">'.$subjrow['time_out'].'</td>
              <td style="text-align:center;font-family:Times New Roman">Sat</td>
              <td style="text-align:center;font-family:Times New Roman">'.$subjrow['room'].'</td>
            </tr> 
          </tbody>
            '; 
        }  
$show .= '
      <tfoot>
          <tr>
              <th colspan="2" style="text-align:right; border:none;"><b>Total Units:</b></th>
              <th style="text-align:center;"><b>'.$totalRow['total_lec'].'</b></th> 
          </tr>  
      </tfoot>
';

$show .= '
      <table>
      <tr> 
        <td></td>
      </tr>

      <tr> 
        <td></td>
      </tr>
      <tr> 
          <th align="right" width="16.5%"><b>Fees</b></th>
          <th align="right" width="26%"><b>Amount</b></th>
      </tr>
' ;

if ($appRow['type'] == 'New') {
  $feesQl = mysqli_query($conn, "SELECT sum(amount) AS total_fees FROM fees where status = 'new' ");
  $feeRow = mysqli_fetch_assoc($feesQl);

  $ngata = $feeRow['total_fees'];

  $jammo = $totalRow["total_lec"];
  $jammo1 = $totalRow1["total_lab"];

  $hays = $jammo + $jammo1;
                                        
  $k = $hays * 200;

  $datoy = $k + $ngata;
$show .='
    <tbody>
      <tr> 
        <td width="5.5%"></td>
        <td>Entrance Fee</td>
        <td width="6.5%"></td>
        <td width="24.5%">75.00</td>
        <td width="26.3%">Tuition(200/unit):</td>
        <td>'.number_format($k).'.00</td>
      </tr>
      <tr> 
        <td width="5.5%"></td>
        <td>Registration Fee</td>
        <td width="5.5%"></td>
        <td width="25.5%">100.00</td>
        <td width="26.5%">Comp Lab(300/subject):</td>
        <td>0.00</td>
      </tr>
      <tr> 
        <td width="5.5%"></td>
        <td>Medical/Dental</td>
        <td width="5.5%"></td>
        <td width="25.5%">100.00</td>
        <td width="26.5%">Science Lab(75/subject):</td>
        <td>0.00</td>
      </tr>
      <tr> 
        <td width="5.5%"></td>
        <td width="25.5%">Quality Assurance</td>
        <td width="6%"></td>
        <td width="25.5%">100.00</td>
        <td width="26.5%">Field Study</td>
        <td>0.00</td>
      </tr>
      <tr>  
        <td width="5.5%"></td>
        <td>Miscellaneous Fund</td>
        <td width="6%"></td>
        <td width="25.5%">100.00</td>
        <td width="26.5%">Student Training</td>
        <td>0.00</td>
      </tr> 
      <tr> 
        <td width="5.5%"></td> 
        <td>Student Dev Fund</td>
        <td width="6%"></td>
        <td width="25.5%">250.00</td>
        <td width="26.5%">NSTP</td>
        <td>0.00</td>
      </tr> 
      <tr> 
        <td width="5.5%"></td>
        <td>Internet Fee</td>
        <td width="6%"></td>
        <td width="25.5%">250.00</td>
        <td width="26.5%">Balance prev. Sem</td>
        <td>0.00</td>
      </tr>
      <tr> 
        <td width="5.5%"></td>
        <td>GSO</td>
        <td width="6%"></td>
        <td>100.00</td>
      </tr>
      <tr>  
        <td width="5.5%"></td>
        <td>Organ/Publication Fee</td>
        <td width="6%"></td>
        <td>100.00</td>
      </tr> 
      <tr>  
        <td width="5.5%"></td>
        <td>ID (New student)</td>
        <td width="6%"></td>
        <td>100.00</td>
      </tr> 
      <tr>  
        <td width="5.5%"></td>
        <td>Insurance Fee</td>
        <td width="6%"></td>
        <td>120.00</td>
      </tr> 
      <tr>  
        <td width="5.5%"></td>
        <td>Late Registration</td>
        <td width="6%"></td>
        <td>100.00</td>
      </tr> 
      <tr>  
        <td width="5.5%"></td>
        <td></td>
        <td width="4.5%"></td>
        <td><b>'.number_format($feeRow['total_fees']).'.00</b></td>
      </tr> 
      <tr>  
        <td></td>
      </tr>
      <tr>  
        <td width="27%"><b>TOTAL ASSESSMENT FEE: </b></td>
        <td width="8.5%"></td>
        <td width="20%"><b>'.number_format($datoy).'.00</b></td>
      </tr>  
      </table> 
    ';
}else if ($appRow['type'] == 'Old'){
  $feesQl = mysqli_query($conn, "SELECT sum(amount) AS total_fees_2 FROM fees where status = 'old' ");
  $feeRow = mysqli_fetch_assoc($feesQl);

  $ngata_1 = $feeRow['total_fees_2'];

  $jammo_1 = $totalRow["total_lec"];
  $jammo_2= $totalRow1["total_lab"];

  $hays_1 = $jammo_1 + $jammo_2;
                                        
  $k_1 = $hays_1 * 200;

  $datoy_1= $k_1 + $ngata_1;
$show .='
    <tbody>
      <tr> 
        <td width="5.5%"></td>
        <td>Registration</td>
        <td width="5.5%"></td>
        <td width="25.5%">100.00</td>
        <td width="26.3%">Tuition(200/unit):</td>
        <td>'.number_format($k).'.00</td>
      </tr>
      <tr> 
        <td width="5.5%"></td>
        <td>Medical/Dental</td>
        <td width="5.5%"></td>
        <td width="25.5%">100.00</td>
        <td width="26.5%">Comp Lab(300/subject):</td>
        <td>0.00</td>
      </tr>
      <tr> 
        <td width="5.5%"></td>
        <td>Library</td>
        <td width="5.5%"></td>
        <td width="25.5%">150.00</td>
        <td width="26.5%">Science Lab(75/subject):</td>
        <td>0.00</td>
      </tr>
      <tr> 
        <td width="5.5%"></td>
        <td width="25.5%">School Organ/Publication</td>
        <td width="6%"></td>
        <td width="25.5%">100.00</td>
        <td width="26.5%">Field Study</td>
        <td>0.00</td>
      </tr>
      <tr>  
        <td width="5.5%"></td>
        <td>Miscellaneous Fee</td>
        <td width="6%"></td>
        <td width="25.5%">100.00</td>
        <td width="26.5%">Student Training</td>
        <td>0.00</td>
      </tr> 
      <tr> 
        <td width="5.5%"></td> 
        <td>GSO</td>
        <td width="6%"></td>
        <td width="25.5%">100.00</td>
        <td width="26.5%">NSTP</td>
        <td>0.00</td>
      </tr> 
      <tr> 
        <td width="5.5%"></td>
        <td>ID Validation</td>
        <td width="6%"></td>
        <td width="25.5%">100.00</td>
        <td width="26.5%">Balance prev. Sem</td>
        <td>0.00</td>
      </tr>
      <tr> 
        <td width="5.5%"></td>
        <td>Insurance (1st Sem ONLY)</td>
        <td width="6%"></td>
        <td>120.00</td>
      </tr>
      <tr>  
        <td width="5.5%"></td>
        <td>Student Activity Fee</td>
        <td width="6%"></td>
        <td>250.00</td>
      </tr> 
      <tr>  
        <td width="5.5%"></td>
        <td>Internet Fee</td>
        <td width="6%"></td>
        <td>150.00</td>
      </tr> 
      <tr>  
        <td width="5.5%"></td>
        <td>Quality Assurance Fee</td>
        <td width="6%"></td>
        <td>100.00</td>
      </tr> 
      <tr>  
        <td width="5.5%"></td>
        <td></td>
        <td width="4.5%"></td>
        <td><b>'.number_format($feeRow['total_fees_2']).'.00</b></td>
      </tr> 
      <tr>  
        <td></td>
      </tr>
      <tr>  
        <td width="27%"><b>TOTAL ASSESSMENT FEE: </b></td>
        <td width="8.5%"></td>
        <td width="20%"><b>'.number_format($datoy_1).'.00</b></td>
      </tr>  
      </table>
  ';
}
   return $show;
	}

  if(isset($_POST['generate_shced'])) {  
  $id = $_GET['id'];

  require_once('library/tcpdf.php');
    
  class MYPDF extends TCPDF {

public function Footer() {
    // Position at 15 mm from bottom
    $this->SetY(-15);
    // Set font
    $this->SetFont('helvetica','R', 10);

  }
}
      $pdf = new MYPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $pdf->SetCreator(PDF_CREATOR);  
      $pdf->SetTitle("Assessment Form");  
      $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);  
      $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $pdf->SetMargins('10', '10', '10', '10');  
      $pdf->setPrintHeader(false); 
      $pdf->setPrintFooter(false);  
      $pdf->SetAutoPageBreak(false); 

      $pdf->SetFont('helvetica', '', 10);  
      $pdf->AddPage();  
      $pdf->Image("../img/ispsc.png",48,5.5,0,18);
      $pdf->Image("../img/ha.png",5,270.5,0,28);
      $query = mysqli_query($conn, "select * from school_year where status = 'Active' ");
      $syRow = mysqli_fetch_array($query);
      $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
      $semRow = mysqli_fetch_array($semquer);

      $coSql=mysqli_query($conn,"select * from courses where program_id = '1' ");
      $coSql=mysqli_fetch_array($coSql);  

      $sq=mysqli_query($conn,"select * from app_for_admission 
        left join courses on courses.program_id=app_for_admission.course
        left join major on major.major_id=app_for_admission.major
        left join schedule on schedule.schedule_id=app_for_admission.userid
        where userid='$id'");

      $srow=mysqli_fetch_array($sq);   

      $content = '';
      $content .= '

      <table>
        <tr>
          <td align="center" style="font-size: 8px"><b>ILOCOS SUR POLYTECHNIC STATE COLLEGE</b></td>
        </tr>
        <tr>
          <td align="center" style="font-size: 8px">South Cluster, Tagudin, Ilocos Sur</td>
        </tr>
        <tr> 
        <td align="center" style="font-size: 8px"><u>Schedule</u></td>
        </tr>
        </table>
        <table>
        <tr> 
        <td width="46.5%"></td>
        <td width="20.8%" style="font-size: 8px;"><b><span >'.$syRow['sy'].'</span></b></td>
        <td width="19.8%"></td>
        <td  style="font-size: 8px;"><span>'. date("F d, Y").'</span></td>
        </tr>
        </table>
        <table>
        <tr> 
        <th align="center" style="font-size: 8px"><b>'.$semRow['semester'].'</b></th>
        </tr>
        <tr>
        <td></td>
        </tr>
        <tr>
          <td align="center"><span style="font-family:Times New Roman"><i>Graduate Studies</i></span></td>
          <td></td>
        </tr>
        <tr>
        <td></td>
        </tr>
        </table>
        <table>
        <tr>
          <td width="3%"></td>
          <td width="40%" ><span style="text-transform:capitalize;font-weight: bold;">Name: '.$srow['lastname'].', '.$srow['firstname'].' '.$srow['middlename'].' </span></td>
          <td width="9.8%"></td>
          <td style="font-weight: bold;">Year:</td>
        </tr>
        <tr>
        <td width="3%"></td>
          <td width="40%" style="font-weight: bold;">Course: '.$coSql['program'].'</td>
          <td width="9.8%" style="font-weight: bold;"></td>
          <td width="40%" style="font-weight: bold;">Section: '.$srow['major'].'</td>
        </tr>
        <tr>
        <td width="3%"></td>
        <td  style="font-weight: bold;">Scholar: NONE</td>
        </tr>
        <tr>
        <td></td>
        </tr>
        <table>
        <tr> ';

        $content .= '

        <table cellpadding="6" border="0.5" >

        <tr>

          <th align="center" width="12.5%"><b>Course No.</b></th>
          <th align="center" width="32.7%"><b>Descriptive Title</b></th>
          <th align="center" width="7%"><b>Units</b></th>
          <th align="center" width="11%"><b>Time In</b></th>
          <th align="center" width="11%"><b>Time Out</b></th>
          <th align="center" width="10%"><b>Day</b></th>
          <th align="center" width="15%"><b>Room</b></th>
        
        </tr>
      ';  

    $content .= fetch_schedule();

    $content .= '</table>';

    $pdf->writeHTML($content); 
    $content.='';
    $pdf->Footer();
    $pdf->Output('Assessment Form.pdf');  
}
 ?>  