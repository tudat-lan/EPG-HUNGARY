<?php
ob_start("ob_gzhandler");
session_start();
define('BNBTPHP',1);
include("include/config.forum.php");
include("include/functions.forum.php");
loginolva();
if($szint < 5) {
header('Location: index.php');
exit();
}
?>
<style>
.forum_stuff{height:12px;margin-left:4px}
.forum_stuff_mod{color:#E7E7E7;margin-right:4px;text-align:right}
.forum_pager{color:#E7E7E7;float:left;font-weight:700;margin-left:2px;width:442px}
a {font-size: 12px;font-weight: bold;}
.hr_stuff{background:url(styles/default/hr.gif);height:8px;margin:5px auto;width:871px}
.hsz_owncomments{margin:0 auto;width:580px}
.hsz_felso_owncomments{background:url(styles/default/hsz_line_bg.gif);height:21px;padding:10px 0 0 10px}
.hsz_felso_txt_owncomments{float:left;width:360px}
.hsz_felso_date_owncomments{float:right;margin-right:7px;text-align:right}
.hsz_comment{line-height:1.5;margin:5px 0 0 10px;padding-bottom:10px}
.hsz_bal{float:left;margin-left:3px;width:168px}
.hsz_jobb{float:left;width:707px}
.hsz_avatar{background:#717171;padding:4px}
.hsz_avatar_also{background:url(styles/default/avatar_alj.png);height:24px;margin-top:1px;width:168px}
.hsz_jobb_felso_ico{background:url(styles/default/hsz_line.gif);float:left;height:31px;margin-left:10px;width:33px}
.hsz_jobb_felso{background:url(styles/default/hsz_line_bg.gif);height:22px;margin-left:15px;width:735;padding:9px 0 0 10px}
.hsz_jobb_felso_txt{float:left;margin-top:2px;font-size: 12px;font-weight: bold;width:350px}
.warn_comm{margin-top:-2px;}
.hsz_jobb_felso_date{float:right;margin:2px 7px 0 0;font-size: 12px;font-weight: bold;text-align:right}
.hsz_jobb_felso_thumbs{float:right;margin-right:8px}
.hsz_voted{background-color:#616161;border:1px solid #828282;left:-100px;padding:5px;position:absolute;text-align:center;top:30px;width:130px}
.hsz_vote_minusz{color:#AF2B2B}
.hsz_vote_plusz{color:#2BAF31}
.hsz_jobb_comment{line-height:1.5;margin:10px 0 0 15px;min-height:100px;padding-bottom:20px;word-wrap:break-word;}
.hsz_jobb_edit_last{font-style:italic;margin-left:15px}
.hsz_jobb_edit{background:url(styles/default/avat_line.gif) no-repeat;font-style:italic;margin-left:15px;padding-top:3px}
.forum_newtopic{color:#E7E7E7;float:rightt;font-weight:700;text-align:right;width:900px}
</style>
<?
page_begin();
section_begin('Fórum',1);
?>
<div align="left"><a href="forum.php">Fórum</a><a href="forumbankeres.php"> > Keresés</a></div>
<?
section_end();
section_begin('Keresés a fórumban', 1);
?>
<center>
<form action="forumbankeres.php" method="POST">
<input type="hidden" name="felkeres" value="igen" />
	<input type=hidden name=action value=search>
		<table id="keres_keresese">
			<tr>
				<td align="right" style="vertical-align:middle;padding-right:10px;"><p style="color:#d3e8b4"><b>Kifejezés:</b></p></td>
				<td style="vertical-align:middle;width:300px;">
					<input type="text"  placeholder="Keresés" class="beviteliMezo" name="mire" size="30" value="">
				</td>
				<td align="left"  style="vertical-align:middle;padding-left:10px;"><input type="image"  src="gombok/mehot.png" /></td>
			</tr>
		</table>
		<div class="teljes_oldalas"><p style="color:#d3e8b4">
		<input type="radio" value="hsz" name="fkerget" CHECKED /><strong>Hozzászólások között</font>
		<input type="radio" value="topic" name="fkerget" onclick="$('#sec2').show();"/> Témák között 
		<input type="radio" value="user" name="fkerget" /> Felhasználónévre</strong></p></div>
</form></center>
<?
section_end();
if ($_POST["felkeres"] == "igen") {
$answer = $_POST['fkerget']; 
$kejelgeses = $_POST['mire'];
if ($answer == "hsz") {
$msql="SELECT * FROM xbt_users WHERE  uid=$uid";
$asd = mysql_query($msql) or die(mysql_error());
$xbt_users=mysql_fetch_assoc($asd);
$res = mysql_query("SELECT COUNT(*) FROM forum_hsz WHERE uzenet LIKE '%$kejelgeses%'");
$arr = mysql_fetch_row($res);
$talalat = 0 + $arr[0];
if($talalat == 0) {
section_begin("Találatok", 1);
		?><center>Nem található hozzászólás.</center><?
		section_end();
}
else
{
if($szint < 8){
?>
</font></div></div>	
<?
section_end();
section_begin("Találatok és száma", 1);

		while ($data = mysql_fetch_array($queryt)){		
$data['uid'] = $xbt_users['uid'];
$data['name'] = $xbt_users['name'];
			$settings    = explode('|', $xbt_users['settings']);	
			$user_avatar = $settings[1] == NULL || empty($settings[1]) || $settings[1] == ' ' ? "themes/$theme/avatar.jpg" : $settings[1];
			?>	
			<br>	
			<table width="100%"><td>	
			<div class="hsz_block" >
					<div class="hsz_bal">
					<div class="hsz_avatar">
					  <img src="<? echo htmlspecialchars($user_avatar);?>" border="0" style="width:160px;height:auto" alt="" />
					</div>
					<div class="hsz_avatar_also"></div>
				</div>			
					<div class="hsz_jobb_all">
					<div class="hsz_jobb">
						<div class="hsz_jobb_felso_ico"></div>
						<div class="hsz_jobb_felso">
							<div class="hsz_jobb_felso_txt"> 
						<a href="userdetails.php?uid=<? echo htmlspecialchars($data['uid']);?>"><? echo htmlspecialchars($data['name']);?></a> 
						</div>
							<div class="hsz_jobb_felso_date">
						<?
							 if ($data['valasz_erre'] != 0)
							 {
								$query_data = mysql_fetch_array(mysql_query("SELECT id, name, ekkor FROM forum_hsz INNER JOIN xbt_users ON xbt_users.uid=forum_hsz.uid WHERE id=".$data['valasz_erre']));
								$to = $query_data['name'];
								$ekkor = explode(":",$query_data['ekkor']);
								$ekkor = $ekkor[0].':'.$ekkor[1];
								echo "(Válasz $to $ekkor-kor írt üzenetére)";
							 }								
							?><a href="forum_topik.php?id=<? echo $data["id"]?>"><? echo $data["topik"]?></a>
							 | <? echo htmlspecialchars($data['ekkor']);						
						?>		
				</div>
						</div>
							<div class="hsz_jobb_comment">	
<?php 
							$adat=str_split($data[uzenet], 15000);							
							$megjelenites = "";				
							foreach ($adat as $adatok)	
				{
$megjelenites = bb2html($adatok, 0);
echo bb2html($adatok, 0);
}
									if ($data["ekkor"] < $data["modositva"])
									{
										$modify_data = mysql_query("SELECT uid,name FROM xbt_users WHERE uid = '".$data["modositotta"]."'") or mysql_error();
										$modify_data = mysql_fetch_array($modify_data);
										$date = explode(":", $data["modositva"]);
										$date = $date[0].':'.$date[1];					
							   ?>		    
								<br><small>Szerkesztve <a href="userdetails.php?uid=<? echo $data["modositotta"]?>"><? echo $modify_data["name"]?></a>  által @ <?php echo $date?></small>
								<?php
									}	
?>
</div>
			<div style="clear:both;"></div>
			</div>
			<div style="clear:both;"></div>
			</div>		
			</td></table>
		<img border="0" width="100%" src="hr.gif" alt="">	
<?
		}
section_end();	
}	
if($szint >= 8){
section_begin("", 1);
?>
<div class='forum_stuff'><div class='forum_pager'><font size='2px'>Oldalak: 
<center>
<?php
    print '<a href="?page=0">Első</a>&nbsp;';
	print ' |  &nbsp;&nbsp;<a href="?page='.($page - 1).'"> Előző</a>&nbsp;';
	print ' | &nbsp;'.$lepteto.'   &nbsp;| ';
	print '&nbsp;<a href="?page='.($page + 1).'">Következő</a>&nbsp;';
	print '&nbsp;&nbsp; | &nbsp;<a href="?page='.($oldalszam-1).'">Utolsó</a>';
?>
</center>
</font></div></div>	
<?
section_end();
section_begin("Találatok", 1);

$queryt = mysql_query("SELECT * FROM forum_hsz INNER JOIN forumtopik ON forumtopik.id=forum_hsz.topik
WHERE uzenet LIKE '%$kejelgeses%' ORDER BY `ekkor` DESC") or die(mysql_error());	
		while ($data = mysql_fetch_array($queryt)){		
$data['uid'] = $xbt_users['uid'];
$data['name'] = $xbt_users['name'];
			$settings    = explode('|', $xbt_users['settings']);	
			$user_avatar = $settings[1] == NULL || empty($settings[1]) || $settings[1] == ' ' ? "themes/$theme/avatar.jpg" : $settings[1];
			?>	
			<br>	
			<table width="100%"><td>	
			<div class="hsz_block" >
					<div class="hsz_bal">
					<div class="hsz_avatar">
					  <img src="<? echo htmlspecialchars($user_avatar);?>" border="0" style="width:160px;height:auto" alt="" />
					</div>
					<div class="hsz_avatar_also"></div>
				</div>			
					<div class="hsz_jobb_all">
					<div class="hsz_jobb">
						<div class="hsz_jobb_felso_ico"></div>
						<div class="hsz_jobb_felso">
							<div class="hsz_jobb_felso_txt"> 
						<a href="userdetails.php?uid=<? echo htmlspecialchars($data['uid']);?>"><? echo htmlspecialchars($data['name']);?></a> 
						</div>
							<div class="hsz_jobb_felso_date">
						<?
							 if ($data['valasz_erre'] != 0)
							 {
								$query_data = mysql_fetch_array(mysql_query("SELECT id, name, ekkor FROM forum_hsz INNER JOIN xbt_users ON xbt_users.uid=forum_hsz.uid WHERE id=".$data['valasz_erre']));
								$to = $query_data['name'];
								$ekkor = explode(":",$query_data['ekkor']);
								$ekkor = $ekkor[0].':'.$ekkor[1];
								echo "(Válasz $to $ekkor-kor írt üzenetére)";
							 }						
?><a href="forum_topik.php?id=<? echo $data["id"]?>"><? echo $data["topik"]?></a> | <? echo htmlspecialchars($data['ekkor']);						
						?>		
				</div>
						</div>
							<div class="hsz_jobb_comment">	
<?php 
							$adat=str_split($data[uzenet], 15000);							
							$megjelenites = "";				
							foreach ($adat as $adatok)	
				{
$megjelenites = bb2html($adatok, 0);
echo bb2html($adatok, 0);
}
									if ($data["ekkor"] < $data["modositva"])
									{
										$modify_data = mysql_query("SELECT uid,name FROM xbt_users WHERE uid = '".$data["modositotta"]."'") or mysql_error();
										$modify_data = mysql_fetch_array($modify_data);
										$datere = explode(":", $data["modositva"]);
										$datere = $datere[0].':'.$datere[1];					
							   ?>		    
								<br><small>Szerkesztve <a href="userdetails.php?uid=<? echo $data["modositotta"]?>"><? echo $modify_data["name"]?></a>  által @ <?php echo $datere?></small>
								<?php
									}	
?>
</div>
			<div style="clear:both;"></div>
			</div>
			<div style="clear:both;"></div>
			</div>		
			</td></table>
		<img border="0" width="100%" src="hr.gif" alt="">	
<?
		}
section_end();	
}	
}
}
if ($answer == "topic") {
$res22 = mysql_query("SELECT COUNT(*) FROM forumtopik WHERE topik LIKE '%$kejelgeses%'");
$arr22 = mysql_fetch_row($res22);
$talalat22 = 0 + $arr22[0];
if($talalat22 == 0) {
section_begin("Találatok", 1);
		?><center>Nem található téma.</center><?
		section_end();
}
else
{
if($szint < 8){
section_begin("Találatok", 1);

$queryvv = mysql_query("SELECT * FROM forumtopik WHERE tema NOT IN (3031986,4) AND topik LIKE '%$kejelgeses%' ORDER BY `id` DESC")or die(mysql_error()); 	
		while ($row = mysql_fetch_array($queryvv)){
			if ($row["zarva"] == "igen")
  $kep = "<center><img src=\"kepek/forum_zarva.png\" border=\"0\" alt=\"Z\" /></center>";
else
  $kep = "<center><img src=\"kepek/forum_nyitva_sz.png\" border=\"0\" alt=\"NY\" /></center>";
$msql="SELECT * FROM xbt_users WHERE  uid=$uid";
$asd = mysql_query($msql) or die(mysql_error());
$xbt_users=mysql_fetch_assoc($asd);
$row['letrehozta'] = $xbt_users['uid'];
$row['name'] = $xbt_users['name'];
echo"
<table border=\"1\" style=\"border:1px solid #CCCCCC;margin-top:7px;margin-bottom:5px;margin-left:3px\" width=\"100%\">
  <tr>
    <td align=\"center\" class=\"tabla_fejlec3\"><font color='white'></font></td>
    <td align=\"center\" class=\"tabla_fejlec4\"><font color='white'></font></td>
	<td align=\"center\" class=\"tabla_fejlec5\"><font color='white'></font></td>
    <td align=\"center\" class=\"tabla_fejlec6\"><font color='white'></font></td>
	<td align=\"center\" class=\"tabla_fejlec7\"><font color='white'></font></td>
  </tr>
  <tr>
  <td>".$kep."</td>
<td><font size='-1px' >&nbsp;<a href=\"forum_topik.php?id=".$row["id"]."\">".$row["topik"]."<br>".$row["leiras"]."</a></font></td>"	
	?>
	<td align="center"><font size="-2px" color='white'><?=$row['name']?></font></td>
	<td align="center"><font size="-2px" color='white'>Nem mutat</td>
	<td align="left" ><font size="-2px" color='white'><?=$row["letrehozva"]?></font><br><b><font size="-2px" color='#E9DA79'>Létrehozva</b></font> </td>
	<?	
	echo "</tr>";
echo"</table>";
		}
section_end();
}
}
if($szint >= 8){
section_begin("Találatok", 1);

$queryvv = mysql_query("SELECT * FROM forumtopik WHERE topik LIKE '%$kejelgeses%' ORDER BY `id` DESC");	
		while ($row = mysql_fetch_array($queryvv)){
			if ($row["zarva"] == "igen")
  $kep = "<center><img src=\"kepek/forum_zarva.png\" border=\"0\" alt=\"Z\" /></center>";
else
  $kep = "<center><img src=\"kepek/forum_nyitva_sz.png\" border=\"0\" alt=\"NY\" /></center>";
$msql="SELECT * FROM xbt_users WHERE  uid=$uid";
$asd = mysql_query($msql) or die(mysql_error());
$xbt_users=mysql_fetch_assoc($asd);
$row['letrehozta'] = $xbt_users['uid'];
$row['name'] = $xbt_users['name'];
echo"
<table border=\"1\" style=\"border:1px solid #CCCCCC;margin-top:7px;margin-bottom:5px;margin-left:3px\" width=\"100%\">
  <tr>
    <td align=\"center\" class=\"tabla_fejlec3\"><font color='white'></font></td>
    <td align=\"center\" class=\"tabla_fejlec4\"><font color='white'></font></td>
	<td align=\"center\" class=\"tabla_fejlec5\"><font color='white'></font></td>
    <td align=\"center\" class=\"tabla_fejlec6\"><font color='white'></font></td>
	<td align=\"center\" class=\"tabla_fejlec7\"><font color='white'></font></td>
  </tr>
  <tr>
  <td>".$kep."</td>
<td><font size='-1px' >&nbsp;<a href=\"forum_topik.php?id=".$row["id"]."\">".$row["topik"]."<br>".$row["leiras"]."</a></font></td>"	
	?>
	<td align="center"><font size="-2px" color='white'><?=$row['name']?></font></td>
	<td align="center"><font size="-2px" color='white'>Nem mutat</td>
	<td align="left" ><font size="-2px" color='white'><?=$row["letrehozva"]?></font><br><b><font size="-2px" color='#E9DA79'>Létrehozva</b></font> </td>
	<?	
	echo "</tr>";
echo"</table>";
		}
}
section_end();
}
if ($answer == "user") {
$msql="SELECT * FROM xbt_users WHERE name LIKE '%$kejelgeses%'";
$asd = mysql_query($msql) or die(mysql_error());
$xbt_users=mysql_fetch_assoc($asd);
$datahu['uid'] = $xbt_users['uid'];
$datahu['name'] = $xbt_users['name'];
$ferkatrea = $datahu['uid'];
$resp3 = mysql_query("SELECT * FROM forum_hsz WHERE uid='".$ferkatrea."'");
$arr555 = mysql_fetch_row($resp3);
$talalat555 = 0 + $arr555[0];
if($talalat555 == 0) {
section_begin("Találatok", 1);
		?><center>Nem található felhasználó.</center><?
		section_end();
}
else
{
if($szint < 8){
section_begin("", 1);
/* Oldalak */
$queryt = mysql_query("SELECT * FROM forum_hsz INNER JOIN forumtopik ON forumtopik.id=forum_hsz.topik
WHERE forumtopik.tema NOT IN (3031986,4) AND forum_hsz.uzenet LIKE '%$kejelgeses%'ORDER BY `ekkor` DESC") or die(mysql_error());
$respw = mysql_query("SELECT count(*) FROM forum_hsz WHERE uzenet = '$kejelgeses'");
$rest = mysql_num_rows($respw);
$per_page = $rest;
$page = ((isset($_GET['page']) && !empty($_GET['page'])) ? $_GET['page'] : 0);
if((!is_numeric($page)) OR ($page < 0)) $page = 0;
$offset = $page * $per_page;
/* Lekerdezes */
$resultsPerPage = 10;
$startResults = ($page - 1) * $resultsPerPage;
$numberOfRows = mysql_num_rows(mysql_query('SELECT * FROM forum_hsz'));
$totalPages = ceil($numberOfRows / $resultsPerPage);
$result = @mysql_query($queryt . " ORDER BY ekkor DESC LIMIT $offset, $per_page");
$total = @mysql_result(@mysql_query(str_replace("SELECT * FROM forum_hsz","SELECT COUNT(*) FROM forum_hsz",$queryt)),0);
//lapozó linkek
section_begin("", 1);
?>
<div class='forum_stuff'><div class='forum_pager'><font size='2px'>Oldalak: 
<?
$countew = mysql_fetch_array($res);
echo $countew[0];
$uri = 'forumbankeres.php?';
foreach($_GET as $key => $value) {
	if($key == 'page') continue;
	$uri .= urlencode($key).'='.urlencode($value).'&';
}
$oldalszam = ceil($total/$per_page); //ennyi oldal lesz
for($i=0;$i<$oldalszam;$i++) {
        if ((( $i > $page-3 ) && ( $i < $page+3 )) || ($page <= 2 && $i <= 4) || ($page >= ($oldalszam-4) && $i >= ($oldalszam-5)))  {
                if($i != $page) $lepteto .= '<a class="browser" href="'.$uri.'&page='.$i.'">'.($i*$per_page+1).'-'.min(($i+1)*$per_page, $total).'</a> ';
                else $lepteto .= ' <span class="currentpage">['.($i*$per_page+1).'-'.min(($i+1)*$per_page,$total).']</span> ';
        }       
}
if($total) {
	$uri = 'forumbankeres.php?';
	foreach($_GET as $key => $value) {
		if($key == 'orderby') continue;
		$uri .= urlencode($key).'='.urlencode($value).'&';
	} 
	$uri .= 'orderby=';
}
?>
<div class='forum_stuff'><div class='forum_pager'><font size='2px'>Oldalak:
<center>
<?php
    print '<a href="?page=0">Első</a>&nbsp;';
	print ' |  &nbsp;&nbsp;<a href="?page='.($page - 1).'"> Előző</a>&nbsp;';
	print ' | &nbsp;'.$lepteto.'   &nbsp;| ';
	print '&nbsp;<a href="?page='.($page + 1).'">Következő</a>&nbsp;';
	print '&nbsp;&nbsp; | &nbsp;<a href="?page='.($oldalszam-1).'">Utolsó</a>';
?>
</center>
 </font></div></div>	
<?
section_end();
section_begin("Találatok", 1);

$querythu = mysql_query("SELECT * FROM forum_hsz INNER JOIN xbt_users ON xbt_users.uid=forum_hsz.uid
INNER JOIN forumtopik ON forumtopik.id=forum_hsz.topik
			WHERE forumtopik.tema NOT IN (3031986,4) AND name LIKE '%$kejelgeses%' ORDER BY `ekkor` DESC") or die(mysql_error());	
			while ($datahu = mysql_fetch_array($querythu)){
			
$settings    = explode('|', $xbt_users['settings']);	
			$user_avatar = $settings[1] == NULL || empty($settings[1]) || $settings[1] == ' ' ? "themes/$theme/avatar.jpg" : $settings[1];
			?>	
			<br>	
			<table width="100%"><td>	
			<div class="hsz_block" >
					<div class="hsz_bal">
					<div class="hsz_avatar">
					  <img src="<? echo htmlspecialchars($user_avatar);?>" border="0" style="width:160px;height:auto" alt="" />
					</div>
					<div class="hsz_avatar_also"></div>
				</div>			
					<div class="hsz_jobb_all">
					<div class="hsz_jobb">
						<div class="hsz_jobb_felso_ico"></div>
						<div class="hsz_jobb_felso">
							<div class="hsz_jobb_felso_txt"> 
						Írta: <a href="userdetails.php?uid=<? echo htmlspecialchars($datahu['uid']);?>"><? echo htmlspecialchars($datahu['name']);?></a> 
						</div>
							<div class="hsz_jobb_felso_date">	
									<?
							 if ($datahu['valasz_erre'] != 0)
							 {
								$query_datahu = mysql_fetch_array(mysql_query("SELECT id, name, ekkor FROM forum_hsz INNER JOIN xbt_users ON xbt_users.uid=forum_hsz.uid WHERE id=".$datahu['valasz_erre']));
								$tohu = $query_datahu['name'];
								$ekkorhu = explode(":",$query_datahu['ekkor']);
								$ekkorhu = $ekkorhu[0].':'.$ekkorhu[1];
								echo "(Válasz $to $ekkor-kor írt üzenetére)";
							 }										 
							?><a href="forum_topik.php?id=<? echo $datahu["id"]?>"><? echo $datahu["topik"]?></a>
							  | <? echo htmlspecialchars($datahu['ekkor']);							
						?>	
				</div>
						</div>
							<div class="hsz_jobb_comment">	
<?php 
							$adat=str_split($datahu[uzenet], 15000);							
							$megjelenites = "";				
							foreach ($adat as $adatok)	
				{
$megjelenites = bb2html($adatok, 0);
echo bb2html($adatok, 0);
}			
							   ?>		    
								<br><small> <a href="userdetails.php?uid=<? echo $data["modositotta"]?>"><? echo $modify_datahu["name"]?></a>  <?php echo $date?></small>
								<br>
						<img border="0" src="styles/default/avat_line.gif" />
						<br><font color="lime" size"8"><?=$datahu['box_content']?> </font>				
						</td>
			</div>
			</td></table>
		<img border="0" width="100%" src="hr.gif" alt="">	<?
}	

section_end();	
}
if($szint >= 8){
section_begin("", 1);
$uri = 'forumbankeres.php?';
foreach($_GET as $key => $value) {
	if($key == 'page') continue;
	$uri .= urlencode($key).'='.urlencode($value).'&';
}
$oldalszam = ceil($total/$per_page); //ennyi oldal lesz
for($i=0;$i<$oldalszam;$i++) {
        if ((( $i > $page-3 ) && ( $i < $page+3 )) || ($page <= 2 && $i <= 4) || ($page >= ($oldalszam-4) && $i >= ($oldalszam-5)))  {
                if($i != $page) $lepteto .= '<a class="browser" href="'.$uri.'&page='.$i.'">'.($i*$per_page+1).'-'.min(($i+1)*$per_page, $total).'</a> ';
                else $lepteto .= ' <span class="currentpage">['.($i*$per_page+1).'-'.min(($i+1)*$per_page,$total).']</span> ';
        }       
}
?>
<div class='forum_stuff'><div class='forum_pager'><font size='2px'>Oldalak: </font>
<center>
<?php
    print '<a href="?page=0">Első</a>&nbsp;';
	print ' |  &nbsp;&nbsp;<a href="?page='.($page - 1).'"> Előző</a>&nbsp;';
	print ' | &nbsp;'.$lepteto.'   &nbsp;| ';
	print '&nbsp;<a href="?page='.($page + 1).'">Következő</a>&nbsp;';
	print '&nbsp;&nbsp; | &nbsp;<a href="?page='.($oldalszam-1).'">Utolsó</a>';
?>
</center>

</div></div><?
section_end();
section_begin("Találatok", 1);

$querythu = mysql_query("SELECT * FROM forum_hsz INNER JOIN xbt_users ON xbt_users.uid=forum_hsz.uid
			INNER JOIN forumtopik ON forumtopik.id=forum_hsz.topik
			WHERE name LIKE '%$kejelgeses%'ORDER BY `ekkor` DESC") or die(mysql_error());		
			while ($datahu = mysql_fetch_array($querythu)){		
$settings    = explode('|', $xbt_users['settings']);	
			$user_avatar = $settings[1] == NULL || empty($settings[1]) || $settings[1] == ' ' ? "themes/$theme/avatar.jpg" : $settings[1];
			?>	
			<br>	
			<table width="100%"><td>	
			<div class="hsz_block" >
					<div class="hsz_bal">
					<div class="hsz_avatar">
					  <img src="<? echo htmlspecialchars($user_avatar);?>" border="0" style="width:160px;height:auto" alt="" />
					</div>
					<div class="hsz_avatar_also"></div>
				</div>			
					<div class="hsz_jobb_all">
					<div class="hsz_jobb">
						<div class="hsz_jobb_felso_ico"></div>
						<div class="hsz_jobb_felso">
							<div class="hsz_jobb_felso_txt"> 
						Írta: <a href="userdetails.php?uid=<? echo htmlspecialchars($datahu['uid']);?>"><? echo htmlspecialchars($datahu['name']);?></a> 
						</div>
							<div class="hsz_jobb_felso_date">	
									<?
							 if ($data['valasz_erre'] != 0)
							 {
								$query_datahu = mysql_fetch_array(mysql_query("SELECT id, name, ekkor FROM forum_hsz INNER JOIN xbt_users ON xbt_users.uid=forum_hsz.uid WHERE id=".$datahu['valasz_erre']));
								$tohu = $query_datahu['name'];
								$ekkorhu = explode(":",$query_datahu['ekkor']);
								$ekkorhu = $ekkorhu[0].':'.$ekkorhu[1];
								echo "(Válasz $to $ekkor-kor írt üzenetére)";
							 }			
							?><a href="forum_topik.php?id=<? echo $datahu["id"]?>"><? echo $datahu["topik"]?></a>
							  | <? echo htmlspecialchars($datahu['ekkor']);						
						?>	
				</div>
						</div>
							<div class="hsz_jobb_comment">	
<?php 
							$adat=str_split($datahu[uzenet], 15000);							
							$megjelenites = "";				
							foreach ($adat as $adatok)	
				{
$megjelenites = bb2html($adatok, 0);
echo bb2html($adatok, 0);
}			
							   ?>		    
								<br><small> <a href="userdetails.php?uid=<? echo $data["modositotta"]?>"><? echo $modify_datahu["name"]?></a>  <?php echo $date?></small>
								<br>
						<img border="0" src="styles/default/avat_line.gif" />
						<br><font color="lime" size"8"><?=$datahu['box_content']?> </font>				
						</td>
			</div>
			</td></table>
		<img border="0" width="100%" src="hr.gif" alt="">	<?
}	
section_end();	
}
}
}
}
page_end();
?>
