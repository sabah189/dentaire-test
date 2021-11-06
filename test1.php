<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="dist/smartselect.min.css" rel="stylesheet" />
<script src="dist/jquery.smartselect.min.js"></script>
</head>
<body>
    

<select id="demo-3c" multiple>
    <optgroup label="group 1" data-group-exclusive>
        <option value="1">1</option>
        <option value="2">2</option>
    </optgroup>
    <optgroup label="group a b" data-group-exclusive="a b">
        <option value="3">3</option>
        <option value="4">4</option>
    </optgroup>
    <optgroup label="group b c" data-group-exclusive="b c">
        <option value="5">5</option>
        <option value="6">6</option>
    </optgroup>
    <optgroup label="group c" data-group-exclusive="c">
        <option value="7">7</option>
        <option value="8">8</option>
    </optgroup>
    <optgroup label="group 5">
        <option value="9">9</option>
        <option value="10">10</option>
    </optgroup>
</select>
    ...
<script>
      $(document).ready(function(){
$("select#demo-3c").smartselect({
    defaultView: 'root+selected'
});
      )};
</script>
</body>
</html>