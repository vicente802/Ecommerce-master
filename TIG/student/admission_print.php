<?php 

include('library/tcpdf.php');

session_start();
function fetch_schedule(){

  $show = '';
  include("connect.php");

  $id = $_GET['id'];
  $firstSql=mysqli_query($conn,"SELECT * from semester where sem_id = '1' "); 
  $firstRow = mysqli_fetch_array($firstSql); 

  $subjsql2=mysqli_query($conn,"SELECT * FROM major where major_id = '$id' ");

  $srow=mysqli_fetch_array($subjsql2);

  $sq=mysqli_query($conn,"SELECT * from app_for_admission 
      left join courses on courses.program_id=app_for_admission.course
      left join major on major.major_id=app_for_admission.major
      left join schedule on schedule.schedule_id=app_for_admission.userid
      where userid='$id'");
  $row=mysqli_fetch_array($sq);
    $show .= '
      <table>
      <tr> 
        <td></td>
      </tr>
      <tr> 
        <td></td>
      </tr>
      <tr> 
        <td></td>
      </tr>
      <tr> 
        <td></td>
      </tr>
      <tr> 
        <td></td>
      </tr>
      <tr> 
        <td></td>
      </tr>
      <tr> 
        <td></td>
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
        <td>Personal Data</td>
        <td width="35%"></td>

        <td align="right">ID No: </td>  
        <td align="center"width="16%">'.$row['student_id'].'<hr></td>
      </tr>
      </table>

      <table>
      <tr> 
        <td width="33%"><span style="text-transform:capitalize">'.$row['lastname'].'</span><hr><span align="center">Last Name</span></td>
        <td width="1%"></td>
        <td width="33%" ><span style="text-transform:capitalize">'.$row['firstname'].'</span><hr><span align="center">First Name</span></td>
        <td width="1%" ></td>
        <td width="33%" ><span style="text-transform:capitalize">'.$row['middlename'].'</span><hr><span align="center">Middle Name</span></td>
      </tr>
      </table>

      <table>
      <tr> 
        <td></td>
      </tr>
      <tr>
        <td width="4%" >Age: </td>
        <td width="7%" align="center">'.$row['age'].'<hr></td>
        <td width="1%" ></td>
        <td width="4%" >Sex: </td>
        <td width="14%" align="center">'.$row['sex'].'<hr></td>
        <td width="1%" ></td>
        <td width="10%">Civil Status: </td>
        <td width="23%" align="center">'.$row['civil_status'].'<hr></td>
        <td width="1%" ></td>
        <td width="7.5%">Religion: </td>
        <td width="28.8%" align="center"><span style="text-transform:capitalize">'.$row['religion'].'</span><hr></td>
      </tr>
      <tr>
        <td width="11%">Date of birth: </td>
        <td width="30%" align="center">'.$row['date_of_birth'].'<hr></td>
        <td width="1%" ></td>
        <td width="11.7%">Place of birth: </td>
        <td width="47.5%" align="center" ><span style="text-transform:capitalize">'.$row['place_of_birth'].'</span><hr></td>
      </tr>
      <tr>
        <td width="17%">Permanent Address: </td>
        <td width="84.2%" align="center"><span style="text-transform:capitalize">'.$row['permanent_address'].'</span><hr></td>
      </tr>
      <tr>
        <td width="13.8%" >Name of Parent: </td>
        <td width="30%" align="center">'.$row['name_of_parent'].'<hr></td>
        <td width="1%" ></td>
        <td width="10%" >Occupation: </td>
        <td width="18%" align="center">'.$row['parent_occupation'].'<hr></td>
        <td width="1%" ></td>
        <td width="10%">Contact No: </td>
        <td width="17.5%" align="center">'.$row['parent_contact_no'].'<hr></td>
      </tr>
      <tr>
        <td width="16%" >Name of Guardian: </td>
        <td width="28%" align="center">'.$row['name_of_guardian'].'<hr></td>
        <td width="1%" ></td>
        <td width="10%" >Occupation: </td>
        <td width="18%" align="center">'.$row['guardian_occupation'].'<hr></td>
        <td width="1%" ></td>
        <td width="10%">Contact No: </td>
        <td width="17.5%" align="center">'.$row['guardian_contact_no'].'<hr></td>
      </tr>
      <tr>
        <td width="22.8%" >If married, name of spouse: </td>
        <td width="47%" align="center">'.$row['if_married_spouse_name'].'<hr></td>
        <td width="1%" ></td>
        <td width="10%" >Occupation: </td>
        <td width="20.7%" align="center">'.$row['spouse_occupation'].'<hr></td>
      </tr>
      <tr>
        <td width="26.3%" >School last attended/graduated: </td>
        <td width="55%" align="center">'.$row['school_graduated'].'<hr></td>
        <td width="1%" ></td>
        <td width="3%" >AY </td>
        <td width="87.3" align="center">'.$row['AY'].'<hr></td>
      </tr>
      <tr> 
        <td></td>
      </tr>
      <tr>
        <td width="12.6%" >Email Address: </td>
        <td width="89%" align="center">'.$row['email_address'].'<hr></td>
      </tr>
      <tr> 
        <td></td>
      </tr>
      <tr>
        <td width="17.6%" >Signature of Student: </td>
        <td width="50%" align="center"><span style="color: white;">asdasdasd</span><hr></td>
        <td width="1%" ></td>
        <td width="11.5%" >Date Applied: </td>
        <td width="21.5%" align="center">'.$row['dateapplied'].'<hr></td>
      </tr>
      <tr> 
        <td><hr width="577%"></td>
      </tr>
      <tr> 
        <td width="30%"></td>
        <td width="40%" align="center"><p>REQUIREMENTS FOR ADMISSION</p></td>
      </tr>
      <tr> 
        <td></td>
      </tr>
      </table>
      <table>

      <tr> 
        <td>For First Year Applicants</td>
        <td width="21%"></td>
        <td>For Transferee</td>
      </tr>
      <tr> 
        <td>____ Form 138</td>
        <td width="21%"></td>
        <td>____ Transfer Credentials</td>
      </tr>
      <tr> 
        <td>____ Form 137 -A</td>
        <td width="25.8%"></td>
        <td>____ Cert. of Good Moral Character</td>
      </tr>
      <tr> 
        <td>____ Cert. of Good Moral Character</td>
        <td width="25.8%"></td>
        <td>____ Certification of Grades</td>
      </tr>
      <tr> 
        <td>____ Birth Certificate (Issued by PSA)</td>
        <td width="25.8%"></td>
        <td>____ Hon. Dismissal</td>
      </tr>
      <tr> 
        <td>____ 2pcs 2 x 2 ID picture</td>
        <td width="21%"></td>
        <td>____ Birth Certificate (Issued by PSA)</td>
      </tr>
      <tr> 
        <td></td>
        <td width="21%"></td>
        <td>____ 2pcs 2 x 2 ID picture</td>
      </tr>   
      </table>
      <table>
      <tr> 
        <td></td>
      </tr>
      <tr> 
        <td></td>
      </tr>
      <tr> 
        <td></td>
      </tr>
      <tr> 
        <td></td>
      </tr>
      <tr> 
        <td></td>
      </tr>
      <tr> 
        <td></td>
      </tr>
      <tr> 
        <td></td>
      </tr>
      <tr> 
        <td></td>
      </tr>
      <tr> 
        <td></td>
      </tr>
      <tr> 
        <td></td>
      </tr>
      <tr> 
        <td></td>
      </tr>
      <tr> 
        <td></td>
      </tr>
      <tr> 
        <td></td>
      </tr>
      <tr> 
        <td></td>
      </tr>
      <tr> 
        <td></td>
      </tr>
      <tr> 
        <td></td>
      </tr>
        <tr>
          <td width="11%" >Recieved by: </td>
          <td width="38%" align="center"><span style="color: white;">asdasdasd</span><hr></td>
          <td width="1%" ></td>
          <td width="4.5%" >Date: </td>
          <td width="35%" align="center"><span style="color: white;">asdasdasd</span><hr></td>
        </tr>
      </table>
  ';

   return $show;
  }
  if(isset($_POST['print_admission'])){  
    
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
      $pdf->SetTitle("Admission Form");  
      $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $pdf->SetDefaultMonospacedFont('Bell MT');  
      $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $pdf->SetMargins('10', '10', '10', '10');  
      $pdf->setPrintHeader(false); 
      $pdf->setPrintFooter(false);  
      $pdf->SetAutoPageBreak(TRUE, 10);  
      $pdf->SetFont('helvetica', '', 10);  
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
      $pdf->Image("../img/head.PNG",7,5,0,36.9);
      $pdf->Image("../img/gu.PNG",9,209,0,61);
      $pdf->Image("../img/GU2.png",113,209,0,61);
      $content = '';
      $content .= '



      ';  

    $content .= fetch_schedule();


    $pdf->writeHTML($content); 

    $pdf->SetY(30); 

    $content.='';
    $pdf->Output('Print Admission Form.pdf');  
}
 ?>  