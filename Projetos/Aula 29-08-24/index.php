<?php

    class Departamento{
        public $Dnumero;
        public $Cpf_gerente;
        public $Dnome;
        public $Data_inicio_gerente;
        public $LocDepartamento;
    }

    class Dependente{
        public $idDependente;
        public $Nome;
        public $Sexo;
        public $Datanasc;
        public $Parentesco;
        public $funcionario_Cpf;
    }

    class Funcionario{
        public $Cpf;
        public $Nome;
        public $Datanasc;
        public $Endereco;
        public $Sexo;
        public $Salario;
    }

    class LocalizacaoDep{
        public $Dnumero;
        public $Dlocal;
    }

    class Projeto{
        public $Projnumero;
        public $Projnome;
        public $Projlocal;
        public $Dnum;
    }

    class TrabalhaEm{
        public $idTrabalhaEm;
        public $Fcpf;
        public $Pnr;
        public $Horas;
    }



?>