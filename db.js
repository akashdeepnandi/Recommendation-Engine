var db = openDatabase('cart_db', '1.0', 'Cart DB', 2 * 1024 * 1024);

// db.transaction(function (tx) {   
//     tx.executeSql("CREATE TABLE IF NOT EXISTS cart_item(ci_id INTEGER AUTOINCREMENT NOT NULL PRIMARY KEY,i_id INTEGER NOT NULL)"); 
// });

db.transaction(function (tx) {
    tx.executeSql("CREATE TABLE IF NOT EXISTS cart_item (ci_id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, i_id INTEGER NOT NULL )");
});

var addToCart = function(i_id) {
    db.transaction(function (tx) {
        
        tx.executeSql("INSERT INTO cart_item (i_id) VALUES (?)",[i_id]);
});
}