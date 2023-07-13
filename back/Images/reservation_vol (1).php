
<?php require_once("header.inc.php"); ?>
<body >
<center>
<h1 style="color:blue;"> reservation un vol </h1>
 <form action="reservation_billet.php" >
   <table>

<tr>
<td style="width:130px"><label for="cin"> <b>cin:</b></label></td>
<td style="width:130px"> <input class="input3" type="text" id="cin :" name="cin"></td>
<tr>
<td><label for="pd"><b>depart :</b></label></td>
<td><input class="input3" type="text" id="pd " name="pd"></td>
</tr>
<tr>
<td><label for="distination"><b>distination :</b></label></td>
<td><input class="input3" type="text" id="distination" name="distination"></td>
</tr>
</table>
  <input type="submit" value="envoyer">
  </center>
</form>
<?php require_once("footer.inc.php"); ?>
