<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


class AuthController extends Controller
{
    public function register(Request $request)
    {//validator salje POST zahteve, pa tako proverava da li su validni podaci
        $validator = Validator::make($request->all(),[ //ovaj validator kreira neki objekat i smesta ga unutar promenljive validator, ta promenljiva predstavlja objekat koji ima
            //neke promenljive u sebi, jedna od tih metoda je request, koja proverava da li je nas korisnik uspesno prosao sva ogranicenja, ako jeste vraca true, ako ne, vraca false
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if($validator->fails()) //ukoliko uspesno prodje validaciju, kreiraj korisnika i ubaci ga u bazu
            return response()->json($validator->errors());

            $user = User::create([ //kreiramo usera, on cuva automatski sa odredjenim imenom, mejlom i sifrom, cuva u bazi i promenljivoj
                'name' => $request->name,
                'email'=> $request->email,
                'password' => $request -> password,
            ]);

        //moramo da pravimo tokene, tj kada se user registruje da ima token u sebi da se registrovao, da on kasnije moze da se uloguje preko tog tokena
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['data' => $user, 'access_token' => $token, 'token_type' => 'Bearer']);

        //unutar kontrolera kreirali smo metodu, da bismo mogli da je pozovemo moramo da napravimo RUTU
    }
}
