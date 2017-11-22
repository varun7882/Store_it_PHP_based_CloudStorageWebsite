function del(path,name,table)
{
   // alert("i am in");
	  if (window.XMLHttpRequest) {
         
            xmlhttp = new XMLHttpRequest();
        } else {
                      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var b = xmlhttp.responseText;
            	alert(b);
            	location.reload();
            }
        };
         xmlhttp.open("GET","del/del.php?q=..\\"+path+"&n="+name+"&t="+table,true);
        xmlhttp.send();
}
function share(path,name,user)
{
  //alert("isd");
    if (window.XMLHttpRequest) {
         
            xmlhttp = new XMLHttpRequest();
        } else {
                      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var b = xmlhttp.responseText;
                alert(b);
            }
        };
         xmlhttp.open("GET","shared.php?q=..\\"+path+"&n="+name+"&u="+user,true);
        xmlhttp.send();
}