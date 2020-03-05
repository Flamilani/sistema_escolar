<?php 

    function nivel($nivel) {
        switch ($nivel) {
            case 1:
                return 'Administrador';
            break;
            case 2:
                return 'Professor';
            break;
            case 3:
                return 'Aluno';
            break;
            default:
            return 'Sem nivel';
            break;
        }
      
    }
    
    function statusConteudo($status) {
        switch ($status) {
            case 1:
                return '<h4><span class="badge badge-pill badge-success">Concluido</span><h4>';
            break;
            case 2:
                return '<h4><span class="badge badge-pill badge-danger">Atrasado</span><h4>';
            break;
            default:
            return 'Sem status';
            break;
        }
      
    }

?>