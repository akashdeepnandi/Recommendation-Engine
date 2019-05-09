dataString = [1,2,3,4,5]; // array?
var jsonString = JSON.stringify(dataString);
   $.ajax({
        type: "POST",
        url: "script.php",
        data: {data : jsonString}, 
        cache: false,

        success: function(){
            alert("OK");
        }
    });