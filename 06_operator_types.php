<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator Types</title>
</head>
<body>
    <h1>Operator Types</h1>

    <h2>Arithmetic Operators</h2>
    <table>
        <tbody>
            <tr>
                <th><b>Operator</b></th>
                <th><b>Description</b><br></th>
                <th><b>Example</b><br></th>
            </tr>
            <tr>
                <td>+</td>
                <td>Adds two operands </td>
                <td>A + B will give 30</td>
            </tr>
            <tr>
                <td>-</td>
                <td>Subtracts second operand from the first</td>
                <td>A - B will give -10</td>
            </tr>
            <tr>
                <td>*</td>
                <td>Multiply both operands</td>
                <td>A * B will give 200</td>
            </tr>
            <tr>
                <td>/</td>
                <td>Divide the numerator by denominato</td>
                <td>B / A will give 2</td>
            </tr>
            <tr>
                <td>%</td>
                <td>Modulus Operator and remainder of after an integer division</td>
                <td>B % A will give 0</td>
            </tr>
            <tr>
                <td>++</td>
                <td>Increment operator, increases integer value by one</td>
                <td>A++ will give 11</td>
            </tr>
            <tr>
                <td>--</td>
                <td>Decrement operator, decreases integer value by one</td>
                <td>A-- will give 9</td>
            </tr>
        </tbody>
    </table>
    
    <h2>Arithmetical Operators Example</h2>
    <?php 
        $a = 42;
        $b = 20;
        
        $c = $a + $b;
        echo "Addition Operation Result: $c <br/>";
        
        $c = $a - $b;
        echo "Subtraction Operation Result: $c <br/>";
        
        $c = $a * $b;
        echo "Multiplication Operation Result: $c <br/>";
        
        $c = $a / $b;
        echo "Division Operation Result: $c <br/>";
        
        $c = $a % $b;
        echo "Modulus Operation Result: $c <br/>";
        
        $c = $a++;
        echo "Increment Operation Result: $c <br/>";
        
        $c = $a--;
        echo "Decrement Operation Result: $c <br/>";
    ?>
</body>
</html>