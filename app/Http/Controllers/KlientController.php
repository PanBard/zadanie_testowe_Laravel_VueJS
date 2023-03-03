<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Klient;
class KlientController extends Controller
{
    public function przekieruj_na_liste_klientow()
    {
        return view('klienci.lista_klientow'); 
        
    }

    public function przekieruj_na_dodaj_klienta()
    {
        return view('klienci.dodaj_klienta'); 
    }


    public function zwroc_dane_klientow()
    {
        return Klient::all();
    }



    public function wstaw_nowego_klienta(Request $request)
    {
        $newKlient = new Klient;
        $newKlient->name=$request->klient["name"];
        $newKlient->surname=$request->klient["surname"];
        $newKlient->phone_number=$request->klient["phone_number"];
        $newKlient->adress=$request->klient["adress"];
        $newKlient->email=$request->klient["email"];
        $newKlient->field=$request->klient["field"];
        $newKlient->department=$request->klient["department"];
        $newKlient->save();

        return $newKlient;
    }

     /**
     * Remove the specified resource from storage.
     */
    public function usun_klienta(string $id)
    {   
        $existingKlient = Klient::find( $id );

        if ($existingKlient){
            $existingKlient->delete();
            return "Klient został usunięty!";
        }
        return "Klient nie został znaleziony!";
    }



     /**
     * Update the specified resource in storage.
     */
    public function zmodyfikuj_klienta(Request $request, string $id)
    {
        $existingKlient = Klient::find( $id );

        if ($existingKlient) {
            $existingKlient->completed = $request->klient["completed"] ? true : false;
            $existingKlient->save();
            return $existingklient;
        }

        return "Klient nie został znaleziony!";
    }




}
