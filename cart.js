var db = openDatabase('my9.db', '1.0', 'Cart DB', 2 * 1024 * 1024);

db.transaction(function (tx) {
    tx.executeSql('SELECT * FROM cart_item', [], function (tx, results) {
        var len = results.rows.length, i;
        //document.querySelector('#cart').innerText += len;

        msg = "<p><b>" + results.rows.item(0).lastname + "</b></p>"; 
            document.querySelector('#name').innerHTML +=  msg; 
        
    }, null);
});
