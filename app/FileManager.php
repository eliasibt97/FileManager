<?php

class FileManager {

    private string $fileRoute;
    public int   $Muno;
    public int   $Mdos;
    public int   $N;
    public mixed $comandoUno;
    public mixed $comandoDos;

    public function __construct($fileRoute) {
        return $this->fileRoute = $fileRoute;
    }

    
    public function getFile(): void {
        $file = file($this->fileRoute);
        $this->splitFileContent($file);
        return;
    }

    public function crearArchivo($respuestaUno, $respuestaDos): string {
        
        try{
            $fileHandler = fopen('assets/files/outputs/output.txt','w');
            fwrite($fileHandler, $respuestaUno."\n");
            fwrite($fileHandler, $respuestaDos."\n");
            fclose($fileHandler);
            return "Archivo Creado con éxito";
        } catch(Exception $e) {
            return "Ocurrió un error al crear el archivo";
        }
    }
    
    private function splitAndAssignNumbers(string $numeros): void {
        $splitedNumeros = explode(" ", $numeros);
        $this->Muno = $splitedNumeros[0];
        $this->Mdos = $splitedNumeros[1];
        $this->N = $splitedNumeros[1];
        return;
    }

    private function splitFileContent(array $file): void {
        $this->splitAndAssignNumbers($file[0]);
        $this->comandoUno = $file[1];
        $this->comandoDos = $file[2];
        return;
    }
} 