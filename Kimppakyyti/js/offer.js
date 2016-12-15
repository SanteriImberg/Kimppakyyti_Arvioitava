/*jshint browser: true */
var xhr = new XMLHttpRequest();




var showOffers = function(){
    if(xhr.readyState === 4 && xhr.status === 200){
            /*var json = JSON.parse(xhr.responseText);
            var output = '';
                for(var i in json){
                    output += '<div id="offer">' +
                                   xhr.responseText +
                           '</div>';
            }*/
        document.querySelector('ul').innerHTML = xhr.responseText;
    }
};



/*
xhr.open('GET', 'offer.php');
xhr.onreadystatechange = showOffers;
xhr.send();
*/ 

       
        $('input.paikka').typeahead({
                name: 'paikka',
                remote: 'feedi.php?query=%QUERY' 
            
            });

    
    