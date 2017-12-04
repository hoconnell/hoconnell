<!DOCTYPE html>
<html>
    <head>
        <title> Final Project: Homepage </title>
        <meta charset='utf-8'>
        <link href="https://fonts.googleapis.com/css?family=Arima+Madurai:300,700|Open+Sans:400,700|Sofia" rel="stylesheet">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <script src="https://code.jquery.com/jquery.min.js"></script>
    </head>
    <body>
        <div id='content'>
            <header>
                <h1>Koshka Café</h1>
                <div id="loginButton">Login</div>
                <!--<h4>Menu</h4>-->
            </header>
            
            <main>
                <!--<h3 id="searchButton">Search Menu</h3>-->
                <div id="search">
                    <h3>Search Menu</h3>
                    <h4>Item: </h4>
                    <input type="search" name="itemName" id="itemName" value=""/>
                    
                    <br/>
                    
                    <h4>Category: </h4>
                    <input type="checkbox" name="itemCat1"  id="itemCat1" value="1" checked />
                    <label for="itemCat1"> Drinks </label>
                    
                    <input type="checkbox" name="itemCat2"  id="itemCat2" value="2" checked />
                    <label for="itemCat2"> Sweets </label>
                    
                    <input type="checkbox" name="itemCat3"  id="itemCat3" value="3" checked />
                    <label for="itemCat3"> Sets </label>
                    
                    <br/>
                    
                    <h4>Price Range: </h4>
                    $ <input type="number" id="priceMin" min="1" max="12" value="1" />&ensp;to&ensp;$ <input type="number" id="priceMax" min="1" max="12" value="12" />
                    
                    <br/>
                    
                    <!--<h4>Order By: </h4>-->
                    <!--<input type="radio" name="orderBy"  id="orderByDrink" value="byDrink" checked />-->
                    <!--<label for="itemCat1"> Drinks </label>-->
                    
                    <!--<input type="radio" name="orderBy"  id="orderByPrice" value="byPrice" />-->
                    <!--<label for="itemCat2"> Sweets </label>-->
                    
                    <!--<br/>-->
                    
                    <button id="searchSubmit">Search</button>
                </div>
                
                <div id="menuArea"></div>
                <!--<div id="menuArea">-->
                <!--    <div id="drinks">-->
                <!--        <h2 class="category">Drinks</h2>-->
                <!--        <div class="menu">-->
                            
                <!--        </div>-->
                <!--    </div>-->
                    
                <!--    <div id="sweets">-->
                <!--        <h2 class="category">Sweets</h2>-->
                <!--        <div class="menu">-->
                            
                <!--        </div>-->
                <!--    </div>-->
                    
                <!--    <div id="sets">-->
                <!--        <h2 class="category">Sets</h2>-->
                <!--        <div class="menu">-->
                            
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                
            </main>
            
            <footer>
                <p>2017 &copy; Heather O'Connell</p>
            </footer>
        </div>
        
        <script>
        
            $(document).ready(function() {
                
                // Login button action
                $('#loginButton').click(function() {
                    window.location.href = 'login.php';
                });
                
                // Make default menu
                function fillMenu() {
                        $('#menuArea').empty();
                       
                        $.ajax({
    
                        type: "GET",
                        url: "php/makeMenu.php",
                        dataType: "json",
                        data: { },
                        
                        success: function(data,status) {
                            // console.log(data);
                            
                            // $('<div id="menuArea"></div>').appendTo('main');
                            $('<div id="drinks"></div>').appendTo('#menuArea').append('<h2 class="category">Drinks</h2>');
                            $('<div id="sweets"></div>').appendTo('#menuArea').append('<h2 class="category">Sweets</h2>');
                            $('<div id="sets"></div>').appendTo('#menuArea').append('<h2 class="category">Sets</h2>');
                            
                            for(var i in data) {
                                // console.log(data[i].itemId);
                                
                                if(data[i].categoryId == 1) {
                                    $('#drinks').show();
                                    $('<div>')
                                        .addClass('tile')
                                        .appendTo('#drinks')
                                        .append('<img src="img/' + data[i].itemId + '.png">')
                                        .append('<p class="item">' + data[i].item + '</p>')
                                        .append('<p class="price">$' + data[i].price + '</p>')
                                        .append('<p class="info">' + data[i].item_description + '</p>');
                                } else if(data[i].categoryId == 2) {
                                    $('#sweets').show();
                                    $('<div>')
                                        .addClass('tile')
                                        .appendTo('#sweets')
                                        .append('<img src="img/' + data[i].itemId + '.png">')
                                        .append('<p class="item">' + data[i].item + '</p>')
                                        .append('<p class="price">$' + data[i].price + '</p>')
                                        .append('<p class="info">' + data[i].item_description + '</p>');
                                } else if(data[i].categoryId == 3) {
                                    $('#sets').show();
                                    $('<div>')
                                        .addClass('tile')
                                        .appendTo('#sets')
                                        .append('<img src="img/' + data[i].itemId + '.png">')
                                        .append('<p class="item">' + data[i].item + '</p>')
                                        .append('<p class="price">$' + data[i].price + '</p>')
                                        .append('<p class="info">' + data[i].item_description + '</p>');
                                } else {
                                    console.log('error');
                                }
                            } // foreach
                        }, // success
                        
                        complete: function(data,status) { //optional, used for debugging purposes
                            // alert(status);
                            $('.tile').hover(function() {
                               $(this).css('background-color', 'rgba(229, 1, 184, 0.2)');
                               $(this).children('.item').css('background-color', 'rgb(229, 1, 184)');
                               $(this).children('.price').css('background-color', 'rgb(229, 1, 184)');
                            }, function() {
                               $(this).css('background-color', 'rgba(2, 121, 127, 0.2)');
                               $(this).children('.item').css('background-color', 'rgb(2, 121, 127)');
                               $(this).children('.price').css('background-color', 'rgb(2, 121, 127)');
                            });
                        } // complete
        
                    }) //ajax
                } // fillMenu()
                
                fillMenu();
                
                // User search
                function searchMenu() {
                    // console.log('submitted');
                    
                    // Variables
                    var item = "";
                    var cat1 = "";
                    var cat2 = "";
                    var cat3 = "";
                    var minP = 'minP=' + $('#priceMin').val() + '&';
                    var maxP = 'maxP=' + $('#priceMax').val() + '&';
                    
                    // SEARCH CRITERIA
                    if($('#itemName').val() !== "") {
                        // console.log('item name: ' + $('#itemName').val());
                        item = 'item=' + $('#itemName').val() + '&';
                    }
                    
                    if($('#itemCat1').prop('checked') == true) {
                        cat1 = 'cat1=' + 1 + '&';
                    }
                    
                    if($('#itemCat2').prop('checked') == true) {
                        cat2 = 'cat2=' + 2 + '&';
                    }
                    
                    if($('#itemCat3').prop('checked') == true) {
                        cat3 = 'cat3=' + 3 + '&';
                    }
                    
                    // for(var k = 1; k <= 3; k++) {
                    //     if($('#itemCat' + k).prop('checked') == true) {
                    //         // console.log('itemCat' + k);
                    //     }
                    // }
                    
                    // console.log($('#priceMin').val() + ' ' + $('#priceMax').val());
                    
                    var searchUrl = "php/searchMenu.php?" + item + cat1 + cat2 + cat3 + minP + maxP;
                    console.log(searchUrl);
                    
                    $('#menuArea').empty();
                    
                    $.ajax({
                        type: "GET",
                        url: searchUrl,
                        dataType: "json",
                        data: { },
                        
                        success: function(data,status) {
                            console.log(data);
                            $('<div id="drinks"></div>').appendTo('#menuArea').append('<h2 class="category">Drinks</h2>');
                            $('<div id="sweets"></div>').appendTo('#menuArea').append('<h2 class="category">Sweets</h2>');
                            $('<div id="sets"></div>').appendTo('#menuArea').append('<h2 class="category">Sets</h2>');
                            
                            for(var i in data) {
                                // console.log(data[i].itemId);
                                
                                if(data[i].categoryId == 1) {
                                    $('#drinks').show();
                                    $('<div>')
                                        .addClass('tile')
                                        .appendTo('#drinks')
                                        .append('<img src="img/' + data[i].itemId + '.png">')
                                        .append('<p class="item">' + data[i].item + '</p>')
                                        .append('<p class="price">$' + data[i].price + '</p>')
                                        .append('<p class="info">' + data[i].item_description + '</p>');
                                } else if(data[i].categoryId == 2) {
                                    $('#sweets').show();
                                    $('<div>')
                                        .addClass('tile')
                                        .appendTo('#sweets')
                                        .append('<img src="img/' + data[i].itemId + '.png">')
                                        .append('<p class="item">' + data[i].item + '</p>')
                                        .append('<p class="price">$' + data[i].price + '</p>')
                                        .append('<p class="info">' + data[i].item_description + '</p>');
                                } else if(data[i].categoryId == 3) {
                                    $('#sets').show();
                                    $('<div>')
                                        .addClass('tile')
                                        .appendTo('#sets')
                                        .append('<img src="img/' + data[i].itemId + '.png">')
                                        .append('<p class="item">' + data[i].item + '</p>')
                                        .append('<p class="price">$' + data[i].price + '</p>')
                                        .append('<p class="info">' + data[i].item_description + '</p>');
                                } else {
                                    console.log('error');
                                }
                            } // foreach
                            
                        }, // success
                        
                        complete: function(data,status) { //optional, used for debugging purposes
                            // alert(status);
                            $('.tile').hover(function() {
                               $(this).css('background-color', 'rgba(229, 1, 184, 0.2)');
                               $(this).children('.item').css('background-color', 'rgb(229, 1, 184)');
                               $(this).children('.price').css('background-color', 'rgb(229, 1, 184)');
                            }, function() {
                               $(this).css('background-color', 'rgba(2, 121, 127, 0.2)');
                               $(this).children('.item').css('background-color', 'rgb(2, 121, 127)');
                               $(this).children('.price').css('background-color', 'rgb(2, 121, 127)');
                            });
                        } // complete
        
                    }); //ajax
                    
                } // searchMenu()
                
                $('#searchSubmit').click(searchMenu);
                
            });
            
            
        </script>

    </body>
</html>