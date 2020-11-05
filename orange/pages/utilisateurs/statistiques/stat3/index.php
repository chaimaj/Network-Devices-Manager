
<?php include 'header.php'; ?>

<script type="text/javascript" src="../js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="../js/raphael-min.js"></script>
<script type="text/javascript" src="../js/morris.js"></script>
<?php 

 $nouveauTab=unserialize($_SESSION['tab']); // je récupère le tableau
 $graph= json_encode($nouveauTab); // codage json parce que le graphe n'accepte que ce format
  
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
  
  Morris.Bar({
  element: 'graph',
  data: obj,
  xkey: 'd',
  ykeys: ['v'],
  labels: ['Alarmes critiques'],
 
 
  });
  	
    }
   });
  
});
</script>


<?php include("saisie.php"); ?>
<h2> Nombre d'alarmes Critiques par node/par mois</h2>
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
<div style="height:270px;"></div>

<?php include 'footer.php'; ?>
