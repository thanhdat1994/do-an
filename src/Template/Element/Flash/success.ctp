<!-- <head>
    <?= $this->Html->css('sweetalert.css') ?>
    <?= $this->Html->script('sweetalert.min.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <script type="text/javascript">
        function success(){
            swal("Success",$message,"success");
        }
    </script>
</head>
<body>
<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div onclick="success();"></div>
</body> -->

<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-success" onclick="this.classList.add('hidden');"><?= $message ?></div>