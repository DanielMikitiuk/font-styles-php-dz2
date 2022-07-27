<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <?php
    function clear($str)
    {
        return htmlentities($str);
    }

    if (isset($_GET['send-style'])) {
        $text = $_GET['text'] ?? null;
        $font = $_GET['fonts'] ?? null;
        $fontSize = $_GET['font_size'] ?? null;
        $fontColor = $_GET['color'] ?? null;

        $fontType = array_map('clear', $_GET['types'] ?? []);

        $background = $_GET['background'] ?? null;
        $fontWeight = implode(';', $fontType);

        if (empty($text)) {
            $text = 'Simple text';
        }
        if ($background == 'back_no') {

            echo "<p style='font-family:$font; font-size:{$fontSize}px; color:$fontColor; $fontWeight; '>$text</p>";
        } else {
            echo "<p style='font-family:$font; font-size:{$fontSize}px; color:$fontColor; $fontWeight ; background-color: dodgerblue'>$text</p>";
        }
    }

    ?>
    <form action="index.php" method="GET">

        <div class="form-group mt-3">
            <label for="">Text:</label>
            <textarea class="form-control" id="text" name="text" rows="3"></textarea>
        </div>

        <div class="form-group mt-3">
            <label for="">Font-family</label>
            <select name="fonts" class="form-control">
                <option value="Arial">Arial</option>
                <option value="Impact">Impact</option>
                <option value="Times">Times New Roman</option>
            </select>

        </div>

        <div class="form-group mt-3">
            <label for="">Font size:</label>
            <input type="number" value="14" name="font_size" min="1"  class="form-control">
        </div>

        <div class="form-group mt-3">
            <label class="d-block"><input type="checkbox" name="types[]" value="font-weight:bold"> bold</label>
            <label class="d-block"><input type="checkbox" name="types[]" value="font-style:italic"> italic </label>
            <label class="d-block"><input type="checkbox" name="types[]" value="text-decoration:underline"> underline </label>
        </div>

        <div class="form-group mt-3">
            <label for="color">Color: </label>
            <input type="color" name="color" id="color">

        </div>

        <div class="form-group mt-3">
            <label for="background">Використовувати фон?: </label>
            <label><input type="radio" name="background" value="back_yes">Да</label>
            <label><input type="radio" name="background" value="back_no" checked>Ні</label>
        </div>


        <button class="btn btn-primary mt-3 w-25" name="send-style">Send</button>
    </form>





</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>