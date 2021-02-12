<?php
 class Usuario{

    private $PDO;
    public $msgErro = ""; //ok

      public function conectar($nome, $host, $usuario, $senha){
        global $PDO;
         try{ // Se a conexao der certo
         $PDO = new PDO("mysql:dbname=".$nome,$usuario,$senha);
            }catch (PDOException $e){ // se não der, mostre o erro 
                  $msgErro = $e->getMessage();
            }
   }
      public function cadastrar($nome, $telefone, $email, $senha){

         global $PDO;
         // Verificar se o usuario ja existe
         $sql = $PDO->prepare("SELECT id_usuario from USUARIO WHERE email = :email");

         $sql->bindValue(":email", $email);
         
         $sql->execute();
         if($sql->rowCount() > 0){
               return false; // Se o ID for maior que zero esta pessoa ja esta cadastrada

         //Caso não, cadastrar
         
         }else{
            $sql = $PDO->prepare("INSERT INTO USUARIO(nome,telefone,email,senha) VALUES (:nome, :telefone, :email, :senha)");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":telefone", $telefone);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", md5($senha));
               return true; // A pessoa foi cadastrada com sucesso

               $sql->execute();
         }
      }
      public function logar(){
        
        global $PDO;
        //Verficar se o email e senha estap cadastrados, se sim
        $sql = $PDO->prepare("SELECT id_usuario FROM USUARIO WHERE email = :email AND senha = :senha");

        $sql->bindValue(":email". $email);
        $sql->bindValue(":senha", md5($senha));

         if($sql->rowCount() > 0){
            $dados = $sql->fetch(); // A funcao Fetch tranforma a variavel em um Array
            session_start();
            $_SESSION['id_usuario'] = $dados['id_usuario'];
               return true; // A pessoa conseguiu logar
         }else{
               return false;
         }
     }
 }
?>