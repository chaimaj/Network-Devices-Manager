<?php include 'header.php'; ?>

<script type="text/javascript" src="../js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="../js/raphael-min.js"></script>
<script type="text/javascript" src="../js/morris.js"></script>

 <?php 

 $nouveauTab=unserialize($_SESSION['tab']);
 $graph= json_encode($nouveauTab);
  
?>  
<script type="text/javascript">
$(document).ready(function(){
   $.ajax({
    url: 'graph.php',  
    success: function(data) {
    var $graph = '<?php echo $graph; ?>';
	console.log($graph);
	var obj=$.parseJSON($graph);
	console.log(obj);
  
  Morris.Line({
  element: 'graph',
  data: obj,
  xkey: 'd',
  ykeys: ['ne'],
  labels: ['Nombre d\'alarmes'],
  lineColors: ['#0000FF'],
  lineWidth: 2,
 
  });
  	
    }
   });
  
});

</script>


</head>
<body>
<?php include("saisie.php"); ?>
<h2> Nombre d'alarmes par NE/par mois</h2>
<style>
#graph{
width:950px;
height:200px;
float:left;
padding:10px;
border:solid 1px #999;
}

</style>
<div id="graph" class="graph"></div>

<?php include 'footer.php'; ?>