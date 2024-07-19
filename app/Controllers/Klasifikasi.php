<?php

namespace App\Controllers;

use App\Models\KlasifikasiModel;


class Klasifikasi extends BaseController
{
    protected $klasifikasiModel;

    public function __construct()
    {
        $this->klasifikasiModel = new KlasifikasiModel();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Data Klasifikasi',
            'klasifikasi' => $this->klasifikasiModel->findAll()
        ];
        return view('klasifikasi/index', $data);
    }

    public function create(): string
    {
        $data = [
            'title' => 'Form create klasifikasi'
        ];
        return view('klasifikasi/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/klasifikasi/create')->withInput()->with('validation', $validation);
        }

        $this->klasifikasiModel->save([
            'nama' => $this->request->getVar('nama')
        ]);

        session()->setFlashdata('pesan', 'Data berhasi; ditambahkan');

        return redirect()->to('/klasifikasi');
    }

    public function delete($id)
    {
        $this->klasifikasiModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil dihapus');

        return redirect()->to('/klasifikasi');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form ubah data klasifikasi',
            'validation' => \Config\Services::validation(),
            'klasifikasi' => $this->klasifikasiModel->find($id)
        ];

        return view('/klasifikasi/edit', $data);
    }

    public function update($id)
    {

        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ]
        ])) {
            return redirect()->to('klasifikasi/edit/' . $id)->withInput();
        }

        $this->klasifikasiModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil diubah');

        return redirect()->to('/klasifikasi');
    }
}
