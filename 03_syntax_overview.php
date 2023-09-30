<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syntax Overview</title>
</head>
<body>
    <h1>Syntax Overview</h1>

    <!-- Canonical Php Tags
    <?php ?> -->
    
    <!-- Short-open (SGML-style) Tags
    <? ?> -->

    <!-- ASP-style Tags
    <% %> -->

    <!-- HTML script Tags
    <script language="PHP"></script> -->

    <h2>Commenting PHP Code</h2>
    <h3>Single-line Comments</h3>
    <?php 
        # This is a comment, and
        # This is the second line of the comment
        // This is a comment too. Each style comments only
        print "An example with single line comments";
    ?>
    <h3>Multi-lines Printing</h3>
    <?php 
        # First Example
        print <<<END
        This uses the "here document" syntax to output
        multiple lines with variable interpolation. Note
        that the here document terminator must appear on a
        line with just a semicolon no extra whitespace!
        END;
        # Second Example
        print "This spans
        multiple lines. The newlines will be
        output as well";
    ?>
    <h3>Multi-lines Comments</h3>
    <?php 
        /* This is a comment with multiline
        Author : Mohammad Mohtashim
        Purpose: Multiline Comments Demo
        Subject: PHP
        */
        print "An example with multi line comments";
    ?>

    <!-- <h2>Whitespace Insensitive</h2> -->
    <?php 
        // $four = 2 + 2; // single spaces
        // $four <tab>=<tab2<tab>+<tab>2 ; // spaces and tabs
        // $four =
        // 2+
        // 2; // multiple lines
    ?>

    <h2>Case Sensitive</h2>
    <?php 
        $capital = 67;
        print("Variable capital is $capital<br>");
        print("Variable CaPiTaL is $CaPiTaL<br>");
    ?>

    <h2>Statements are Expressions Terminated by Semicolons</h2>
    <?php 
        $greeting = "Welcome to PHP!";
        echo $greeting;
    ?>

    <h2>Braces make Blocks</h2>
    <?php 
        if (3 == 2 + 1)
        print("Good - I haven't totally lost my mind.<br>");
       if (3 == 2 + 1)
       {
        print("Good - I haven't totally");
        print("lost my mind.<br>");
       }
    ?>

    <h2>Running PHP Script from Command Prompt</h2>
    <p><i>Run this script as command prompt:</i><br>
       <b>$ php (file name).php</b>
    </p>
</body>
</html>