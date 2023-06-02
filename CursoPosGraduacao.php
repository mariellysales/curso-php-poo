<?php
class CursoPosGraduacao implements ICurso
{
    public string $nomeDisciplina;
    public string $nomeProfessor;

    public function disciplina(string $nomeDisciplina): string
    {
        $this->nomeDisciplina = $nomeDisciplina;
        return "Nome da disciplina: {$this->nomeDisciplina} <br>";
    }

    public function professor(string $nomeProfessor): string
    {
        $this->nomeProfessor = $nomeProfessor;
        return "Nome do professor: {$this->nomeProfessor} <hr>";
    }
}