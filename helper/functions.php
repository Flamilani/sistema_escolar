<?php 

    function status($status) {
        switch ($status) {
            case 0:
                return 'Inativo';
            break;
            case 1:
                return 'Ativo';
            break;
            default:
            return 'Sem status';
            break;
        }
    
    }

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

    function painel($painel) {
        switch ($painel) {
            case 1:
                return 'Administrativo';
            break;
            case 2:
                return 'do Professor';
            break;
            case 3:
                return 'do Aluno';
            break;
            default:
            return 'Sem informação';
            break;
        }
      
    }
    
    function statusConteudo($status) {
        switch ($status) {
            case 1:
                return '<h4><span class="badge badge-pill badge-success">Concluído</span><h4>';
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