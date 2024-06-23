<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validación de datos de entrada (puedes añadir validaciones personalizadas aquí)
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Recuperar los datos del formulario
        $username = $request->input('username');
        $password = $request->input('password');

        // Llamar al procedimiento almacenado para consultar las credenciales del usuario
        try {
            $result = DB::select('CALL consultar_credenciales_usuario(?)', [$username]);

            // Verificar si se encontró el usuario y validar la contraseña
            if (!empty($result)) {
                $user = $result[0];

                // Comparar la contraseña encriptada almacenada con la proporcionada por el usuario
                if (password_verify($password, $user->clave)) {
                    // Verificar si el usuario está activo
                    if ($user->activo == 1) {
                        // Usuario válido, puedes proceder con la lógica de inicio de sesión
                        // Por ejemplo, guardar datos en sesión, redireccionar, etc.
                        return redirect()->route('cordilleras-cuencas'); // Ejemplo de redirección al dashboard
                    } else {
                        return back()->with('error', 'Usuario inactivo.');
                    }
                } else {
                    return back()->with('error', 'Credenciales incorrectas.');
                }
            } else {
                return back()->with('error', 'Usuario no encontrado.');
            }
        } catch (\Exception $e) {
            // Captura de excepciones en caso de error con el procedimiento almacenado
            return back()->with('error', 'Error en la base de datos: ' . $e->getMessage());
        }
    }
}
