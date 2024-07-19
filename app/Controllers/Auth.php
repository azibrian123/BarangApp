<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{

    protected $authModel;

    public function __construct()
    {
        $this->authModel = new AuthModel;
    }

    public function login(): string
    {
        return view('auth/login');
    }

    public function register(): string
    {
        session();
        return view('auth/register');
    }

    public function saveRegister()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|unique',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'unique' => '{field} sudah terdaftar',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'repassword' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'matches' => '{field} tidak sama',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/register')->withInput()->with('validation', $validation);
        }

        $this->authModel->save([
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ]);

        session()->setFlashdata('pesan', 'Berhasil register');
        return redirect()->to('/register');
    }

    public function attempLogin()
    {
        if (!$this->validate([
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/login')->withInput()->with('validation', $validation);
        }

        $password = $this->request->getVar('password');
        $email = $this->request->getVar('email');
        $data = $this->authModel->where('email', $email)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id' => $data['id'],
                    'nama' => $data['nama'],
                    'email' => $data['email'],
                    'logged_in' => TRUE
                ];
                session()->set($ses_data);

                return redirect()->to('/');
            }
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
