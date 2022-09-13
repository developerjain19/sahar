<?php

include "../db/db_connect.php";
$output = ' ';
$select_category = $conn->query("SELECT * FROM `package_summary`  ");
$sno = 1;

$output .= '
            <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

          
      <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
      <script src="js/tabletoCSV.js" type="text/javascript" charset="utf-8"></script>

          <table id="select_company_category" class="table table-bordered table-hover">
          <thead>
            <tr>
                <th>SNO.</th>
                <th>Type</th>
                <th>Points</th>
                <th>Action</th>
            
                
            </tr>
          </thead>
          <tfoot>

            <tr>
                <th>SNO.</th>
               <th>Type</th>
                <th>Points</th>
                 <th>Action</th>
              
                
            </tr>
          </tfoot>
          <tbody>
     ';
while ($select_category_row = $select_category->fetch_assoc()) {
	 
	$output .= '     <tr>
                                <td> ' . $sno . ' </td>
                                  <td>' .$select_category_row["type"]. '</td>
                                <td>' . substr($select_category_row["points"],0,300) . '</td>
                                
                                   <td><a href="package_summary_edit.php?id='.$select_category_row["id"].'" class="btn btn-primary">Edit</td>
                                
                                <td><a href="ajax/package_summary-del.php?id='.$select_category_row["id"].'" class="btn btn-danger">Delete</td>
                            </tr>
                   ';
	$sno++;
}

$output .= '
          </tbody>
        </table>

          ';

echo $output;
?>

<script>
  $(function () {

    $('#select_company_category').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>

<script>
        $(function(){
            $("#export").click(function(){
                $("#select_company_category").tableToCSV();
            });
        });
        function printData()
{

}
function printTable() 
{
   var divToPrint=document.getElementById("select_company_category");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
function defult_image(company_logo_table) {
    $('#'+company_logo_table).attr('src', 'images/default-img.gif');
    
}
    </script>