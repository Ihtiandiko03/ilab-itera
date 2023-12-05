<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Faq;
use App\Models\Galeri;
use App\Models\Fasilitas;
use App\Models\Download;
use App\Models\Alat;
use App\Models\Kategori;
use App\Models\Peminjam;
use App\Models\Category;
use App\Models\Datapeminjam;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Twilio\Rest\Client;

class HomeController extends Controller
{
    public function index(){
        $hasilSampel = '';

        // var_dump($_GET); die;
        // if($_GET){
        //     $nomor_tiket = $_GET['nomor_referensi'];

        //     $kueri = DB::table('data_peminjam')->where('data_peminjam.nomor_tiket', $nomor_tiket)->select('data_peminjam.status')->get();
        //     $hasilSampel = $kueri[0]->status;
        // }

        $getData = DB::table('category_alat_laboratorium')->limit(3)->get();

        $getData2 = DB::table('alat_laboratorium')
        ->join('category_alat_laboratorium', 'alat_laboratorium.kategori', '=', 'category_alat_laboratorium.id')
        ->select('alat_laboratorium.*', 'category_alat_laboratorium.nama_kategori')
        ->limit(12)
        ->get();

        $getData3 = Post::latest()->limit(3)->get();


        return view('index', [
            'kategori' => $getData,
            'alat' => $getData2,
            'berita' => $getData3,
            'hasilSampel' => $hasilSampel,
            'active' => 'Home',
        ]);
    }

    function getTiket(){
        $nomor_tiket = $_GET['nomor_referensi'];
        $kueri = DB::table('data_peminjam')->where('data_peminjam.nomor_tiket', $nomor_tiket)->select('data_peminjam.status')->get();
        $hasilSampel = $kueri[0]->status;

        $kirim = '<button class="btn mt-3" style="background-color: var(--primary-color); color: white;">'.$hasilSampel.'</button>';

        echo json_encode($kirim);
    }

    public function kontakkami(){
        return view('kontakkami', [
            'active' => 'Kontak Kami',
        ]);
    }

    public function faq(){
        return view('faq', [
            'faq' => Faq::all(),
            'active' => 'FAQ',
        ]);
    }

    public function katalog(){
        if (request('kategori')) {
            $getData2 = DB::table('alat_laboratorium')
                ->join('category_alat_laboratorium', 'alat_laboratorium.kategori', '=', 'category_alat_laboratorium.id')
                ->select('alat_laboratorium.*', 'category_alat_laboratorium.nama_kategori')
                ->where('category_alat_laboratorium.nama_kategori', request('kategori'))
                ->where('alat_laboratorium.jumlah_alat', '>', 0)
                ->paginate(9);
        }
        elseif (request('search')) {
            $search = request('search');

            $getData2 = DB::table('alat_laboratorium')
            ->join('category_alat_laboratorium', 'alat_laboratorium.kategori', '=', 'category_alat_laboratorium.id')
            ->select('alat_laboratorium.*', 'category_alat_laboratorium.nama_kategori')
            ->where('alat_laboratorium.nama_alat', 'like', '%'.$search.'%')
            ->where('alat_laboratorium.jumlah_alat', '>', 0)
            ->paginate(9);
        }
        else{
            $getData2 = DB::table('alat_laboratorium')
                ->join('category_alat_laboratorium', 'alat_laboratorium.kategori', '=', 'category_alat_laboratorium.id')
                ->select('alat_laboratorium.*', 'category_alat_laboratorium.nama_kategori')
                ->where('alat_laboratorium.jumlah_alat', '>', 0)
                ->paginate(9);
        }

        $getData = DB::table('category_alat_laboratorium')->get();

        return view('katalog', [
            'kategori' => $getData,
            'alat' => $getData2,
            'active' => 'Katalog',
        ]);
    }

    public function galeri()
    {
        return view('galeri', [
            'galeri' => Galeri::latest()->paginate(6)->withQueryString(),
            'active' => 'Galeri',
        ]);
    }

