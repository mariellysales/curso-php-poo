<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Interface</title>
</head>
<body>
    <?php
require './ICurso.php';
require './CursoPosGraduacao.php';
require './CursoGraduacao.php';

$cursoPosGraduacao = new CursoPosGraduacao();
echo $cursoPosGraduacao->disciplina("Desenvolvimento Web");
echo $cursoPosGraduacao->professor("Cesar");

$cursoGraduacao = new CursoGraduacao();
echo $cursoGraduacao->disciplina("Programação Orientada a Objeto");
echo $cursoGraduacao->professor("Leonardo")
    ?>
</body>
</html>