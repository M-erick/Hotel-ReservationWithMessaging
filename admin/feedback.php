<head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        text-align: left;
        padding: 8px;
    }
    th {
        background-color: #007bff;
        color: white;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #e6f7ff;
    }
    .delete-link {
        color: red;
        text-decoration: none;
    }
    .delete-link:hover {
        text-decoration: underline;
    }
</style>

</head>
<script>
	function delFeedback(id)
	{
		if(confirm("You want to delete this Feedback ?"))
		{
		window.location.href='delete_feedback.php?id='+id;	
		}
	}
    function updateFeedback(id)
	{
		if(confirm("You want to reply this Feedback ?"))
		{
		window.location.href='update_feedback.php?id='+id;	
		}
	}
</script>
<table class="table table-striped table-hover">
	<h1>Feedback</h1><hr>
	<tr>
		<th>Sr No</th>
		<th>Name</th>
		<th>Email</th>
		<th>Mobile</th>
		<th>Message</th>
		<th>Response</th>

		<th>Delete</th>
        <th>Reply</th>
	</tr>
<?php 
$i=1;
$sql=mysqli_query($con,"select * from feedback");
while($res=mysqli_fetch_assoc($sql))
{
$id=$res['id'];	
$name=$res['name'];
$email=$res['email'];
$mobile	=$res['mobile'];
$message=$res['message'];
?>
<tr>
		<td><?php echo $i;$i++; ?></td>
		<td><?php echo $res['name']; ?></td>
		<td><?php echo $res['email']; ?></td>
		<td><?php echo $res['mobile']; ?></td>
		<td><?php echo $res['message']; ?></td>
		<td><?php echo $res['response']; ?></td>

		<td><a href="#"onclick="delFeedback('<?php echo $id; ?>')"><span class="glyphicon glyphicon-remove"style='color:red'></span></a></td>
        <td><a href="#"onclick="updateFeedback('<?php echo $id; ?>')">Reply</span></a></td>

	</tr>	
<?php 	
}
?>	
	
</table>