    public function fasilitas()
    {
        return view('fasilitas', [
            'fasilitas' => Fasilitas::latest()->paginate(6)->withQueryString(),
            'active' => 'Fasilitas',
        ]);
    }

    public function detailfasilitas($slug)
    {
        $getData = Fasilitas::where('slug', $slug)->get();

        $getData2 = DB::table('alat_laboratorium')
            ->join('category_alat_laboratorium', 'alat_laboratorium.kategori', '=', 'category_alat_laboratorium.id')
            ->select('alat_laboratorium.*', 'category_alat_laboratorium.nama_kategori')
            ->where('nama_lab', $getData[0]->nama_fasilitas)
            ->orWhere('ruangan', $getData[0]->nama_fasilitas)
            ->orWhere('lokasi_gedung', $getData[0]->nama_fasilitas)
            ->get();

        return view('detailfasilitas', [
            "active" => 'Fasilitas',
            'fasilitas' => $getData[0],
            'alat' => $getData2
        ]);
    }

    public function download()
    {
        return view('download', [
            'download' => Download::latest()->paginate(6)->withQueryString(),
            'active' => 'Download',
        ]);
    }

    public function pendidikan(){
        $getData =   DB::table('layanan')
        ->where('nama_layanan', '=', 'Pendidikan')
        ->get();

        $data = [
            'active' => 'Layanan',
            'pendidikan' => $getData[0]
        ];
        return view('pendidikan',$data);
    }

    public function penelitian(){
        $getData =   DB::table('layanan')
        ->where('nama_layanan', '=', 'Penelitian')
        ->get();

        $data = [
            'active' => 'Layanan',
            'penelitian' => $getData[0]
        ];
        return view('penelitian',$data);
    }

    public function pengujian(){
        $getData =   DB::table('layanan')
        ->where('nama_layanan', '=', 'Pengujian')
        ->get();

        $data = [
            'active' => 'Layanan',
            'pengujian' => $getData[0]
        ];
        return view('pengujian',$data);
    }

    

    public function checkout(Request $request){
        // var_dump($_GET);
        // die;
        
        
            // var_dump($_POST);
            // die;
            switch ($_GET["action"]) {
                case "add":
                    if (!empty($_POST["quantity"])) {
                        $productByCode = DB::table('alat_laboratorium')->where('id', '=', $_POST["code"])->get();

                        // $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
                        
                        $itemArray = array($productByCode[0]->id => array('nama_alat' => $productByCode[0]->nama_alat, 'id' => $productByCode[0]->id, 'quantity' => $_POST["quantity"], 'harga' => $productByCode[0]->harga, 'gambar_alat' => $productByCode[0]->gambar_alat));
                        // var_dump($itemArray);
                        // die;

                        if (!empty(session('cart_item'))) {
                            // var_dump('TIDAK BISA');
                            // die;
                            if (in_array($productByCode[0]->id, array_keys(session('cart_item')))) {
                                foreach (session('cart_item') as $k => $v) {
                                    if ($productByCode[0]->id == $k) {
                                        if (empty(session('cart_item')[$k]["quantity"])) {
                                            session('cart_item')[$k]["quantity"] = 0;
                                        }
                                        session('cart_item')[$k]["quantity"] += $_POST["quantity"];
                                    }
                                }
                            }
                            else {
                                $gabung = array_merge(session('cart_item'), $itemArray);
                                session()->put('cart_item', $gabung);

                            }
                        }
                        else {
                            // $_SESSION["cart_item"] = $itemArray;
                            // Session::set('cart_item', $itemArray);
                            session()->put('cart_item', $itemArray);
                            // var_dump(Session::get('cart_item'));
                            // die;
                        }
                    }
                    return redirect()->back();
                    break;
                case "remove":
                    $var = (int)$_GET["code"];
                    $var -= 1;
                    if (!empty(session('cart_item'))) {
                        foreach (session('cart_item') as $k => $v) {
                            if ($var == $k){
                                // unset(session('cart_item')[$k]);
                                // var_dump($k);
                                // die;
                                $cart = session('cart_item');
                                Arr::forget($cart, $k);
                                // array_forget($cart, $k);
                                session()->put('cart_item', $cart);
                                // session()->forget('cart_item', $k);
                            }
                            if (empty(session('cart_item'))){
                                session()->forget('cart_item');
                            }
                        }
                    }
                    return redirect()->back();
                    break;
                case "empty":
                    session()->forget('cart_item');
                    return redirect()->back();
                    break;
            }

            
        
    }

