<?php
class Disciplina
{
    //public string $aluno;
    //public float $notaTrabalho;
    //public float $notaProva;
    public static $media = 0;

    /*function __construct(string $aluno, float $notaTrabalho, float $notaProva)
    {
        $this->aluno = $aluno;
        $this->notaTrabalho = $notaTrabalho;
        $this->notaProva = $notaProva;
        self::$media = $this->notaProva + $this->notaTrabalho;
    }*/
    function __construct(public string $aluno, public float $notaTrabalho, public float $notaProva)
    {
        self::$media = $this->notaProva + $this->notaTrabalho;
    }
    public function situacao(): string
    {
        if (self::$media >= 7) {
            return "Aluno(a) {$this->aluno} está <strong>aprovado(a)</strong>. Média: " . self::$media . "<hr>";
        } else {
            return "Aluno(a) {$this->aluno} está <strong>reprovado(a)</strong>. Média: " . self::$media . "<hr>";
        }
    }
    static function situacaoAluno(float $nota): string
    {
        if ($nota >= 7) {
            return "Aluno(a) está <strong>aprovado(a)</strong>. Média: " . $nota . "<hr>";
        } else {
            return "Aluno(a) está <strong>reprovado(a)</strong>. Média: " . $nota . "<hr>";
        }
    }
}
