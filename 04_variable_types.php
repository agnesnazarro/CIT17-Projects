<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variable Types</title>
</head>
<body>
    <h1>Variable Types</h1>
    
    <h2>Integers</h2>
    <?php
        $int_var = 12345;
        $another_int = -12345 + 12345;

        echo $int_var;
        echo "<br>";
        echo $another_int;
    ?>

    <h2>Doubles</h2>
    <?php 
        $many = 2.2888800;
        $many_2 = 2.2111200;
        $few = $many + $many_2;

        echo $many;
        echo "<br>";
        echo $many_2;
        echo "<br>";
        echo $few;
        echo "<br>";
        print("$many + $many_2 = $few");    
    ?>

    <h2>Boolean</h2>
    <?php
        if (TRUE)
            print("This will always print <br>");
        else
            print("This will never print <br>");

        // $true_num = 3 + 0.14159;
        // $true_str = "Tried and true"
        // $true_array[49] = "An array element";
        // $false_array = array();
        // $false_null = NULL;
        // $false_num = 999 - 999;
        // $false_str = "";
    ?>

    <h2>NULL</h2>
    <?php 
        $my_var = NULL;
        $my_var = null;
    ?>

    <h2>Strings</h2>
    <?php 
        $string_1 = "This is a string in double quotes";
        $string_2 = "This is a somewhat longer, singly quoted string";
        $string_39 = "This string has thirty-nine characters";
        $string_0 = ""; // a string with zero characters

        echo $string_1;
        echo "<br>";
        echo $string_2;
        echo "<br>";
        echo $string_39;
        echo "<br>";
        echo $string_0;
        echo "<br>";

        /*Singly quoted strings are treated almost literally, whereas doubly quoted strings replace 
        variables with their values*/
        $variable = "name";
        $literally = 'My $variable will not print!\\n';
        print($literally);
        echo "<br>";
        $literally = "My $variable will print!";
        print($literally);
        echo "<br> <br>";

        //Assign multiple lines to a single string variable
        // $channel =<<<_XML_
        // <channel>
        // <title>What's For Dinner<title>
        // <link>http://menu.example.com/<link>
        // <description>Choose what to eat tonight.</description>
        // </channel>
        // _XML_;

        // echo <<<END
        // This uses the "here document" syntax to output
        // multiple lines with variable interpolation. Note
        // that the here document terminator must appear on a
        // line with just a semicolon. no extra whitespace!
        // <br />
        // END;

        // print $channel;
        
    ?>
    
    <h2>PHP Local Variables</h2>
    <?php 
        $x = 4;
        function assignx () {
            $x = 0;
            print "\$x inside function is $x.";
            echo "<br>";
        }
        assignx();
        print "\$x outside of function is $x.";
    ?>

    <h2>PHP Function Parameters</h2>
    <?php 
        // multiply a value by 10 and return it to the caller
        function multiply ($value) {
            $value = $value * 10;
            return $value;
        }
        $retval = multiply (10);
        Print "Return value is $retval\n";
    ?>

    <h2>PHP Global Variables</h2>
    <?php 
        $somevar = 15;
        function addit() {
            GLOBAL $somevar;
            $somevar++;
            print "Somevar is $somevar";
        }
        addit();
    ?>

    <h2>PHP Static Variables</h2>
    <?php  
        function keep_track() {
            STATIC $count = 0;
            $count++;
            print $count;
            print " ";
        }
        keep_track();
        keep_track();
        keep_track();
           
    ?>
    
</body>
</html>