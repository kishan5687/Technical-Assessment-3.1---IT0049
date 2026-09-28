<?php

namespace App\Controllers;

use App\Models\UserModel; 
use CodeIgniter\Controller;

class Users extends Controller
{
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('users/index', $data);
    }

    public function new()
    {
        helper(['form']);
        return view('users/new');
    }

    public function create()
    {
        helper(['form']);
        $model = new UserModel();

        $rules = [
            'username'  => 'required|is_unique[users.username]',
            'full_name' => 'required'
        ];

        if (!$this->validate($rules)) {
            return view('users/new', [
                'validation' => $this->validator
            ]);
        }

        $model->save([
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
        ]);

        return redirect()->to('/users')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        helper(['form']);
        $model = new UserModel();
        $data['user'] = $model->find($id);

        if (!$data['user']) {
            return redirect()->to('/users')->with('error', 'User not found.');
        }

        return view('users/edit', $data);
    }

    public function update($id)
    {
        helper(['form']);
        $model = new UserModel();
        
        $rules = [
            'username'  => "required|is_unique[users.username,id,{$id}]",
            'full_name' => 'required'
        ];

        $avatarFile = $this->request->getFile('avatar');
        if ($avatarFile && $avatarFile->isValid()) {
            $rules['avatar'] = 'uploaded[avatar]|max_size[avatar,2048]|ext_in[avatar,png,jpg,jpeg]';
        }

        if (!$this->validate($rules)) {
            $data['user'] = $model->find($id);
            $data['validation'] = $this->validator;
            return view('users/edit', $data);
        }

        $updateData = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
        ];

        if ($avatarFile && $avatarFile->isValid() && !$avatarFile->hasMoved()) {
            $newName = $avatarFile->getRandomName();
            
            $avatarFile->move(FCPATH . 'uploads/', $newName);

            \Config\Services::image()
                ->withFile(FCPATH . 'uploads/' . $newName)
                ->resize(150, 150, true, 'height')
                ->save(FCPATH . 'uploads/' . $newName);

            $updateData['avatar'] = $newName;
        }

        $model->update($id, $updateData);

        return redirect()->to('/users')->with('success', 'User updated successfully.');
    }
}
