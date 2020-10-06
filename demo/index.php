<?php 
include('header.php');
include_once("db_connect.php");
$sql = "SELECT ratelimit.id, ratelimit.email, ratelimit.hostname, ratelimit.status, ratelimit.comment, ratelimit.date, sunucular.ip FROM ratelimit LEFT JOIN sunucular ON sunucular.hostname = ratelimit.hostname ORDER BY ratelimit.date DESC";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
?>
<title>Netdirekt RateLimits </title>
<?php include('container.php');?>

<div class="container">
	<h2>Netdirekt</h2>
	
	<table class="table table-striped table-bordered">              
	<thead>
	<tr>
                                        <th>Tarih</th>
                                        <th>HostName</th>
                                        <th>Mail adresi</th>
                                        <th>Status</th>
                                        <th>Log Kaydı</th>
	</tr>
	</thead>              
	<tbody>           
	<?php
	while( $data = mysqli_fetch_assoc($resultset) ) { 
	if ($data["status"] == "reviewed") {
	?>
	<tr>
	<td><?php echo $data["date"]; ?></td>
	<td><?php echo $data["hostname"]; ?></td>
	<td><?php echo $data["email"]; ?></td>
	<td><?php echo $data["status"]; ?></td>
	<td><button data-toggle="modal" data-target="#emp-modal<?php echo $data["id"]; ?>" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-eye-open"></i> View</button></td>
	</tr>
<div class="modal fade" id="emp-modal<?php echo $data["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="emp-modal<?php echo $data["id"]; ?>" aria-hidden="true" style="display: none;">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">*</button>
             <h4 class="modal-title">
             <i class="glyphicon glyphicon-user"></i> Email Log Kaydı
             </h4>
         </div>
         <div class="modal-body">
                <div class="form-group">
                    <label>Exim Log</label>
		    <textarea class="form-control" id="exim-log" rows="5"><?php echo $data["comment"]; ?></textarea>
                </div>
         </div>
       <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
      </div>
   </div>
</div>
	<?php
    	 }
	}
	?>
	</tbody>
	</table>
	</div>


<?php include('footer.php');?>
