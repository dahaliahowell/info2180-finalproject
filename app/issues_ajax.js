$(document).ready(function(){

    $('#all').click(function(){ 
        
        httpRequest = new XMLHttpRequest();

        console.log('all c licked');
    
        var url = "scripts/issue_view.php?context=all";
        httpRequest.onreadystatechange = sendResult;
        httpRequest.open('GET', url);
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.send('context=all');
    });

    $('#open').click(function(){ 

      console.log('open c licked');
        
        httpRequest = new XMLHttpRequest();
    
        var url = "scripts/issue_view.php?context=open";
        httpRequest.onreadystatechange = sendResult;
        httpRequest.open('GET', url);
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.send('context=open');
    });

    $('#my-tickets').click(function(){ 
        
        httpRequest = new XMLHttpRequest();

        var value = document.getElementById('my-tickets').value;

        console.log('my tic c licked');
        console.log(value)
    
        var url = "scripts/issue_view.php?context=my_tickets&id=" + value;
        httpRequest.onreadystatechange = sendResult;
        httpRequest.open('GET', url);
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.send('context=my_tickets&id=' + value);
    });

    function sendResult() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
          if (httpRequest.status === 200) {
            var response = httpRequest.responseText;
            document.getElementById("result").innerHTML = response;
          } else {
            alert('There was a problem with the request.');
          }
    }
    }
})