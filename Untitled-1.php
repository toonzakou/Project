<script src="http://code.jquery.com/jquery-latest.js"></script>
 <select id="pagelist">
	  <option value="">กรุณาเลือก</option>
	  <option value="firstOption">First</option>
	  <option value="secondOption">Second</option>
 </select>

  <div id="firstOption" style="display:none">
  <form method="post" action="first.php">
  <h2 style="color:red">First Option</h2>
  1:<input type="text" name="box1" /><br />
  2:<input type="text" name="box2" /><br /> 
  <input type="submit" />
  </form>
  </div>

  <div id="secondOption" style="display:none">
  <form method="post" action="second.php">
  <h2 style="color:blue">Second Option</h2>
  1:<input type="text" name="box1" /><br />
  2:<input type="text" name="box2" /><br /> 
  <input type="submit" />
  </form>
  </div>
  <script language="javascript">
  $("#pagelist").change(function(){
	var viewID = $("#pagelist option:selected").val();
	$("#pagelist option").each(function(){
		var hideID = $(this).val();
		$("#"+hideID).hide();
	});
	$("#"+viewID).show();	
  });
</script>
