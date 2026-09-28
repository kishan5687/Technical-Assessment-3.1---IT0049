<?php

namespace App\Controllers;

use App\Models\CustomerModel; 
use CodeIgniter\Controller;

class Customers extends Controller
{
    public function index()
    {
        $model = new CustomerModel();
        $data['customers'] = $model->findAll();
        return view('customers/index', $data);
    }

    public function new()
    {
        helper(['form']);
        return view('customers/new');
    }

    public function create()
    {
        helper(['form']);
        $model = new CustomerModel();

        $rules = [
            'full_name' => 'required',
            'email'     => 'required|valid_email'
        ];

        if (!$this->validate($rules)) {
            return view('customers/new', [
                'validation' => $this->validator
            ]);
        }

        $model->save([
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
        ]);

        return redirect()->to('/customers')->with('success', 'Customer created successfully.');
    }

    public function edit($id)
    {
        helper(['form']);
        $model = new CustomerModel();
        $data['customer'] = $model->find($id);

        if (!$data['customer']) {
            return redirect()->to('/customers')->with('error', 'Customer not found.');
        }

        return view('customers/edit', $data);
    }

    public function update($id)
    {
        helper(['form']);
        $model = new CustomerModel();

        $rules = [
            'full_name' => 'required',
            'email'     => 'required|valid_email'
        ];

        if (!$this->validate($rules)) {
            $data['customer'] = $model->find($id);
            $data['validation'] = $this->validator;
            return view('customers/edit', $data);
        }

        $model->update($id, [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
        ]);

        return redirect()->to('/customers')->with('success', 'Customer updated successfully.');
    }
}
