// JavaScript Document
var numbered;
function convert(numbered)
{
   if(numbered < 10){
	  	numbered = '0'+numbered;
   }

	var nepaliNumber = numbered.toString();
	var nepalidate = new Array('&#2406','&#2407','&#2408','&#2409','&#2410','&#2411','&#2412','&#2413','&#2414','&#2415');
	return nepalidate[nepaliNumber.substring(0,1)]+nepalidate[nepaliNumber.substring(1,2)];
}
function getAnalog(hours)
{
     if (hours >= 12)
	 {  
		if (hours ==12){ hours = 12;}
		else { hours = hours-12;}  
	 }
	 else if(hours < 12)
	 {  
	 	if (hours ==0){  hours=12; }
	 } 
  return hours; 
}
//var currenttime = 'April 16, 2017 06:30:47'; 
var serverdate = new Date();
function displaytime(){
	serverdate.setSeconds(serverdate.getSeconds()+1);
	var timestring=convert(getAnalog((serverdate.getHours()>12)?serverdate.getHours()-12:serverdate.getHours()))+" : "+convert(serverdate.getMinutes())+" : "+convert(serverdate.getSeconds());
	
	var times = '&#2350;&#2343;&#2381;&#2351;&#2366;&#2344;&#2381;&#2361;';
	document.getElementById("servertime").innerHTML=timestring;

}
function reload()
{
 if(serverdate.getHours() == '12' && serverdate.getMinutes() == '00' && serverdate.getSeconds() == '00'){
  return window.location.reload();
 } 
}

window.onload=function()
{ 
  setInterval("displaytime()", 1000); 
  setInterval("reload()", 1000);
}