<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="plugins/adminlte.min.css">


    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <style>
        .bg-info {
            /* background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(253,29,29,1) 0%, rgba(255,151,0,1) 100%); */
            background: linear-gradient(80deg, rgba(2, 0, 36, 1) 0%, rgba(240, 17, 112, 1) 0%, rgba(254, 101, 7, 1) 100%);
        }

        .bg-success {
            background: linear-gradient(80deg, rgba(2, 0, 36, 1) 0%, rgba(13, 178, 147, 1) 0%, rgba(142, 200, 66, 1) 100%);
        }

        .bg-warning {
            /* background: linear-gradient(80deg, rgba(2, 0, 36, 1) 0%, rgba(252, 92, 30, 1) 0%, rgba(247, 176, 50, 1) 100%); */
            background: linear-gradient(-315deg, rgba(255, 164, 214, 1) 0%, rgba(133, 30, 172, 1) 100%);
        }

        .bg-danger {
            background: linear-gradient(229deg, rgba(2, 0, 36, 1) 0%, rgba(101, 25, 207, 1) 0%, rgba(41, 111, 249, 1) 100%);
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#previewImg").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }
    </script>
</head>