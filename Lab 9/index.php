<form action="formsubmitted.php" method="post">
<head>
    <title>Online Test Web Page</title>
</head>
<body>
    <table>  
    <tr><td> <input type="hidden" name="id" id = "id" value = "0001" /></td></tr>
    <tr><td>Name:</td><td> <input type="text" name="name"/></td></tr>  
    <tr><td>Password:</td><td> <input type="password" name="password"/></td></tr>
    <tr><td>What is PHP?</td><td> <input type="textarea" name="phpdesc"/></td></tr>
    <tr><td>Can PHP include HTML Code?</td><td> <input type="radio" name="html" value = "yes"/></td><<td> <input type="radio" name="html" value = "no"/></td></tr>
    <tr><td>PHP supports?</td><td> <input type="checkbox" name="supports" value = "HTML"/></td> <td> <input type="checkbox" name="supports" value = "JS"/> <td> <input type="checkbox" name="supports" value = "JS"/> </td></tr>
    <tr><td colspan="2"><input type="submit" value="login"/>  </td></tr>  
    <tr><td colspan="2"><input type="reset" value="login"/>  </td></tr>  
    </table>
</body>
</form>