<?php 

include('library/tcpdf.php');
include("connect.php");
session_start();
function fetch_schedule(){

  $show = '';
  include("connect.php");

  $id = $_GET['id'];
  $firstSql=mysqli_query($conn,"select * from semester where sem_id = '3' "); 
  $midRow = mysqli_fetch_array($firstSql); 

  $subjsql2=mysqli_query($conn,"select * FROM major where major_id = '$id' ");

  $srow=mysqli_fetch_array($subjsql2);

    $query=mysqli_query($conn,"select * from subject
     left join schedule on subject.subjects_id=schedule.subjects
     left join major on subject.subjects_id=major.major_id 
     left join courses on courses.program_id=subject.subjects_id
     left join instructor on instructor.instructor_id=schedule.instructor_id
     left join school_year on school_year.school_yr_id=schedule.school_yr_id 
     left join semester on semester.sem_id=subject.subjects_id
     where schedule.major_id = '".$srow['major_id']."' AND subject.sem_id='".$midRow['sem_id']."' ");

    while ($subjrow=mysqli_fetch_array($query)) {
          $show .='

            <tr>  
              <td align="center" style="font-family:Times New Roman">'.$subjrow['time_in']. " - " .$subjrow['time_out'].'</td>
              <td align="center" style="font-family:Times New Roman">'.$subjrow['course_no'].'</td>  
              <td align="center" style="font-family:Times New Roman">'.$subjrow['descriptive_title'].'</td>
              <td align="center" style="font-family:Times New Roman">'.$subjrow['room'].'</td>
              <td align="center" style="font-family:Times New Roman">'.$subjrow['fullname'].'</td>     
            </tr> 
            '; 
        }  


        $show .= '
      <table>
      <tr> 
        <td align="center" style="font-family:Times New Roman">*Schedule is to be resolved upon the unified availability of time for the enrolees.</td>
      </tr>
      <tr> 
        <td></td>
      </tr>
      <tr> 
        <td></td>
      </tr>
      </table>

      <table>
      <tr> 
        <td></td>
        <td style="font-family:Times New Roman"> Prepared by:</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

      </tr>
      <tr> 
        <td></td>
      </tr>
      <tr> 
        <td></td>
        <td width="30%"><b style="font-family:Times New Roman"><span>IMELDA N. BINAY-AN, Ph.D</span></b></td>
      </tr>
      <tr> 
      <td></td>
        <td width="27%" style="font-family:Times New Roman"><hr><span>Dean, Graduate School</span></td>
        <td></td>
      </tr>
      </table>
      <table>
      <tr> 
        <td></td>
      </tr>
      </table>
      <table>
      <tr> 
        <td></td>
      </tr>
      <tr> 
        <td align="center" style="font-family:Times New Roman"> Approved:</td>
      </tr>
      <tr> 
        <td></td>
      </tr>
      </table>
      <table>
      <tr> 
        <td width="60%"></td>
        <td  width="28%" ><b style="font-family:Times New Roman">EDERLINA M. SUMAIL, Ph.D</b></td>
      </tr>
      <tr>  
      <td width="55.5%"></td>
        <td align="center" width="27.8%"  style="font-family:Times New Roman"><hr><span>Campus Administrator</span></td>
        <td></td>
      </tr>
      </table>
  ';

   return $show;
  }
  if(isset($_POST['generate_pdf'])){  
    
    $id = $_GET['id'];

    class MYPDF extends TCPDF {

    public function Footer() {

        //Go to 1.5 cm from bottom
        $this -> SetY(- 15);

        $this -> SetFont('Arial','',8);
        // width = 0 means the cell is extended up to the right margin
        $this  ->Cell(0,10,'page '.$this ->PageNo()." / {pages}",0,0,'C');   

    }
  }

      $pdf = new MYPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $pdf->SetCreator(PDF_CREATOR);  
      //$pdf->setBarcode(date('Y-m-d H:i:s'));
      $pdf->SetTitle("Schedule");  
      $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $pdf->SetDefaultMonospacedFont('Bell MT');  
      $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $pdf->SetMargins('10', '10', '10', '10');  
      $pdf->setPrintHeader(false); 
      $pdf->setPrintFooter(false);  
      $pdf->SetAutoPageBreak(TRUE, 10);  
      $pdf->SetFont('helvetica', '', 11);  
      $pdf->AddPage();  

    $style = array(
      'position' => '',
      'align' => 'C',
      'stretch' => false,
      'fitwidth' => true,
      'cellfitalign' => '',
      'hpadding' => 'auto',
      'vpadding' => 'auto',
      'fgcolor' => array(0,0,0),
      'bgcolor' => false,
      'text' => true,
      'font' => 'helvetica',
      'fontsize' => 15,
      'stretchtext' => 4
    );
      $pdf->Image("../img/ispsc.png",43,19.5,0,20);

      $content = '';
      $content .= '

      <table style="font-size: 10px">
        <tr> 
        <td> </td>
        </tr>
        <tr> 
        <td> </td>
        </tr>
        <tr>
          <td align="center"><i>Republic of the Philippines</i></td>
        </tr>
        <tr>
          <td align="center"><b>ILOCOS SUR POLYTECHNIC STATE COLLEGE</b></td>
        </tr>
        <tr>
          <td align="center">Tagudin, Ilocos Sur</td>
        </tr>
        <tr> 
        <td> </td>
        </tr>
        <tr> 
        <td> </td>
        </tr>
        <tr>
          <td width="12%"> </td>
          <td>Tel .No.: (077)-652-2093<span style="color:white">*************************************</span>E-mail Address: ispsctagudin@yahoo.com</td>
        </tr>
        <tr>
        <td></td>
        </tr>
        <table>
        <tr> ';

        $query = mysqli_query($conn, "select * from school_year where status = 'Active' ");
        $syRow = mysqli_fetch_array($query);
        $semquer = mysqli_query($conn, "select * from semester where status = 'Active' ");
        $semRow = mysqli_fetch_array($semquer);

        $coSql=mysqli_query($conn,"select * from courses where program_id = '1' ");
        $coSql=mysqli_fetch_array($coSql);  

        $subjsql2=mysqli_query($conn,"select * from major where major_id = '$id' ");
        $srow=mysqli_fetch_array($subjsql2);       

        $query=mysqli_query($conn,"select * from subject
         left join schedule on subject.subjects_id=schedule.subjects
         left join major on subject.subjects_id=major.major_id 
         left join courses on courses.program_id=subject.subjects_id
         where schedule.major_id = '".$srow['major_id']."' AND subject.sem_id='".$semRow['sem_id']."' ");
        $subjrow=mysqli_fetch_array($query);

        $content .= '

        <td align="center"><b style="color: blue">GRADUATE SCHOOL</b></td>
        </tr>
        </table>
        <tr>
        <td></td>
        </tr>
        <tr>
        <td width="6%"></td>
        <td width="89.6%"><hr></td>
        </tr>
      </table>

      <table cellpadding="1">
        <tr>
          <th align="center" style="font-family:Times New Roman"><b>COURSE OFFERINGS</b></th>
        </tr>
        <tr>
          <th align="center" style="font-family:Times New Roman"><b>'.$semRow['semester']." , AY ".$syRow['sy'].'</b></th>
        </tr>
        <tr>
          <th></th>
        </tr>
      </table>

      <table cellpadding="1">
        <tr>
          <th align="center" style="font-family:Times New Roman"><b style="text-transform: uppercase">'.$coSql['program'].'</b></th>
        </tr>
        <tr>
          <th align="center" style="font-family:Times New Roman,"><b>'.$srow['major'].'</b></th>
        </tr>

        <tr>
          <th></th>
        </tr>
      </table>

      <table cellpadding="6" border="0.5" style="font-size: 10.6px">

        <tr>

          <th align="center" width="20%"><b>Time (Saturday)</b></th>
          <th align="center" width="13%"><b> Course No.</b></th>
          <th align="center" width="33%"><b>Descriptive Title</b></th>
          <th align="center" width="15%"><b>Room</b></th>
          <th align="center" width="20%"><b>Instructor</b></th>

        </tr>



      ';  

    $content .= fetch_schedule();

    $content .= '</table>';

    $pdf->writeHTML($content); 

    $pdf->SetY(30); 

    $content.='';
    $pdf->Output('Print Schedule.pdf');  
}
 ?>  