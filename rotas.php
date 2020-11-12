<?php

try {

    switch($uri_parse)
    {
        // Tela inicial.
        case '/':
            include 'Views/home.php';
        break;


        // Rotas para trabalhar com produtos.
        case '/produto':       
            include 'Views/modulos/produto/listar_produtos.php';
        break;

        case '/produto/cadastrar':
            include 'Views/modulos/produto/cadastrar_produto.php';
        break;

        case '/produto/ver':

            /**
             * Obtém um produto
             */
            if(isset($_GET['id']))
            {
                include PATH_DAO . 'ProdutoDAO.php';

                $produto_dao = new ProdutoDAO();

                $dados_produto = $produto_dao->getById($_GET['id']);

                include 'Views/modulos/produto/cadastrar_produto.php';

            } else 
                header("Location: /produto");                    
        break;



        // Rotas para trabalhar com categorias
        case '/categoria':

            include PATH_DAO . 'CategoriaDAO.php';
            $categoria_dao = new CategoriaDAO();
            $lista_categorias = $categoria_dao->getAllRows();
            $total_categorias = count($lista_categorias);

            include 'Views/modulos/categoria/listar_categorias.php';
        break;

        case '/categoria/cadastrar':
            include 'Views/modulos/categoria/cadastrar_categoria.php';
        break;

        case '/categoria/salvar':
        break;

        case '/categoria/ver':

            if(isset($_GET['id']))
            {
                include 'DAO/CategoriaDAO.php';

                $categoria_dao = new CategoriaDAO();

                $dados_categoria = $categoria_dao->getById($_GET['id']);

                include 'Views/modulos/categoria/cadastrar_categoria.php';
            } else 
                header("Location: /categoria");            
        break;

        case '/categoria/excluir':
            if(isset($_GET['id']))
            {
                include 'DAO/CategoriaDAO.php';

                $categoria_dao = new CategoriaDAO();

                $categoria_dao->delete($_GET['id']);

                header("Location: /categoria?excluido=true");
            } else 
                header("Location: /categoria");  
        break;



        

        default:
            echo "Rota inválida";
        break;
    }

} catch(Exception $e) {
    echo "Deu ruim " . $e->getMessage();
}