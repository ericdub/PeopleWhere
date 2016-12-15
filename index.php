<?php require_once "header.inc.php"; ?>
<script>
    var departments = <?php echo json_encode($departments); ?>;
</script>
<script src="main.js"></script>

</head>
<body>
<div id="container">
	<div id="topnav"> <a href="/">Intranet</a> &nbsp;|&nbsp; <a href="http://www.dbrl.org/" target="_blank">DBRL.org</a>
		<div id="dept-selector">
			<select name="department" id="department">
				<?php
						foreach ( $departments as $dept_id => $dept ):
								echo "<option value='{$dept_id}'>{$dept}</option>";
						endforeach;
				?>
			</select>
		</div>
		<form action="http://schedule.dbrl.org/login.asp" method="post" name="login" id="login" target="_blank">
			<a href="http://schedule.dbrl.org/" target="_blank">PeopleWhere</a>&trade; Sign-in &nbsp;
			<input type="hidden" value="signin" name="staffaction">
			<input type="text" name="email" value="Username" size="8" id="email">
			<input type="password" name="password" size="8">
			<input type="submit" value="Go">
		</form>
	</div>
</div>
<div id="header">
	<div id="nav">
		<ul id="list">
			<li class="active"><a href="#" rel="0">Today</a></li>
			<?php
						for ($i = 1; $i < 10 ; $i++ ):
								echo '<li><a href="#'.$i.'" rel="'.$i.'">' . date('l', strtotime($i.' days')) . '</a></li>';
						endfor;
					 ?>
		</ul>
		<button id="photos" title="Toggle staff photos off and on.">Photos</button>
	</div>
</div>
<div id="main" role="main">
	<div id="schedule"> <?php echo file_get_contents( SCHEDULES_PATH . '9_0.html'); ?> </div>
</div>

</div>
</body>
</html>
