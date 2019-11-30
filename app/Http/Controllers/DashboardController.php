<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Salman\Mqtt\MqttClass\Mqtt;
use App\User;
use App\Air;
use App\pH;
use App\Suhu;
use App\Status;
use App\Gallery;
use Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //Control
        $data_motordc = Status::pluck('nilai')->first();
        $air = Air::orderBy('waktu', 'desc')->where('topik','=','/Node1/air');
        $air2 = Air::orderBy('waktu', 'desc')->where('topik','=','/Node2/air');
        $pH = pH::orderBy('waktu', 'desc')->where('topik','=','/Node1/ph');
        $pH2 = pH::orderBy('waktu', 'desc')->where('topik','=','/Node2/ph');
        $suhu = Suhu::orderBy('waktu', 'desc')->where('topik','=','/Node1/suhu');
        $suhu2 = Suhu::orderBy('waktu', 'desc')->where('topik','=','/Node2/suhu');
        $data = [
            'admin' => User::get(),
            'd_air' => $air->pluck('nilai')->first(),
            'd_air2' => $air2->pluck('nilai')->first(),
            'd_pH' => floatval($pH->pluck('nilai')->first()),
            'd_pH2' => floatval($pH2->pluck('nilai')->first()),
            'd_suhu' => $suhu->pluck('nilai')->first(),
            'd_suhu2' => $suhu2->pluck('nilai')->first(),
            'akt' => $data_motordc
        ];
        return view('layouts/admin/dashboard-admin', $data);
    }

    public function grafikAir()
    {

        $data_jarak = Air::select('nilai', 'waktu')->orderBy('waktu','desc')->take(25)->get();
        $reversed = $data_jarak->reverse();
        $new = $reversed->all();

        $max_date = Air::max('waktu');
        $max = date('Y-m-d H:i:s',strtotime($max_date));
        $now = date('Y-m-d H:i:s');
        $dif = strtotime($now)-strtotime($max);
        $hours = floor($dif / (60 * 60));
        $seconds = $dif - $hours * (60 * 60);

        return view(
            'layouts/admin/grafik/grafik_air-admin',
            [
                'jarak' => $new,
                'jar' => $new,
                'datajarak' =>$seconds,
                'updatewaktu' =>$max

            ]

        );
    }
    public function grafikPh()
    {
        $data_ph = pH::select('nilai', 'waktu')->orderBy('waktu','desc')->take(25)->get();
        $reversed =  $data_ph->reverse();
        $new = $reversed->all();

        $max_date = pH::max('waktu');
        $max = date('Y-m-d H:i:s',strtotime($max_date));
        $now = date('Y-m-d H:i:s');
        $dif = strtotime($now)-strtotime($max);
        $hours = floor($dif / (60 * 60));
        $seconds = $dif - $hours * (60 * 60);

        return view(
            'layouts/admin/grafik/grafik_ph-admin',
            [
                'ph' => $new,
                'phh' => $new,
                'dataph' =>$seconds,
                'updatewaktu' =>$max
            ]

        );
    }
    public function grafikSuhu()
    {
        $data_suhu = Suhu::select('nilai','waktu')->orderBy('waktu','desc')->take(25)->get();
        $reversed = $data_suhu->reverse();
        $new    = $reversed->all();
        
        $max_date = Suhu::max('waktu');
        $max = date('Y-m-d H:i:s',strtotime($max_date));
        $now = date('Y-m-d H:i:s');
        $dif = strtotime($now)-strtotime($max);
        $hours = floor($dif / (60 * 60));
        $seconds = $dif - $hours * (60 * 60);

        return view(
            'layouts/admin/grafik/grafik_suhu-admin',
            [
                'suhu' => $new,
                'suhuu' => $new,
                'selisih' => $seconds,
                'updatewaktu' =>$max
            ]

        );
    }
    public function tabelAir()
    {
        $data_jarak = DB::table('data_jarak')->where('topik', '=', '/Node1/air')->orderBy('waktu','desc')->get();
        $max_air = Air::orderBy('id','desc')->where('topik','=','/Node1/air')->first();

        return view(
            'layouts/admin/datatabel/tabel_air-admin',
            [
                'jarak' => $data_jarak,
                'max_air' => $max_air
            ]
        );
    }

    public function tabelAirnode2()
    {
        $data_jarak = DB::table('data_jarak')->where('topik', '=', '/Node2/air')->orderBy('waktu','desc')->get();
        $max_air2 = Air::orderBy('id','desc')->where('topik', '=', '/Node2/air')->first();

        return view(
            'layouts/admin/datatabel2/tabel_air2-admin',
            [
                'jarak' => $data_jarak,
                'max_air2' => $max_air2
            ]
        );
    }

    public function tabelPh()
    {

        $data_ph = DB::table('data_ph')->where('topik', '=', '/Node1/ph')->orderBy('waktu','desc')->get();
        $max_ph = pH::orderBy('id','desc')->where('topik','=','/Node1/ph')->first();

        
        return view(
            'layouts/admin/datatabel/tabel_ph-admin',
            [
                'pH' => $data_ph,
                'max_ph' => $max_ph

            ]
        );
    }

    public function tabelPhnode2()
    {

        $data_ph = DB::table('data_ph')->where('topik', '=', '/Node2/ph')->orderBy('waktu','desc')->get();
        $max_ph2 = pH::orderBy('id','desc')->where('topik', '=', '/Node2/ph')->first();

        
        return view(
            'layouts/admin/datatabel2/tabel_ph2-admin',
            [
                'pH' => $data_ph,
                'max_ph2' => $max_ph2

            ]
        );
    }


    public function jsonPh()
    {
        
        $last_ph = pH::select('id','waktu','nilai')->orderBy('waktu', 'desc')->first();
        return response()->json($last_ph);
    }

    public function jsonPhnode2()
    {
        
        $last_ph2 = pH::select('id','waktu','nilai')->orderBy('waktu', 'desc')->first();
        return response()->json($last_ph2);
    }

    public function jsonsuhu()
    {
        
        $last_suhu = suhu::select('id','waktu','nilai')->orderBy('waktu', 'desc')->first();
        return response()->json($last_suhu);
    }
    public function jsonsuhunode2()
    {
        
        $last_suhu2 = suhu::select('id','waktu','nilai')->orderBy('waktu', 'desc')->first();
        return response()->json($last_suhu2);
    }

    public function tabelSuhu()
    {


        $data_suhu = DB::table('data_suhu')->where('topik', '=', '/Node1/suhu')->orderBy('waktu','desc')->get();
        $max_suhu = Suhu::orderBy('id','desc')->where('topik', '=', '/Node1/suhu')->first();

            // $data_suhu = DB::table('data_suhu')->orderBy('waktu', 'asc')->get();
        return view(
            'layouts/admin/datatabel/tabel_suhu-admin',
            [
                'suhu' => $data_suhu,
                'max_suhu' => $max_suhu

            ]

        );
    }
    public function tabelSuhunode2()
    {


        $data_suhu = DB::table('data_suhu')->where('topik', '=', '/Node2/suhu')->orderBy('waktu','desc')->get();
        $max_suhu2 = Suhu::orderBy('id','desc')->where('topik', '=', '/Node2/suhu')->first();

        return view(
            'layouts/admin/datatabel2/tabel_suhu2-admin',
            [
                'suhu' => $data_suhu,
                'max_suhu2' => $max_suhu2

            ]

        );
    }

    public function Control(Request $request)
    {
        $mqtt = new Mqtt();
        if(isset($request->control)){
            if($request->control == 1){
                $hasil = 'Nyala';
            }
            else{
                $hasil = 'Mati';
            }

            $status = Status::find(1);

            $status->nilai = $request->control;
            $status->kondisi = $hasil;
                    
            $status->save();  
            
            
            $output = $mqtt->ConnectAndPublish("/Kontrol/MotorDC",$request->control);
            if($output === true){
                echo "berubah";
            }
            else{
                echo "gagal";
            }
            
            return redirect()->back();
        }
        
    }

    public function ReadImages()
    {
        if (Auth::user()->role == 'Administrator') {  
            $datas = Gallery::get();
            return view('layouts.admin.gallery.index', compact('datas'));
        }else{
            return redirect(route('home.read'));
        }

    }

    public function ReadAddImages()
    {
        if (Auth::user()->role == 'Administrator') { 
            return view('layouts.admin.gallery.add');
        }else{
            return redirect(route('home.read'));
        }
    }

    public function PostImages(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'foto' => 'required|mimes:jpeg,jpg,png|max:2048'
        ]);

        $foto = $request->file('foto');
        $filename = $request->nama.'_'.$foto->getClientOriginalName();
        $request->file('foto')->move('public/storage', $filename);
        
        $image = new Gallery();
        $image->nama = $request->nama;
        $image->foto = $filename;
        $image->save();

        return redirect(route('images.read'))->with('success', 'Gambar berhasil ditambah');
    }

    public function DeleteImages(Request $request)
    {
        $data = Gallery::find($request->id);
        $data->delete();

        return back()->with('success', 'Gambar berhasil dihapus');
    }

    public function ReadEditImages($id)
    {
        if (Auth::user()->role == 'Administrator') { 
            $data = Gallery::find($id);
    
            return view('layouts.admin.gallery.edit', compact('data'));
        }else{
            return redirect(route('home.read'));
        }
    }

    public function PostEditImages(Request $request)
    {
        $this->validate($request, [
            'foto' => 'mimes:jpeg,jpg,png|max:2048'
        ]);

        $foto = $request->file('foto');

        if ($foto != NULL) {
            $filename = $request->nama.'_'.$foto->getClientOriginalName();
            $request->file('foto')->move('public/storage', $filename);
            
            $image = Gallery::find($request->id);
            $image->nama = $request->nama;
            $image->foto = $filename;
            $image->save();
        }else{
            $update = Gallery::find($request->id);
            $update->nama = $request->nama;
            $update->save();
        }

        return back()->with('success', 'Data berhasil diupdate');
    }

    public function ReadUser()
    {
        if (Auth::user()->role == 'Administrator') { 
            $datas = User::get();
    
            return view('layouts.admin.user.index', compact('datas'));
        }else{
            return redirect(route('home.read'));
        }
    }

    public function PostUser(Request $request)
    {
        $data = new User();
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->role = $request->role;
        $data->save();

        return back()->with('success', 'User berhasil ditambah');
    }

    public function EditUser(Request $request)
    {
        $data = User::find($request->id);
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->role = $request->role;
        $data->save();

        return back()->with('success', 'User berhasil diedit');
    }

    public function DeleteUser(Request $request)    
    {
        $data = User::find($request->id);
        $data->delete();

        return back()->with('success', 'User berhasil dihapus');

    }
    public function Maintenance()
    {
        $bulan = Air::select(DB::raw('YEAR(waktu) year, MONTH(waktu) month'))
        ->groupby('year','month')
        ->get();

        return view('layouts/admin/maintenance/maintenance', compact('bulan'));
    }

    public function DeleteDB(Request $request)
    {
        if($request->submit != null){
            if($request->bulan == null){
                return redirect()->back()->with('error','error');
            }
            else{
                for($i=0; $i<count($request->bulan); $i++){
                    $data_air = Air::whereMonth('waktu',$request->bulan[$i])->whereYear('waktu',$request->tahun);
                    $data_air->delete();
                    $data_ph = pH::whereMonth('waktu',$request->bulan[$i])->whereYear('waktu',$request->tahun);
                    $data_ph->delete();
                    $data_suhu = Suhu::whereMonth('waktu',$request->bulan[$i])->whereYear('waktu',$request->tahun);
                    $data_suhu->delete();
                }
            }
            return redirect()->back()->with('msg','Success');
        }
    }
   
}
