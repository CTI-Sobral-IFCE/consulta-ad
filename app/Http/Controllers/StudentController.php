<?php

namespace App\Http\Controllers;

use Adldap\AdldapInterface;
use App\Rules\ReCAPTCHAv3;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('student.index');
    }

    public function search(Request $request, AdldapInterface $adldap)
    {
        $data = $request->validate([
            'cpf' => 'required|cpf',
            'data_nascimento' => 'required|date_format:Y-m-d',
            //'grecaptcha' => ['required', new ReCAPTCHAv3],
        ]);

        $data['cpf'] = preg_replace('/[^0-9]/', '', $data['cpf']);
        $data['data_nascimento'] = preg_replace('/[^0-9]/', '', $data['data_nascimento']);

        return view('student.search', [
            'student' => $this->searchLdap($data, $adldap)
        ]);
    }

    private function searchLdap($data, AdldapInterface $adldap)
    {
        try {
            $student = $adldap->search()->select(['cn', 'description', 'mailNickname', 'extensionAttribute6', 'extensionAttribute7', 'mail', 'memberOf'])->where([
                    ['extensionAttribute6', '=', $data['cpf']],
                    ['extensionAttribute7', '=', $data['data_nascimento']]
                ])->get();
        } catch (\Exception $e) {
            return dd($e->getMessage());
        }

        return $student;
    }
}
