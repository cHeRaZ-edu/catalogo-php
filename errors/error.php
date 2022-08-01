<?php
function messageLog($title,$error) {
?>
    <style>
        body {
            background-color: #343a40!important;
            color: #fff !important;
            font-weight: bold !important;
            font-size: 18px !important;
        }
        .error {
            color: #e52626 !important;
        }
    </style>
    <label class="error"><i><?= $error ?></i></label>
<?php
    }
?>