<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau</title>
    <style>.A{background-color: blue;} .B{background-color: orange;} .C{background-color: green;} .D{background-color: red;}</style>
</head>
<body>

<input type="button" value="select table"
       onclick="selectElementContents( document.getElementById('tableau') );">
<table id="tableau">
<tr>
    <th>1</th>
    <th>2</th>
    <th>3</th>
    <th>4</th>
    
</tr>
    <tr>
        <td class="A">A</td>
        <td class="B">B</td>
        <td class="C">C</td>
        <td class="D">D</td>
    </tr>
    <tr>
        <td class="A">A</td>
        <td class="B">B</td>
        <td class="C">C</td>
        <td class="D">D</td>
    </tr>
    <tr>
        <td class="A">A</td>
        <td class="B">B</td>
        <td class="C">C</td>
        <td class="D">D</td>
    </tr>
    <tr>
        <td class="A">A</td>
        <td class="B">B</td>
        <td class="C">C</td>
        <td class="D">D</td>
    </tr>
    <tr>
        <td class="A">A</td>
        <td class="B">B</td>
        <td class="C">C</td>
        <td class="D">D</td>
    </tr>
    <tr>
        <td class="A">A</td>
        <td class="B">B</td>
        <td class="C">C</td>
        <td class="D">D</td>
    </tr>
</table>
<script>
    function selectElementContents(el) {
        var body = document.body, range, sel;
        if (document.createRange && window.getSelection) {
            range = document.createRange();
            sel = window.getSelection();
            sel.removeAllRanges();
            try {
                range.selectNodeContents(el);
                sel.addRange(range);
            } catch (e) {
                range.selectNode(el);
                sel.addRange(range);
            }
        } else if (body.createTextRange) {
            range = body.createTextRange();
            range.moveToElementText(el);
            range.select();
        }
    }


</script>
</body>
</html>