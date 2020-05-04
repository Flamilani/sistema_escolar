    <footer class="container"> 
    <div class="text-center mb-3">
    <hr /> 
    Todos os direitos autorais - <?php echo date("Y"); ?> - Desenvolvido por Flavio Milani
    </div>
    </footer>

<script src="<?= BASE; ?>/assets/js/popper.min.js"></script>
<script src="<?= BASE; ?>/assets/js/bootstrap.min.js"></script>
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