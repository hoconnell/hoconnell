<!DOCTYPE html>
<html>
    <!-- img: http://www.wixonjewelers.com/education/gemstones/birthstones/
        api: https://www.behindthename.com/api/    
        my key: he971690
        search ex: https://www.behindthename.com/api/lookup.php?name=sam&key=he971690
        colors: http://www.dailymail.co.uk/femail/article-3626930/Do-know-birth-month-flower-colour.html
    -->
    <head>
        <title> Hw 4: HTML Forms </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style> @import url('css/styles.css'); </style>
        <!-- 
            assignment: https://docs.google.com/document/d/1bUmh-Cbeu2VJ3rKDpAkG9N0WPiDreS2FYRZxfpx6_dA/edit
        -->
    </head>
    <body>
        
        <h1>Get information on your name & birthdate!</h1>
        
        <form action="results.php" name="inputData" id="formBday">
            What is your first name: <input type="text" name="name" placeholder="Type here" required/><br/>
            <!--Select your date of birth: <input type="date" name="dob"/><br/>-->
            
            What month were you born in: <input list="month" name="month" placeholder="Type or choose" required/>
            <datalist id="month">
                <option value="January">
                <option value="February">
                <option value="March">
                <option value="April">
                <option value="May">
                <option value="June">
                <option value="July">
                <option value="August">
                <option value="September">
                <option value="October">
                <option value="November">
                <option value="December">
            </datalist><br/>
            
            What day were you born on: <input type="number" name="day" min="1" max="31" placeholder="0" required/><br/>
            
            Select what you would like to know: (choose at least one) <br/>
            <input class="showItem" type="checkbox" name="showName" value="nameOrigin" id="showName"/><label for="showName"> My name usage</label><br/>
            <input class="showItem" type="checkbox" name="showColor" value="birthcolor" id="showColor"/><label for="showColor"> My birth color</label><br/>
            <input class="showItem" type="checkbox" name="showStone" value="birthStone" id="showStone"/><label for="showStone"> My birthstone</label><br/>
            <input class="showItem" type="checkbox" name="showFlower" value="birthFlower" id="showFlower"/><label for="showFlower"> My birth flower</label><br/>
            <input class="showItem" type="checkbox" name="showSign" value="astroSign" id="showSign"/><label for="showSign"> My astrological sign</label><br/>
            
            <br/>
            <!--<input type="submit" value="Submit"/>-->
            <button>Submit</button>
            <input type="reset">
        </form>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        <script>
        // help from: https://stackoverflow.com/questions/3035634/jquery-validate-check-at-least-one-checkbox
            $('#formBday button').button().click(function(e){ 
                // e.preventDefault();
                // console.log($('.showItem:checkbox:checked').length);
                if($('.showItem:checkbox:checked').length == 0) {
                    e.preventDefault();
                    alert('Please select at least one checkbox.');
                } else {
                    $("#formBday").submit(e);
                }
            });
        </script>
    
    </body>
</html>