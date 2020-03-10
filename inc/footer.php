    <footer class="container"> 
    <div class="align-self-center"></div>
    </footer>

<script src="<?= BASE; ?>/assets/js/jquery-3.4.1.slim.min.js"></script>
<script src="<?= BASE; ?>/assets/js/popper.min.js"></script>
<script src="<?= BASE; ?>/assets/js/bootstrap.min.js"></script>
<script src="<?= BASE; ?>/assets/js/script.js"></script>
<script src="<?= BASE; ?>/assets/js/moment.min.js"></script>
<script src="<?= BASE; ?>/assets/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker( {
                    format: 'DD/MM/YYYY'
                }                
                );
            });

            $(function () {
                 $('[data-toggle="tooltip"]').tooltip()
        })
        </script>
</body>
</html>