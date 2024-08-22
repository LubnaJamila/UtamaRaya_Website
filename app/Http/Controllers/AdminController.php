<?php

namespace App\Http\Controllers;
use App\Models\RekPembayaran;
use App\Models\RentalBike;
use App\Models\Watersport;
use App\Models\Wedding;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function index(){
    $monthlyBookings = [
        ['month' => 'January', 'total' => 150],
        ['month' => 'February', 'total' => 200],
        ['month' => 'March', 'total' => 175],
    ];

    $umkmStatuses = [
        ['status' => 'Menunggu Pengaktifan', 'count' => 30],
        ['status' => 'Sudah Aktif', 'count' => 50],
        ['status' => 'Butuh Perpanjangan', 'count' => 20]
    ];
    return view('backend.admin.dashboard_admin', compact('monthlyBookings', 'umkmStatuses'));
}

    public function akomodasi(){
         return view('backend.admin.master.akomodasi');
    }
    public function create()
    {
        return view('backend.admin.master.createakomodasi');
    }
    public function edit()
    {
        return view('backend.admin.master.editakomodasi');
    }
    public function watersport(){
        $data_watersport = DB::table('watersport') ->get();
         return view('backend.admin.master.watersport', compact('data_watersport'));
    }
     public function createwater()
    {
        return view('backend.admin.master.createwater');
    }
    public function store(Request $request){
        $request->validate([
            'nama_watersport' => 'required',
            'harga_watersport' => 'required',
            'deskripsi' => 'required',
            'gambar_watersport' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        $file = $request->file('gambar_watersport');
        $filename = date('Y-m-d') . $file->getClientOriginalName();
        $filePath = 'gambar_watersport/' . $filename;
        $file->move(public_path('gambar_watersport'), $filename);

        Watersport::create([
            'nama_watersport' => $request->nama_watersport,
            'harga_watersport' => $request->harga_watersport,
            'deskripsi' => $request->deskripsi,
            'gambar_watersport' => $filePath,
        ]);

        return redirect()->route('watersport')->with('success', 'Produk berhasil ditambahkan.');
    }
      public function editwater($id_watersport)
    {
        $data_watersport = Watersport::find($id_watersport);
        return view('backend.admin.master.editwater', compact('data_watersport'));
    }
    public function updatewater(Request $request, $id_watersport)
{
    $request->validate([
        'nama_watersport' => 'required',
        'harga_watersport' => 'required',
        'deskripsi' => 'required',
        'gambar_watersport' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
    ]);

    $data_watersport = Watersport::findOrFail($id_watersport);

    $data = [
        'nama_watersport' => $request->nama_watersport,
        'harga_watersport' => $request->harga_watersport,
        'deskripsi' => $request->deskripsi,
    ];

    // Cek jika ada file gambar baru yang diunggah
    if ($request->hasFile('gambar_watersport')) {
        $file = $request->file('gambar_watersport');
        $filename = date('Y-m-d') . $file->getClientOriginalName();
        $filePath = 'gambar_watersport/' . $filename;
        $file->move(public_path('gambar_watersport'), $filename);
        $data['gambar_watersport'] = $filePath;
    }

    // Update data watersport
    $data_watersport->update($data);

    return redirect()->route('watersport')->with('success', 'Produk berhasil diperbarui.');
}
    public function hapuswater($id_watersport){
        $data_watersport = Watersport::findOrFail($id_watersport);
        $data_watersport->delete();
        return redirect()->route('watersport')->with('success', 'Data Berhasil Dihapus');
    }
    public function rental(){
        $data_rentalbike = DB::table('rental_bike') ->get();
         return view('backend.admin.master.rental', compact('data_rentalbike'));
    }
    public function createrental()
    {
        return view('backend.admin.master.createrental');
    }
    public function store_rentalbike(Request $request){
        $request->validate([
            'nama_rentalbike' => 'required',
            'harga_rentalbike' => 'required',
            'gambar_rentalbike' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        $file = $request->file('gambar_rentalbike');
        $filename = date('Y-m-d') . $file->getClientOriginalName();
        $filePath = 'gambar_rentalbike/' . $filename;
        $file->move(public_path('gambar_rentalbike'), $filename);

        RentalBike::create([
            'nama_rentalbike' => $request->nama_rentalbike,
            'harga_rentalbike' => $request->harga_rentalbike,
            'gambar_rentalbike' => $filePath,
        ]);

        return redirect()->route('rentalbike')->with('success', 'Produk berhasil ditambahkan.');
    }
       public function editrental($id_rentalbike)
    {
        $data_rentalbike = RentalBike::find($id_rentalbike);
        return view('backend.admin.master.editrental', compact('data_rentalbike'));
    }
    public function updaterental(Request $request, $id_rentalbike)
{
    $request->validate([
        'nama_rentalbike' => 'required',
        'harga_rentalbike' => 'required',
        'gambar_rentalbike' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
    ]);

    $data_rentalbike = RentalBike::findOrFail($id_rentalbike);

    $data = [
        'nama_rentalbike' => $request->nama_rentalbike,
        'harga_rentalbike' => $request->harga_rentalbike,
    ];

    // Cek jika ada file gambar baru yang diunggah
    if ($request->hasFile('gambar_rentalbike')) {
        $file = $request->file('gambar_rentalbike');
        $filename = date('Y-m-d') . $file->getClientOriginalName();
        $filePath = 'gambar_rentalbike/' . $filename;
        $file->move(public_path('gambar_rentalbike'), $filename);
        $data['gambar_rentalbike'] = $filePath;
    }

    $data_rentalbike->update($data);

    return redirect()->route('rentalbike')->with('success', 'Produk berhasil diperbarui.');
}
    public function hapusrental($id_rentalbike){
        $data_rentalbike = RentalBike::findOrFail($id_rentalbike);
        $data_rentalbike->delete();
        return redirect()->route('watersport')->with('success', 'Data Berhasil Dihapus');
    }
    public function ballroom(){
        $data_wedding = DB::table('wedding') ->get();
         return view('backend.admin.master.ballroom', compact('data_wedding'));
    }
       public function createballroom()
    {
        return view('backend.admin.master.createballroom');
    }
    public function storewedding(Request $request)
{
    $request->validate([
        'nama_paket' => 'required',
        'harga_paket' => 'required',
        'gambar_paket' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
    ]);

    $file = $request->file('gambar_paket');
    $filename = date('Y-m-d') . $file->getClientOriginalName();
    $filePath = 'gambar_paket/' . $filename;
    $file->move(public_path('gambar_paket'), $filename);

    Wedding::create([
        'nama_paket' => $request->nama_paket,
        'harga_paket' => $request->harga_paket,
        'gambar_paket' => $filePath,
    ]);

    return redirect()->route('wedding')->with('success', 'Data Wedding berhasil ditambahkan.');
}
      public function editballroom($id_wedding)
    {
        $data_wedding = Wedding::find($id_wedding);
        return view('backend.admin.master.editwedding', compact('data_wedding'));
    }
    public function updatewedding(Request $request, $id_wedding)
{
    $request->validate([
        'nama_paket' => 'required',
        'harga_paket' => 'required',
        'gambar_paket' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
    ]);

    $data_wedding = Wedding::findOrFail($id_wedding);

    $data = [
        'nama_paket' => $request->nama_paket,
        'harga_paket' => $request->harga_paket,
    ];

    // Cek jika ada file gambar baru yang diunggah
    if ($request->hasFile('gambar_paket')) {
        $file = $request->file('gambar_paket');
        $filename = date('Y-m-d') . $file->getClientOriginalName();
        $filePath = 'gambar_paket/' . $filename;
        $file->move(public_path('gambar_paket'), $filename);
        $data['gambar_paket'] = $filePath;
    }

    $data_wedding->update($data);

    return redirect()->route('wedding')->with('success', 'Paket wedding berhasil diperbarui.');
}
    public function hapuswedding($id_wedding){
        $data_wedding = Wedding::findOrFail($id_wedding);
        $data_wedding->delete();
        return redirect()->route('wedding')->with('success', 'Data Berhasil Dihapus');
    }
    public function rekening(){
        $banks = DB::table('rek_pembayaran') ->get();
        return view('backend.admin.master.rekening', compact('banks'));
   }
    public function index_rekening()
    {
        // Membuat permintaan ke API listBank
        $response = Http::get('https://api-rekening.lfourr.com/listBank');

        // Memeriksa apakah permintaan berhasil
        if ($response->successful()) {
            // Mendapatkan data daftar bank dari respons JSON
            $responseData = $response->json();

            // Memeriksa apakah respons berisi data bank
            if (isset($responseData['data'])) {
                $banks = $responseData['data']; // Mengambil data bank dari kunci 'data'

                // Mengirimkan data ke view
                return view('backend.admin.master.createrekening', compact('banks'));
            } else {
                return back()->withErrors('Data bank tidak tersedia dalam respons');
            }
        } else {
            // Jika permintaan gagal, tindakan yang sesuai (misalnya menampilkan pesan kesalahan)
            return back()->withErrors('Gagal mengambil daftar bank');
        }
    }
    public function getBankDetails(Request $request)
    {
        $accountNumber = $request->input('accountNumber');
        $bankCode = $request->input('bank');

        $url = "https://api-rekening.lfourr.com/getBankAccount";
        $response = Http::get($url, [
            'bankCode' => $bankCode,
            'accountNumber' => $accountNumber,
        ]);

        // Log the entire response for debugging
        Log::info('API Response:', ['response' => $response->body()]);

        if ($response->successful()) {
            $data = $response->json();
            if (isset($data['data']) && isset($data['data']['bankname']) && isset($data['data']['accountname'])) {
                return response()->json([
                    'bankName' => $data['data']['bankname'],
                    'accountHolder' => $data['data']['accountname'],
                ]);
            } else {
                return response()->json(['error' => 'Data tidak lengkap dari API'], 500);
            }
        } else {
            return response()->json(['error' => 'Gagal mengambil detail rekening'], 500);
        }
    }
    public function store_rekening(Request $request)
    {
        $request->validate([
            'nama_bank' => 'required',
            'no_rek' => 'required',
            'nama_pemilik' => 'required',
            
        ]);

            // Create a new instance of RekPembayaran
        $rekPembayaran = new RekPembayaran();
        $rekPembayaran->nama_bank = $request->nama_bank;
        $rekPembayaran->no_rek = $request->no_rek;
        $rekPembayaran->nama_pemilik = $request->nama_pemilik;

        // Save the new record to the database
        $rekPembayaran->save();
            return redirect()->route('rekening')->with('success', 'Tambah Data Rekening berhasil ditambahkan.');
        }
        public function hapusrekening($id_rek)
    {
        $banks = RekPembayaran::findOrFail($id_rek);
        $banks->delete();
        return redirect()->route('rekening')->with('success', 'Data Rekening Berhasil Dihapus');
    }
}