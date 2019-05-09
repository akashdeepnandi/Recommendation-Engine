
$.getJSON("data.json", function (json) {
    starter = json["starter"];
    maincourse = json["maincourse"];

    var title = document.getElementById('starter_title1').innerHTML = starter[0].title;
    var title = document.getElementById('starter_title2').innerHTML = starter[1].title;

    var desc = document.getElementById('starter_desc1').innerHTML = starter[0].description;
    var desc = document.getElementById('starter_desc2').innerHTML = starter[1].description;

    //var img = document.getElementById('starter_img1').src = starter[0].img;
    var img = document.getElementById('starter_img2').src = starter[1].img;    

    var title = document.getElementById('maincourse_title1').innerHTML = maincourse[0].title;
    var title = document.getElementById('maincourse_title2').innerHTML = maincourse[1].title;


    var desc = document.getElementById('maincourse_desc1').innerHTML = maincourse[0].description;
    var desc = document.getElementById('maincourse_desc2').innerHTML = maincourse[1].description;

    var img = document.getElementById('maincourse_img1').src = maincourse[0].img;
    var img = document.getElementById('maincourse_img2').src = maincourse[1].img;   

});

