<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\MemberModel;
use App\Models\PetugasModel;
use App\Models\PeminjamanModel;
use App\Models\PengembalianModel;
use CodeIgniter\Controller;

class PerpusController extends Controller
{

    public function index()
    {
        $model = new BukuModel();

        $data['buku'] = $model->findAll();

        return view('home', $data);
    }
    public function buku()
    {
        $model = new BukuModel();

        $data['buku'] = $model->findAll();

        return view('buku/buku', $data); // Ubah 'buku/buku' menjadi 'perpus/buku'
    }

    public function tambahBuku()
    {
        $model = new BukuModel();

        if ($this->request->getMethod() === 'post') {
            $data = [
                'judul' => $this->request->getPost('judul'),
                'genre' => $this->request->getPost('genre'),
                'penulis' => $this->request->getPost('penulis'),
            ];

            $model->insert($data);

            return redirect()->to(site_url('admin-perpustakaan/buku'));
        }

        return view('buku/tambah_buku'); 
    }

    public function editBuku($id)
    {
        $model = new BukuModel();
        $data['buku'] = $model->find($id);
    
        return view('buku/edit_buku', $data); // Menampilkan halaman edit
    }
    
    public function updateBuku($id)
    {
        $model = new BukuModel();
    
        if ($this->request->getMethod() === 'post') {
            // Process form submission for updating data
            $dataToUpdate = [
                'judul' => $this->request->getPost('judul'),
                'genre' => $this->request->getPost('genre'),
                'penulis' => $this->request->getPost('penulis'),
            ];
    
            $model->update($id, $dataToUpdate);
    
            return redirect()->to(site_url('admin-perpustakaan/buku'));
        }
    
        return view('buku/edit_buku'); // Menampilkan halaman edit jika POST tidak terpenuhi
    }
    
    public function hapusBuku($id)
    {
        $model = new BukuModel();
        $model->delete($id);

        return redirect()->to(site_url('admin-perpustakaan/buku'));
    }
    
    public function member()
{
        $model = new MemberModel();

        $data['members'] = $model->findAll(); // Fetch members from the model

        return view('member/member', $data);
    }

    public function tambahMember()
    {
        $model = new MemberModel();

        if ($this->request->getMethod() === 'post') {
            $data = [
                'nama' => $this->request->getPost('nama'),
                'tanggal_join' => $this->request->getPost('tanggal_join'),
                'pekerjaan' => $this->request->getPost('pekerjaan'),
                'alamat' => $this->request->getPost('alamat'),
            ];

            $model->insert($data);

            return redirect()->to(site_url('admin-perpustakaan/member'));
        }

        return view('member/tambah_member');
    }

    public function editMember($id)
    {
        $model = new MemberModel();
        $data['member'] = $model->find($id);

        if ($this->request->getMethod() === 'post') {
            // Process form submission for updating data
            $dataToUpdate = [
                'nama' => $this->request->getPost('nama'),
                'tanggal_join' => $this->request->getPost('tanggal_join'),
                'pekerjaan' => $this->request->getPost('pekerjaan'),
                'alamat' => $this->request->getPost('alamat'),
            ];

            $model->update($id, $dataToUpdate);

            return redirect()->to(site_url('admin-perpustakaan/member'));
        }

        return view('member/edit_member', $data);
    }

    public function hapusMember($id)
    {
        $model = new MemberModel();
        $model->delete($id);

        return redirect()->to(site_url('admin-perpustakaan/member'));
    }
    

    public function petugas()
    {
        $model = new PetugasModel();

        $data['petugas'] = $model->findAll(); // Fetch petugas from the model

        return view('petugas/petugas', $data);
    }

    public function tambahPetugas()
    {
        $model = new PetugasModel();

        if ($this->request->getMethod() === 'post') {
            $data = [
                'nama' => $this->request->getPost('nama'),
                'usai' => $this->request->getPost('usai'),
                'jabatan' => $this->request->getPost('jabatan'),
                'alamat' => $this->request->getPost('alamat'),
            ];

            $model->insert($data);

            return redirect()->to(site_url('admin-perpustakaan/petugas'));
        }

        return view('petugas/tambah_petugas');
    }

    public function editPetugas($id)
    {
        $model = new PetugasModel();
        $data['petugas'] = $model->find($id);

        if ($this->request->getMethod() === 'post') {
            // Process form submission for updating data
            $dataToUpdate = [
                'nama' => $this->request->getPost('nama'),
                'usia' => $this->request->getPost('usia'),
                'jabatan' => $this->request->getPost('jabatan'),
                'alamat' => $this->request->getPost('alamat'),
            ];

            $model->update($id, $dataToUpdate);

            return redirect()->to(site_url('admin-perpustakaan/petugas'));
        }

        return view('petugas/edit_petugas', $data);
    }

    public function hapusPetugas($id)
    {
        $model = new PetugasModel();
        $model->delete($id);

        return redirect()->to(site_url('admin-perpustakaan/petugas'));
    }


    public function peminjaman()
    {
        $model = new PeminjamanModel();

        $data['peminjaman'] = $model->where("status_pengembalian", false)->find();

        return view('peminjaman/peminjaman', $data);
    }

