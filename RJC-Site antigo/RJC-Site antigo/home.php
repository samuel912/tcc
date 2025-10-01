<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Respire: o jogo da calma</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      background: #fff;
      color: #333;
      line-height: 1.6;
    }

    header {
      background: #ffffff;
      padding: 20px 10px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .menu {
      max-width: 1000px;
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      align-items: center;
    }

    .menu h1 {
      color: #5a6cb3;
      font-size: 22px;
    }

    .nav-buttons {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }

    .nav-buttons a {
      background-color: #ffafbc;
      color: white;
      text-decoration: none;
      padding: 10px 18px;
      border-radius: 6px;
      font-weight: bold;
      transition: background-color 0.3s;
    }

    .nav-buttons a:hover {
      background-color: #f58c9b;
    }

    .main {
      max-width: 900px;
      margin: 40px auto;
      padding: 20px;
    }

    .main h1 {
      font-size: 28px;
      font-weight: bold;
      margin: 20px 0;
    }

    .main h2 {
      font-size: 24px;
      font-weight: bold;
      margin: 30px 0 15px;
    }

    .main p {
      font-size: 17px;
      margin-bottom: 15px;
      text-align: justify;
    }

    .main a {
      color: #009688;
      text-decoration: none;
      font-weight: bold;
    }

    .main a:hover {
      text-decoration: underline;
    }

    footer {
      text-align: center;
      font-size: 14px;
      color: #888;
      margin: 30px 0;
    }
  </style>
</head>
<body>

  <header>
    <div class="menu">
      <h1>RESPIRE: O JOGO DA CALMA</h1>
      <div class="nav-buttons">
        <a href="#">Início</a>
        <a href="exercicios.php">Exercícios</a>
        <a href="#">Diário</a>
        <a href="#">Músicas</a>
        <a href="logout.php">Sair</a>
        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1): ?>
            <a href="admin.php">Painel Admin</a>
        <?php endif; ?>
      </div>
    </div>
  </header>

  <div class="main">

  <h2>Quem nós somos?</h2>

    <p>Vivemos em uma era em que a tecnologia está presente em quase todos os aspectos da nossa rotina.
      Ela facilita o acesso à informação, aproxima pessoas e abre caminhos para novas formas de cuidado — inclusive com a saúde emocional.
      Pensando nisso, este site foi criado como um espaço de apoio para quem convive com a ansiedade e, muitas vezes, não sabe por onde começar a buscar ajuda.</p>

    <p> Aqui, você encontrará ferramentas simples que podem te ajudar a desacelerar, refletir e encontrar um pouco de paz no meio da correria do dia a dia.
      A proposta é oferecer um ambiente seguro, acolhedor e acessível, onde você possa registrar seus sentimentos, escutar músicas tranquilas <p>
    
    <h2>O que é ansiedade?</h2>

    <p>A ansiedade é um sentimento natural e está relacionada, por exemplo, com um prazo apertado ou uma tarefa urgente no trabalho.
      Já os transtornos de ansiedade acometem pessoas que, geralmente, se preocupam intensamente e não conseguem lidar com essa autocobrança,
      a ponto de comprometer sua qualidade de vida e seu bem-estar.</p>

    <P> Os transtornos ansiosos surgem como uma reação emocional diante de ameaças futuras.
      Seus principais gatilhos são a incerteza e a imprevisibilidade. O primeiro indício costuma ser uma inquietação quanto ao que pode ou irá acontecer,
      muitas vezes acompanhada por pensamentos pessimistas. Isso desencadeia uma sensação de urgência, medo, insegurança e perigo,
      ativando no corpo e no cérebro a resposta instintiva de “lutar” ou “fugir”.
      </P>
    <p>Por exemplo, alguém submetido a pressões intensas no trabalho pode, inicialmente, apresentar sinais como tensão muscular, irritabilidade e raiva.
          Com o tempo, esses sintomas podem evoluir para quadros de insegurança, instabilidade emocional (caracterizada por mudanças bruscas de humor e sentimentos),
          além de tremores e suor excessivo.
      </p>

    <h2>Quais são os tipos de transtornos de ansiedade?</h2>

    <h4>Os tipos mais comuns de transtornos de ansiedade e suas principais características incluem:</h4> 
<p> </p>
    <p>Transtorno de Ansiedade Generalizada (TAG): caracterizado por preocupações excessivas e uma análise detalhada de diversos aspectos do cotidiano, mesmo os mais simples.</p>
    <p>Transtorno Obsessivo-Compulsivo (TOC): envolve pensamentos persistentes e irracionais (obsessões) que levam a comportamentos repetitivos e compulsivos como forma de alívio.</p>
    <p>Fobia Social (ou Transtorno de Ansiedade Social): marcado por um medo intenso e persistente de situações sociais comuns, com receio de julgamento ou constrangimento.</p>
    <p>Síndrome do Pânico: manifesta-se por meio de crises súbitas e intensas de medo, acompanhadas de mal-estar físico e emocional.</p>
    <p>Agorafobia: envolve o medo de estar em locais ou situações em que a pessoa sinta que não poderá escapar facilmente ou obter ajuda, como multidões ou espaços fechados.</p>

  </div>

  <footer>
    &copy; <?php echo date('Y'); ?> Respire: o jogo da calma
  </footer>

</body>
</html>

