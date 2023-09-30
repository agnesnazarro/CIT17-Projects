<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Constants</title>
</head>
<body>
    <h1>Constants</h1>

    <h2>constant() function</h2>
    <?php 
        define("MINSIZE", 50);

        echo MINSIZE;
        echo "<br>";
        echo constant("MINSIZE"); // same thing as the previous line
    ?>

    <h2>Valid and Invalid Constant Names</h2>
    <p>Valid Constant Names</p>
    <?php 
        define("ONE", "first thing");
        define("TWO2", "second thing");
        define("THREE_3", "third thing");

        echo ONE;
        echo "<br>";
        echo TWO2;
        echo "<br>";
        echo THREE_3;
    ?>
    <!-- <p>Invalid Constant Names</p>
    <?php 
        define("2TWO", "second thing");
        define("__THREE__", "third value");
    ?> -->

    <h2>Magic Constants</h2>
    <table>
        <tbody>
            <tr>
                <th><b>Name</b></th>
                <th><b>Description</b></th>
            </tr>
            <tr>
                <td>__LINE__</td>
                <td>The current line number of the file.</td>
            </tr>
            <tr>
                <td>__FILE__</td>
                <td>The full path and filename of the file.<br>
                    If used inside an include, the name of the included file is returned.
                </td>
            </tr>
            <tr>
                <td>__FUNCTION__</td>
                <td>The function name. <br>
                    Returns the function name as it was declared (case-sensitive).
                </td>
            </tr>
            <tr>
                <td>__CLASS__</td>
                <td>The class name. <br>
                    Returns the class name as it was declared (case-sensitive).
                </td>
            </tr>
            <tr>
                <td>__METHOD__</td>
                <td>The class method name. <br>
                    The method name is returned as it was declared (case-sensitive).
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>