<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateAdmin extends Command
{
    protected $signature = 'admin:create';

    protected $description = 'Crea una cuenta administradora mediante preguntas interactivas';

    public function handle(): int
    {
        $name = trim((string) $this->ask('Nombre del administrador'));
        $email = mb_strtolower(trim((string) $this->ask('Correo electrónico')));
        $password = (string) $this->secret('Contraseña (mínimo 12 caracteres)');
        $confirmation = (string) $this->secret('Confirma la contraseña');

        if ($password !== $confirmation) {
            $this->error('Las contraseñas no coinciden.');

            return self::FAILURE;
        }

        $validator = Validator::make(compact('name', 'email', 'password'), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email:rfc', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:12'],
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $message) {
                $this->error($message);
            }

            return self::FAILURE;
        }

        $admin = new User();
        $admin->name = $name;
        $admin->email = $email;
        $admin->password = Hash::make($password);
        $admin->is_admin = true;
        $admin->save();

        $this->info('Cuenta administradora creada.');

        return self::SUCCESS;
    }
}
