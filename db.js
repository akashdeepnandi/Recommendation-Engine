var db = openDatabase('cart_db', '1.0', 'Cart DB', 2 * 1024 * 1024);

db.transaction(function (tx) {
    tx.executeSql("CREATE TABLE IF NOT EXISTS cart_item (ci_id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, i_id INTEGER unique NOT NULL, i_qty INTEGER NOT NULL)");
});

var addToCart = function(i_id) {
    alert("hi");
    db.transaction(function (tx) { 
        var x = 1;
        tx.executeSql("INSERT INTO cart_item (i_id, i_qty) VALUES (?, ?)",[i_id, x]);
});
}