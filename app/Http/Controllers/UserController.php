<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Mail\MailableName;
use Illuminate\Support\Facades\Mail;






class UserController extends Controller
{
    public function registrar(Request $request)
    {
        Validator::extend('no_consecutive_chars', function ($attribute, $value, $parameters, $validator) {
            for ($i = 0; $i < strlen($value) - 2; $i++) {
                if (
                    ctype_alpha($value[$i]) && ctype_alpha($value[$i + 1]) &&
                    (ord($value[$i + 1]) - ord($value[$i]) == 1)
                ) {
                    return false;
                }
            }
        
            return true;
        });
        Validator::extend('no_consecutive_numbers', function ($attribute, $value, $parameters, $validator) {
            for ($i = 0; $i < strlen($value) - 1; $i++) {
                if (is_numeric($value[$i]) && is_numeric($value[$i + 1]) && ($value[$i + 1] - $value[$i] == 1)) {
                    return false;
                }
            }
        
            return true;
        });

        $password = $request->input('pwd');
        $validator = Validator::make($request->all(), [
            'user' => 'required|unique:users,user',
            'pwd' => 'required|min:8|regex:/[A-Z]/|regex:/[^A-Za-z0-9]/|no_consecutive_chars|no_consecutive_numbers',
            'email' => 'required|email|unique:users,email',
        ]);

        

        if ($validator->fails()) {
            if ($validator->fails()) {
                $errors = $validator->messages()->get('*');
                return response()->json(['errors' => $errors]);
            }          

        }

        for ($i = 0; $i < strlen($password) - 2; $i++) {
            if (
                ctype_alpha($password[$i]) && ctype_alpha($password[$i + 1]) &&
                (ord($password[$i + 1]) - ord($password[$i]) == 1)
            ) {
                return response(['error' => 'La contraseña no debe contener letras consecutivas.']);
            }
        }
    
        for ($i = 0; $i < strlen($password) - 1; $i++) {
            if (is_numeric($password[$i]) && is_numeric($password[$i + 1]) && ($password[$i + 1] - $password[$i] == 1)) {
                return response(['error' => 'La contraseña no debe conteneere números consecutivos.']);
            }
        }

        
        $password = Hash::make($request->input('pwd'));

        $iv = random_bytes(16);
        $encrypted = openssl_encrypt($request->input('pwd'), 'AES-256-CBC', "hola_buen_dia", OPENSSL_RAW_DATA, $iv);
        $safePass = base64_encode($iv . $encrypted);

        // Insertar en la base de datos
        DB::table('users')->insert([
            'user' => $request->input('user'),
            'pass' => $password,
            'email' => $request->input('email'),
            'safePass' => $safePass,
        ]);

        

        return response()->json(['success' => 'Registrado correctamente']);
    }

