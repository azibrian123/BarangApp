<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KlasifikasiModel;

class Barang extends BaseController
{
    protected $barangModel;
    protected $klasifikasiModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->klasifikasiModel = new KlasifikasiModel();
    }

    public function index(): string
    {
        $query = $this->barangModel->select('barang.id, barang.nama, barang.jumlah, klasifikasi.nama as klasifikasi');
        $query->join('klasifikasi', 'klasifikasi.id = barang.klasifikasi_id');

        $data = [
            'title' => 'Data Barang',
            'barang' => $query->findAll()
        ];
        return view('barang/index', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Form tambah data barang',
            'klasifikasi' => $this->klasifikasiModel->findAll()
        ];

        return view('barang/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'klasifikasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/barang/create')->withInput()->with('validation', $validation);
        }

        $this->barangModel->save([
            'nama' => $this->request->getVar('nama'),
            'klasifikasi_id' => $this->request->getVar('klasifikasi'),
            'jumlah' => $this->request->getVar('jumlah'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasi; ditambahkan');

        return redirect()->to('/barang');
    }

    public function delete($id)
    {
        $this->barangModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil dihapus');

        return redirect()->to('/barang');
    }

    public function edit($id)
    {
        $query = $this->barangModel->select('barang.id, barang.nama, barang.jumlah, barang.klasifikasi_id as klasifikasiid, klasifikasi.nama as klasifikasinama');
        $query->join('klasifikasi', 'klasifikasi.id = barang.klasifikasi_id');
        $query->where('barang.id', $id);

        $data = [
            'title' => 'Form ubah data klasifikasi',
            'validation' => \Config\Services::validation(),
            'barang' => $query->first(),
            'klasifikasi' => $this->klasifikasiModel->findAll()
        ];

        return view('/barang/edit', $data);
    }

    public function update($id)
    {

        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'klasifikasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
        ])) {
            return redirect()->to('barang/edit/' . $id)->withInput();
        }

        $this->barangModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'jumlah' => $this->request->getVar('jumlah'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil diubah');

        return redirect()->to('/barang');
    }
}
