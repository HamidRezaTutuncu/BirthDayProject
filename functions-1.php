<?php

function heart($Decode_Data)
{
	$kalb = $Decode_Data*70;
	return $heart;
}
function animal_yer ($year)
{
	$fare    = array(2020, 2008, 1996, 1984, 1972, 1960, 1948, 1936, 1924);
	$okuz    = array(2021, 2009, 1997, 1985, 1973, 1961, 1949, 1937, 1925);
	$Kaplan  = array(2022 ,2010, 1998, 1986, 1974, 1962, 1950, 1938, 1926);
	$Tavsan  = array(2023, 2011, 1999, 1987, 1975, 1963, 1951, 1939, 1927);
	$Ejderha = array(2024, 2012, 2000, 1988, 1976, 1964, 1952, 1940, 1928);
	$Yilan   = array(2025, 2013, 2001, 1989, 1977, 1965, 1953, 1941, 1929);
	$At      = array(2026, 2014, 2002, 1990, 1978, 1966, 1954, 1942, 1930);
	$Koyun   = array(2027, 2015, 2003, 1991, 1979, 1967, 1955, 1943, 1931);
	$Maymun	 = array(2028, 2016, 2004, 1992, 1980, 1968, 1956, 1944, 1932);
	$Horoz	 = array(2029, 2017, 2005, 1993, 1981, 1969, 1957, 1945, 1933);
	$Köpek	 = array(2030, 2018, 2006, 1994, 1982, 1970, 1958, 1946, 1934);
	$Domuz	 = array(2031, 2019, 2007, 1995, 1983, 1971, 1959, 1947, 1935);    
   
	for ($i=0; $i <8 ; $i++) 
	{
		if ($year == $fare[$i])   {echo"fare";}
		if ($year == $okuz[$i])   {echo"Öküz";}
		if ($year == $Kaplan[$i]) {echo"Kaplan";}
		if ($year == $Tavsan[$i]) {echo"Tavşan";}
		if ($year == $Ejderha[$i]){echo"Ejderha";}
		if ($year == $Yilan[$i])  {echo"Yılan";}
		if ($year == $At[$i])     {echo"At";}
		if ($year == $Koyun[$i])  {echo"Koyun";}
		if ($year == $Maymun[$i]) {echo"Maymun";}
		if ($year == $Horoz[$i])  {echo"Horoz";}
		if ($year == $Köpek[$i])  {echo"Köpek";}
		if ($year == $Domuz[$i])  {echo"Domuz ";}
	
	}
}
function seasons($mon)
{
	if ($mon==1){echo"Kış";}
	if ($mon==2) {echo"Kış";}
	if ($mon==12){echo"Kış";}
	if ($mon==3){echo"İlkbahar";}
	if ($mon==4) {echo"İlkbahar";}
	if ($mon==5){echo"İlkbahar";}
	if ($mon==6){echo"Yaz";}
	if ($mon==7) {echo"Yaz";}
	if ($mon==8){echo"Yaz";}
	if ($mon==9){echo"Sonbahar";}
	if ($mon==10) {echo"Sonbahar";}
	if ($mon==11){echo"Sonbahar";}	
}
function Breathing($Decode_Data)
{
	$Breathing = $Decode_Data*15;
	return $Breathing;
}
function sleep($Decode_Data)
{
	$Sleep = $Decode_Data*9;
	return $Sleep;
}
function EatGr($Decode_Data)
{
	$EatGr = $Decode_Data * 500;
	return $EatGr;
}
function EatMeal($Decode_Data)
{
	$EatMeal = $Decode_Data*3;
	return $EatMeal;
}
function EatTime($Decode_Data)
{
	$EatTime = $Decode_Data*30;
	return $EatTime;
}
function BirthStones($mon)
{
	if ($mon = 1){
		echo"Garnet";		
	}elseif($mon = 2){
		echo "Ametist";
	}elseif($mon = 3){
		echo "Akuamarin";
	}elseif($mon = 4){
		echo "Elmas";
	}elseif($mon = 5){
		echo "Zümrüt";
	}elseif($mon = 6){
		echo "İnci";
	}elseif($mon = 7){
		echo "Yakut";
	}elseif($mon = 8){
		echo "Peridot";
	}elseif($mon = 9){
		echo "Safir";
	}elseif($mon = 10){
		echo "Opal";
	}elseif($mon = 11){
		echo "Sitrin";
	}elseif($mon = 12){
		echo "Turkuaz";
	}else{
		echo "ERROR";
	}
}
function EatWater($Decode_Data)
{
	$EatWater = $Decode_Data * 4; 
	return $EatWater;
}


?>
