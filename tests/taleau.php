<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau</title>
    <style>.A{background-color: blue;} .B{background-color: orange;} .C{background-color: green;} .D{background-color: red;}</style>
</head>
<body>
    <button id="copyButton" data-clipboard-target="tableau">Copier le tableau</button>
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
<script src="../includes/zeroclipboard/dist/ZeroClipboard.min.js"></script>
<script>
    var copiedTable = new ZeroClipboard( document.getElementById("copyButton") );

</script>
</body>
</html>