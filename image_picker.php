<html>

<head>
    <title>picker</title>

    <script src="assets/plugins/image-picker/image-picker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/plugins/image-picker/image-picker.css">
    <style>

    </style>

</head>

<body>
    <div class="row">
        <select class="image-picker show-html tamaño_img">
            <option class="myOption" data-img-src="assets/uploads/eventos_form/11.jpg" value="1"> </option>
            <option data-img-src="assets/uploads/eventos_form/22.jpg" value="2"> </option>
            <option data-img-src="assets/uploads/eventos_form/6.jpg" value="3"> </option>
            <option data-img-src="assets/uploads/eventos_form/7.jpg" value="4"></option>
        </select>
    </div>
    <script>
    $("select").imagepicker()
    </script>
</body>

</html>