    public function isiform(){
        return view('isiform', [
            'active' => 'Katalog',
        ]);
    }

   

    public function verifdatadiri(Request $request){
        // $validatedData = $request->validate([
        //     'nama' => 'required|min:3|max:255',
        //     'phone' => 'required',
        //     'nomor_tiket' => 'required',
        //     'status' => 'required'
        // ]);

        $index = 0;
        $nama = $_POST['nama'];
        $phone = $_POST['phone'];
        $nomor_tiket = $_POST['nomor_tiket'];
        $status = $_POST['status'];
        $no_tiket = array();


        $alat = session('cart_item');
        foreach($alat as $item){
            $data = array();

            $bulan = date("m");
            $kueri = "SELECT COUNT(id) as total FROM `data_peminjam` WHERE MONTH(created_at)= $bulan";
            $getData = DB::select($kueri);
            $nomor_tiket = 'TIC-'.date("Y").'-'.date("m").'-'.sprintf("%06d", ($getData[0]->total + 1));

            array_push($data, array(
                'nomor_tiket' => $nomor_tiket,
                'id_alat_lab' => $item['id'],
                'jumlah' => $item['quantity'],
                'nama' => $nama,
                'phone' => $phone,
                'status' => $status
            ));

            Datapeminjam::create($data[0]);

            array_push($no_tiket, array(
                'nomor_tiket' => $nomor_tiket
            ));
            $index++;
        }

        // var_dump($validatedData);
        // die;
        
        $this->sendWhatsapp($phone, $no_tiket);

        // $this->whatsappNotification($validatedData['phone']);

        echo ("<script LANGUAGE='JavaScript'>window.alert('Pesanan berhasil dibuat. Silahkan cek pesan Whatsapp Anda');window.location.href='/';</script>");
    }

    private function sendWhatsapp(string $no_hp, $no_tiket){
        $token = "z+YV#8e#9crx3-U+tBNK";
        $target = $no_hp;
        $data = session('cart_item');
        $kirim = 'Kami dari UPT Laboratorium Terpadu ITERA. Ada memesan alat/barang berikut:';
        foreach($data as $item){
            $kirim.= ' Nama barang '.$item['nama_alat'].' dengan jumlah '. $item['quantity'].' unit dengan harga satuan Rp.'. $item['harga'].' ';
        }

        $kirim .= ' Nomor referensi anda adalah ';

        foreach($no_tiket as $key){
            $kirim.= ' (Nomor Referensi : '.$key['nomor_tiket'].'), ';
        }

        $kirim .= '. Anda dapat memantau status sampel anda di halaman website.';


        $kirim.=' Silahkan Menunggu hingga Tim Kami menghubungi Anda. Terima Kasih.';
        
        session()->forget('cart_item');
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
        'target' => $target,
        'message' => $kirim,
        
        ),
        CURLOPT_HTTPHEADER => array(
            "Authorization: $token"
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    private function whatsappNotification(string $recipient)
    {
        $sid    = getenv("TWILIO_AUTH_SID");
        $token  = getenv("TWILIO_AUTH_TOKEN");
        $wa_from = getenv("TWILIO_WHATSAPP_FROM");
        $twilio = new Client($sid, $token);

        $body = "Hello, welcome to codelapan.com.";

        return $twilio->messages->create("whatsapp:$recipient", ["from" => "whatsapp:$wa_from", "body" => $body]);
    }
}
