<?php 

$link=mysqli_connect('localhost','root','root');
$sql="SHOW DATABASES";
$res=mysqli_query($link,$sql);

?>

<!-- Display Database Name  -->

<?php echo 'Database Name:' ?>

<select id='Database' name='Database'>
<?php
	while($row=mysqli_fetch_array($res))
	{ ?>
		<option value="<?php echo $row['Database']; ?>"><?php echo $row['Database']?></option>
	<?php	
	}
?>
</select>

<?php echo '<br/>'; ?>

<!-- Display Table Name  -->

<?php echo 'Table Name:' ?>

<select id='Table'><option value="">Select</option></select> 

<?php echo '<br/>'; ?>

<!--Display Fields Name-->
<!-- <php
	$sql2 ="SELECT * FROM demo.`wp_comments`";
	$res2=mysqli_query($link,$sql2);
	//echo $sql2; exit;
	echo 'Columns Name:' ;
	while($col=mysqli_fetch_array($res2))
	{
		echo '<table><tr>';
		echo '<td>'.$col[0].'</td>';
		echo '<td>'.$col[2].'</td>';
		echo '</tr></table>';		
	}
?>
 -->
<br/>
<div class="row">
	<div class="col-md-12">
		<div class="col-md-3">
			<div class="Column">
				<select id="col_one" multiple="multiple">
					<option value=""></option>
				</select>
			</div>
		</div>
		<div class="col-md-3">
			<input type="button" id="left" value="<" /><br/>
			<input type="button" id="right" value=">" /><br/>
			<input type="button" id="leftall" value="<<" /><br/>
			<input type="button" id="rightall" value=">>" /><br/>
		</div>
		<div class="col-md-3">
			<div class="Column_right">
				<select id="col_two" multiple="multiple">
					<!-- <option value=""></option> -->
				</select>
			</div>
		</div>	
	</div>
</div>


<p id="records_display"></p>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="jquery-1.11.1.min.js"></script>

<script>

$("#Database").change(function () {
    var dbname = $('#Database option:selected').val();
    //data = {'action':'tabledata','dbname':dbname};
    $.ajax({
		type: 'post',
		url: 'fetch.php',
		data: {'action':'tabledata','dbname':dbname},
		success: function (response) {
		   $("#Table").html(response);
		}
	});
});

$("#Table").change(function(){
	var dbname= $('#Database option:selected').val();
	var tbname= $("#Table option:selected").val();
	//data={'action':'columndata','dbname':dbname,'tbname':tbname};
	$.ajax({
		type:'post',
		url:'fetch.php',
		data:{'action':'columndata','dbname':dbname,'tbname':tbname},
		success: function (response) {
			$(".Column #col_one").html(response);
		}
	});
});

// $('#right').change(function(){
// 	var dbname=$('#Database option:selected').val();
// 	var tbname=$('#Table option:selected').val();
// 	var recname=$('#right option:selected').val();
// 	$.ajax({
// 		type:'post',
// 		url:'fetch.php',
// 		data:{'action':'recorddata','dbname':dbname,'tbname':tbname,'recname':recname,'register_name':register_name,'register_add':register_add},
// 		success:function(response) {
// 			$("#records_display").html(response);
// 		}
// 	})
// })

</script>

<script>
(function () {
    $('#right').click(function (e) {
        var selectedOpts = $('#col_one option:selected');
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }
        $('#col_two').append($(selectedOpts).clone());

        var dbname=$('#Database option:selected').val();
		var tbname=$('#Table option:selected').val();
		var recname = [];
		$("#col_two option").each(function()
		{		
			recname.push(this.value);
		});

		$.ajax({
			type:'post',
			url:'fetch.php',
			data:{'action':'recorddata','dbname':dbname,'tbname':tbname,'recname':recname},
			success:function(response) {
				$("#records_display").html(response);
			}
		})

        $(selectedOpts).remove();
        e.preventDefault();
    });

    $('#rightall').click(function (e) {
        var selectedOpts = $('#col_one option');
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }
        $('#col_two').append($(selectedOpts).clone());

        var dbname=$('#Database option:selected').val();
		var tbname=$('#Table option:selected').val();
		var recname = [];
		$("#col_two option").each(function()
		{		
		    recname.push(this.value);
		});

		//console.log(recname);
		$.ajax({
			type:'post',
			url:'fetch.php',
			data:{'action':'recorddata','dbname':dbname,'tbname':tbname,'recname':recname},
			success:function(response) {
				$("#records_display").html(response);
			}
		})

        $(selectedOpts).remove();
        e.preventDefault();
    });

    $('#left').click(function (e) {
        var selectedOpts = $('#col_two option:selected');
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }
        $('#col_one').append($(selectedOpts).clone());
        var dbname=$('#Database option:selected').val();
		var tbname=$('#Table option:selected').val();
		var recname = [];

		$("#col_two option").each(function()
		{		
		    recname.push(this.value);
		});
		
		$.ajax({
			type:'post',
			url:'fetch.php',
			data:{'action':'recorddata','dbname':dbname,'tbname':tbname,'recname':recname},
			success:function(response) {
				$("#records_display").html(response);
				//$("#records_display").remove();
			}
		})
        $(selectedOpts).remove();
        $("#records_display").remove();
        e.preventDefault();
    });

    $('#leftall').click(function (e) {
        var selectedOpts = $('#col_two option');
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }
        $('#col_one').append($(selectedOpts).clone());
        var dbname=$('#Database option:selected').val();
		var tbname=$('#Table option:selected').val();
		var recname = [];
		$("#col_two option").each(function()
		{		
		    recname.push(this.value);
		});

		$.ajax({
			type:'post',
			url:'fetch.php',
			data:{'action':'recorddata','dbname':dbname,'tbname':tbname,'recname':recname},
			success:function(response) {
				$("#records_display").remove();
			}
		})
        $(selectedOpts).remove();
        e.preventDefault();
    });
}(jQuery));

$("p").on({
    mouseenter: function(){
        $(this).css("background-color", "lightgray");
    }, 
    mouseleave: function(){
        $(this).css("background-color", "lightblue");
    }, 
    click: function(){
        $(this).css("background-color", "yellow");
    } 
});

</script>