<?php
namespace App\Controllers;

use App\Models\GasModel;

class Gas extends BaseController
{
    protected $gasModel;

    public function __construct()
    {
        $this->gasModel = new GasModel();
    }

    public function index()
    {
        $data['gas'] = $this->gasModel->findAll();
        return view('gas/index', $data);
    }

    public function create()
    {
        return view('gas/create');
    }

    public function store()
    {
        $model = new GasModel();
        $model->insert([
            'nama_gas' => $this->request->getPost('nama_gas'),
            'harga_beli' => $this->request->getPost('harga_beli'),
            'harga_jual' => $this->request->getPost('harga_jual'),
        ]);
        return redirect()->to('/gas');
    }

    public function edit($id)
    {
        $model = new GasModel();
        $data['gas'] = $model->find($id);
        return view('gas/edit', $data);
    }

    public function update($id)
    {
        $model = new GasModel();
        $model->update($id, [
            'nama_gas' => $this->request->getPost('nama_gas'),
            'harga_beli' => $this->request->getPost('harga_beli'),
            'harga_jual' => $this->request->getPost('harga_jual'),
        ]);
        return redirect()->to('/gas');
    }

    public function delete($id)
    {
        $model = new GasModel();
        $model->delete($id);
        return redirect()->to('/gas');
    }
}
