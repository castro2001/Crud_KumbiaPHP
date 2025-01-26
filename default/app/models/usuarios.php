<?php

class Usuarios extends ActiveRecord
{
    public function login(string $email, string $password)
    {
        $email = $this->escape($email);
        $user = $this->find_first("email = '$email'");
    
        if ($user && $user->password) {
            return $user; // Login exitoso
        }
    
        return false; // Credenciales incorrectas
    }
    
    // Método para escapar datos y evitar inyecciones SQL
    private function escape(string $value): string
    {
        return addslashes($value);
    }
    
}

    