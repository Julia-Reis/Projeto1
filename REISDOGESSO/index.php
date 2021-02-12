<?php
 include "cabecalho.php";

 include "conexao.php";
  
?>
<!-- COMEÇO CAROUSEL -->
 <div class="slider-principal">
 <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
 <ol class="carousel-indicators">
   <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
   <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
   <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
 </ol>
 <div class="carousel-inner">
   <div class="carousel-item active">
     <img src="img/boiserie/01.jpg" width="90" height="500" class="d-block w-100" alt="...">
     <div class="carousel-caption d-none d-md-block">
       <h5>First slide label</h5>
       <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
     </div>
   </div>
   <div class="carousel-item">
     <img src="img/forros/01.jpg" width="90" height="500" class="d-block w-100" alt="...">
     <div class="carousel-caption d-none d-md-block">
       <h5>Second slide label</h5>
       <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
     </div>
   </div>
   <div class="carousel-item">
     <img src="img/3D/01.jpg" width="90" height="500" class="d-block w-100" alt="...">
     <div class="carousel-caption d-none d-md-block">
       <h5>Third slide label</h5>
       <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
     </div>
   </div>
 </div>
 <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
   <span class="sr-only">Previous</span>
 </a>
 <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
   <span class="carousel-control-next-icon" aria-hidden="true"></span>
   <span class="sr-only">Next</span>
 </a>
    </div>
  <!-- FIM CAROUSEL -->

    <div id="index" class="card-deck">
        <div class="card">
            <img src="img/boiserie.jpg" data-toggle="modal" data-target="#modalBoiserie" 
            width="100px" height="300px" class="card-img-top" alt="Boiserie">
            <div class="card-body">
                <h5 class="card-title" data-toggle="modal" data-target="#modalBoiserie">Boiserie</h5>
                <p class="card-text">O boiserie, com a pronúncia “boaserrí”, é um revestimento francês típico do século XVII e XVIII. A técnica consiste em emoldurar as paredes através de molduras em relevo</p>
            </div>
        </div>
        <div class="modal-livros"> <!--  -->
			<div class="modal fade" id="modalBoiserie" tabindex="-1" aria-labelledby="exampleModalBoiserie" aria-hidden="true">
				<div class="modal-dialog modal-lg">
				  <div class="modal-content">
					<div class="modal-header">
					  <h5 class="modal-title" id="exampleModalBoiserie">Boiserie</h5>
					  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
          </div>
          <div id="texto-modal" class="modal-body">
					  <p style="text-align: center;">
						No auge da Segunda Guerra Mundial uma garota ganha em seu aniversário de 13 anos um caderno de autógrafos.
						Tinha um fecho, capa dura de tecido xadrez vermelho e branco.
						O nome da garota era Anne Frank e ela gostava muito de escrever.
						Por isso, transforma o caderno em um diário.
						Menos de um mês depois, Anne, a irmã Margot e os pais vão para um esconderijo secreto,
						onde passam mais de dois anos, com outras quatro pessoas, para não serem enviados para um campo de concentração.
					  </p>
					</div>
          <div class="imagens-modal">
            <table>
              <tr>
              <?php
              $sql = "SELECT i.id_imagem_servico, i.arquivo, s.nome FROM imagens_servico i  
              inner join servico s  on i.cod_servico = s.id_servico WHERE s.nome LIKE '%Boiserie%'";
              $result = mysqli_query($conexao, $sql);
              $row = mysqli_fetch_array($result);
              
                while($linha = mysqli_fetch_array($result)){
                  $imagens[] = $linha;
                }
                if(empty($imagens)){
                  echo "<h2> Ainda não há imagens cadastradas! </h2>"; 
               }else{
              $cont = 0;
              foreach($imagens as $row){
               
                $cont++;
                ?>
                <td>
                  <img src="<?php echo "img/fotos/".$row["arquivo"]?>" width="200px" height="200px"/>
                  <br />
                  <?php
                  if(isset($_SESSION['usuario'])){
                    if($_SESSION["permissao"] == 1){
                    echo ' 
                    <form method="POST" action="excluir_imagem.php">
                      <input type="hidden" name="id" value="'.$row["id_imagem_servico"].'">

                      <button type="submit" name="excluir_imagem" class="btn btn-outline-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                      <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                    </svg>
                    </button>
                    </form>
                    ';
                    }
                  }
                ?>
                </td>
                <?php    
                  if($cont == 3){
                      echo "</tr>";
                      echo "<tr>";
                      $cont = 0;
                  }
              }
            }
                ?> 
             </tr>
            </table>
            </div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					  <button type="button" class="btn btn-primary">Save changes</button>
					</div>
				  </div>
				</div>
			  </div>
			</div>
      <!-- FIM BOISERIE -->
      <!-- COMEÇO DRYWALL -->
        <div class="card">
            <img src="img/drywall.jpg" data-toggle="modal" data-target="#modalDrywall" width="100px" height="300px" class="card-img-top" alt="Drywall">
            <div class="card-body">
                <h5 class="card-title" data-toggle="modal" data-target="#modalDrywall">Drywall</h5>
                <p class="card-text">O drywall é a solução prática para quem precisa dividir um ambiente, embutir iluminação, isolar barulhos ou montar uma estante. O melhor de tudo isso, é que você não vai precisar fazer grandes reformas, já que o material pode se adaptar às necessidades do ambiente com facilidade.</p>
            </div>
        </div>
        <div class="modal-livros"> <!--  -->
			<div class="modal fade" id="modalDrywall" tabindex="-1" aria-labelledby="exampleModalDrywall" aria-hidden="true">
				<div class="modal-dialog modal-lg">
				  <div class="modal-content">
					<div class="modal-header">
					  <h5 class="modal-title" id="exampleModalDrywall">Drywall</h5>
					  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
          </div>
          <div id="texto-modal" class="modal-body">
					  <p style="text-align: center;">
						No auge da Segunda Guerra Mundial uma garota ganha em seu aniversário de 13 anos um caderno de autógrafos.
						Tinha um fecho, capa dura de tecido xadrez vermelho e branco.
						O nome da garota era Anne Frank e ela gostava muito de escrever.
						Por isso, transforma o caderno em um diário.
						Menos de um mês depois, Anne, a irmã Margot e os pais vão para um esconderijo secreto,
						onde passam mais de dois anos, com outras quatro pessoas, para não serem enviados para um campo de concentração.
					  </p>
					</div>
          <div class="imagens-modal">
            <table>
              <tr>
              <?php
              $sql_drywall = "SELECT i.id_imagem_servico, i.arquivo, s.nome FROM imagens_servico i  
              inner join servico s  on i.cod_servico = s.id_servico WHERE s.nome LIKE '%Drywall%'";
              $result_drywall = mysqli_query($conexao, $sql_drywall);
              $row_drywall = mysqli_fetch_array($result_drywall);
              
                while($linha_drywall = mysqli_fetch_array($result_drywall)){
                  $imagens_drywall[] = $linha_drywall;
                }
                if(empty($imagens_drywall)){
                  echo "ainda não há imagens cadastradas!"; 
               }else{
              $cont = 0;
              foreach($imagens_drywall as $row_drywall){
               
                $cont++;
                ?>
                <td>
                  <img src="<?php echo "img/fotos/".$row_drywall["arquivo"]?>" width="200px" height="200px"/>
                  <br />
                  <?php
                  if(isset($_SESSION['usuario'])){
                    if($_SESSION["permissao"] == 1){
                    echo ' 
                  <form method="POST" action="excluir_imagem.php">
                    <input type="hidden" name="id" value="'.$row_drywall["id_imagem_servico"].'">
                  <button type="submit" name="excluir_imagem" class="btn btn-outline-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                </svg>
                </button>
                </form>
                ';
                    }
                  }
                ?>
                </td>
                <?php    
                  if($cont == 3){
                      echo "</tr>";
                      echo "<tr>";
                      $cont = 0;
                  }
              }
            }
                ?> 
             </tr>
            </table>
            </div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					  <button type="button" class="btn btn-primary">Save changes</button>
					</div>
				  </div>
				</div>
			  </div>
			</div>
        <div class="card">
            <img src="img/florao.jpg" data-toggle="modal" data-target="#modalFloroes" width="100px" height="300px" class="card-img-top" alt="Florão">
            <div class="card-body">
                <h5 class="card-title" data-toggle="modal" data-target="#modalFloroes">Florões</h5>
                <p class="card-text">Os Florões constituem uma nova tendência em decoração de interiores, a aplicação deste elemento decorativo não só embeleza e personaliza mas também valoriza o espaço em que é utilizado, dando um requinte de luxo.</p>
            </div>
        </div> 
    </div>
    <!-- FIM DRYWALL -->
    <!-- COMEÇO FLORÕES -->
    <div class="modal-livros"> <!--  -->
			<div class="modal fade" id="modalFloroes" tabindex="-1" aria-labelledby="exampleModalFloroes" aria-hidden="true">
				<div class="modal-dialog modal-lg">
				  <div class="modal-content">
					<div class="modal-header">
					  <h5 class="modal-title" id="exampleModalFloroes">Florões</h5>
					  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
          </div>
          <div id="texto-modal" class="modal-body">
					  <p style="text-align: center;">
						No auge da Segunda Guerra Mundial uma garota ganha em seu aniversário de 13 anos um caderno de autógrafos.
						Tinha um fecho, capa dura de tecido xadrez vermelho e branco.
						O nome da garota era Anne Frank e ela gostava muito de escrever.
						Por isso, transforma o caderno em um diário.
						Menos de um mês depois, Anne, a irmã Margot e os pais vão para um esconderijo secreto,
						onde passam mais de dois anos, com outras quatro pessoas, para não serem enviados para um campo de concentração.
					  </p>
					</div>
          <div class="imagens-modal">
            <table>
              <tr>
              <?php
              $sql_floroes = "SELECT i.id_imagem_servico, i.arquivo, s.nome FROM imagens_servico i  
              inner join servico s  on i.cod_servico = s.id_servico WHERE s.nome LIKE '%Floroes%'";
              $result_floroes = mysqli_query($conexao, $sql_floroes);
              $row_floroes = mysqli_fetch_array($result_floroes);
              
                while($linha_floroes = mysqli_fetch_array($result_floroes)){
                  $imagens_floroes[] = $linha_floroes;
                }
                if(empty($imagens_floroes)){
                  echo "<h2> Ainda não há imagens cadastradas! </h2>"; 
               }else{
              $cont = 0;
              foreach($imagens_floroes as $row_floroes){
               
                $cont++;
                ?>
                <td>
                  <img src="<?php echo "img/fotos/".$row_floroes["arquivo"]?>" width="200px" height="200px"/>
                  <br />
                  <?php
                  if(isset($_SESSION['usuario'])){
                    if($_SESSION["permissao"] == 1){
                    echo ' 
                  <form method="POST" action="excluir_imagem.php">
                    <input type="hidden" name="id" value="'.$row_floroes["id_imagem_servico"].'">
                  <button type="submit" name="excluir_imagem" class="btn btn-outline-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                </svg>
                </button>
                </form>
                ';
                    }
                  }
                  ?>
                </td>
                <?php    
                  if($cont == 3){
                      echo "</tr>";
                      echo "<tr>";
                      $cont = 0;
                  }
              }
            }
                ?> 
             </tr>
            </table>
            </div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					  <button type="button" class="btn btn-primary">Save changes</button>
					</div>
				  </div>
				</div>
			  </div>
			</div>
      <!-- FIM FLORÕES -->
      <!-- COMEÇO FORROS -->
    <div id="index" class="card-deck">   
        <div class="card">
            <img src="img/forro.jpg" data-toggle="modal" data-target="#modalForros" width="100px" height="300px" class="card-img-top" alt="Forro em gesso">
            <div class="card-body">
                <h5 class="card-title" data-toggle="modal" data-target="#modalForros">Forros</h5>
                <p class="card-text">Prático e versátil, o forro de gesso é uma das opções de cobertura mais utilizadas em projetos arquitetônicos e de decoração, para rebaixar teto, disfarçar vigas, imperfeições, e embutir iluminação especial. Além disso, promove efeito estético permitindo a criação de formas e desenhos</p>
            </div>
        </div>
        <div class="modal-livros"> <!--  -->
			<div class="modal fade" id="modalForros" tabindex="-1" aria-labelledby="exampleModalForros" aria-hidden="true">
				<div class="modal-dialog modal-lg">
				  <div class="modal-content">
					<div class="modal-header">
					  <h5 class="modal-title" id="exampleModalForros">Forros</h5>
					  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
          </div>
          <div id="texto-modal" class="modal-body">
					  <p style="text-align: center;">
						No auge da Segunda Guerra Mundial uma garota ganha em seu aniversário de 13 anos um caderno de autógrafos.
						Tinha um fecho, capa dura de tecido xadrez vermelho e branco.
						O nome da garota era Anne Frank e ela gostava muito de escrever.
						Por isso, transforma o caderno em um diário.
						Menos de um mês depois, Anne, a irmã Margot e os pais vão para um esconderijo secreto,
						onde passam mais de dois anos, com outras quatro pessoas, para não serem enviados para um campo de concentração.
					  </p>
					</div>
          <div class="imagens-modal">
            <table>
              <tr>
              <?php
              $sql_forro = "SELECT i.id_imagem_servico, i.arquivo, s.nome FROM imagens_servico i  
              inner join servico s  on i.cod_servico = s.id_servico WHERE s.nome LIKE '%Forro%'";
              $result_forro = mysqli_query($conexao, $sql_forro);
              $row_forro = mysqli_fetch_array($result_forro);
              
                while($linha_forro = mysqli_fetch_array($result_forro)){
                  $imagens_forro[] = $linha_forro;
                }
                if(empty($imagens_forro)){
                  echo "<h2> Ainda não há imagens cadastradas! </h2>"; 
               }else{
              $cont = 0;
              foreach($imagens_forro as $row_forro){
               
                $cont++;
                ?>
                <td>
                  <img src="<?php echo "img/fotos/".$row_forro["arquivo"]?>" width="200px" height="200px"/>
                  <br />
                  <?php
                  if(isset($_SESSION['usuario'])){
                    if($_SESSION["permissao"] == 1){
                    echo ' 
                  <form method="POST" action="excluir_imagem.php">
                    <input type="hidden" name="id" value="'.$row_forro["id_imagem_servico"].'">
                  <button type="submit" name="excluir_imagem" class="btn btn-outline-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                </svg>
                </button>
                </form>
                ';
                    }
                  }
                ?>
                </td>
                <?php    
                  if($cont == 3){
                      echo "</tr>";
                      echo "<tr>";
                      $cont = 0;
                  }
              }
            }
                ?> 
             </tr>
            </table>
            </div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
					</div>
				  </div>
				</div>
			  </div>
			</div>
        <!-- FIM FORROS -->
        <!-- COMEÇO MOLDURAS 3D -->
        <div class="card">
            <img src="img/moldura 3d.jpg" data-toggle="modal" data-target="#modalMolduras3D" width="100px" height="300px" class="card-img-top" alt="Moldura 3D (alto relevo)">
            <div class="card-body">
                <h5 class="card-title" data-toggle="modal" data-target="#modalMolduras3D">Molduras 3D</h5>
                <p class="card-text">O gesso 3D é um tipo de revestimento aplicado em placas cheias de estilo e movimento, graças aos seus desenhos em alto-relevo. Essas placas podem ser vendidas prontas ou montadas a partir de formas, que você também encontra para comprar em algumas lojas de construção e decoração.</p>
            </div>
        </div>
        <div class="modal-livros"> <!--  -->
			<div class="modal fade" id="modalMolduras3D" tabindex="-1" aria-labelledby="exampleModalMolduras3D" aria-hidden="true">
				<div class="modal-dialog modal-lg">
				  <div class="modal-content">
					<div class="modal-header">
					  <h5 class="modal-title" id="exampleModalMolduras3D">Molduras 3D</h5>
					  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
          </div>
          <div id="texto-modal" class="modal-body">
					  <p style="text-align: center;">
						No auge da Segunda Guerra Mundial uma garota ganha em seu aniversário de 13 anos um caderno de autógrafos.
						Tinha um fecho, capa dura de tecido xadrez vermelho e branco.
						O nome da garota era Anne Frank e ela gostava muito de escrever.
						Por isso, transforma o caderno em um diário.
						Menos de um mês depois, Anne, a irmã Margot e os pais vão para um esconderijo secreto,
						onde passam mais de dois anos, com outras quatro pessoas, para não serem enviados para um campo de concentração.
					  </p>
					</div>
          <div class="imagens-modal">
            <table>
              <tr>
              <?php
              $sql_molduras3D = "SELECT i.id_imagem_servico, i.arquivo, s.nome FROM imagens_servico i  
              inner join servico s  on i.cod_servico = s.id_servico WHERE s.nome LIKE '%Moldura%3D%'";
              $result_molduras3D = mysqli_query($conexao, $sql_molduras3D);
              $row_molduras3D = mysqli_fetch_array($result_molduras3D);
              
                while($linha_molduras3D = mysqli_fetch_array($result_molduras3D)){
                  $imagens_molduras3D[] = $linha_molduras3D;
                }
                if(empty($imagens_molduras3D)){
                  echo "<h2> Ainda não há imagens cadastradas! </h2>"; 
               }else{
              $cont = 0;
              foreach($imagens_molduras3D as $row_molduras3D){
               
                $cont++;
                ?>
                <td>
                  <img src="<?php echo "img/fotos/".$row_molduras3D["arquivo"]?>" width="200px" height="200px"/>
                  <br />
                  <?php
                  if(isset($_SESSION['usuario'])){
                    if($_SESSION["permissao"] == 1){
                    echo ' 
                  <form method="POST" action="excluir_imagem.php">
                    <input type="hidden" name="id" value="'.$row_molduras3D["id_imagem_servico"].'">
                  <button type="submit" name="excluir_imagem" class="btn btn-outline-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                </svg>
                </button>
                </form>
                ';
                    }
                  }
                ?>
                </td>
                <?php    
                  if($cont == 3){
                      echo "</tr>";
                      echo "<tr>";
                      $cont = 0;
                  }
              }
            }
                ?> 
             </tr>
            </table>
            </div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					  <button type="button" class="btn btn-primary">Save changes</button>
					</div>
				  </div>
				</div>
			  </div>
			</div>
      <!-- FIM MOLDURAS 3D -->
      <!-- COMEÇO REPAROS -->
        <div class="card">
            <img src="img/reparos.png" width="100px" height="300px" class="card-img-top" alt="Reparos em geral">
            <div class="card-body">
                <h5 class="card-title">Reparos em geral</h5>
                <p class="card-text">Um pedacinho da moldura caiu ou aconteceu algum problema? Nós consertamos!</p>
            </div>
        </div>
      </div>
          </div>  
    </div>
<?php
  include "rodape.php";
?>
