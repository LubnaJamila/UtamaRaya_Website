<?php

namespace App\Http\Controllers;

use App\Models\langganan;
use App\Models\ProdukUMKM;
use App\Models\RekPembayaran;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UMKMController extends Controller
{
    public function showUMKM()
    {
        return view('frontend.umkm.detail_umkm');
    }

    public function index()
    {
        $userId = Auth::id();
    $data_langganan = DB::table('langganan')
    ->where('id_user', $userId)
        ->select('status_langganan', 'tanggal_mulai', 'tanggal_berakhir')
        ->get();

    $statuses = $data_langganan->pluck('status_langganan');
    $startDates = $data_langganan->pluck('tanggal_mulai');
    $endDates = $data_langganan->pluck('tanggal_berakhir');

    $id_langganan = DB::table('langganan')
        ->where('id_user', $userId)
        ->value('id_langganan');

    $data_produk = DB::table('produk')
        ->where('id_langganan', $id_langganan)
        ->get();
        return view('backend.umkm.dashboard_umkm', compact('statuses', 'startDates', 'endDates','data_produk'));
    }

     public function paketUMKM()
    {
        $userId = Auth::id();
        $langganan = Langganan::where('id_user', $userId)->first();
        return view('backend.umkm.langgananumkm', compact('langganan'));
    }
    
     public function produk()
    {
        $userId = Auth::id();
            $id_langganan = DB::table('langganan')
            ->where('id_user', $userId)
            ->value('id_langganan');

        $data_produk = DB::table('produk')
            ->where('id_langganan', $id_langganan)
            ->get();

        $product_count = $data_produk->count();
        return view('backend.umkm.produk', compact('data_produk', 'product_count'));
    }
      public function create()
    {
        return view('backend.umkm.create');
    }
    public function store(Request $request){

        $request->validate([
            'nama_produk' => 'required',
            'harga_produk' => 'required|numeric',
            'deskripsi_produk' => 'required',
            'gambar_produk' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);
    
        $userId = Auth::id(); 
        $langganan = DB::table('langganan')
            ->where('id_user', $userId)
            ->first();
    
        if (!$langganan) {
            return back()->withErrors(['error' => 'Data langganan tidak ditemukan']);
        }
    
        if ($request->harga_produk < $langganan->harga_terkecil || $request->harga_produk > $langganan->harga_tertinggi) {
            return back()->withErrors(['error' => 'Harga produk harus berada di antara ' . $langganan->harga_terkecil . ' dan ' . $langganan->harga_tertinggi]);
        }

        $file = $request->file('gambar_produk');
        $filename = date('Y-m-d') . $file->getClientOriginalName();
        $filePath = 'gambar_produk/' . $filename;
        $file->move(public_path('gambar_produk'), $filename);

        ProdukUMKM::create([
            'nama_produk' => $request->nama_produk,
            'harga_produk' => $request->harga_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'gambar_produk' => $filePath,
            'id_langganan' => $langganan->id_langganan, 
        ]);
    
        return redirect()->route('produk')->with('success', 'Produk berhasil ditambahkan.');
    }
           public function edit($id_produk)
    {
        $data_produk = ProdukUMKM::find($id_produk);
        return view('backend.umkm.edit',compact('data_produk'));
    }
    public function update(Request $request, $id_produk)
{
    $request->validate([
        'nama_produk' => 'required|string',
        'harga_produk' => 'required|numeric',
        'deskripsi_produk' => 'required|string',
        'gambar_produk' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
    ]);

    $userId = Auth::id();
    $langganan = DB::table('langganan')
        ->where('id_user', $userId)
        ->first();

    if (!$langganan) {
        return back()->withErrors(['error' => 'Data langganan tidak ditemukan']);
    }

    if ($request->harga_produk < $langganan->harga_terkecil || $request->harga_produk > $langganan->harga_tertinggi) {
        return back()->withErrors(['error' => 'Harga produk harus berada di antara ' . $langganan->harga_terkecil . ' dan ' . $langganan->harga_tertinggi]);
    }

    $data_produk = ProdukUMKM::findOrFail($id_produk);
    $data = [
        'nama_produk' => $request->nama_produk,
        'harga_produk' => $request->harga_produk,
        'deskripsi_produk' => $request->deskripsi_produk,
    ];

    if ($request->hasFile('gambar_produk')) {
        $file = $request->file('gambar_produk');
        $filename = date('Y-m-d') . '-' . $file->getClientOriginalName();
        $filePath = 'gambar_produk/' . $filename;
        $file->move(public_path('gambar_produk'), $filename);
        $data['gambar_produk'] = $filePath;
    }

    $data_produk->update($data);

    return redirect()->route('produk')->with('success', 'Produk berhasil diperbarui.');
}

    public function registerUmkm(Request $request)
    {

        $request->validate([
            'nama_lengkap' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'no_hp' => 'required|string|max:15',
            'nama_usaha' => 'required|string|max:50',
            'deskripsi_umkm' => 'required|string|max:300',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'harga_terkecil' => 'required|integer',
            'harga_tertinggi' => 'required|integer',
            'password' => 'required|string|min:3|confirmed',
            'password_confirmation' => 'required|string|min:3',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email harus berformat email yang valid',
            'email.unique' => 'Email sudah digunakan',
            'no_hp.required' => 'No Hp wajib diisi',
            'nama_usaha.required' => 'Nama Usaha wajib diisi',
            'deskripsi_umkm.required' => 'Deskripsi Usaha wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'harga_terkecil.required'=>'Harga Terkecil wajib diisi',
            'harga_tertinggi.required'=>'Harga Terkecil wajib diisi',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password harus terdiri dari minimal 3 karakter',
            'password_confirmation.required' => 'Konfirmasi password wajib diisi',
            'password_confirmation.confirmed' => 'Konfirmasi password tidak sama',
            'password_confirmation.min' => 'Konfirmasi password harus terdiri dari minimal 3 karakter',
        ]);

        $harga_terkecil = $request->input('harga_terkecil');
        $harga_tertinggi = $request->input('harga_tertinggi');
        $harga_rata = ($harga_terkecil + $harga_tertinggi) / 2;
        $harga_langganan=$harga_rata*0.75;

        $user = User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'nama_usaha' => $request->nama_usaha,
            'deskripsi_umkm' => $request->deskripsi_umkm,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'password' => Hash::make($request->password),
            'jabatan' => 'umkm', 
        ]);
        langganan::create([
            'id_user' => $user->id, 
            'harga_terkecil' => $request->input('harga_terkecil'),
            'harga_tertinggi' => $request->input('harga_tertinggi'),
            'harga_rata' => $harga_rata,
            'harga_langganan' => $harga_langganan,
            'bukti_tf' => null,
            'tanggal_mulai' => null,
            'tanggal_berakhir' => null
        ]);
        
        if ($user) {
           return redirect()->route('umkm')->with('Sukses', 'Pendaftaran UMKM berhasil!');
        } else {
            return back()->with('error', 'Gagal membuat akun, silakan coba lagi.');
        }
    }
    public function index_berlangganan()
{
    $userId = Auth::id(); 
    $langganan = Langganan::where('id_user', $userId)->first(); 
    $no_rek_list = RekPembayaran::all()->keyBy('id_rek')->map(function($item) {
        return [
            'nama_bank' => $item->nama_bank,
            'no_rek' => $item->no_rek,
            'nama_pemilik' => $item->nama_pemilik,
        ];
    });

    return view('backend.umkm.berlangganan', compact('langganan','no_rek_list')); 
}
public function save_berlangganan(Request $request)
{
    $validated = $request->validate([
        'id_rek' => 'required',
        'bukti_tf' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
    ]);

    try {
        $userId = Auth::id();

        $file = $request->file('bukti_tf');
        $filename = date('Y-m-d') . '-' . $file->getClientOriginalName();
        $filePath = 'bukti_tf/' . $filename;
        $file->move(public_path('bukti_tf'), $filename);

        DB::table('langganan')->where('id_user', $userId)->update([
            'status_langganan' => 'Menunggu verifikasi',
            'bukti_tf' => $filePath,
            'id_rek' => $validated['id_rek'],
            'updated_at' => now(),
        ]);

        return redirect()->route('paketUMKM')->with('success', 'Berlangganan berhasil!');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
    }
}
public function hapusproduk($id_produk)
    {
        $data_produk = ProdukUMKM::findOrFail($id_produk);
        $data_produk->delete();
        return redirect()->route('produk')->with('success', 'Data Produk Berhasil Dihapus');
    }
}