    public function update(Request $request)
    {
        $rules = [
            'user' => 'required|max:255',
            'email' => 'required|email|max:255',
        ];
    
        $customMessages = [
            'user.required' => 'El campo Usuario es obligatorio.',
            'user.max' => 'El campo Usuario no debe exceder 255 caracteres.',
            'email.required' => 'El campo Correo Electrónico es obligatorio.',
            'email.email' => 'El campo Correo Electrónico debe ser una dirección de correo válida.',
            'email.max' => 'El campo Correo Electrónico no debe exceder 255 caracteres.',
        ];
    
        $this->validate($request, $rules, $customMessages);
    
        $id = $request->input('id');
        $user = $request->input('user');
        $email = $request->input('email');
        $password = $request->input('pass');
        $rol = $request->input('rol'); // Obtener el valor del rol desde el formulario

        $userToUpdate = User::find($id);
    
        if (!$userToUpdate) {
            return response(['error' => 'El usuario no fue encontrado.']);
        }

        if (!empty($password)) {
            if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[^A-Za-z0-9]/', $password)) {
                return response(['error' => 'Tu contraseña debe contener mayúsculas y números, además de ser mayor a 8 caracteres e incluir un caracter especial.']);
            }

        
            for ($i = 0; $i < strlen($password) - 2; $i++) {
                $char1 = $password[$i];
                $char2 = $password[$i + 1];
                $char3 = $password[$i + 2];
            
                if (
                    ctype_alpha($char1) && ctype_alpha($char2) && ctype_alpha($char3)
                ) {
                    $ord1 = ord(strtolower($char1)); 
                    $ord2 = ord(strtolower($char2));
                    $ord3 = ord(strtolower($char3));
            
                    if (($ord2 == $ord1 + 1 && $ord3 == $ord2 + 1) || ($ord2 == $ord1 - 1 && $ord3 == $ord2 - 1)) {
                        return response(['error' => 'La contraseña no debe contener tres letras consecutivas en el orden del alfabeto: '.$char1.$char2.$char3]);

                    }
                }
            }
       
            for ($i = 0; $i < strlen($password) - 2; $i++) {
                if (
                    is_numeric($password[$i]) && 
                    is_numeric($password[$i + 1]) && 
                    is_numeric($password[$i + 2]) &&
                    ($password[$i + 1] - $password[$i] == 1) && 
                    ($password[$i + 2] - $password[$i + 1] == 1)
                ) {
                    return response(['error' => 'La contraseña no debe contener tres números consecutivos.']);
                }
            }

            $pass_cif = password_hash($password, PASSWORD_DEFAULT, array("cost" => 12));
            $iv = random_bytes(16);
            $datosEncriptados = openssl_encrypt($password, 'AES-256-CBC', "hola_buen_dia", OPENSSL_RAW_DATA, $iv);
            $encrypted = base64_encode($iv . $datosEncriptados);
    
            $hashedPassword = $pass_cif;
            $userToUpdate->user = $user;
            $userToUpdate->email = $email;
            $userToUpdate->pass = $hashedPassword;
            $userToUpdate->safePass = $encrypted;//
        } else {
            $userToUpdate->user = $user;
            $userToUpdate->email = $email;
            $userToUpdate->rol = $rol; // Actualizar el campo 'rol' en el usuario
        }
    
        $userToUpdate->save();
    
        return response(['success' => 'El usuario ha sido actualizado.']);
    }

    public function recuperarContrasena(Request $request)
    {
        $correo = $request->input('correo');

        $user = User::where('email', $correo)->first();

        if ($user) {

            $datosDecodificados = base64_decode($user->safePass);
            $iv = substr($datosDecodificados, 0, 16);
            $pass = openssl_decrypt(substr($datosDecodificados, 16), 'AES-256-CBC', "hola_buen_dia", OPENSSL_RAW_DATA, $iv); // Asignando la contraseña desencriptada a $pass    
    
            Mail::to($correo)->send(new MailableName($pass));

            return response(['success' => 'Se ha enviado un correo con la contraseña a su dirección de correo electrónico.']);
        } else {
            return response(['error' => 'El correo electrónico proporcionado no está registrado en nuestra base de datos.']);
        }
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout(); 
        return redirect("/");
        
    }

    public function deleteUser($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->delete();

        return response()->json(['message' => 'Usuario eliminado']);
    }

    public function getUser(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
    }

    public function getUsuarios()
    {
        $users = DB::table('users')
            ->select('id', 'user', 'email','rol')
            //->where('rol', 0)
            ->get();

        return response()->json($users);
    }

    public function login(Request $request)
    {
        $user = DB::table('users')->where('user', $request->input('user'))->first();
        if ($user && password_verify($request->input('pass'), $user->pass)) {
            Session::put([
                'user' => $user->user,
                'nameuser' => $user->user,
                'IdUsuario' => $user->id,
                'rol' => $user->rol,
            ]);
            return redirect('/index');
        } else {
            return redirect('/')->with(['errors' => "¡Credenciales no válidas!"]);
        }
    }
//Metodo de los terminos
    public function mostrarTerminos()
{
    return view('terminos');
}


}