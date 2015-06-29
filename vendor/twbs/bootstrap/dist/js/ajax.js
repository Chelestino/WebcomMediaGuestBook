function showNewMessage()
{
    var xmlhttp = new XMLHttpRequest();

    var data1 = document.getElementById("name").value;
    var data2 = document.getElementById("comment").value;
    var data3 = document.getElementById("captcha_code").value;
    var data4 = document.getElementById("submit").value;
    var data = "submit=" + encodeURIComponent(data4)
            + "&name=" + encodeURIComponent(data1)
            + "&comment=" + encodeURIComponent(data2)
            + "&captcha_code=" + encodeURIComponent(data3);
    xmlhttp.open('POST', 'index.php', true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.onreadystatechange = updateDocument;

    function updateDocument()
    {
        if (xmlhttp.readyState == 4)
        {
            if (xmlhttp.status == 200)
            {
                document.getElementById("messageBlock").innerHTML = xmlhttp.responseText;
            }
        }
    }
    xmlhttp.send(data);
}