    public function tambahPeminjaman()
    {
        $memberModel = new MemberModel();
        $petugasModel = new PetugasModel();
        $bukuModel = new BukuModel();

        if ($this->request->getMethod() === 'post') {
            $data = [
                'judul_buku' => $this->request->getPost('judul_buku'),
                'id_member' => $this->request->getPost('id_member'),
                'id_petugas' => $this->request->getPost('id_petugas'),
                'tanggal_pinjam' => $this->request->getPost('tanggal_pinjam'),
                'tanggal_kembali' => $this->request->getPost('tanggal_kembali'),
            ];

            $model = new PeminjamanModel();
            $model->insert($data);

            return redirect()->to(site_url('admin-perpustakaan/peminjaman'));
        }

        $data['members'] = $memberModel->getMembersForDropdown();
        $data['petugas'] = $petugasModel->getPetugasForDropdown();
        $data['buku'] = $bukuModel->getBukuForDropdown();

        return view('peminjaman/tambah_peminjaman', $data);
    }


    public function editPeminjaman($id)
{
    $model = new PeminjamanModel();
    $data['peminjaman'] = $model->find($id);

     // Fetch buku for the dropdown
     $bukuModel = new BukuModel();
     $data['buku'] = $bukuModel->findAll();

    // Fetch members for the dropdown
    $memberModel = new MemberModel();
    $data['members'] = $memberModel->findAll();

    // Fetch petugas for the dropdown
    $petugasModel = new PetugasModel();
    $data['petugas'] = $petugasModel->findAll();

    if ($this->request->getMethod() === 'post') {
        // Process form submission for updating data
        $dataToUpdate = [
            'judul_buku' => $this->request->getPost('judul_buku'),
            'id_member' => $this->request->getPost('id_member'),
            'id_petugas' => $this->request->getPost('id_petugas'),
            'tanggal_pinjam' => $this->request->getPost('tanggal_pinjam'),
            'tanggal_kembali' => $this->request->getPost('tanggal_kembali'),
        ];

        $model->update($id, $dataToUpdate);

        return redirect()->to(site_url('admin-perpustakaan/peminjaman'));
    }

    return view('peminjaman/edit_peminjaman', $data);
}

    public function hapusPeminjaman($id)
    {
        $model = new PeminjamanModel();
        $model->delete($id);

        return redirect()->to(site_url('admin-perpustakaan/peminjaman'));
    }
    

    public function pengembalian()
    {
        $pengembalianModel = new PengembalianModel();
        $data['pengembalian'] = $pengembalianModel->findAll();
    
        // Periksa apakah ada data pengembalian yang dikirim dari fungsi donePeminjaman
        if (session()->has('dataPengembalian')) {
            $data['pengembalian'][] = session('dataPengembalian');
        }
    
        // Load view dengan data pengembalian
        return view('pengembalian/pengembalian', $data);
    }
    
    public function tambahPengembalian()
    {
        $model = new PengembalianModel();

        if ($this->request->getMethod() === 'post') {
            $data = [
                'judul_buku' => $this->request->getPost('judul_buku'),
                'id_member' => $this->request->getPost('id_member'),
                'id_petugas' => $this->request->getPost('id_petugas'),
                'tanggal_pinjam' => $this->request->getPost('tanggal_pinjam'),
                'tanggal_kembali' => $this->request->getPost('tanggal_kembali'),
            ];

            $model->insert($data);

            return redirect()->to(site_url('admin-perpustakaan/pengembalian'));
        }

        return view('pengembalian/tambah_pengembalian');
    }


    public function hapusPengembalian($id)
    {
        $model = new PengembalianModel();
        $model->delete($id);

        return redirect()->to(site_url('admin-perpustakaan/pengembalian'));
    }
    

    
    public function donePeminjaman($id)
    {
        $peminjamanModel = new PeminjamanModel();
        $pengembalianModel = new PengembalianModel();
    
        // Dapatkan data peminjaman berdasarkan ID
        $peminjamanData = $peminjamanModel->find($id);
    
        if (!$peminjamanData) {
            // Handle jika data peminjaman tidak ditemukan
            return redirect()->to(site_url('admin-perpustakaan/peminjaman'))->with('error', 'Data peminjaman tidak ditemukan.');
        }
    
        $tanggalKembali = $peminjamanData['tanggal_kembali']; // Gunakan tanggal kembali dari data peminjaman
        $tanggalSekarang = date('Y-m-d');
    
        // Set status pengembalian
        $statusPengembalian = ($tanggalSekarang > $tanggalKembali) ? 'Telat' : 'Tepat Waktu'; // Set status 'Tepat Waktu' jika belum lewat
    
        // Masukkan data peminjaman ke tabel pengembalian
        $dataToInsert = [
            'id_peminjaman' => $peminjamanData['id_peminjaman'],
            'status_pengembalian' => ($statusPengembalian == 'Tepat Waktu') ? 1 : 0, // 1 untuk Tepat Waktu, 0 untuk Telat
            // Sesuaikan dengan kolom-kolom lain yang ada di tabel pengembalian
        ];
        $pengembalianModel->insert($dataToInsert);
    
        // Hapus data peminjaman dari tabel peminjaman
        $peminjamanModel->delete($id);
    
        // Redirect dengan status pengembalian
        return redirect()->to(site_url('admin-perpustakaan/pengembalian'))->with('success', 'Peminjaman berhasil dipindahkan ke Pengembalian. Status: ' . $statusPengembalian);
    }
    
    
    // Add this method to PerpusController.php
public function updateStatus()
{
    $id_peminjaman = $this->request->getPost('id_peminjaman');
    $status = $this->request->getPost('status');

    $model = new PeminjamanModel();
    $model->update($id_peminjaman, ['status_pengembalian' => $status]);

    // You might want to return a response if needed
    return $this->response->setJSON(['status' => 'success']);
}



    




    // ... tambahkan method-method lainnya sesuai kebutuhan CRUD
}
